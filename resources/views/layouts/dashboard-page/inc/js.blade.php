
<!-- jQuery -->
<script src="/../../dashboard-page/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="/../../dashboard-page/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="../../dashboard-page/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../dashboard-page/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../dashboard-page/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../dashboard-page/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../dashboard-page/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../dashboard-page/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../dashboard-page/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../dashboard-page/plugins/jszip/jszip.min.js"></script>
<script src="../../dashboard-page/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../dashboard-page/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../dashboard-page/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../dashboard-page/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../dashboard-page/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dashboard-page/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dashboard-page/dist/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="../../dashboard-page/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../dashboard-page/plugins/sparklines/sparkline.js"></script>

<script src="../../dashboard-page/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../dashboard-page/plugins/moment/moment.min.js"></script>
<script src="../../dashboard-page/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../dashboard-page/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../dashboard-page/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../dashboard-page/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE dashboard-page demo (This is only for demo purposes) -->
{{-- <script src="../../dashboard-page/dist/js/pages/dashboard-page.js"></script> --}}

