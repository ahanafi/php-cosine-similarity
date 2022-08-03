<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_plagiarisme extends CI_Controller
{
    public function hasil()
    {
        $data = [
            'title' => 'Data Hasil Cek Plagiarisme Judul skripsi',
            'hasil_uji' => $this->Uji_plagiarisme->all(),
            'no' => 1
        ];
        $uri1 = $this->uri->segment(1);

        if (!isset($_SESSION['user']) && $uri1 === 'hasil-cek-plagiarisme') {
            $this->main_lib->getTemplateMahasiswa('hasil/index', $data);
        } else {
            $this->main_lib->getTemplate('hasil/index', $data);
        }
    }

    public function detail($idUjiPlagiarisme)
    {

        $judul = $this->Uji_plagiarisme->getBy('id_uji_plagiarisme', $idUjiPlagiarisme);
        $terms = $this->TFIDF->getTermsByIdUjiPlagiarisme($idUjiPlagiarisme);

        $query = $judul->judul;

        $judulSkripsiDb = $this->Judul_skripsi->all();

        // array judul => Judul skripsi dari DB + judul yang diinput via form
        $arrJudul = [];
        $arrJudul[] = $judul->judul;

        foreach ($judulSkripsiDb as $jd) {
            $arrJudul[] = $jd->judul;
        }

        // array terms
        $arrTerms = [];

        foreach ($arrJudul as $jd) {
            $tokenize = tokenize($jd);
            foreach ($tokenize as $word) {
                $word = cleanStopLists($word);
                if (trim($word) !== '') {

                    // Memasukkan `term` ke variable array dengan stop-list
                    $arrTerms[] = $word;
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

        // Hitung SUM hasil Q x D
        $sumQxD = $this->hitungSumQxD($tfIdfQxD, $arrJudul, $query);

        // Hitung SUM hasil Q x D operasi power dan sqrt
        $sumQxDpower = $this->hitungSumQxDpower($tfIdfPower, $arrJudul, $query);

        // Hitung nilai cosine similarity
        $hitungCosineSimilarity = $this->hitungNilaiCosineSimilarity(
            $sumQxD,
            $sumQxDpower,
            $arrJudul,
            $query
        );

        // Hitung rata-rata di atas 0 persen
        $rataRataSimilarity = $this->hitungRataRataSimilarityAboveZeroPersen(
            $hitungCosineSimilarity,
            $arrJudul,
            $query
        );

        $data = [
            'title' => 'Data Hasil Cek Plagiarisme Judul skripsi',
            'judul' => $judul,
            'judul_existing' => $judulSkripsiDb,
            'terms' => $terms,
            'no' => 1,

            // Hasil
            'result_tfidf' => $tfIdf,
            'result_tfXidf' => $tfXidf,
            'result_tfidfQxD' => $tfIdfQxD,
            'result_tfidfPower' => $tfIdfPower,
            'nilai_cosine_similarity' => $hitungCosineSimilarity,
            'rata_rata_similarity' => $rataRataSimilarity,
        ];

        $uri1 = $this->uri->segment(1);

        if (!isset($_SESSION['user']) && $uri1 === 'detail-cek-plagiarisme') {
            $this->main_lib->getTemplateMahasiswa('hasil/detail', $data);
        } else {
            $this->main_lib->getTemplate('hasil/detail', $data);
        }
    }

    /**
     * HALAMAN MAHASISWA
    */

    public function index()
    {
        $data = [
            'title' => 'SDKJ PRODI SI'
        ];

        if (isset($_POST['check'])) {
            // Data judul yang diinput oleh mahasiswa
            $judul = $this->main_lib->getPost('judul');
            $query = $judul;
            $data['judul'] = $judul;

            $judulSkripsiDb = $this->Judul_skripsi->all();

            // Validasi judul skripsi yang sama persis (mirip 100%)
            $cekJudul = $this->Judul_skripsi->cekJudulSkripsi($judul);

            // Jika judul ada di database
            if ($cekJudul > 0 ) {
                $data['similarity'] = 100;
                $data['judul_db'] = $this->Judul_skripsi->getDataByJudul($judul);

                $this->main_lib->getTemplateMahasiswa('cek-plagiarisme/pages/form', $data);
                 // stop proses (lewati proses perhitungan selanjutnya)
            } else {

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
                        $word = cleanStopLists($word);
                        if (trim($word) !== '') {

                            // Memasukkan `term` ke variable array dengan stop-list
                            $arrTerms[] = $word;
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

                // Hitung SUM hasil Q x D
                $sumQxD = $this->hitungSumQxD($tfIdfQxD, $arrJudul, $query);

                // Hitung SUM hasil Q x D operasi power dan sqrt
                $sumQxDpower = $this->hitungSumQxDpower($tfIdfPower, $arrJudul, $query);

                // Hitung nilai cosine similarity
                $hitungCosineSimilarity = $this->hitungNilaiCosineSimilarity(
                    $sumQxD,
                    $sumQxDpower,
                    $arrJudul,
                    $query
                );

                // Hitung Rata-rata nilai similarity (Semua dihitung)
                // $rataRataSimilarity = $this->hitungRataRataSimilarity(
                //     $hitungCosineSimilarity,
                //     $arrJudul,
                //     $query
                // );
                // 
                
                // Hitung rata-rata di atas 0 persen
                $rataRataSimilarity = $this->hitungRataRataSimilarityAboveZeroPersen(
                    $hitungCosineSimilarity,
                    $arrJudul,
                    $query
                );

                // Update nilai kemiripan
                $this->Uji_plagiarisme->updateSimilarity($rataRataSimilarity, trim($judul));

                $data['result_tfidf'] = $tfIdf;
                $data['result_tfXidf'] = $tfXidf;
                $data['result_tfidfQxD'] = $tfIdfQxD;
                $data['result_tfidfPower'] = $tfIdfPower;
                $data['nilai_cosine_similarity'] = $hitungCosineSimilarity;
                $data['rata_rata_similarity'] = $rataRataSimilarity;

                $this->main_lib->getTemplateMahasiswa('cek-plagiarisme/pages/form', $data);
            }

        } else {
            $this->main_lib->getTemplateMahasiswa('cek-plagiarisme/pages/form', $data);
        }


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

        $arrDataTfIdf = [];

        // Insert judul yang diajukan ke database
        $idUjiPlagiarisme = $this->Uji_plagiarisme->insertIfNotExist($query);

        foreach ($terms as $term) {
            if (!isStopWords(strtolower($term))) {
                $results[$termIndex]['term'] = strtolower($term);

                $tfIndex = 1;
                $df = 0;
                foreach ($judulSkripsi as $judul) {

                    if (strtolower($judul) === strtolower($query) && $tfIndex === 1) {
                        $key = "Q";
                    } else {
                        $key = "D" . $tfIndex;
                        $tfIndex++;
                    }

                    if ($term !== '') {
                        $cleanedJudul = cleanLetterFromStopList($judul);
                        $tf = substr_count($cleanedJudul, $term); // SDADLSKL  
                        if ($tf > 0) {
                            $df++;
                        }

                        $results[$termIndex][$key] = $tf;
                    }

                }

                $idf = log(count($judulSkripsi) / $df, 10) + 1;

                $results[$termIndex]['df'] = $df;
                $results[$termIndex]['idf'] = $idf;

                // Validasi term ga kosong
                // if ($term !== '') {
                    // Validasi term di table TF-IDF
                    $checkTerm = $this->TFIDF->checkTerm($term, $idUjiPlagiarisme);
                    if ($checkTerm <= 0) {
                        $arrDataTfIdf[] = [
                            'id_uji_plagiarisme' => $idUjiPlagiarisme,
                            'term' => strtolower($term),
                            'df' => $df,
                            'idf' => $idf
                        ];
                    }

                //}


                $termIndex++;
            }
        }

        if (count($arrDataTfIdf) > 0) {
            // Insert ke table tf idf
            $this->TFIDF->insert($arrDataTfIdf, true);
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
                if (strtolower($judul) === strtolower($query) && $tfIndex === 1) {
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
    private function hitungTfIdfPower(array $arrTfIdf, array $judulSkripsi, string $query): array
    {
        $results = [];
        $indexTerm = 0;
        foreach ($arrTfIdf as $data) {
            $results[$indexTerm] = $data;

            $tfIndex = 1;
            foreach ($judulSkripsi as $judul) {
                if (strtolower($judul) === strtolower($query) && $tfIndex === 1) {
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

    /**
     * @param array $arrTfIdfQxD
     * @param array $judulSkripsi
     * @param string $query
     * @return array
     */
    private function hitungSumQxD(array $arrTfIdfQxD, array $judulSkripsi, string $query): array
    {
        $results = [];

        for ($i = 1; $i < count($judulSkripsi); $i++) {
            if (strtolower($judulSkripsi[$i]) !== strtolower($query)) {
                $key = 'Q_x_D' . $i;
                $newKey = 'Q_x_D' . $i . '_sum';
                $results[$newKey] = array_sum(array_column($arrTfIdfQxD, $key));
            }
        }
        return $results;
    }

    /**
     * @param array $arrTfIdfPower
     * @param array $judulSkripsi
     * @param string $query
     * @return array
     */
    private function hitungSumQxDpower(array $arrTfIdfPower, array $judulSkripsi, string $query): array
    {
        $results = [];

        $qSum = array_sum(array_column($arrTfIdfPower, 'Q_x_idf_pow'));

        $results['Q_sum'] = $qSum;
        $results['Q_sqrt'] = sqrt($qSum);

        for ($i = 1; $i < count($judulSkripsi); $i++) {
            if (strtolower($judulSkripsi[$i]) !== strtolower($query)) {
                $key = 'D' . $i . '_sum';
                $keySqrt = 'D' . $i . '_sqrt';
                $dSum = array_sum(array_column($arrTfIdfPower, 'D' . $i . '_x_idf_pow'));
                $results[$key] = $dSum;
                $results[$keySqrt] = sqrt($dSum);
            }
        }

        return $results;
    }

    /**
     * @param array $arrSumQxD
     * @param array $arrSumQxDpower
     * @param array $judulSkripsi
     * @param string $query
     * @return array
     */
    private function hitungNilaiCosineSimilarity(array $arrSumQxD, array $arrSumQxDpower, array $judulSkripsi, string $query): array
    {
        $results = [];

        for ($i = 1; $i < count($judulSkripsi); $i++) {
            if (strtolower($judulSkripsi[$i]) !== strtolower($query)) {
                $keyQxDsum = 'Q_x_D' . $i .'_sum';
                $keyDsqrt = 'D' . $i . '_sqrt';

                $qSqrt = $arrSumQxDpower['Q_sqrt'];
                $dSqrt = $arrSumQxDpower[$keyDsqrt];

                $newKeyJudul = 'judul_D'. $i;
                $newKey = 'cos_Q_D' . $i;
                $results[$newKeyJudul] = $judulSkripsi[$i];
                $results[$newKey] = $arrSumQxD[$keyQxDsum] / ( $qSqrt * $dSqrt);
            }
        }

        return $results;
    }

    /**
     * @param array $nilaiCosineSimilarity
     * @param array $judulSkripsi
     * @param string $query
     * @return float|int
     */
    private function hitungRataRataSimilarity(array $nilaiCosineSimilarity, array $judulSkripsi, string $query)
    {
        $totalNilai = 0;
        $banyakData = 0;
        for ($i = 1; $i < count($judulSkripsi); $i++) {
            if (strtolower($judulSkripsi[$i]) !== strtolower($query)) {
                $key = 'cos_Q_D' . $i;
                $totalNilai += $nilaiCosineSimilarity[$key];
                $banyakData++;
            }
        }

        return $totalNilai / $banyakData;
    }


    /**
     * [hitungRataRataSimilarityAboveZeroPersen description]
     * @param array $nilaiCosineSimilarity [description]
     * @param array $judulSkripsi [description]
     * @param string $query [description]
     * @return int [type]                        [description]
     */
    private function hitungRataRataSimilarityAboveZeroPersen(array $nilaiCosineSimilarity, array $judulSkripsi, string $query) : int
    {
        $totalNilai = 0;
        $banyakData = 0;
        for ($i = 1; $i < count($judulSkripsi); $i++) {
            if (strtolower($judulSkripsi[$i]) !== strtolower($query)) {
                $key = 'cos_Q_D' . $i;

                $nilaiCosine = $nilaiCosineSimilarity[$key];
                $nilaiCosineSimilarityPersen = number_format($nilaiCosine * 100, 2);

                if ($nilaiCosineSimilarityPersen > 0) {
                    $totalNilai += $nilaiCosineSimilarity[$key];
                    $banyakData++;
                }
            }
        }

        $totalNilai = number_format($totalNilai * 100, 0);
        return ($banyakData > 0) ? $totalNilai / $banyakData : $banyakData;
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