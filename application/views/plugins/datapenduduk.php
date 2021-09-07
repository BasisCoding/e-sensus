<script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.js') ?>"></script>
<script src="<?= site_url('assets/js/pages/forms/form-validation.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {

		getAll();
		function getAll() {
			$.ajax({
				url: '<?= base_url('DataPenduduk/getPenduduk') ?>',
				type: 'POST',
				dataType: 'HTML',
				success:function (data) {
					$('#view-penduduk').html(data);
				}
			});
		}

		function actionData(formData, nameAction) {
			$.ajax({
				url: '<?= base_url("DataPenduduk/") ?>'+nameAction+'',
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

		$('#form-addPenduduk').submit(function() {
			var formData = new FormData(this);
			actionData(formData, 'addPenduduk');
			
			setTimeout(function() {
				getAll();
			}, 1000);

			return false;
		});

		$('#form-updatePenduduk').submit(function() {
			var formData = new FormData(this);
			actionData(formData, 'updatePenduduk');
			
			setTimeout(function() {
				getAll();
			}, 1000);

			return false;
		});
		$('#form-deletePenduduk').submit(function() {
			var formData = new FormData(this);
			actionData(formData, 'deletePenduduk');
			
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

</body>
</html>