<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_User_agent extends CI_User_agent
{
	public function __construct($config = array())
	{
		parent::__construct($config);
	}

	public function redirect_back()
	{
		$referrer_url = $this->referrer();
		redirect($referrer_url, 'refresh');
	}
}
?>
