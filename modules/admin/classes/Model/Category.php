<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Default category model for articles
 *
 * @package    Admin/Category
 * @author     Afrovision Group
 * @copyright  (c) 2016-2017 Afrovision Group
 * @license    http://www.afrovisiongroup.com/license.html
 */
class Model_Category extends ORM {

	protected $_has_many = array(
            'articles' => array('model' => 'Category_Article'),
            'articlesfr' => array('model' => 'Category_Articlefr'),
        );
	
		
} 
