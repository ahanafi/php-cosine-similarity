<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends User_model {

	protected $table = "pengguna";

	public function login($credentials)
	{
		$user = $this->getBy('email',$credentials['email']);
		if($user !== null) {
			$validate = password_verify($credentials['password'], $user->password);

			if($validate) {
				$this->session->set_userdata("user", $user);
				$this->session->set_userdata("is_logged_in", TRUE);
				return true;
			} else {
				return false;
			}
		} else {
		    return false;
        }
	}

	public function register($data)
	{
		$register = $this->db->insert($this->table, $data);
		return (bool)$register;
	}
	

}

/* End of file Auth_model.txt */
/* Location: ./application/models/Auth_model.txt */