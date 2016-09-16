<?php defined('SYSPATH') or die('No direct script access!');

return array(
    'name' => array(
        'not_empty' => 'You must provide a name for the team member.',
    ),

    'position' => array(
    		'not_empty' => 'You must provide a position for the team member.'
    	),

    'file' => array(
         'Upload::not_empty' => 'Please your need to upload an image file.', 

         'Upload::type' => 'Please upload a valid file type: jpeg, jpg, png, gif are allowed types',

         'Upload::size' => 'Please the size or your file should be less than 4M',
         'Upload::valid'=>'Please upload a valid file type (.jpeg, .jpg, .png or .gif)',

       ),
);