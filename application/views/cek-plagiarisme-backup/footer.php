<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; <?php echo date('Y') ?>
        <div class="bullet"></div>
        Sistem Deteksi Kemiripan Judul Skripsi | 2022 <i>(Cosine Similarity)</i>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>
<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Responsive-2.2.1/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Responsive-2.2.1/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script>
    //Datatables
    $("#data-table").dataTable({responsive: true});

    $("#data-table").dataTable();
</script>
</body>
</html>