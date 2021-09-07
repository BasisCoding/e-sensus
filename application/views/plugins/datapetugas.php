
<script type="text/javascript">
	$(document).ready(function() {

		getAll();

		$('#table-petugas').DataTable({
			dom: 'Bfrtip',
			responsive: true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});

		function getAll() {
			$.ajax({
				url: '<?= base_url('DataPetugas/getPetugas') ?>',
				type: 'POST',
				async:false,
				dataType: 'HTML',
				success:function (data) {
					$('#view-petugas').html(data);
				}
			});

			return false;
		}

		function actionData(formData, nameAction) {
			$.ajax({
				url: '<?= base_url("DataPetugas/") ?>'+nameAction+'',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				processData: false,
				contentType: false,
				success:function (response) {

					showNotification(response.type, response.text);

					if (response.type == 'success') {
						$('#modal-'+nameAction).modal('hide');
						$('#form-'+nameAction)[0].reset();
					}
				}
			});
		}

		$('#form-addPetugas').submit(function() {
			var formData = new FormData(this);
			actionData(formData, 'addPetugas');
			
			setTimeout(function() {
				getAll();
			}, 1000);

			return false;
		});

		$('#form-updatePetugas').submit(function() {
			var formData = new FormData(this);
			actionData(formData, 'updatePetugas');
			
			setTimeout(function() {
				getAll();
			}, 1000);

			return false;
		});

		$('#form-deletePetugas').submit(function() {
			var formData = new FormData(this);
			actionData(formData, 'deletePetugas');
			
			setTimeout(function() {
				getAll();
			}, 1000);

			return false;
		});

		$('#view-penduduk').on('click', '.update-data', function(event) {
			event.preventDefault();
			var id = $(this).attr('data-id');

			$.ajax({
				url: '<?= base_url('DataPenduduk/getDataById') ?>',
				type: 'POST',
				data:{id:id},
				dataType: 'JSON',
				success:function (data) {
					$('[name="id_update"]').val(id);
					$('[name="nik_update"]').val(data.nik);
					$('[name="no_kk_update"]').val(data.no_kk);
					$('[name="nama_lengkap_update"]').val(data.nama_lengkap);
					$('[name="tempat_lahir_update"]').val(data.tempat_lahir);
					$('[name="tanggal_lahir_update"]').val(data.tanggal_lahir);
					$('[name="alamat_update"]').val(data.alamat);
					$('#modal-updatePenduduk').modal('show');
				}
			});


		});

		$('#view-penduduk').on('click', '.delete-data', function(event) {
			event.preventDefault();
			var id = $(this).attr('data-id');

			$.ajax({
				url: '<?= base_url('DataPenduduk/getDataById') ?>',
				type: 'POST',
				data:{id:id},
				dataType: 'JSON',
				success:function (data) {
					$('[name="id_delete"]').val(id);
					$('#nama_lengkap_delete').html(data.nama_lengkap);
					$('#modal-deletePenduduk').modal('show');
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
<script src="<?= site_url('assets/js/pages/tables/jquery-datatable.js') ?>"></script>
</body>
</html>