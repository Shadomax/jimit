<?php defined('SYSPATH') or die('No direct script access!');
/**
* admin pages controller for managing pages
*/
class Controller_Admin_Pages extends Controller_Dev
{
	//public $template = "admin_template";
	public $auth_required = 'admin';
	public $assert_auth_actions = array(
		'index' => array('login'),
		'add'	=> array('login'),
		'edit'	=> array('login'),
		'delete' => array('login'),
	);

	public function action_index()
	{
		$this->template->title = "Admin Pages";
		$view = view::factory('admin_pages/home')
			->bind('user', $suer)
			->bind('pages', $pages)
			->bind('count', $count);
		$user = Auth::instance()->get_user();
		$pages = ORM::factory('page')->where('deleted','=',1)->order_by('id','asc')->find_all();
		$count = ORM::factory('page')->where('deleted', '=', 1)->count_all();
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//lets create add page
	public function action_add()
	{
		$this->template->title = "Admin add Page";
		$page = ORM::factory('page');
		$view = view::factory('admin_pages/add')
			->bind('user', $user)
			->bind('values', $_POST)
			->bind('errors', $errors);
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		if ($this->request->post()) {
			//lets validate the values
			$data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('content', 'not_empty');
			if ($validation->check()) {
				$page->title = HTML::chars($data['title']);
				$page->content = Html::chars($data['content']);
				$page->seo_title = Html::chars($data['seo_title']);
				$page->seo_description = Html::chars($data['seo_description']);
				$page->seo_keywords = Html::chars($data['seo_keywords']);
				$page->deleted = 'false';
				$page->date_added = time();
				$page->save();
				$this->redirect('admin/pages/edit/'.$page->id, 302);
			} else {
				$errors = $validation->errors('models/page');
			}
		}
		$this->template->content = $view;
	}

	//lets edit the pages
	public function action_edit($id = Null)
	{
		$id = $this->request->param('id');
		$page = ORM::factory('page')->where('id','=',$id)->find();
		$view = view::factory('admin_pages/edit_page')
			->bind('user', $user)
			->set('page', $page)
			->bind('values', $_POST)
			->bind('errors', $errors);
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$this->template->title = "Admin Edit Page";
		if ($this->request->post()) {
			$data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('content', 'not_empty');
			if ($validation->check()) {
				$page->title = $data['title'];
				$page->content = $data['content'];
				$page->seo_title = $data['seo_title'];
				$page->seo_description = $data['seo_description'];
				$page->seo_keywords = $data['seo_keywords'];
				$page->save();
				$this->redirect('admin/pages', 302);
			}
			else {
				$errors = $validation->errors('models/page');
			}
		}
		$this->template->content = $view;
	}

	//lets create delete page
	public function action_delete($id = Null)
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $page = ORM::factory('page',$id);
        $page->deleted = 'true';
        $page->save();
        //Session::instance()->set('notice',$notice);
        $this->redirect('admin/pages', 302);
	}
}