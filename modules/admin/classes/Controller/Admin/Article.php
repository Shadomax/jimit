<?php defined('SYSPATH') or die('No direct script access');
/**
* Admin article controller
*/
class Controller_Admin_Article extends Controller_Authenticated
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
		$articles = ORM::factory('Category_Article')->where('deleted','=', 'false')->order_by('sort','asc')->find_all();
		$view = view::factory('admin/admin_articles/home')
			->bind('user', $user)
			->set('articles', $articles)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$count = ORM::factory('Category_Article')->where('deleted', '=', 'false')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Articles ";
		$this->template->content = $view;
	}

	public function action_viewDeleted()
	{
		$articles = ORM::factory('Category_Article')->where('deleted','=', 'true')->order_by('sort','asc')->find_all();
		$view = view::factory('admin/admin_articles/view_deleted')
			->bind('user', $user)
			->set('articles', $articles)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$user = Auth::instance()->get_user();
		$count = ORM::factory('Category_Article')->where('deleted', '=', 'true')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Deleted Articles ";
		$this->template->content = $view;
	}

	//lets add article action
	public function action_add()
	{
		$article = ORM::factory('Category_Article');
		$user = Auth::instance()->get_user();
		$view = view::factory('admin/admin_articles/add')
			->set('user', $user)
			->bind('errors', $errors)
			->bind('values', $_POST)
			->bind('category', $category);
		$category = $article->category->find_all();
		$this->template->user = $user;
		$this->template->title = "Admin Add Article ";
		//lets check if the contact form has been submitted via $_POST
            if ($this->request->post()) {
                //lets assign the posted data to a variable @var data
				$data = array_merge($this->request->post(), $_FILES);
				//lets validate the the posted data for correctness
				$validation = Validation::factory($data)
					->rule('title', 'not_empty')
					->rule('category', 'not_empty')
					->rule('sort', 'not_empty')
					->rule('sort', 'numeric')
					->rule('content', 'not_empty')
	                ->rule('file', 'Upload::not_empty')
	                ->rule('file', 'Upload::size', array(':value', '4M'))
	                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
	                ->rule('file', 'Upload::valid');

                if ($validation->check())
                {
						//lets save the picture
						$image = $_FILES['file'];
						$directory = Upload::$default_directory.'articles/';
						//lets save the picture of the service
						if ($file = Upload::save($image, NULL, $directory))
				        {
				            $filename = 'article_'. uniqid(). '_' . $_FILES['file']['name'];
							$filename = str_replace(" ", "_", $filename);
				 
				            Image::factory($file)
				                ->save($directory.$filename);
				 			$data['photo'] = $filename;
				            // Delete the temporary file
				            unlink($file);
				        }

						//lets save the values to the database
						$article->addArticle($data);
						//save the article to the french table too
						$article_fr = ORM::factory('Category_Articlefr');
						$article_fr->addArticle($data);
                        $success = "<strong>SUCCESS!!</strong><br /> Article has been added successfully. Please use the form below to edit article for french display.";
	                	Session::instance()->set('message', $success);
                    	$this->redirect('admin/articles/fr_edit/'.$article->id, 302);
                } else {
                    // Validation failed, collect the errors
                    $errors = $validation->errors('general');
                    
                }
            }
		$this->template->content = $view;
	}

	//all article comments action
	public function action_all_comments()
	{
		$user = Auth::instance()->get_user();
		$id = $this->request->param('id');
		$comments = ORM::factory('Article_Comment')->where('deleted', '=', 'false')->find_all();
		$view = View::factory('admin/admin_articles/all_comments')
			->bind('user', $user)
			->bind('comments', $comments)
			->bind('count', $count)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$count = ORM::factory('Article_Comment')->where('deleted', '=', 'false')->count_all();
		$this->template->user = $user;
		$this->template->title = "Admin Article Comments ";
		$this->template->content = $view;
	}

	//lets create english edit article action
	public function action_edit($id = '')
	{
		$this->template->title = "Admin Edit Article ";
		$id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin/admin_articles/edit')
			->bind('article', $article)
			->set('user', $user)
			->bind('errors', $errors)
			->bind('category', $category);
		$article = ORM::factory('Category_Article')->where('id', '=', $id)->find();
		$category = ORM::factory('Category')->where('deleted', '=', 'false')->find_all();
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('category', 'not_empty')
				->rule('sort', 'not_empty')
				->rule('sort', 'numeric')
				->rule('content', 'not_empty');
			if ($validation->check()) {
			        //if there were files uploaded, validate them
	                if ($_FILES['file']['size'] > 0) {

	                    $valFiles = new Validation($_FILES);
	                    $valFiles->rule('file', 'Upload::not_empty')
				                ->rule('file', 'Upload::size', array(':value', '4M'))
				                ->rule('file', 'Upload::type', array(':value', array('jpeg','jpg','png','gif')))
				                ->rule('file', 'Upload::valid');
	                    if ($valFiles->check()) {
	                    	$image = $_FILES['file'];
							$directory = Upload::$default_directory.'articles/';
							//lets update the picture of the service
							if ($file = Upload::save($image))
					        {
					        	$filename = 'article_'. uniqid(). '_' . $_FILES['file']['name'];
								$filename = str_replace(" ", "_", $filename);
					            Image::factory($file)
					                ->save($directory.$filename);
					            //save the file in db
					            $article->updatePhoto($filename);
					            //french article save
					            $article_fr = ORM::factory('Category_Articlefr', $id);
					            $article_fr->updatePhoto($filename);
					 
					            // Delete the temporary file
					            unlink($file);
					        }
	                    } else {
	                        $errors = $valFiles->errors('general');
	                    }
	                }
	                if (empty($errors)) {
	                	$article->updateArticle($data);
	                	$success = "<strong>SUCCESS!!</strong><br /> Article has been updated successfully. Please use the form below to edit article for french display.";
	                	Session::instance()->set('message', $success);
                    	$this->redirect('admin/articles/fr_edit/'.$article->id, 302);
	                }
			}
			else {
				$errors = $validation->errors('general');
			}
		}
		//display the edit form
		$this->template->content = $view; 
	}

	//lets create french edit article action
	public function action_fr_edit($id = '')
	{
		$this->template->title = "Admin Edit Article ";
		$id = $this->request->param('id');
		$user = Auth::instance()->get_user();
		$this->template->user = $user;
		$view = view::factory('admin/admin_articles/edit_fr')
			->bind('article', $article)
			->bind('category', $category)
			->set('user', $user)
			->bind('errors', $errors)
			->bind('message', $message);
		$message = Session::instance()->get_once('message');
		$article = ORM::factory('Category_Articlefr')->where('id', '=', $id)->find();
		$category = ORM::factory('Category')->where('deleted', '=', 'false')->find_all();
		if ($this->request->post()) {
			//lets merge the two arrays
            $data = $this->request->post();
			$validation = Validation::factory($data)
				->rule('title', 'not_empty')
				->rule('category', 'not_empty')
				->rule('sort', 'not_empty')
				->rule('sort', 'numeric')
				->rule('content', 'not_empty');
			if ($validation->check()) {
			    //save the edit article
	            $article->updateArticle($data);
	            $success = "<strong>SUCCESS!!</strong><br /> French article has been updated successfully.";
	            Session::instance()->set('message', $success);
                $this->redirect('admin/articles', 302);
			}
			else {
				$errors = $validation->errors('general');
			}
		}
		//display the edit form
		$this->template->content = $view; 
	}

	//lets create delete article action
	public function action_delete($id = '')
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $article = ORM::factory('Category_Article',$id);
        $article_fr = ORM::factory('Category_Articlefr', $id);
        $article_fr->deleted = 'true';
        $article->deleted = 'true';
        if ($article->save() && $article_fr->save()) {
        	$success = "<strong>SUCCESS!!</strong><br /> Article has been deleted successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/articles', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to delete Article at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/articles', 302);
    	}
	}

	//lets create restore article action
	public function action_restore($id = '')
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $article = ORM::factory('Category_Article',$id);
        $article_fr = ORM::factory('Category_Articlefr', $id);
        $article->deleted = 'false';
        $article_fr->deleted = 'true';
        if ($article->save() && $article_fr->save()) {
        	$success = "<strong>SUCCESS!!</strong><br /> Article has been restored successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/articles/viewDeleted', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to restore Article at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/articles/viewDeleted', 302);
    	}
	}

	//lets create delete article action
	public function action_permenantDelete($id = NULL)
	{
		$this->auto_render = false;
        $user = Auth::instance()->get_user();
        $id = $this->request->param('id');
        $article = ORM::factory('Category_Article',$id);
        $article_fr = ORM::factory('Category_Articlefr', $id);
        if ($article->delete() && $article_fr->delete()) {
        	$success = "<strong>SUCCESS!!</strong><br /> Article and its associated comments has been permenantly deleted successfully.";
        	Session::instance()->set('message',$success);
        	$this->redirect('admin/articles/viewDeleted', 302);
        } else {
        	$errors = "<strong>WARNING!!</strong><br /> Unable to delete Article and its associated comments at this at moment. Please Try Later...";
	        Session::instance()->set('message',$errors);
	        $this->redirect('admin/articles/viewDeleted', 302);
    	}
	}
}