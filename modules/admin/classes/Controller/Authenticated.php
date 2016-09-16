<?php defined('SYSPATH') or die('No direct script access');
/*******************************************************************************
 *
 *  filename    : Login.php
 *  description : login page that checks for correct username and password
 *
 *  http://www.churchcrm.io/
 *  Copyright 2001-2002 Phillip Hullquist, Deane Barker,
 *
 *  Updated 2005-03-19 by Everette L Mills: Removed dropdown login box and
 *  added user entered login box
 *
 *
 *  LICENSE:
 *  (C) Free Software Foundation, Inc.
 *
 *  ChurchCRM is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful, but
 *  WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 *  General Public License for more details.
 *
 *  http://www.gnu.org/licenses
 *
 ******************************************************************************/
class Controller_Authenticated extends Controller_Template
{
	//declare standard variables for the admin platform
	public $template = '/admin/admin_template';
    public $auth_required = false;
    public $assert_auth = FALSE;
    public $assert_auth_actions = FALSE;
    public $secure_actions = array(
        // user actions
        'dashboard' => 'admin',
    );

	public function before()
	{
        $this->template = "/admin/admin_template";
        $action = $this->request->action();
        $controller = $this->request->controller();
        $this->url = ($action == 'login') ? "" : $controller.'/'.$action ;
        View::factory()->set_global('footer', View::factory('/admin/admin_footer'));
        View::factory()->set_global('header', View::factory('/admin/admin_header'));
        View::factory()->set_global('sidebar', View::factory('/admin/admin_sidebar'));
        if (Auth::instance()->logged_in('leader')) {
            $this->login_level = 'leader';
        }
        elseif (Auth::instance()->logged_in('admin')){
            $this->login_level = 'admin';
        }
        elseif (Auth::instance()->logged_in('member')){
            $this->login_level = 'member';
        }
        else {
            // Redirect to login page here, or display a "you are not logged in" message
        }
		parent::before();
        //$this->_user_auth();
	}

    protected function _user_auth()
    {
        $action_name = $this->request->action();
        if (($this->assert_auth !== FALSE && Auth::instance()->logged_in($this->assert_auth) === FALSE) || (is_array($this->assert_auth_actions) && array_key_exists($action_name, $this->assert_auth_actions) && Auth::instance()->logged_in($this->assert_auth_actions[$action_name]) === FALSE))
        {
            if (Auth::instance()->logged_in())
            {
                $this->redirect('admin/noaccess');
            }
            else
            {
                $this->redirect('admin/login');
            }
        }
    }
}