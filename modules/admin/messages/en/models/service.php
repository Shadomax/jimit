<?php defined('SYSPATH') or die('No direct script access!');

return array(
    'title' => array(
        'not_empty' => 'You must provide a title for the service.',
    ),
    'feature' => array(
        'min_length' => 'The password must be at least :param2 characters long.',
        'max_length' => 'The password must be less than :param2 characters long.',
    ),

    'content' => array(
        'not_empty' => 'The content field should not be empty.',
    ),

    'file' => array(
         'Upload::not_empty' => 'Please your need to upload an image file.', 

         'Upload::type' => 'Please upload a valid file type: jpeg, jpg, png, gif are allowed types',

         'Upload::size' => 'Please the size or your file should be less than 4M',
         'Upload::valid'=>'Please upload a valid file type (.jpeg, .jpg, .png or .gif)',

       ),
);