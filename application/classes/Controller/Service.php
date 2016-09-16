<?php defined('SYSPATH') or die('No direct script access');

/**
*  Services controller
*/
class Controller_Service extends Controller_Site
{

	public function action_index()
	{
		if ($this->lang == 'fr') {
			$services = ORM::factory('fr_service')->where('status', '=', 1)->find_all();
			$view = new view($this->lang."/services/services");
			$view->services = $services;
			$view->title = '';
			$this->template->title = '';
		}
		elseif ($this->lang == 'en') {
			$services = ORM::factory('service')->where('status','=',1)->find_all();
			$page = ORM::factory('page')->where('title','=', 'Services')->and_where('status','=',1)->find();
			$clients = ORM::factory('client')->where('feature','=','yes')->and_where('status','=',1)->order_by('sort','asc')->find_all();
			$view = new view($this->lang."/services/services");
			$view->page = $page;
			$view->clients = $clients;
			$view->services = $services;
			$view->title = $page->title;
			$this->template->title = $page->title;
		}
		$this->template->content = $view;
	}

	public function action_service($id = NULL)
	{
		$id = $this->request->param('id');
		if ($this->lang == 'fr') {
			$service = ORM::factory('fr_service')->where('id', '=', $id)->find();
			$view = view::factory($this->lang."/services/service");
			$this->template->title = $service->title;
			$view->service = $service;
		}
		elseif ($this->lang == 'en') {
			$service = ORM::factory('service')->where('id', '=', $id)->find();
			$view = view::factory($this->lang."/services/service");
			$this->template->title = $service->title;
			if ($this->request->post()) {
				$data = $this->request->post();
				$validation = Validation::factory($data)
					->rule('name', 'not_empty')
					->rule('name', 'regex', array(':value', '/^[a-z_. ]++$/iD'))

					->rule('email', 'not_empty')
					->rule('email', 'email')
					->rule('email', 'regex', array(':value', '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD'))

					->rule('phone', 'not_empty')
					->rule('phone', 'phone')
					->rule('phone', 'min_length', array(':value', '8'))

					->rule('website', 'not_empty')
					->rule('website', 'url')

					->rule('web', array($service, 'isSelect'))
					->rule('seo', array($service, 'isSelect'))
					->rule('advert', array($service, 'isSelect'));
					if ($validation->check()) {
						//send mail
					} else {
						$errors = $validation->errors($this->lang.'/letschat');
						$view->errors = $errors;
					}
			}
			$view->service = $service;

		}
		$this->template->content = $view;
	}
}