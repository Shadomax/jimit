<?php defined('SYSPATH') or die('No direct script access!');

return array(
    'username' => array(
        'not_empty' => 'the username field is blank',
        'min_length' => 'the username must be at least :param2 characters long.',
        'max_length' => 'the username must be less than :param2 characters long.',
        'username_available' => 'this username is not available.',
    ),
    'password' => array(
        'not_empty' => 'the password field is blank',
        'min_length' => 'the password must be at least :param2 characters long.',
        'max_length' => 'the password must be less than :param2 characters long.',
    ),

    'password_confirm' => array(
        'matches' => 'the password fields did not match.',
    ),

    'phone' => array(
            'not_empty' => 'the mobile number field is blank',
            'numeric' => 'the field must be numeric',
            'min_length' => 'the phone number must be at least :param2 characters long'
        ),

    'country_code' => array(
            'not_empty' => 'the country must be selected',
            'min_length' => 'the country code must be at least :param2 characters long',
        ),

    'email'	=> array(
    		'not_empty' => 'the email field is blank',
    		'email' => 'please provide a valid email address!',
    	),
    'first_name' => array(
            'not_empty' => 'the first name field is blank',
            'min_length' => 'the first name must be at least :param2 characters long',
        ),
    'last_name' => array(
            'not_empty' => 'the last name field is blank',
            'min_length' => 'the last name must be at least :param2 characters long',
        ),
);