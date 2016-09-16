<?php defined('SYSPATH') or die('No direct access allowed.');
return array
(
	 'name' => array(

         'not_empty' => 'please the name field is required',
         'regex'     => 'please the name field requires only alphanumeric characters',
       ),

      'email' => array(
         'email' => 'please enter a valid email', 
         'not_empty' => 'please the email field is required',
		 'default' => 'there was an error with the email field',
       ),
	   

      'phone' => array(

         'not_empty' => 'please enter your mobile number',
         'phone'     => 'pleas provide a valid phone number',
         'min_length' => 'please minimum length for phone number is 8 digit',
       ),

      'website' => array(
          'not_empty' => 'please the website url field is required',
          'url'       => 'please enter a valid website address',
        ),

      'web' => array(
          'isSelect' => 'please you must select at least one option',
        ),

      'seo' => array(
          'isSelect' => 'please you must select at least one option',
        ),

      'adverb' => array(
          'isSelect' => 'please you must select at least one option',
        ),
);
