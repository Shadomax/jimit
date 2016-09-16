<?php defined('SYSPATH') or die('No direct script access');
/**
* Controller for members 
* @package AutoClub
* @author Alain Mbeng
* @copyright  (c) 2016-2017 Alain Mbeng
* @license  http://grbrocante.com
*/
class Controller_Member extends Controller_Dev
{
	//public $template = 'candidate_template';
    public $template = 'en/member/template';
    public $lang="en";
    private $decoy = 105313;

	public function action_index() {
       $this->request->response = 'AutoClub --- ';
       $this->redirect('member/login');
    }

    public function action_login() {
        View::factory()->set_global('active', "login");
        $this->template = new View($this->lang.'/member/login_template');
        $content = View::factory($this->lang.'/member/login')
            ->bind('errors', $errors)
            ->bind('data', $data)
            ->bind('error', $error);
        if ($_POST) {
        	#pass the post variable to $data variable
            $data = $this->request->post();
            #instantiate a new member object
            $member = new Model_Member;
            $validate = Validation::factory($data)
            	->rule('username', 'not_empty')
            	->rule('password', 'not_empty');
            if ($validate->check()) {
            	$account_check = $member->check_account($data['username']);
	            	if ($account_check) {
		                $account_active = $member->check_activate($data['username']);
		                if ($account_active) {
		                    #Instantiate a new user
		                    //$user = ORM::factory('User');

		                    #Check Auth
		                    $status = Auth::instance()->login($_POST['username'], $_POST['password']);

		                    #If the post data validates using the rules setup in the user model
		                    if ($status) {
		                        #redirect to the user account
		                        #Request::instance()->redirect('member/welcome');
		                        $user_type = Auth::instance()->get_user()->type;
		                        if ($user_type == "seller") {
		                            $uri = "seller";
		                        } else {
		                            $uri = "buyer/home";
		                        }
		                        $this->redirect($uri);
		                    } else {
		                        #Get errors for display in view
		                        $error = "<strong>Try Again!</strong> your account did not login successfully.";
		                    }
		                } else {
		                    $error = "<strongSorry!</strong> your account is not activated. please check your email to confirm your account!";
		                }
		            } else {
		                $error = "<strong>Sorry!</strong> the account is not registered in our system. please signup for free!";
		            }
            } else {
            	$errors = $validate->errors($this->lang.'/models/member/sign_up');
            }
        }
        $this->template->title = "Member Login";
        $this->template->content = $content;
        #If there is a post and $_POST is not empty
        
    }

    // action for user complete user candidate registration
    public function action_register() {
        $this->template = new View($this->lang.'/member/login_template');
        $view =  View::factory($this->lang.'/member/sign_up')
            ->bind('errors', $errors)
            ->bind('email_exist', $email_exist)
            ->bind('post', $post)
            ->bind('country', $country);
        $country = Model_Country::all();
        View::factory()->set_global('active', "register");
        if($_POST){
            $user  = new Model_User;
            $member = new Model_Member;
            // field name and the value to be validated
            $post   = $_POST;
            //check if email is already registered
            $unique_email = $member->unique_email($post['email']);
            if ($unique_email) {
                $email_exist = '<strong>Sorry!</strong> the email has been taken already!!';
            } else {
                //call the validation function
                $validate = $user->validate($post);
                //check if it satisfies all rules
                if($validate->check()){
                    $data['username'] = HTML::chars($post['username']);
                    $data['email']  = html::chars($post['email']);
                    $data['phone'] = Mobileutils::prepNumber($post['phone'], $post['country_code']);
                    $data['residence'] = html::chars($post['country_code']);
                    $data['password'] = html::chars($post['password']);
                    $member_id = $member->add_member($data);
                    $save_confirmation = $user->save_confirmation($data['email'], $member_id);
                    if ($save_confirmation) {
                        //encrypt the password before passing to the function
                        $encrypted_password = $user->encrypt_password($data['password']);
                        #extract the key to be sent
                        $token_key = $save_confirmation['key'];
                        //prepare and send the member a confirmation email
                        $link = URL::site('member/confirmEmail').'?email='.$post['email'].'&key='.$token_key.'&code='.$encrypted_password;
                        $to = $post['email'];
                        $from = "no-repbly@autoclub.com";
                        $subject = "Account Confirmation - AutoClub";
                        $message = "<p>please use these link to activate your account. <a href='".$link."'>".$link."</a> </p>";
                        $send_confirmation = $user->sendMail($to, $from, $subject, $message);
                        //success message for account creation
                        $accountCreated = "your account has been created, please check your email for confirmation email.";
                        //instantiating a session instance to be access on the login action
                        $session = Session::instance();
                        $session->set('accountCreated', $accountCreated);
                        $this->redirect('member/login');
                    } 
                    
                }
                else {
                    $errors = $validate->errors($this->lang.'/models/member/sign_up');
                }
            }
        }
        $this->template->title = ($this->lang=='en')?("Member Registration Proccess"):("Enrégistrement Candidat");
        $this->template->content = $view;
    }

