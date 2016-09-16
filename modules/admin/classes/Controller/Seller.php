<?php defined("SYSPATH") or die('No direct script access!');
/**
* Controller for Home 
* @package AutoClub
* @author Alain Mbeng
* @copyright  (c) 2016-2017 Alain Mbeng
* @license  http://grbrocante.com
*/

class Controller_Seller extends Controller_Template
{
	public $lang = 'en';
    public $template = 'en/member/template';

	public function action_index()
	{
		if (Auth::instance()->logged_in() == 0) {
            $this->redirect("member/login");
        }

        $user = Auth::instance()->get_user();
        $seller = ORM::factory('Member')->where('username', '=', $user->username)->find();
        if ($seller->profile_completed == 1) {
        	$this->action_home();
        }

        $user = Auth::instance()->get_user();
		$view = View::factory($this->lang.'/member/seller/welcome')
			->bind('post', $post)
			->bind('error', $error)
			->bind('member', $seller)
			->bind('user', $user);
		$this->template->title = "Welcome ";
		$this->template->content = $view;
	}

	//Seller welcome page if profile has not been completed
	public function action_welcome()
	{
		$this->template = $this->lang."/member/template";
		$user = Auth::instance()->get_user();
		$view = View::factory($this->lang.'/member/seller/welcome')
			->bind('post', $post)
			->bind('error', $error)
			->bind('member', $member)
			->bind('user', $user);
		$this->template->title = "Welcome ";
		$this->template->content = $view;
	}

	//Seller dashboard page
	public function action_home()
	{
		$user = Auth::instance()->get_user();
		$view = View::factory($this->lang.'/member/seller/dashboard')
			->bind('user', $user)
			->bind('member', $member);
		$this->template->title = "Welcome Seller ";
		$this->template->content = $view;
	}
}