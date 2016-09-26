<?php defined('SYSPATH') or die('No direct script access');
/**
*  controller to present platform's about information
*  @author 	Alain Mbeng
*/
class Controller_Team extends Controller_Site
{

	public function action_index(){
		if ($this->lang == 'fr') {
            $teams = ORM::factory('fr_team')->where('status','=',1)->order_by('sort','asc')->find_all();
            $view = new view($this->lang.'/teams/teams');
            $view->teams = $teams;
            $view->title = "";
        }
        elseif ($this->lang == 'en') {
            $teams = ORM::factory('team')->where('status','=',1)->order_by('sort','asc')->find_all();
            $view = new view($this->lang.'/teams/teams');
            $view->teams = $teams;
            $this->template->title = "Meet Our Team";
        }
        $this->template->content = $view;
	}

	// display each team members full timeline profile
    public function action_team_profile($id = NULL) {
        $id = $this->request->param('id');
        if ($this->lang == 'fr') {
            $team = ORM::factory('fr_team')->where('id','=',$id)->find();
            $view = new view($this->lang.'/teams/profile');
            $view->team = $team;
            $this->template->title = $team->name; 
        }
        elseif ($this->lang == 'en') {
            $team = ORM::factory('team')->where('id','=',$id)->find();
            $view = new view($this->lang.'/teams/profile');
            $view->team = $team;
            $this->template->title = $team->name;
        }
        $this->template->content = $view;
    }
}