    public function action_confirmEmail()
    {
        $view = View::factory($this->lang.'/member/confirm_email')
            ->bind('errors', $errors)
            ->bind('success', $success);
        //Instantiate a new user object
        $user = new Model_User;
        //get all variable from the $_GET array
        $email = $_GET['email'];
        $key = $_GET['key'];
        $encrypted_password = $_GET['code'];
        //decrypt the password received
        $decrypted_password = $user->decrypt_password($encrypted_password);
        $confirmKey = $user->verify_key($email, $key);
        if ($confirmKey) {
            $confirm = $user->update_key($email);
            if ($confirm) {
                $view->success = "Your account has been activated..! you can now login on Njorku";
                Session::instance()->delete('accountCreated');
                //send the a welcome message to the candidate
                $user->sendMail($to, $from, $subject, $message, $decrypted_password);
                #declare an empty array
                $data = array();
                //fill the array with candidate's email and password
                $data['email'] = $email;
                $data['password'] = $decrypted_password;
                #Check Auth
                $status = $user->login($data);

                #If the post data validates using the rules setup in the user model
                if ($status) {
                    #redirect to the user account
                    #Request::instance()->redirect('candidate/welcome');
                    $user_type = Auth::instance()->get_user()->type;
                    if ($user_type == "seller") {
                        $uri = "seller/welcome";
                    } else {
                        $uri = "buyer/welcome";
                    }
                    $this->redirect($uri);
                } else {
                    #Get errors for display in view
                    $content->errors = $_POST->errors($this->lang.'/candidate/profile');
                }
            } else {
                $view->errors = "Your account could not be verified!! Check your email account again...";
            }
        } else {
            $view->errors = "Sorry the key provided did not match any account, please check your email again!";
        }
        $this->template->title = "Confirm Email";
        $this->template->content = $view;
    }

    //candidate welcome page
    public function action_welcome()
    {
        $user = Auth::instance()->get_user();
        //if employer get out
        $view = view::factory($this->lang.'/mobile2/candidate/home');
        $candy = new Model_Mobile2_Candidates;
        $candidate = $candy->candidate_u($user->id);
        $view->candidate = $candidate;
        $view->user = $user;
        //get the candidate email
        $email = $user->email;
        //check if the candidate has completed the wizard
        $cand = new Model_Mobile2_Candidates;
        $candidate_preference = $cand->check_preferences($email);
        if ($candidate_preference) {
            
        } else {
            $view->notWizard = 'Wizard Not completed';
        }
        View::factory()->set_global('active', "welcome");
        $this->template->title = ($this->lang == 'en')?("Welcome " . $user->name . "!"):("Bienvenu(e) " . $user->name . "!");
        $this->template->content = $view;
    }

    //save the candidate preferences
    public function action_savePreferences()
    {
        if ($_POST && $_FILES) {
            //cast the $_POST and $_FILES variable to an array
            $data = array_merge($_POST, $_FILES);
            //validate the data submitted
            $validate = validate::factory($data)
                ->rule('date', 'not_empty')
                ->rule('photo', 'Upload::valid')
                ->rule('photo', 'Upload::not_empty')
                ->rule('photo', 'Upload::type', array(array('png', 'jpg', 'gif', 'jpeg')))
                ->rule('photo', 'Upload::size', array('4M'));
        }
    }

    //candidate profile page
    public function action_profile()
    {
        //get the candidate details from the Auth class
        $user = Auth::instance()->get_user();
        $view = view::factory($this->lang.'/mobile2/candidate/profile');
        $candy = new Model_Mobile2_Candidates;
        $candidate = $candy->candidate_u($user->id);
        $view->user = $user;
        $view->candidate = $candidate;
        View::factory()->set_global('active', "profile");
        $this->template->title = ($this->lang == 'en')?("My Profile"):("Mon Profil");
        $this->template->content = $view;
    }
}