<?php defined('SYSPATH') or die('No direct script access!');
/**
* Frequently Asked Questions Admin Controller
* @author 	Alain Mbeng
*/
class Controller_Admin_Faqs extends Controller_Dev
{
	public $auth_required = 'admin';
	public $assert_auth_actions = array(
		'index' => array('login'),
		'add'	=> array('login'),
		'edit'	=> array('login'),
		'delete' => array('login'),
	);

	// Lets create index action for faqs
	public function action_index()
	{
		$view = View::factory('admin_faqs/home')
			->bind('user', $user)
			->bind('faqs', $faqs)
			->bind('count', $count);
		$user = Auth::instance()->get_user();
		$faqs = ORM::factory('faq')->where('deleted', '=', 'false')->order_by('sort', 'asc')->find_all();
		$count = ORM::factory('faq')->where('deleted', '=', 'false')->count_all();
		$this->template->title = "Frequently Asked Questions ";
		$this->template->user = $user;
		$this->template->content = $view;
	}

	public function action_add()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = 'Add FAQ ';
		$this->template->user = $user;
		$view = View::factory('admin_faqs/add')
			->set('user', $user)
			->bind('values', $_POST)
			->bind('errors', $errors);
		if ($this->request->post()) {
			// Assign the post data into an array variable $data
			$data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('question', 'not_empty')
				->rule('answer', 'not_empty');
			if ($validation->check()) {
				$faq = new Model_faq;
				$faq->question = HTML::chars($data['question']);
				$faq->answer = Html::chars($data['answer']);
				$faq->seo_title = Html::chars($data['seo_title']);
				$faq->seo_description = Html::chars($data['seo_description']);
				$faq->seo_keywords = Html::chars($data['seo_keywords']);
				$faq->deleted = 'false';
				$faq->sort = Html::chars($data['sort']);
				$faq->date_added = time();
				$faq->save();
				$this->redirect('admin/faqs', 302);
			} else {
				$errors = $validation->errors('models/faqs');
			}
		}
		$this->template->content = $view;
	}

	// Lets create faq edit action
	public function action_edit($id = NULL)
	{
		$id = $this->request->param('id');
		$faq = new Model_faq;
		$faq->find($id);
		$user = Auth::instance()->get_user();
		$this->template->title = 'Edit FAQ ';
		$this->template->user = $user;
		$view = View::factory('admin_faqs/edit')
			->set('user', $user)
			->bind('faq', $faq)
			->bind('errors', $errors);
		if ($this->request->post()) {
			// Assign the post data into an array variable $data
			$data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('question', 'not_empty')
				->rule('answer', 'not_empty');
			if ($validation->check()) {
				$faq->question = HTML::chars($data['question']);
				$faq->answer = Html::chars($data['answer']);
				$faq->seo_title = Html::chars($data['seo_title']);
				$faq->seo_description = Html::chars($data['seo_description']);
				$faq->seo_keywords = Html::chars($data['seo_keywords']);
				$faq->deleted = 'false';
				$faq->sort = Html::chars($data['sort']);
				$faq->date_added = time();
				$faq->save();
				$this->redirect('admin/faqs', 302);
			} else {
				$errors = $validation->errors('models/faqs');
			}
		}
		$this->template->content = $view;
	}

	// Lets create delete faq action
	public function action_delete($id = NULL)
	{
		$faq_id = $this->request->param('id');
		$faq = ORM::factory('faq')->find($faq_id);
		$faq->deleted = 'true';
		$faq->save();
		$this->redirect('admin/faqs', 302);
	}
}