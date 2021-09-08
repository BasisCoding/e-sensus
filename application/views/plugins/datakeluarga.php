
<script type="text/javascript">
	$(document).ready(function() {

		getAll();

		$('#table-keluarga').DataTable({
			dom: 'Bfrtip',
			responsive: true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});
		
		function getAll() {
			$.ajax({
				url: '<?= base_url('DataKeluarga/getKeluarga') ?>',
				type: 'POST',
				async:false,
				dataType: 'HTML',
				success:function (data) {
					$('#view-keluarga').html(data);
				}
			});

			return false;
		}

		$('#view-keluarga').on('click', '.view-penduduk', function(event) {
			event.preventDefault();
			var no_kk = $(this).attr('data-kk');

			$.ajax({
				url: '<?= base_url('DataKeluarga/getPenduduk') ?>',
				type: 'POST',
				data:{no_kk:no_kk},
				dataType: 'HTML',
				success:function (data) {
					$('#title-kk').html(no_kk);
					$('#view-penduduk').html(data);

					$('#modal-penduduk').modal('show');
				}
			});

		});
	});
</script>
<!-- Jquery DataTable Plugin Js -->
<script src="<?= site_url('assets/plugins/jquery-datatable/jquery.dataTables.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jquery-datatable/extensions/export/jszip.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') ?>"></script>
<script src="<?= site_url('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') ?>"></script>

<script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.js') ?>"></script>
<script src="<?= site_url('assets/js/pages/forms/form-validation.js') ?>"></script>

</body>
</html>