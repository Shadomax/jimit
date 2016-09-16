<?php defined('SYSPATH') or die('No direct script access!');

return array(
    'username' => array(
        'not_empty' => 'You must provide a username.',
        'min_length' => 'The username must be at least :param2 characters long.',
        'max_length' => 'The username must be less than :param2 characters long.',
        'username_available' => 'This username is not available.',
    ),
    'password' => array(
        'not_empty' => 'You must provide a password.',
        'min_length' => 'The password must be at least :param2 characters long.',
        'max_length' => 'The password must be less than :param2 characters long.',
    ),

    'password_confirm' => array(
        'matches' => 'The password fields did not match.',
    ),

    'email'	=> array(
    		'not_empty' => 'You must provide an email.',
    		'email' => 'You must provide a valid email address!',
    		'min_length' => 'The email must be at least :param2 characters long.',
    		'max_length' => 'The email must be less than :param2 characters long',
    	),
);