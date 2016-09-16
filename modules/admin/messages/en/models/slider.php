<?php defined('SYSPATH') or die('No direct script access!');

return array(
    'title' => array(
        'not_empty' => 'The service title must not be empty.',
    ),
    'content' => array(
        'not_empty' => 'The content field should not be empty.',
    ),

    'sort' => array(
        'not_empty' => 'You must specify a sorting order.',
        'numeric'   => 'The sort field must be numbers.'
    ),

    'file' => array(
         'Upload::not_empty' => 'please your need to upload an image file.', 

         'Upload::type' => 'please upload a valid file type: jpeg, jpg, png, gif are allowed types',

         'Upload::size' => 'please the size or your file should be less than 4M',
         'Upload::valid'=>'please upload a valid file type (.jpeg, .jpg, .png or .gif)',

       ),
);