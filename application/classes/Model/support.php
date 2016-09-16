<?php defined('SYSPATH') or die('No direct script access');
/**
* Model for client support
* @author Alain Mbeng
*/
class Model_Support extends ORM
{

	public function sendEmail($data)
	{
		

	}

	//lets verify if is a client
	public function isClient($name=NULL)
	{
		$client = ORM::factory('client');
		return ! $client->where('name','=',$name)->count_all();
	}

	//lets save the support form
	public function saveRequest($data)
	{
		$dat =array(
				'name'	=> $data['name'],
				'email'	=> $data['email'],
				'phone'	=> $data['phone'],
				'company_name'	=> $data['company_name'],
				'website'	=> $data['website'],
				'message'	=> $data['message'],
				'file'	=> $data['file'],
				'date_added'	=> time(),
			);
		if ($this->values($dat)->save() == True) {
			return True;
		} else {
			return False;
		}
	}
}