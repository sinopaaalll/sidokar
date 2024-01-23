</div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/adminlte')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/adminlte') ?>/plugins/popper/popper.min.js"></script>
<script src="<?= base_url('assets/adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('assets/adminlte')?>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte')?>/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "columnDefs": [
            {
                "targets": [4], 
                "orderable": false,
                "searchable":false, 
            }
        ],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    
  });

  $(function () {
    $("#berkasberkas1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "columnDefs": [
            {
                "targets": [7], 
                "orderable": false,
                "searchable":false, 
            }
        ],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#berkasberkas1_wrapper .col-md-6:eq(0)');
    $("#agenda1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "columnDefs": [
            {
                "targets": [2], 
                "orderable": false,
                "searchable":false, 
            }
        ],
      
    }).buttons().container().appendTo('#agenda1_wrapper .col-md-6:eq(0)');
    $("#berita1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "columnDefs": [
            {
                "targets": [2], 
                "orderable": false,
                "searchable":false, 
            }
        ],
    }).buttons().container().appendTo('#berita1_wrapper .col-md-6:eq(0)');
    $("#slider1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "columnDefs": [
            {
                "targets": [3], 
                "orderable": false,
                "searchable":false, 
            }
        ],
    }).buttons().container().appendTo('#slider1_wrapper .col-md-6:eq(0)');
    $("#struktur1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "columnDefs": [
            {
                "targets": [2], 
                "orderable": false,
                "searchable":false, 
            }
        ],
    }).buttons().container().appendTo('#struktur1_wrapper .col-md-6:eq(0)');
    $("#admin1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "columnDefs": [
            {
                "targets": [6], 
                "orderable": false,
                "searchable":false, 
            }
        ],
    }).buttons().container().appendTo('#admin1_wrapper .col-md-6:eq(0)');
  });
  $("#bidang1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "columnDefs": [
            {
                "targets": [3], 
                "orderable": false,
                "searchable":false, 
            }
        ],
    }).buttons().container().appendTo('#bidang1_wrapper .col-md-6:eq(0)');
  
$('a.disabled').click(function(e){
    e.preventDefault();
});

  $(document).ready(function() {
			
      $('input[type="file"]').on('change', function() {
			//get the file name
			var file = $(this).val();
			var fileName = file.replace('C:\\fakepath\\', '');
			//replace the "Choose a file" label
			$(this).next('.custom-file-label').html(fileName);
		  });
      
		});
</script>
</body>
</html>
