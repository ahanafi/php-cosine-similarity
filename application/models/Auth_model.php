<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends User_model {

	protected $table = "pengguna";

	public function login($credentials)
	{
		$sql = $this->db->get_where($this->table, [
			'email' => $credentials['email']
		]);
		$check = $sql->num_rows();

		if($check > 0) {
			$data = $sql->row();
			$validate = password_verify($credentials['password'], $data->password);

			if($validate === TRUE) {
				$this->session->set_userdata("user", $data);
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
		return ($register) ? TRUE : FALSE;
	}
	

}

/* End of file Auth_model.txt */
/* Location: ./application/models/Auth_model.txt */