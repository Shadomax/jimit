<?php defined('SYSPATH') or die('No direct script access!');

/**
* Controller for creating portfolio categpries
*/
class Controller_Admin_Portfolio extends Controller_Dev
{
	public $auth_required = 'admin';
	public $assert_auth_actions = array(
		'index' => array('login'),
		'add'	=> array('login'),
		'edit'	=> array('login'),
		'delete' => array('login'),
	);

	public function action_index()
	{
		$view = View::factory('admin_portfolio/home')
			->bind('user', $user)
			->bind('portfolio', $portfolio_category)
			->bind('count', $count);
		$user = Auth::instance()->get_user();
		$portfolio_category = ORM::factory('portfolio')->where('deleted', '=', 'false')->order_by('sort', 'asc')->find_all();
		$count = ORM::factory('portfolio')->where('deleted', '=', 'false')->count_all();
		$this->template->title = 'Portfolio ';
		$this->template->user = $user;
		$this->template->content = $view;
	}

	//lets add portfolio action
	public function action_add()
	{
		$portfolio = ORM::factory('portfolio');
		$user = Auth::instance()->get_user();
		$view = view::factory('admin_portfolio/add')
			->set('user', $user)
			->bind('errors', $errors)
			->bind('values', $_POST);
		$this->template->user = $user;
		$this->template->title = "Add Portfolio ";
		//lets check if the contact form has been submitted via $_POST
            if ($this->request->post() || $_FILES) {
                //lets assign the posted data to a variable @var data
				$data = array_merge($this->request->post(), $_FILES);
				//lets validate the the posted data for correctness
				$validation = Validation::factory($data)
					->rule('title', 'not_empty')

					->rule('category_id', 'numeric')

	                ->rule('file', 'Upload::not_empty')
	                ->rule('file', 'Upload::size', array(':value', '4M'))
	                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
	                ->rule('file', 'Upload::valid');

                if ($validation->check())
                {
						//lets save the picture of the service
						$image = $_FILES['file'];
						$directory = Upload::$default_directory.'portfolio/';
						$path = Upload::$default_directory.'portfolio/thumb/';
						//lets save the picture of the service
						if ($file = Upload::save($image, NULL, $directory))
				        {
				            $filename = 'portfolio_'. uniqid(). '_' . $_FILES['file']['name'];
							$filename = str_replace(" ", "_", $filename);
							$thumb_filename = 'thumb_'. uniqid(). '_'. $_FILES['file']['name'];
							$thumb_filename = str_replace(" ", "_", $thumb_filename);

							Image::factory($file)
								->resize(280, 190, Image::AUTO)
								->save($path.$thumb_filename);
				 
				            Image::factory($file)
				                ->save($directory.$filename);
				 
				            // Delete the temporary file
				            unlink($file);
				        }

						//lets save the values to the database service table
						$portfolio->title = HTML::chars($data['title']);
						$portfolio->portfolio_category_ID = HTML::chars($data['category_id']);
						$portfolio->content = HTML::chars($data['content']);
						$portfolio->photo = HTML::chars($filename);
						$portfolio->thumb = Html::chars($thumb_filename);
						$portfolio->seo_title = HTML::chars($data['seo_title']);
						$portfolio->seo_description = HTML::chars($data['seo_description']);
						$portfolio->seo_keywords = HTML::chars($data['seo_keywords']);
						$portfolio->deleted = 'false';
						$portfolio->sort = HTML::chars($data['sort']);
						$portfolio->date_added = time();
						$portfolio->save();
                        $this->redirect('admin/portfolio', 302);
                } else {
                    // Validation failed, collect the errors
                    $errors = $validation->errors('models/portfolio');
                    
                }
            }
		$this->template->content = $view;
	}

