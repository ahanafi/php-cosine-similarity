<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_plagiarisme extends CI_Controller
{

    public function index()
    {
        $data = [
            'title' => 'Form Mahasiswa'
        ];

        if (isset($_POST['check'])) {
            // Data judul yang diinput oleh mahasiswa
            $judul = $this->main_lib->getPost('judul');
            $query = $judul;
            $data['judul'] = $judul;

            $judulSkripsiDb = $this->Judul_skripsi->all();

            // Data judul skripsi yang sudah ada pada database
            $data['judul_existing'] = $judulSkripsiDb;

            // array judul => Judul skripsi dari DB + judul yang diinput via form
            $arrJudul = [];
            $arrJudul[] = $judul;

            foreach ($judulSkripsiDb as $jd) {
                $arrJudul[] = $jd->judul;
            }

            // array terms
            $arrTerms = [];

            foreach ($arrJudul as $jd) {
                $tokenize = tokenize($jd);
                foreach ($tokenize as $word) {
                    if (trim($word) !== '') {

                        // Memasukkan `term` ke variable array dengan stop-list
                        $arrTerms[] = cleanStopLists($word);
                    }
                }
            }

            // Filter unique array
            $arrTerms = array_keys(array_flip($arrTerms));

            // Hitung TF-IDF langkah 1
            $tfIdf = $this->hitungTfIdf($arrTerms, $arrJudul, $query);

            // Hitung TF-IDF langkah ke 2
            $tfXidf = $this->hitungTFxIDF($tfIdf, $arrJudul, $query);

            // Hitung TF-IDF langkah ke 3 (Q x D)
            $tfIdfQxD = $this->hitungTfIdfQxD($tfXidf, $arrJudul, $query);

            // Hitung TF-IDF langkah ke 4 (Q ^ 2)
            $tfIdfPower = $this->hitungTfIdfPower($tfIdfQxD, $arrJudul, $query);

            $data['result_tfidf'] = $tfIdf;
            $data['result_tfXidf'] = $tfXidf;
            $data['result_tfidfQxD'] = $tfIdfQxD;
            $data['result_tfidfPower'] = $tfIdfPower;

//        } else {
//            $this->main_lib->getTemplateMahasiswa('cek-plagiarisme/pages/form', $data);
        }

        $this->main_lib->getTemplateMahasiswa('cek-plagiarisme/pages/form', $data);

    }

    /**
     * Hitung TF-IDF proses pertama
     *
     * @param array $terms => Kumpulan terms dalam array
     * @param array $judulSkripsi => Kumpulan Judul Skripsi
     * @param string $query => Judul skripsi yang akan dicek
     * @return array
     */
    private function hitungTfIdf(array $terms, array $judulSkripsi, string $query): array
    {
        $results = [];
        $termIndex = 0;

        foreach ($terms as $term) {
            if (! isStopWords(strtolower($term))) {
                $results[$termIndex]['term'] = strtolower($term);

                $tfIndex = 1;
                $df = 0;
                foreach ($judulSkripsi as $judul) {

                    if (strtolower($judul) === strtolower($query)) {
                        $key = "Q";
                    } else {
                        $key = "D" . $tfIndex;
                        $tfIndex++;
                    }

                    $cleanedJudul = cleanLetterFromStopList($judul);
                    $tf = substr_count($cleanedJudul, $term);
                    if ($tf > 0) {
                        $df++;
                    }

                    $results[$termIndex][$key] = $tf;
                }

                $idf = log(count($judulSkripsi) / $df, 10) + 1;

                $results[$termIndex]['df'] = $df;
                $results[$termIndex]['idf'] = $idf;
                $termIndex++;
            }
        }

        return $results;
    }

    /**
     * Hitung TF-IDF proses kedua (TF * IDF)
     * @param array $arrTfIdf
     * @param array $judulSkripsi => Kumpulan Judul Skripsi
     * @param string $query
     * @return array
     */
    private function hitungTFxIDF(array $arrTfIdf, array $judulSkripsi, string $query): array
    {
        $results = [];
        $indexTerm = 0;
        foreach ($arrTfIdf as $data) {
            $results[$indexTerm] = $data;

            $tfXidf = 0;
            $tfIndex = 1;
            $key = '';

            foreach ($judulSkripsi as $judul) {
                if (strtolower($judul) === strtolower($query)) {
                    $key = "Q";
                } else {
                    $key = "D" . $tfIndex;
                    $tfIndex++;
                }
                $newKey = $key . '_x_idf';

                $results[$indexTerm][$newKey] = $data[$key] * $data['idf'];
            }

            $indexTerm++;
        }

        return $results;
    }

    /**
     * Hitung TF-IDF Q x D
     * @param array $arrTfIdf
     * @param array $judulSkripsi
     * @param string $query
     * @return array
     */
    private function hitungTfIdfQxD(array $arrTfIdf, array $judulSkripsi, string $query): array
    {
        $results = [];
        $indexTerm = 0;
        foreach ($arrTfIdf as $data) {
            $results[$indexTerm] = $data;

            $tfIndex = 1;
            foreach ($judulSkripsi as $judul) {
                if (strtolower($judul) !== strtolower($query)) {
                    $key = "D" . $tfIndex;
                    $tfIndex++;

                    $Dkey = $key . '_x_idf';
                    $newKey = 'Q_x_' . $key;

                    $QxD = $data['Q_x_idf'] * $data[$Dkey];
                    $results[$indexTerm][$newKey] = $QxD;
                }
            }

            $indexTerm++;
        }

        return $results;
    }

    /**
     * Hitung TF-IDF Q^2 || D[i]^2
     * @param array $arrTfIdf
     * @param array $judulSkripsi
     * @param string $query
     * @return array
     */
    private function hitungTfIdfPower(array $arrTfIdf, array $judulSkripsi, string $query): array {
        $results = [];
        $indexTerm = 0;
        foreach ($arrTfIdf as $data) {
            $results[$indexTerm] = $data;

            $tfIndex = 1;
            foreach ($judulSkripsi as $judul) {
                if (strtolower($judul) === strtolower($query)) {
                    $key = "Q_x_idf";
                } else {
                    $key = "D" . $tfIndex . "_x_idf";
                    $tfIndex++;
                }

                $newKey = $key . '_pow';

                $results[$indexTerm][$newKey] = pow($data[$key], 2);
            }

            $indexTerm++;
        }

        return $results;
    }


    public function topik_skripsi()
    {
        $data = [
            'title' => 'Topik Skripsi',
            'topik_skripsi' => $this->Topik->all(),
            'no' => 1
        ];


        $this->main_lib->getTemplateMahasiswa('cek-plagiarisme/pages/topik', $data);
    }

    public function judul_skripsi()
    {
        $data = [
            'title' => 'Judul Skripsi',
            'judul_skripsi' => $this->Judul_skripsi->all(),
            'no' => 1
        ];

        $this->main_lib->getTemplateMahasiswa('cek-plagiarisme/pages/judul', $data);
    }

}

/* End of file Cek_plagiarisme.php */