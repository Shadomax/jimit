<?php defined('SYSPATH') or die('No direct script access');

/**
* 
*/
class Controller_Fr_Contact extends Controller_Site
{
	public function action_index()
	{
		$this->template->title = 'Contactez nous ';
		$view = View::factory($this->lang.'/contact/contact')
			->bind('errors', $errors)
			->bind('values', $_POST)
			->bind('page', $page);

		$page = ORM::factory('Pagefr')->where('deleted', '=', 'false')->and_where('title', '=', 'Contact')->find();
		if ($_POST) {
			$data = $_POST;
			$validate = Validation::factory($data)
				->rule('name', 'not_empty')
				->rule('email', 'not_empty')
				->rule('email', 'email')
				->rule('comment', 'not_empty');
			if ($validate->check()) {
				# code...
			} else {
				$errors = $validate->errors('general');
			}
		}
		$this->template->content = $view;
	}
}