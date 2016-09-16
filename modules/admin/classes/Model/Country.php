<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Njorku
 *
 * Country Model. Abstracts the resumes database.
 *
 * @package    Njorku
 * @category   Models
 * @author     Njorku Team
 * @copyright  (c) 2010-2011 Njorku Team 
 * @license
 *
 */
class Model_Country extends ORM {

	//returns resumes of a candidate
	public static function all(){
		return DB::select()->from('countries')->as_object()->execute();
	}
	
	//returns country
	public static function country($country_code){
		//$country = 	DB::select()->from('countries')->where('country_code_2', '=', $country_code)
		//			->as_object()->execute()->current();
		if($country_code != -1)	{	
			return ORM::factory('country')->where('country_code_2', '=', $country_code)->find()->common_name;
		}else{
                       
			return "All Countries";
                        
		}
	}
        //returns country phone code
        public static function telephone_code($country_code){
		//$country = 	DB::select()->from('countries')->where('country_code_2', '=', $country_code)
		//			->as_object()->execute()->current();
		if($country_code != -1)	{	
			return ORM::factory('country')->where('country_code_2', '=', $country_code)->find()->telephone_code;
		}else{
                       
			return "All";
                        
		}
	}
		
} 
