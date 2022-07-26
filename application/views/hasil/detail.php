<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Hasil Cek Plagiarisme</h1>
            <?php echo showBreadCrumb(); ?>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                Daftar Hasil Cek Plagiarisme Judul Skripsi
            </h2>
            <p class="section-lead">Daftar data Judul Skripsi</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <!-- DETAIL DATA UJI PLAGIARISME -->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md table-bordered" id="data-table">
                                    <tbody>
                                    <tr>
                                        <td width="200pxpx">ID Uji Plagiarisme</td>
                                        <td>:</td>
                                        <td><?php echo $judul->id_uji_plagiarisme; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Judul Skripsi</td>
                                        <td>:</td>
                                        <td><?php echo $judul->judul; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200pxpx">Tingkat Kemiripan (%)</td>
                                        <td>:</td>
                                        <td><?php echo $judul->kemiripan; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px0px">Status</td>
                                        <td>:</td>
                                        <td><?php echo $judul->status; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200px">Tanggal Pengecekan</td>
                                        <td>:</td>
                                        <td><?php echo $judul->tanggal; ?></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END DETAIL -->

                    <!-- SAMPLE QUERY -->
                    <div class="card">
                        <div class="card-header">
                            <h4><u>A. Tabel Sample Query</u></h4>
                            <div class="card-header-action">
                                <a data-collapse="#sample-query" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>
                        </div>
                        <div id="sample-query" class="collapse show">
                            <div class="card-body">
                                <table class="table table-bordered w-100">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%">Dokumen</th>
                                        <th>Term Yang Mewakili Dokumen</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center font-weight-bold">Q</td>
                                        <td>
                                            <?php echo $judul->judul; ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $index = 1;
                                    if (isset($judul_existing) && count((array)$judul_existing) > 0): ?>
                                        <?php foreach ($judul_existing as $jd): ?>
                                            <tr>
                                                <td class="text-center font-weight-bold">
                                                    <?php echo "D" . $index ?>
                                                </td>
                                                <td>
                                                    <?php echo $jd->judul ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $index++;
                                        endforeach ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE QUERY -->

                    <!-- TF - IDF -->
                    <div class="card">
                        <div class="card-header">
                            <h4><u>B. Tabel Perhitungan TF &amp; IDF</u></h4>
                            <div class="card-header-action">
                                <a data-collapse="#basic-tfidf-result" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>
                        </div>
                        <div id="basic-tfidf-result" class="collapse show">
                            <div class="card-body">
                                <table class="table table-sm table-bordered w-100">
                                    <thead>
                                    <tr>
                                        <th class="text-center" rowspan="2">No.</th>
                                        <th class="text-center" rowspan="2">Term</th>
                                        <th class="text-center" colspan="<?php echo count($judul_existing) + 1 ?>">TF</th>
                                        <th class="text-center" rowspan="2">DF</th>
                                        <th class="text-center">IDF</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Q</th>
                                        <?php for($i = 1; $i <= count($judul_existing); $i++): ?>
                                            <th class="text-center">D<?php echo $i ?></th>
                                        <?php endfor; ?>
                                        <th class="text-center">Log(n/df) + 1</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $index = 1;
                                    foreach ($result_tfidf as $result): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $index ?></td>
                                            <td><?php echo $result['term'] ?></td>
                                            <td class="text-center"><?php echo $result['Q'] ?></td>
                                            <?php for($i = 1; $i <= count($judul_existing); $i++): ?>
                                                <td class="text-center"><?php echo $result['D'.$i]?></td>
                                            <?php endfor; ?>
                                            <td class="text-center"><?php echo $result['df'] ?></td>
                                            <td class="text-center"><?php echo number_format($result['idf'], 8) ?></td>
                                        </tr>
                                        <?php
                                        $index++;
                                    endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END TF - IDF -->

                    <!-- TF x IDF -->
                    <div class="card">
                        <div class="card-header">
                            <h4><u>C. Tabel Perhitungan TF x IDF</u></h4>
                            <div class="card-header-action">
                                <a data-collapse="#basic-tfxidf" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>
                        </div>
                        <div id="basic-tfxidf" class="collapse show">
                            <div class="card-body">
                                <table class="table table-sm table-bordered w-100">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Term</th>
                                        <th class="text-center">Q</th>
                                        <?php for($i = 1; $i <= count($judul_existing); $i++): ?>
                                            <th class="text-center">D<?php echo $i ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $index = 1;
                                    foreach ($result_tfXidf as $result): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $index ?></td>
                                            <td><?php echo $result['term'] ?></td>
                                            <td class="text-center"><?php echo $result['Q_x_idf'] ?></td>
                                            <?php for($i = 1; $i <= count($judul_existing); $i++): ?>
                                                <td class="text-center"><?php echo $result['D'.$i.'_x_idf']?></td>
                                            <?php endfor; ?>
                                        </tr>
                                        <?php
                                        $index++;
                                    endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END TF x IDF -->

                    <!-- TF-IDF QxD -->
                    <div class="card">
                        <div class="card-header">
                            <h4><u>D. Tabel Perhitungan TF-IDF QxD</u></h4>
                            <div class="card-header-action">
                                <a data-collapse="#basic-tfidf-qxd" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>
                        </div>
                        <div id="basic-tfidf-qxd" class="collapse show">
                            <div class="card-body">
                                <table class="table table-sm table-bordered w-100">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Term</th>
                                        <?php for($i = 1; $i <= count($judul_existing); $i++): ?>
                                            <th class="text-center">D<?php echo $i ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $index = 1;
                                    foreach ($result_tfidfQxD as $result): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $index ?></td>
                                            <td><?php echo $result['term'] ?></td>
                                            <?php for($i = 1; $i <= count($judul_existing); $i++): ?>
                                                <td class="text-center"><?php echo $result['Q_x_D'.$i]?></td>
                                            <?php endfor; ?>
                                        </tr>
                                        <?php
                                        $index++;
                                    endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END TF-IDF QxD -->

                    <!-- TF-IDF Power -->
                    <div class="card">
                        <div class="card-header">
                            <h4><u>E. Tabel Perhitungan TF-IDF (TF/IDF(Q,D))^2</u></h4>
                            <div class="card-header-action">
                                <a data-collapse="#basic-tfidf-qxd-power" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>
                        </div>
                        <div id="basic-tfidf-qxd-power" class="collapse show">
                            <div class="card-body">
                                <table class="table table-sm table-bordered w-100">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Term</th>
                                        <th class="text-center">Q</th>
                                        <?php for($i = 1; $i <= count($judul_existing); $i++): ?>
                                            <th class="text-center">D<?php echo $i ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $index = 1;
                                    $jumlahQ = 0;
                                    $jumlahD = [];
                                    foreach ($result_tfidfPower as $result):
                                        $jumlahQ += $result['Q_x_idf_pow'];
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $index ?></td>
                                            <td><?php echo $result['term'] ?></td>
                                            <td class="text-center"><?php echo $result['Q_x_idf_pow'] ?></td>
                                            <?php for($i = 1; $i <= count($judul_existing); $i++): ?>
                                                <td class="text-center"><?php echo $result['D'.$i.'_x_idf_pow']?></td>
                                            <?php endfor; ?>
                                        </tr>
                                        <?php
                                        $index++;
                                    endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="2">JUMLAH</th>
                                        <th><?php echo $jumlahQ ?></th>
                                        <?php for($i = 1; $i <= count($judul_existing); $i++): ?>
                                            <th class="text-center">
                                                <?php echo array_sum(array_column($result_tfidfPower, 'D' . $i . '_x_idf_pow')) ?>
                                            </th>
                                        <?php endfor; ?>
                                    </tr>
                                    <tr>
                                        <th colspan="2">SQRT(SUM(TF/IDF(Q,D))2</th>
                                        <th><?php echo number_format(sqrt($jumlahQ), 3) ?></th>
                                        <?php for($i = 1; $i <= count($judul_existing); $i++): ?>
                                            <th class="text-center">
                                                <?php echo number_format(sqrt(array_sum(array_column($result_tfidfPower, 'D' . $i . '_x_idf_pow'))), 3) ?>
                                            </th>
                                        <?php endfor; ?>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END TF-IDF Power -->

                    <!-- Nilai Cosine Similarity -->
                    <div class="card">
                        <div class="card-header">
                            <h4><u>F. Tabel Hasil Nilai Akhir</u></h4>
                            <div class="card-header-action">
                                <a data-collapse="#cosine-result" class="btn btn-icon btn-info" href="#">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>
                        </div>
                        <div id="cosine-result" class="collapse show">
                            <div class="card-body">
                                <table class="table table-sm table-bordered w-100">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Notasi</th>
                                        <th class="text-center">Judul Skripsi</th>
                                        <th class="text-center">Nilai Similarity</th>
                                        <th class="text-center">Nilai Similarity (%)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for($i = 1; $i <= count($judul_existing); $i++):
                                        $nilaiCosinepersen = number_format(($nilai_cosine_similarity['cos_Q_D' . $i] * 100), 0);
                                        if ($nilaiCosinepersen > 60):
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i ?></td>
                                                <td class="text-center"><?php echo 'D' . $i ?></td>
                                                <td><?php echo $nilai_cosine_similarity['judul_D' . $i] ?></td>
                                                <td class="text-center">
                                                    <?php echo number_format($nilai_cosine_similarity['cos_Q_D' . $i], 2) ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $nilaiCosinepersen; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="3">RATA-RATA NILAI SIMILARITY Q</th>
                                        <th class="text-center"><?php echo number_format($rata_rata_similarity / 100, 2) ?></th>
                                        <th class="text-center"><?php echo $rata_rata_similarity ?></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END Nilai Cosine Similarity -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->