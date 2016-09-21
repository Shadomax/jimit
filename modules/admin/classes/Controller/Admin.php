<?php defined('SYSPATH') or die('No direct script access!');
/**
* generic administration module for my projects
*
* @author Alain Mbeng
*/
class Controller_Admin extends Controller_Authenticated
{
    #public $template = $this->lang.'/login_template';

    public function action_index()
    {
        if (Auth::instance()->logged_in()) {
        	$this->redirect('admin/dashboard', 302);
        }
        $this->redirect('admin/login');
        	//->bind('user', $user)
        	//->bind('errors', $errors);
    }

    //lets login user
    public function action_login()
    {
        $this->template = View::factory('/admin/login_template');
        if (Auth::instance()->logged_in()) {
            $this->redirect('admin/dashboard', 302);
        }
        $this->template->title = "Log in";
        $this->template->content = View::factory('/admin/admin_login')
            ->set('values', $_POST)
            ->bind('errors', $errors);
        $alert = Session::instance()->get_once('message');
        View::factory()->set_global('message', $alert);
        if ($_POST) {
            $user = ORM::factory('User');
            // Handled from a form with inputs with names email / password
            $post = $this->request->post();
            //check if the user account as been confirmed
            $notexist = $user->username_available($post['username']);
            if ($notexist) {
                $deleted = ORM::factory('User')->where('username', '=', $post['username'])->find();
                if ($deleted->deleted == 'true') {
                    $error = "Sorry your account has been deleted.";
                    View::factory()->set_global('error', $error);
                } else {
                    Auth::instance()->login($post['username'], $post['password']);
                    if (Auth::instance()->logged_in()) {
                        //get the user details if they are logged in
                        $this->redirect('admin/dashboard', 302);
                    } else {
                        $warning = "<strong>WARNING!!</strong> <br />Incorrect password!!!";
                        View::factory()->set_global('warning', $warning);
                    }
                }
            } else {
                $error = "there is no user with that username in our system";
                View::factory()->set_global('error', $error);
            }
        }
    }

    //lets register new users
    public function action_register()
    {
        $this->template = View::factory('/admin/login_template');
        $view = View::factory('/admin/admin_register')
            ->set('values', $_POST)
            ->bind('errors', $errors)
            ->bind('error', $error);
        $this->template->title = "Registration Page";
        if ($_POST) {
            //create a new instance of the user model
            $user = new Model_User;
            #pass the $_POST data into another variable
            $data = $this->request->post();
            if ($user->email_available($data['email'])) {
                #inform the user that the email has already been taken
                $error = "<strong>SORRY!!</strong> <br />The email address ".$data['email']." has been taken...";
            } else {
                //call the validation function
                $validate = $user->validate($data);
                //check to see if every field was validated correctly
                if ($validate->check()) {
                    try
                    {
                        //$account_type = new Model_User_Type;
                        $user->create_user($data, array('username', 'password', 'email', ));
                        $user->add('roles', ORM::factory('Role')->find(1));
                        //Save the new user id to a cookie
                        cookie::set('user', $user->id);
                        //Instantiate a session
                        $success = "<strong>SUCCESS!!</strong> <br />Your account has been successfuly created. Login below.";
                        Session::instance()->set('message', $success);
                        // Redirect the user to his page
                        $this->redirect('admin/login');
                    }
                    catch (ORM_Validation_Exception $e)
                    {
                        $errors = $e->errors('general');
                    }
                } else {
                    $errors = $validate->errors('general');
                }
            }
            //$this->redirect('');
        }
        $this->template->content = $view;
    }

    //lock the user after 10 minutes of inactivity
    public function action_lock()
    {
        $this->template->title = 'Lock Session ';
        $view = new View('/admin/admin_lock');
        $user = Auth::instance()->get_user();
        $view->user = $user;
        //if the password has been submitted and it is correct
        if ($_POST) {
            //assign post data to a variable
            $data = $this->request->post();
            $validate = validation::factory($data)
                ->rule('password', 'not_empty');
            if ($validate->check()) {
                Auth::instance()->login($user->name, $data['password']);
                if (Auth::instance()->logged_in()) {
                    
                } else {
                    $error = "<strong>Warning!</strong><br/> Wrong Password";
                }
            } else {
                $errors = $validate->errors('/general');
                View::factory()->set_global('errors', $errors);
            }
        }
        $this->template->content = $view;
    }

    //lets create the admin password reset action
    public function action_forget_password()
    {
        $this->template->title = "Reset Password";
        $view = new View('admin_forget_password');
        $this->template->content = $view;
    }

    //lets restrict access to actions if not logged in
    public function action_noaccess()
    {
        $content = View::factory('noaccess');
    }

    //lets logout user
    public function action_logout()
    {
        Auth::instance()->logout();
        $this->redirect('admin/login', 302);
    }
}