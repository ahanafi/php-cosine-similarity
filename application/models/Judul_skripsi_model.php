<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judul_skripsi_model extends Main_model {

	protected $table = "judul_skripsi";

	public function all()
    {
        $query = $this->db->query("
            SELECT $this->table.*, topik_skripsi.nama_topik_skripsi AS topik_skripsi
            FROM $this->table
            JOIN topik_skripsi USING (id_topik_skripsi)
        ");

        return $query->result();
    }

    public function cekJudulSkripsi($judul)
    {
        $judulLowerCase = strtolower($judul); // konversi ke lower case
        $query = $this->rawQuery("SELECT * FROM $this->table WHERE LOWER(`judul`) = '$judulLowerCase'");
        return $query->num_rows();
    }

    public function getDataByJudul($judul)
    {
        $judulLowerCase = strtolower($judul); // konversi ke lower case
        $query = $this->rawQuery("SELECT * FROM $this->table WHERE LOWER(`judul`) = '$judulLowerCase'");
        return $query->row();
    }
}

/* End of file Judul_skripsi_model.php */
/* Location: ./application/models/Judul_skripsi_model.php */