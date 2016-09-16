<?php defined('SYSPATH') or die('No direct script access');

/**
* 
*/
abstract class Controller_Site extends Controller_Template
{
	
	// var $template = "template";
    var $lang="en";

    public function before(){       
        $this->lang=Zongo::getInterfaceLanguage();
        $this->template=$this->lang."/template";
        View::factory()->set_global('lang',$this->lang);        
        parent::before();
    }
}