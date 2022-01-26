  <footer class="main-footer">
    <strong>Copyright &copy; 2012-<?php echo date('Y');?> <a href="#">Agile Solutions</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/codemirror/codemirror.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/codemirror/mode/css/css.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/codemirror/mode/xml/xml.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/adminlte.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js'); ?>"></script>

<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/inputmask/jquery.inputmask.min.js'); ?>"></script>
<script>
  $(function () {
    // Summernote
    $('#editor').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<script>
  $(function () {
    
    $('#datatable').DataTable({
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
  $(function () {
    $('.select2').select2()
    $('[data-mask]').inputmask()
  })
</script>


</body>
</html>
