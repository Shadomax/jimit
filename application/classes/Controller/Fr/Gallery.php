<?php defined('SYSPATH') or die('No direct script access');

/**
* 
*/
class Controller_Fr_Gallery extends Controller_Site
{
	public function action_index()
	{
		$this->template->title = 'Galerie ';
		$view = View::factory($this->lang.'/gallery/home')
			->bind('galleries', $galleries)
			->bind('pagination', $pagination);
			
		// count number of galleries
		$total_gallery = ORM::factory('Gallery')->where('deleted', '=', 'false')->count_all();

		// set-up the pagination
		$pagination = Pagination::factory(array(
		    'total_items' => $total_gallery,
		    'items_per_page' => 12, // this will override the default set in your config
		));

		// get galleries using the pagination limit/offset
		$galleries = ORM::factory('Gallery')->where('deleted', '=', 'false')->offset($pagination->offset)->limit($pagination->items_per_page)->order_by('sort', 'asc')->find_all();

		$this->template->content = $view;
	}
}