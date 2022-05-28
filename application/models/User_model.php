<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends Main_model {

	protected $table = "pengguna";

	public function getPicture($key, $value)
	{
		$sql = $this->db->select("picture")->from($this->table)
				->where($key, $value)->get();
		return $sql->row();
	}
}

/* End of file User_model.txt */
/* Location: ./application/models/User_model.txt */