	//lets create edit portfolio action
	public function action_edit($id = NULL)
	{
		$this->template->title = "Edit Portfolio";
		$portfolio_id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin_portfolio/edit')
			->bind('portfolio', $portfolio)
			->set('user', $user)
			->bind('errors', $errors);
		$portfolio = ORM::factory('portfolio')->where('id', '=', $portfolio_id)->find();
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('category_id', 'numeric');
			if ($validation->check()) {
					//lets save the values to the database service table
					//lets save the values to the database service table
						$portfolio->title = HTML::chars($data['title']);
						$portfolio->portfolio_category_ID = HTML::chars($data['category_id']);
						$portfolio->content = HTML::chars($data['content']);
						$portfolio->seo_title = HTML::chars($data['seo_title']);
						$portfolio->seo_description = HTML::chars($data['seo_description']);
						$portfolio->seo_keywords = HTML::chars($data['seo_keywords']);
						$portfolio->sort = HTML::chars($data['sort']);

			        //if there were files uploaded, validate them
	                if ($_FILES['file']['size'] > 0) {

	                    $valFiles = new Validation($_FILES);
	                    $valFiles->rule('file', 'Upload::not_empty')
				                ->rule('file', 'Upload::size', array(':value', '4M'))
				                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
				                ->rule('file', 'Upload::valid');
	                    if ($valFiles->check()) {
	                    	$image = $_FILES['file'];
							$directory = Upload::$default_directory.'portfolio/';
							$path = Upload::$default_directory.'portfolio/thumb/';
							//lets update the picture of the service
							if ($file = Upload::save($image))
					        {
					        	$filename = 'portfolio_'. uniqid(). '_' . $_FILES['file']['name'];
								$filename = str_replace(" ", "_", $filename);
								$thumb_filename = 'thumb_'. uniqid(). '_'. $_FILES['file']['name'];
								$thumb_filename = str_replace(" ", "_", $thumb_filename);

								Image::factory($file)
									->resize(280, 190, Image::AUTO)
									->save($path.'thumb_'.$thumb_filename);

					            Image::factory($file)
					                ->save($directory.'portfolio_'.$filename);

					            //save the file in db
					            $portfolio->photo = "portfolio_".$filename;
								$portfolio->thumb = "thumb_".$thumb_filename;
					 
					            // Delete the temporary file
					            unlink($file);
					        }
	                    } else {
	                        $fileNotice = "<br><br><br><b>File Upload Errors: </b><br>";
	                        $errors = $valFiles->errors('models/portfolio');
	                    }
	                }
	                $portfolio->save();
                    $this->redirect('admin/portfolio', 302);
			}
			else {
				$formerror = "Form Errors:";
				$errors = $validation->errors('models/portfolio');
			}
		}
		//display the edit form
		$this->template->content = $view; 
	}

	//lets create delete portfolio action
	public function action_delete($id = NULL)
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $portfolio = ORM::factory('portfolio',$id);
        $portfolio->deleted = 'true';
        $portfolio->save();
        //Session::instance()->set('notice',$notice);
        $this->redirect('admin/portfolio', 302);
	}

	public function action_category()
	{
		$view = View::factory('admin_portfolio_category/home')
			->bind('user', $user)
			->bind('portfolio_category', $portfolio_category)
			->bind('count', $count);
		$user = Auth::instance()->get_user();
		$portfolio_category = ORM::factory('portfoliocategory')->where('deleted', '=', 'false')->find_all();
		$count = ORM::factory('portfoliocategory')->where('deleted', '=', 'false')->count_all();
		$this->template->title = 'Portfolio Categories ';
		$this->template->user = $user;
		$this->template->content = $view;
	}

	public function action_category_add()
	{
		$user = Auth::instance()->get_user();
		$this->template->title = 'Add Portfolio Category ';
		$this->template->user = $user;
		$view = View::factory('admin_portfolio_category/add')
			->set('user', $user)
			->bind('values', $_POST)
			->bind('errors', $errors);
		if ($this->request->post()) {
			// Assign the post data into an array variable $data
			$data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty');
			if ($validation->check()) {
				$portfolio_category = new Model_portfoliocategory;
				$portfolio_category->title = HTML::chars($data['title']);
				$portfolio_category->content = Html::chars($data['content']);
				$portfolio_category->seo_title = Html::chars($data['seo_title']);
				$portfolio_category->seo_description = Html::chars($data['seo_description']);
				$portfolio_category->seo_keywords = Html::chars($data['seo_keywords']);
				$portfolio_category->deleted = 'false';
				$portfolio_category->sort = Html::chars($data['sort']);
				$portfolio_category->date_added = time();
				$portfolio_category->save();
				$this->redirect('admin/portfolio/category', 302);
			} else {
				$errors = $validation->errors('models/portfoliocategory');
			}
		}
		$this->template->content = $view;
	}

	public function action_category_edit($id = NULL)
	{
		$cat_id = $this->request->param('id');
		$portfolio_category = ORM::factory('portfoliocategory')->where('id', '=', $cat_id)->find();
		$user = Auth::instance()->get_user();
		$this->template->title = 'Edit Portfolio Category ';
		$this->template->user = $user;
		$view = View::factory('admin_portfolio_category/edit')
			->set('user', $user)
			->bind('errors', $errors)
			->set('portfolio_category', $portfolio_category);
		if ($this->request->post()) {
			// Assign the post data into an array variable $data
			$data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty');
			if ($validation->check()) {
				$portfolio_category->title = Html::chars($data['title']);
				$portfolio_category->content = Html::chars($data['content']);
				$portfolio_category->sort = Html::chars($data['sort']);
				$portfolio_category->seo_title = Html::chars($data['seo_title']);
				$portfolio_category->seo_description = Html::chars($data['seo_description']);
				$portfolio_category->seo_keywords = Html::chars($data['seo_keywords']);
				$portfolio_category->save();
				$this->redirect('admin/portfolio/category', 302);
			} else {
				$errors = $validation->errors('models/portfoliocategory');
			}
		}
		$this->template->content = $view;
	}

	public function action_category_delete($id = NULL)
	{
		$cat_id = $this->request->param('id');
		$portfolio_category = ORM::factory('portfoliocategory')->where('id', '=', $cat_id)->find();
		$portfolio_category->deleted = 'true';
		$portfolio_category->save();
		$this->redirect('admin/portfolio/category', 302);
	}
}