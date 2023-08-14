<footer class="main-footer" style="font-style: none;">
    Arta System &copy; 2022
    <div class="float-right d-none d-sm-inline-block">
        <b>v</b>1.0.0
    </div>
</footer>

<!-- Image loader -->
<div class="overlay"></div>
<!-- Image loader -->

<script>
    var app = {
        base_url: "<?php echo base_url(); ?>"
    }
    console.log(app);
</script>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/accounting/accounting.min.js"></script>
<script src="<?php echo base_url() ?>assets/systemfile/js/function.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    let role = $("#inp-role").val();
    if(role == 2){
        $("#nav-home").prop("hidden",false);
        $("#nav-transaksi").prop("hidden",false);
        $("#nav-user").prop("hidden",true);
        $("#nav-warna").prop("hidden",false);
        $("#nav-produk").prop("hidden",false);
        $("#nav-laporan-keuangan").prop("hidden",true);
    }else if(role == 3){
        $("#nav-home").prop("hidden",false);
        $("#nav-transaksi").prop("hidden",true);
        $("#nav-user").prop("hidden",true);
        $("#nav-warna").prop("hidden",false);
        $("#nav-produk").prop("hidden",false);
        $("#nav-laporan-keuangan").prop("hidden",false);
    }else if(role == 1){
        $("#nav-home").prop("hidden",false);
        $("#nav-transaksi").prop("hidden",false);
        $("#nav-user").prop("hidden",false);
        $("#nav-warna").prop("hidden",false);
        $("#nav-produk").prop("hidden",false);
    }
})
</script>
<?php foreach ($js as $value) { ?>
    <script src="<?php echo base_url() ?>assets/systemfile/js/<?php echo $value ?>.js"></script>
<?php } ?>

</body>

</html>