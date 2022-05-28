<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
?>
<!-- General JS Scripts -->
<script type="text/javascript">const BASE_URL = "<?php echo base_url();?>";</script>
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

<!-- JS Libraies -->
<?php
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?>
	<script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
	<!-- <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <?php
} ?>

<!-- Page Specific JS File -->
<?php
if ($this->uri->segment(1) == "daftar-bayar") { ?>
	<script type='text/javascript'>
        $('table tbody tr  td').on('click', function () {
            $("#modal-show-part").modal("show");
            $("#id_bayar").val($(this).closest('tr').children()[0].textContent);
            $("#tanggal").val($(this).closest('tr').children()[1].textContent);
            $("#nama_pelanggan").val($(this).closest('tr').children()[2].textContent);
            $("#bank").val($(this).closest('tr').children()[3].textContent);
            $("#jenis_bayar").val($(this).closest('tr').children()[4].textContent);
            $("#jumlah").val($(this).closest('tr').children()[5].textContent);
        });
	</script>
    <?php
}elseif($this->uri->segment(1) == "nota-supplier" && $this->uri->segment(2) == "status"){ ?>
	<script type='text/javascript'>
	function updateToYes(id, link){
		$.ajax(
			{
				type:'post',
				url:link,
				data: {id:id},
				success: function(){
					window.location.href = '<?=site_url("nota-supplier/status")?>'
				}
			}
		)
	}
	</script>
<?php } ?>
<script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page/modules-sweetalert.js"></script>
<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/axios.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Responsive-2.2.1/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Responsive-2.2.1/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
<script>
    const showConfirmDelete = (dataType, dataId) => {
        if (dataType !== '' && dataId !== '') {
            swal({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin akan menghapus data ini?',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Batalkan",
                        value: null,
                        visible: true,
                        className: "btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Ya, Hapus!",
                        value: true,
                        visible: true,
                        className: "btn-danger",
                        closeModal: true
                    }
                }
            }).then((value) => {
                if (value) {
                    const form = document.getElementById("delete");
                    const actionURL = `<?= base_url(); ?>${dataType}/delete/${dataId}`;

                    const type = document.querySelector("input[name=data_type]");
                    const id = document.querySelector("input[name=data_id]");

                    type.value = dataType;
                    id.value = dataId;
                    form.setAttribute('action', actionURL);
                    form.submit();
                }
            });

        }
    }
    const showConfirmLogout = () => {

        swal({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin akan keluar dari aplikasi ini?',
            icon: 'warning',
            buttons: {
                cancel: {
                    text: "Batalkan",
                    value: null,
                    visible: true,
                    className: "btn-secondary",
                    closeModal: true,
                },
                confirm: {
                    text: "Ya, Keluar Sekarang!",
                    value: true,
                    visible: true,
                    className: "btn-danger",
                    closeModal: true
                }
            }
        }).then((value) => {
            if (value) {
                document.getElementById("form-logout").submit();
            }
        });
    }

    //Datatables
<<<<<<< HEAD
	$("#data-table").dataTable({responsive:true});

=======
    $("#data-table").dataTable();
