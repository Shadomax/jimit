<?php defined('SYSPATH') or die('No direct script access.');
    
    abstract class Controller_Application extends Controller_Template 
    {
        public $lang="en";

        public function before()
        {
            $this->template = $this->lang."/template";
            View::factory()->set_global('lang',$this->lang);
            View::set_global('site_name', 'Jimit Institute');
            View::set_global('designer', 'Afrovision Group');
            View::set_global('address', 'http://www.afrovisiongroup.com');
            parent::before();
        }
    }