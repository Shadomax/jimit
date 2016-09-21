<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'email' => array(
		'email'  => 'You must specify a valid email address.',
		'unique' => 'That email is already registered.  Please use a different email address.',
	),
	'name' => array(
		'not_empty' => 'field must not be empty',
	),
	'title' => array(
		'not_empty' => 'field must not be empty',
	),
	'header' => array(
		'not_empty' => 'field must not be empty',
	),
	'certificate' => array(
		'not_empty' => 'field must not be empty',
	),
	'option' => array(
		'not_empty' => 'field must not be empty',
	),
	'code' => array(
		'not_empty' => 'field must not be empty',
	),
	'fee' => array(
		'not_empty' => 'field must not be empty',
	),
	'location' => array(
		'not_empty' => 'field must not be empty',
	),
	'explore' => array(
		'not_empty' => 'field must not be empty',
	),
	'learn' => array(
		'not_empty' => 'field must not be empty',
	),
	'cost' => array(
		'not_empty' => 'field must not be empty',
	),
	'requirement' => array(
		'not_empty' => 'field must not be empty',
	),
	'content' => array(
		'not_empty' => 'field must not be empty',
	),
	'sort' => array(
		'not_empty' => 'field must not be empty',
	),
	'length' => array(
		'not_empty' => 'field must not be empty',
	),
	'file' => array(
		'Upload::not_empty' => 'file must be selected',
		'Upload::size' => 'file must be less than :value',
		'Upload::type' => 'file must be of the following extensions :value',
		'Upload::valid' => 'file is invalid',
	),
);

