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
            'roles'       => array('model' => 'Role', 'through' => 'roles_users'),
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

        return $validate;
    }

    public static function register($post){
        $model = new Model_User;
        
        if($model->email_available($post['email']) == 0){
            
        }else{
            $user_id = 0;
        }
        return $user_id;
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