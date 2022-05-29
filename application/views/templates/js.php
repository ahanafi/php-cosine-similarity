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
	$("#data-table").dataTable({responsive:true});

    $("#data-table").dataTable();
    function loadSelect2() {
        $('.select2').select2({
            theme: 'bootstrap4',
        });
    }
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
