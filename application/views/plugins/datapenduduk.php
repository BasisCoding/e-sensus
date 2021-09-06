<script src="<?= site_url('assets/plugins/waitme/waitMe.js') ?>"></script>
<script src="<?= site_url('assets/js/pages/cards/colored.js') ?>"></script>
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
	});
</script>

</body>
</html>