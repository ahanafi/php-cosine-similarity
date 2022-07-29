<style>
    .table thead tr th, tbody tr td {

    }
</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <h2 id="section-title" class="section-title">Halaman Cek Judul Skripsi</h2>
            <p id="section-lead" class="section-lead">
                Silahkan masukkan judul skripsi yang ingin Anda ajukan sebagai penelitian.
            </p>
            <!-- FORM -->
            <div class="card">
                <div class="card-header">
                    <h4 id="card-title">Form Cek Judul Skripsi</h4>
                </div>
                <div class="card-body pt-0">
                    <form action="<?php echo base_url('cek-plagiarisme') ?>" method="POST">
                        <div class="form-group">
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" class="form-control form-control-lg" required
                                       id="input-title"
                                       value="<?php echo (isset($judul) && $judul !== '') ? $judul : '' ?>"
                                       name="judul" autofocus autocomplete="off"
                                       placeholder="Ketik judul skripsi disini..." aria-label="Input title">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" name="check">
                                        <span class="mr-2">Cek Judul</span>
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END FORM -->

            <?php if (isset($judul) && $judul !== ''): ?>

                <?php if (!isset($similarity) || $similarity !== 100): ?>

                    <!-- Nilai Cosine Similarity -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-baseline">
                            <div>
                                <h4><u>Hasil Pengecekan</u></h4>
                                <a href="#" onclick="saveAsPDF()" class="btn btn-primary">
                                    <i class="fa fa-file-pdf"></i>
                                    <span>Save PDF</span>
                                </a>
                            </div>
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
                                        <th class="text-center">Judul Skripsi yang mirip</th>
                                        <th class="text-center">Nilai Similarity</th>
                                        <th class="text-center">Nilai Similarity (%)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nomor = 1;
                                    for ($i = 1; $i <= count($judul_existing); $i++):
                                        $nilaiCosinepersen = number_format(($nilai_cosine_similarity['cos_Q_D' . $i] * 100), 2);
                                        if ($nilaiCosinepersen > 0):
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $nomor ?></td>
                                                <td class="text-center"><?php echo 'D' . $i ?></td>
                                                <td><?php echo $nilai_cosine_similarity['judul_D' . $i] ?></td>
                                                <td class="text-center">
                                                    <?php echo number_format($nilai_cosine_similarity['cos_Q_D' . $i], 2) ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $nilaiCosinepersen; ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $nomor++;
                                        endif; ?>
                                    <?php endfor; ?>
                                    <td class="font-weight-bold" colspan="3">RATA-RATA KEMIRIPAN</td>
                                    <td class="font-weight-bold text-center"><?php echo number_format($rata_rata_similarity / 100, 2) ?></td>
                                    <td class="font-weight-bold text-center"><?php echo $rata_rata_similarity ?></td>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Level Kemiripan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Level 1</td>
                                        <td> >= 60 % : Judul Skripsi ditolak. Silahkan input judul skripsi kembali.</td>
                                    </tr>
                                    <tr>
                                        <td>Level 2</td>
                                        <td> 40,1 - 59,9% : Judul Skripsi dapat diterima dengan revisi.</td>
                                    </tr>
                                    <tr>
                                        <td>Level 3</td>
                                        <td> <= 60 % : Judul Skripsi diterima.</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END Nilai Cosine Similarity -->

                    <script type="text/javascript">
                        const saveAsPDF = () => {
                            const mainSidebar = document.querySelector('#main-sidebar');
                            const sectionTitle =  document.querySelector('#section-title');
                            const sectionLead =  document.querySelector('#section-lead');
                            const button = document.querySelector('button[name=check]');
                            const cardTitle = document.querySelector('#card-title');
                            window.onbeforeprint = (evt) => {
                                cardTitle.innerText = 'HASIL CEK JUDUL SKRIPSI';
                                mainSidebar.style.display = 'none';
                                mainSidebar.style.visibility = 'hidden';

                                sectionTitle.style.display = 'none';
                                sectionTitle.style.visibility = 'hidden';

                                sectionLead.style.display = 'none';
                                sectionLead.style.visibility = 'hidden';

                                button.style.display = 'none';
                                button.style.visibility = 'hidden';
                            }

                            window.onafterprint = (evt) => {
                                cardTitle.innerText = 'Form Cek Judul Skripsi';

                                mainSidebar.style.display = 'block';
                                mainSidebar.style.visibility = 'visible';

                                sectionTitle.style.display = 'block';
                                sectionTitle.style.visibility = 'visible';

                                sectionLead.style.display = 'block';
                                sectionLead.style.visibility = 'visible';

                                button.style.display = 'block';
                                button.style.visibility = 'visible';
                            }

                            window.print();
                        }
                    </script>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
</div>