<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TFIDF_model extends Main_model {

	protected $table = "tf_idf";

	public function checkTerm($term, $idUjiPlagiarisme)
    {
        $term = strtolower($term);
        $query = $this->rawQuery("SELECT * FROM $this->table WHERE term = '$term' AND id_uji_plagiarisme = '$idUjiPlagiarisme'");
        return $query->num_rows();
    }
}

/* End of file TFIDF_model.php */
/* Location: ./application/models/TFIDF_model.php */