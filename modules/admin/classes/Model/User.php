<?php defined('SYSPATH') or die('No direct access allowed.');
 /**
 * Default user
 *
 * @package    BLW/User
 * @author     Glorious Inventor Team
 * @copyright  (c) 2016-2017 Kohana Team
 * @license    http://gloriousinventor.com/license.html
 */
class Model_User extends Model_Auth_User {
    //public $_table_name = 'users';

    protected $_has_many = array(
            'user_tokens' => array('model' => 'User_Token'),
            'user_contacts' => array('model' => 'User_Contact'),
            'user_details' => array('model' => 'User_Detail'),
            'user_locations' => array('model' => 'User_Location'),
            'user_photos' => array('model' => 'User_Photo'),
            'roles'       => array('model' => 'Role', 'through' => 'roles_users'),
            //'privileges'       => array('model' => 'Privilege', 'through' => 'users_privileges'),
            // for facbook, google+, twitter and yahoo indentities
            'user_identity' => array(),
        );

    // Validation rules
    protected $_rules = array(
        'username' => array(
            'not_empty'  => NULL,
            'min_length' => array(4),
            'max_length' => array(32),
            'regex'      => array('/^[-\pL\pN_.]++$/uD'),
        ),
        'password' => array(
            'not_empty'  => NULL,
            'min_length' => array(5),
            'max_length' => array(42),
        ),
        'password_confirm' => array(
            'matches'    => array('password'),
        ),
        'email' => array(
            'not_empty'  => NULL,
            'min_length' => array(4),
            'max_length' => array(127),
            'email'      => NULL,
        ),
    );

    // Validation callbacks
    protected $_callbacks = array(
        'username' => array('username_available'),
        'email' => array('email_available'),
    );

    protected $_labels = array(
                'username'          => 'Username',
                'email'             => 'Email Address',
                'password'          => 'Password',
                'password_comfirm'  => 'Password Comfirmation'
            );

    protected $_ignored_columns = array('password_confirm');
 
    //check if the username already exist in the database
    public function username_available($username)
    {
        // There are simpler ways to do this, but I will use ORM for the sake of the example
        //return ORM::factory('Member', array('username' => $username))->loaded();
        // Check if the username already exists in the database
        return ORM::factory('User')->where('username', '=', $username)->count_all();
    }

    //check if the email exist in the system
    public function email_available($email)
    {
        return ORM::factory('User')->where('email', '=', $email)->count_all();
    }

    //check if the user account privileges has been revoked by the super admin
    public function check_access($username)
    {
        return ORM::factory('User')->where('username', '=', $username)->find()->access;
    }

    //send email to users
    public function sendMail($to, $from, $subject, $message)
    {
        //instantiate the email class
        return Email::factory($subject)
                    ->message($message, 'text/html')
                    ->to($to)
                    ->from($from)
                    ->sender($from)
                    ->send();
    }

    //verify email and key provided by user is valid
    public function verify_key($email, $key)
    {
        return DB::select(array(DB::expr('COUNT("*")'), 'total_count'))
            ->from('confirm')
            ->where('email', '=', $email)
            ->and_where('key', '=', $key)
            ->execute()
            ->get('total_count');
    }

    //update the users table and delete the confirm table
    public function update_key($email)
    {
        $user_id = DB::select('userid')
            ->from('confirm')
            ->where('email', '=', $email)
            ->execute()
            ->get('userid');
        //update the individual user to be active
        DB::update('users')
            ->set(array('active' => '1'))
            ->where('id', '=', $user_id)
            ->and_where('email', '=', $email)
            ->execute();
        DB::update('members')
            ->set(array('active' => '1'))
            ->where('id', '=', $user_id)
            ->and_where('email', '=', $email)
            ->execute();
        $delete_confirm = DB::delete('confirm')
            ->where('email', '=', $email)
            ->execute();
        return $delete_confirm;
    }

    //check if the email address has been confirmed
    public function confirmed($email)
    {
        return DB::select(array(DB::expr('COUNT(email)'), 'total'))
            ->from('confirm')
            ->where('email', '=', $email)
            ->execute()
            ->get('total');
    }

    //validate the user input
    public function validate($data)
    {
        $model = new Model_User;
        $validate = Validation::factory($data)
            ->rule('username', 'not_empty')
            ->rule('username', 'min_length', array(':value', '4'))
            ->rule('email', 'email')
            ->rule('email', 'not_empty')
            ->rule('password', 'not_empty')
            ->rule('password', 'min_length', array(':value', '6'))
            ->rule('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'));
            /*->rule('country_code', 'not_empty')
            ->rule('country_code', 'min_length', array(':value', '2'))
            ->rule('phone', 'numeric')
            ->rule('phone', 'not_empty')
            ->rule('phone', 'min_length', array(':value', '8'));*/

        return $validate;
    }

    public static function register($post){
        $model = new Model_User;
        
        if($model->email_available($post['email']) == 0){
            $data = array(
                    //'name'  => $data['name'],
                    'username'  => $post['username'],
                    'email' => $post['email'],
                    'type' => $post['type'],
                    //'username' => $data['username'],
                    'password' => Auth::instance()->hash_password($post['password']),
                    'datetime' => time()
                );
            $user = DB::insert('users', array_keys($data))->values($data)->execute();
            /*$dat = array(
                    'tel' => $post['mobile_number'],
                    'email' => $post['email']
                );
            DB::insert('user_contact_address', array_keys($dat))->values($dat)->execute();
            */
        
            $user_id = $user[0];
            #Add the login role to the user
            $new_user = ORM::factory('user')->where('id', '=', $user_id)->find();
            $login_role = new Model_Role(array('name' =>'login'));
            $new_user->add('roles',$login_role);
 
                #sign the user in
                Auth::instance()->login($data['username'], $data['password']);
            //print_r($user[0]); exit;
        }else{
            $user_id = 0;
        }
        return $user_id;
    }

    //save confirmation email
    public function save_confirmation($email, $id)
    {
        //create a random key
        $save_confirmation = array();
        $key = $email . date('mY');
        $key = Auth::instance()->hash_password($key);
        $data = array(
                'email'     => html::chars($email),
                'key'       => $key,
                'userid'    => $id
            );
        $save_confirmation['id'] = DB::insert('confirm', array_keys($data))->values($data)->execute();
        $save_confirmation['key'] = $key;
        return $save_confirmation;
    }

    //get the user avatar
    public function getAvatar()
    {
        if (empty($this->avatar)) {
            return "http://placehold.it/100x100";
        } else {
            return url::base().'media/images/users/avatar'.$this->avatar;
        }
    }

    //get the user complete picture
    public function getPicture()
    {
        if (empty($this->picture)) {
            return "http://placehold.it/100x100";
        } else {
            return url::base().'media/images/users/'.$this->picture;
        }
    }
}