<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Application {

	public function action_index()
	{
		if ($this->lang == 'en') {
			$content = View::factory($this->lang.'/home');
			$this->template->title = 'Welcmo To ';
			$this->template->content = $content;
		}

		elseif ($this->lang == 'fr') {
			$content = View::factory($this->lang.'/home');
			$this->template->title = 'Bienvenue a ';
			$this->template->content = $content;
		}
	}

} // End Welcome
