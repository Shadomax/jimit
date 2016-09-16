<?php defined('SYSPATH') or die('No direct access allowed.');
return array
(
	 'name' => array(

         'not_empty' => 'please the name field is required',
         'regex'     => 'please the name field requires only alphanumeric characters',
         'isClient'  => 'please you must be our client to submit a support request',
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

      'company_name' => array(
          'not_empty' => 'please the company name field is required',
          'regex'     => 'please the company name field requires only alphanumeric characters',
        ),

      'website' => array(
          'not_empty' => 'please the website url field is required',
          'url'       => 'please enter a valid website address',
        ),

      'subject' => array(
          'not_empty' => 'please the subject field is required',
        ),

      'message' => array(
          'not_empty' => 'please the message field is required',
          'min_length' => 'please the minimum character for the message field is 40 characters',
        ),

      'client'  => array(
          'not_empty' => 'please you must check the option that say your our client',
        ),
	    'file' => array(
         'Upload::not_empty' => 'please your need to upload a file in word or pdf format', 

         'Upload::type' => 'please upload a valid file type: doc, docx, pdf are allowed types',

         'Upload::size' => 'please the size or your file should be less than 4M',
         'Upload::valid'=>'please upload a valid file type (.doc or .pdf)',

       ),
);