>>>>>>> 5d6068556a93d32225eb1292eac65bea59bf735f
    <?php if($uri1 == "pembayaran-piutang" && $uri2 == "create"): ?>
		function loadSelect2() {
			$('.select2').select2({
				theme: 'bootstrap4',
			});
		}

    loadSelect2();

    const listItem = document.getElementById("list-item");
    let btnRemoveItemShow = false;
    let dataIndex = 2;
    const addRow = () => {
        let selectNotaPenjualan = `<select class="form-control list-nota select2" name="no_nota[]" onchange="getTotal(this, 'nota', ${dataIndex})">
									<option disabled selected>-- Pilih Nota --</option>`;
        <?php foreach (getData('nota_penjualan') as $nota) : ?>
        selectNotaPenjualan += `<option value="<?php echo $nota->no_nota; ?>"><?php echo $nota->no_nota; ?></option>`;
        <?php endforeach; ?>
        selectNotaPenjualan += `</select>`;
        let selectReturPenjualan = `<select class="form-control select2" name="no_retur[]"  onchange="getTotal(this, 'retur', ${dataIndex})">
									<option disabled selected>-- Pilih Nota --</option>`;
        <?php foreach (getData('retur_penjualan') as $retur) : ?>
        selectReturPenjualan += `<option value="<?php echo $retur->no_retur; ?>"><?php echo $retur->no_retur; ?></option>`;
        <?php endforeach; ?>
        selectReturPenjualan += `</select>`;
        let inputTanggal = `<input type="date" name="tanggal_nota[]" class="form-control tanggal_nota_${dataIndex}" autocomplete="off"/>`;
        let inputBayarNota = `<input type="text" onkeyup="hitungTotalBayar()" name="bayar[]" class="form-control nominal-bayar bayar_${dataIndex}" autocomplete="off"/>`;
        let inputTotalNota = `<input type="text" name="total_nota[]" class="form-control total-per-nota total_nota_${dataIndex}" readonly  autocomplete="off"/>`;
        let inputPotongRetur = `<input type="text" onkeyup="hitungTotalPotongRetur()" name="potong_retur[]" class="form-control nominal-potong-retur potong_retur_${dataIndex}"  autocomplete="off"/>`;
        let inputTotalRetur = `<input type="text" name="total_retur[]" class="form-control total-per-retur total_retur_${dataIndex}" readonly  autocomplete="off"/>`;
        const rowItem = document.createElement(`tr`);
        rowItem.setAttribute(`data-index`, dataIndex);
        const dataItem = `
				<td>${selectNotaPenjualan}</td>
				<td>${inputTanggal}</td>
				<td>${inputBayarNota}</td>
				<td>${inputTotalNota}</td>
				<td>${selectReturPenjualan}</td>
				<td>${inputPotongRetur}</td>
				<td>${inputTotalRetur}</td>`;
        rowItem.innerHTML += dataItem;

        listItem.appendChild(rowItem);

        if (listItem.children.length > 1 && btnRemoveItemShow === false) {
            btnRemoveItemShow = true;
            const actionButton = document.getElementById("action-button");
            actionButton.innerHTML += `<button onclick="removeLastItem()" id="btn-remove-item" class="btn btn-danger btn-sm" type="button">Hapus 1 baris terakhir</button>`;
        }
        dataIndex++;
        loadSelect2();
    }

    const removeLastItem = () => {
        const listItemChildren = listItem.children.length;
        if (listItemChildren > 1) {
            listItem.removeChild(listItem.lastElementChild);
        }

        if (listItemChildren <= 2) {
            btnRemoveItemShow = false;
            document.getElementById("btn-remove-item").remove();
        }
        dataIndex--;
        hitungTotal();
    }

    function hitungTotal() {
        hitungTotalBayar();
        hitungTotalNota();
        hitungTotalPotongRetur();
        hitungTotalRetur();
    };

    const getTotal = (element, dataType, index) => {
        const dataNumber = element.value;
        const actionURL = `${BASE_URL}/${dataType}-penjualan/get-total/${dataNumber}`;
        $.get(actionURL, function (response) {
            const jsonResponse = JSON.parse(response);
            if (jsonResponse.status === 'success') {
                const inputSisaNota = document.querySelector(`.total_${dataType}_${index}`);
                inputSisaNota.value = toRupiah(jsonResponse.data.total);
                hitungTotal();
            } else {
                swal({
                    title: 'Warning',
                    text: 'Data tidak ditemukan.',
                    icon: 'warning',
                    timer: 2000
                });
            }
        });
    };

    //Menghitung total nominal pembayaran
    const hitungTotalBayar = () => {
        let totalBayar = 0;
        const inputNominalBayar = document.querySelectorAll(".nominal-bayar");
        inputNominalBayar.forEach(item => {
            const nominal = parseFloat(item.value);
            totalBayar += nominal;
        });

        document.getElementById("total-bayar").innerText = toRupiah(totalBayar.toString());
    };

    //Menghitung total Nota yang dipilih
    const hitungTotalNota = () => {
        let totalNota = 0;
        console.log("Hitung total Nota!");
        const totalPerNota = document.querySelectorAll(".total-per-nota");
        totalPerNota.forEach(item => {
            const itemTotalNota = item.value.split(".").join("");
            const nominal = parseFloat(parseFloat(itemTotalNota));
            totalNota += nominal;
        });
        document.getElementById("total-nota").innerText = toRupiah(totalNota.toString());
    };

    //Menghitung total nominal retur
    const hitungTotalPotongRetur = () => {
        let totalPotongRetur = 0;
        const inputNominalPotongRetur = document.querySelectorAll(".nominal-potong-retur");
        inputNominalPotongRetur.forEach(item => {
            const nominal = parseFloat(item.value);
            totalPotongRetur += nominal;
        });

        document.getElementById("total-potong-retur").innerText = toRupiah(totalPotongRetur.toString());
    };

    //Menghitung total retur yang dipilih
    const hitungTotalRetur = () => {
        let totalRetur = 0;
        console.log("Hitung total RETUR");
        const totalPerRetur = document.querySelectorAll(".total-per-retur");
        totalPerRetur.forEach(item => {
            const itemTotalRetur = item.value.split(".").join("");
            const nominal = parseFloat(parseFloat(itemTotalRetur));
            totalRetur += nominal;
        });
        document.getElementById("total-retur").innerText = toRupiah(totalRetur.toString());
    }

    // const hitungSisaNota = (element, index) => {
    //     let nominalBayar = element.value.split(".").join("");
    //     nominalBayar = parseInt(nominalBayar);
    //     if (!isNaN(nominalBayar) && nominalBayar > 0) {
    //         let inputTotalNota = document.querySelector(`.total_nota_${index}`);
    //         let totalNota = inputTotalNota.getAttribute(`data-total-nota`);
    //         //console.log(totalNota)
    //         let sisaNota = parseInt(totalNota) - parseInt(nominalBayar);
    //         sisaNota = toRupiah(sisaNota.toString());
    //         inputTotalNota.value = sisaNota;
    //         element.value = toRupiah(nominalBayar.toString());
    //     }
    // }
    <?php elseif($uri1 == "pelanggan" && $uri2 == "piutang"): ?>
    const showDetails = (dataType, idPelanggan) => {
        const titleElement = document.querySelector(".modal-title");
        titleElement.textContent = `Detail ${dataType.toString()} Pelanggan`;
        const actionURL = `${BASE_URL}/pelanggan/get-detail/${dataType}/${idPelanggan}`;
        $.get(actionURL, function (response) {
            const jsonReponse = JSON.parse(response);
            if (jsonReponse.status === 'success') {
                const tableHeader = document.getElementById("table-header");
                const tableBody = document.getElementById("table-body");

                let rowHeader = ``;
                let rowBody = ``;

                if (dataType === 'piutang') {
                    rowHeader = `<tr>
										<th>No.</th>
										<th>No. Nota</th>
										<th>Tanggal</th>
										<th>Pelanggan</th>
										<th>Total</th>
										<th>Bayar</th>
										<th>Lunas</th>
									</tr>`;
                    jsonReponse.data.forEach((val, index) => {
                        rowBody += `<tr>
									   	  <td>${index + 1}</td>
									   	  <td>${val.no_nota}</td>
									   	  <td>${val.tanggal}</td>
									   	  <td>${val.id_pelanggan}</td>
									   	  <td>${val.total}</td>
									   	  <td>${val.bayar}</td>
									   	  <td>${val.is_lunas}</td>
									   <tr>`;
                    });
                } else if (dataType === 'bayar') {
                    rowHeader = `<tr>
										<th>No.</th>
										<th>ID Pembayaran</th>
										<th>Tanggal</th>
										<th>Pelanggan</th>
										<th>Bank</th>
										<th>Jenis Bayar</th>
										<th>Keterangan</th>
										<th>Jumlah</th>
									</tr>`;
                    jsonReponse.data.forEach((val, index) => {
                        rowBody += `<tr>
									   	  <td>${index + 1}</td>
									   	  <td>${val.kode_pembayaran}</td>
									   	  <td>${val.tanggal}</td>
									   	  <td>${val.nama_pelanggan}</td>
									   	  <td>${val.nama_bank}</td>
									   	  <td>${val.nama_jenis_bayar}</td>
									   	  <td>${val.nama_keterangan}</td>
										  <td>${val.jumlah}</td>
									   <tr>`;
                    });
                } else if (dataType === 'retur') {
                    rowHeader = `<tr>
										<th>No.</th>
										<th>No. Retur</th>
										<th>Tanggal</th>
										<th>Pelanggan</th>
										<th>Total</th>
										<th>Potong</th>
										<th>Sudah Potong</th>
									</tr>`;
                    jsonReponse.data.forEach((val, index) => {
                        rowBody += `<tr>
									   	  <td>${index + 1}</td>
									   	  <td>${val.no_retur}</td>
									   	  <td>${val.tanggal}</td>
									   	  <td>${val.nama_pelanggan}</td>
									   	  <td>${val.total}</td>
									   	  <td>0</td>
									   	  <td>0</td>
									   <tr>`;
                    });
                }

                tableHeader.innerHTML = rowHeader;
                tableBody.innerHTML = rowBody;
            } else {
                swal({
                    title: 'Warning',
                    text: `${jsonReponse.message}`,
                    icon: 'warning',
                    timer: 2000
                });
            }
        });
        $("#detail-modal").modal('show');
    };
    <?php endif; ?>
</script>
<?php if (isset($_SESSION['message']) && $_SESSION['message'] != ''): ?>
	<script>
        swal({
            title: '<?php echo ucfirst($_SESSION['message']['type']); ?>',
            text: '<?php echo $_SESSION['message']['text']; ?>',
            icon: '<?php echo $_SESSION['message']['type']; ?>',
            timer: 2000
        });
	</script>
<?php endif;
$_SESSION['message'] = ''; ?>
</body>
</html>
