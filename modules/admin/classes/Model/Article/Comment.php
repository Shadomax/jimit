<?php defined('SYSPATH') or die('No direct script access');
/**
 * Default comment model for article
 *
 * @package    Admin/Comment
 * @author     Afrovision Group
 * @copyright  (c) 2016-2017 Afrovision Group
 * @license    http://www.afrovisiongroup.com/license.html
 */
class Model_Article_Comment extends ORM
{
	protected $_belongs_to = array(
		'article' => array(
			'model' => 'Category_Article',
			'foreign_key' => 'category_article_id',),
		'articlefr' => array(
			'model' => 'Category_Articlefr',
			'foreign_key' => 'category_article_id',),
	);
	
	public function getThumb()
	{
		if (empty($this->thumb)) {
			return url::base().'admin_assets/dist/img/avatar5.png';
		} else {
			return url::base()."media/upload/thumb/".$this->thumb;
		}
	}

	public function getPicture()
	{
		if (empty($this->photo)) {
			return url::base().'admin_assets/dist/img/avatar5.png';
		} else {
			return url::base()."media/upload/".$this->photo;
		}
	}
}