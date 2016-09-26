<?php defined('SYSPATH') or die('No direct script access!');
/**
 * Default article french model
 *
 * @package    Admin/Category Article
 * @author     Afrovision Group
 * @copyright  (c) 2016-2017 Afrovision Group
 * @license    http://www.afrovisiongroup.com/license.html
 */
class Model_Category_Articlefr extends ORM
{
	public $_table_name = 'category_articles_fr';

	protected $_belongs_to = array(
		'category' => array('model' => 'Category'),
	);

	protected $_has_many = array(
            'comments' => array('model' => 'Article_Comment',
            'foreign_key' => 'category_article_id',
            ),
        );

	public function labels()
	{
		return array();
	}

	public function getPicture()
	{
		if (empty($this->photo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base().'media/uploads/articles/'.$this->photo;
		}
	}

	//add article
	public function addArticle($data)
	{
		$this->category_id = $data['category'];
		$this->title = $data['title'];
		$this->posted_by = $data['post_by'];
		$this->content = $data['content'];
		$this->photo = $data['photo'];
		$this->seo_title = $data['seo_title'];
		$this->seo_description = $data['seo_description'];
		$this->seo_keywords = $data['seo_keywords'];
		$this->deleted = 'false';
		$this->sort = $data['sort'];
		$this->datetime = time();
		return $this->save();
	}

	//update article
	public function updateArticle($data)
	{
		$this->category_id = $data['category'];
		$this->title = $data['title'];
		$this->posted_by = $data['post_by'];
		$this->content = $data['content'];
		$this->seo_title = $data['seo_title'];
		$this->seo_description = $data['seo_description'];
		$this->seo_keywords = $data['seo_keywords'];
		$this->sort = $data['sort'];
		return $this->save();
	}

	public function updatePhoto($data)
	{
		$this->photo = $data;
		return $this->save();
	}
	
} // End Article Model