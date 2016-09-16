<?php defined('SYSPATH') or die('No direct script access');

Route::set('admin-team', 'admin/teams(/<action>(/<id>(/<optional>)))', array('id' => '[0-9]++', 'optional' => '.*'))
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'teams',
			'action'		=> 'index',
		));

Route::set('admin-partners', 'admin/partner(/<action>(/<id>(/<optional>)))', array('id' => '[0-9]++', 'optional' => '.*'))
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'partners',
			'action'		=> 'index',
		));

Route::set('admin-faqs', 'admin/faqs(/<action>(/<id>(/<optional>)))', array('id' => '[0-9]++', 'optional' => '.*'))
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'faqs',
			'action'		=> 'index',
		));

Route::set('admin-galleries', 'admin/gallery(/<action>(/<id>(/<optional>)))', array('id' => '[0-9]++', 'optional' => '.*'))
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'Gallery',
			'action'		=> 'index',
			'id'			=> 'id',
		));

Route::set('admin-categories', 'admin/categories(/<action>(/<id>(/<optional>)))', array('id' => '[0-9]++', 'optional' => '.*'))
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'Category',
			'action'		=> 'index',
			'id'			=> 'id',
		));

Route::set('admin-users', 'admin/users(/<action>(/<id>(/<optional>)))', array('id' => '[0-9]++', 'optional' => '.*'))
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'User',
			'action'		=> 'index',
			'id'			=> 'id',
		));

Route::set('admin-events', 'admin/events(/<action>(/<id>(/<optional>)))', array('id' => '[0-9]++', 'optional' => '.*'))
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'Event',
			'action'		=> 'index',
			'id'			=> 'id',
		));

Route::set('admin-articles', 'admin/articles(/<action>(/<id>(/<optional>)))', array('id' => '[0-9]++', 'optional' => '.*'))
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'Article',
			'action'		=> 'index',
			'id'			=> 'id',
		));

Route::set('admin-types', 'admin/types(/<action>(/<id>(/<optional>)))', array('id' => '[0-9]++', 'optional' => '.*'))
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'Type',
			'action'		=> 'index',
			'id'			=> 'id',
		));

Route::set('admin-programs', 'admin/programs(/<action>(/<id>(/<optional>)))', array('id' => '[0-9]++', 'optional' => '.*'))
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'Program',
			'action'		=> 'index',
			'id'			=> 'id',
		));

Route::set('dashboard', 'admin/dashboard')
	->defaults(array(
			'directory'		=> 'admin',
			'controller'	=> 'Dashboard',
			'action'		=> 'dashboard',
			'id'			=> 'id',
		));

Route::set('register', 'admin/register')
	->defaults(array(
			'controller'	=> 'admin',
			'action'		=> 'register',
		));

Route::set('logout', 'admin/logout')
	->defaults(array(
			'controller'	=> 'admin',
			'action'		=> 'logout',
		));

Route::set('noaccess', 'admin/noaccess')
	->defaults(array(
			'controller'	=> 'admin',
			'action'		=> 'noaccess',
		));

Route::set('login', 'admin/login')
	->defaults(array(
			'controller'	=> 'admin',
			'action'		=> 'login',		
		));

Route::set('admin', 'admin(/<action>(/<id>))')
	->defaults(array(
		'controller' => 'admin',
		'action'     => 'index',
	));