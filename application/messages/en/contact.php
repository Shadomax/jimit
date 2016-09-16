<?php defined('SYSPATH') or die('No direct access allowed.');
return array
(
	 'name' => array(

         'not_empty' => 'please the name field is required',
       ),

      'email' => array(
         'email' => 'please enter a valid email', 
         'not_empty' => 'please the email field is required',
		     'default' => 'there was an error with the email field',
       ),
	   
	   'phone'=>array(
        'min_length' => 'phone field must be 8 and above digits',
			  'phone'=>'please enter a valid phone number',
        'default' => 'There was an error with the phone field',
	   ),

      'company_name' => array(

         'regex' => 'please enter valid company name',
         'default' => 'There was an error with the company name field' 
       ),

	    'subject' => array(
		     'not_empty' => 'please the subject field is required',
         'default' => 'There was an error with the subject field',
       ),

      'message' => array(
          'not_empty' => 'please the message field is required',
          'min_length' => 'minimun character in the message field is 20'
        ),
);
