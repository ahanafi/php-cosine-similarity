<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uji_plagiarisme_model extends Main_model {

	protected $table = "uji_plagiarisme";

	public function insertIfNotExist($judul)
    {
        $judulLowerCase = strtolower($judul);

        $check = $this->rawQuery("SELECT * FROM $this->table WHERE LOWER(judul) =  '$judulLowerCase'");
        if ($check->num_rows() > 0 ) {
            $data = $check->row();
            return $data->id_uji_plagiarisme;
        }

        $this->insert([
            'judul' => $judul,
            'tanggal' => date('Y-m-d')
        ]);

        return $this->getLastInsertID();
    }

    public function updateSimilarity($nilai, $judul)
    {
        if (is_array($nilai)) {
            $status = getStatusKemiripan($nilai['nilai']);
            $data = [
                'kemiripan' => $nilai['nilai'],
                'status' => $status,
                'id_judul_skripsi_terkait' => $nilai['id_judul_skripsi_terkait'],
            ];
        } else {
            $status = getStatusKemiripan($nilai);
            $data = [
                'kemiripan' => $nilai,
                'status' => $status,
            ];
        }

        return $this->update($data, [
            'LOWER(judul)' => strtolower($judul)
        ]);
    }

    public function getDataByJudul($judul)
    {
        $judulLowerCase = strtolower($judul); // konversi ke lower case
        $query = $this->rawQuery("SELECT * FROM $this->table WHERE LOWER(`judul`) = '$judulLowerCase' LIMIT 1");
        return $query->row();
    }

}

/* End of file Uji_plagiarisme_model.php */
/* Location: ./application/models/Uji_plagiarisme_model.php */