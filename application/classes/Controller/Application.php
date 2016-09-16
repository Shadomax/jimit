<?php defined('SYSPATH') or die('No direct script access.');
    
    abstract class Controller_Application extends Controller_Template 
    {
        public $lang="en";
        public function before()
        {
            $this->lang=Blw::getInterfaceLanguage();
            $this->template = $this->lang."/template";
            View::factory()->set_global('lang',$this->lang);
            View::set_global('site_name', 'NaLevel Empire');
            View::set_global('designer', 'Alain Mbeng');
            View::set_global('address', 'http://www.alain-mbeng.tk');
            parent::before();
        }
    }