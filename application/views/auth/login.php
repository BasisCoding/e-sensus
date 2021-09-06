

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Sign In | <?= APP_NAME ?></title>
	<!-- Favicon-->
	<link rel="icon" href="<?= site_url('assets/favicon.ico') ?>" type="image/x-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<!-- Bootstrap Core Css -->
	<link href="<?= site_url('assets/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

	<!-- Waves Effect Css -->
	<link href="<?= site_url('assets/plugins/node-waves/waves.css') ?>" rel="stylesheet" />

	<!-- Animation Css -->
	<link href="<?= site_url('assets/plugins/animate-css/animate.css') ?>" rel="stylesheet" />

	<!-- Custom Css -->
	<link href="<?= site_url('assets/css/style.css') ?>" rel="stylesheet">
</head>

<body class="login-page">
	<div class="login-box">
		<div class="logo text-center">
			<img width="150" height="150" src="<?= site_url('assets/images/logo.png') ?>">
		</div>
		<div class="card">
			<div class="body">
				<form id="form-login" method="POST">
					<div class="msg">Sign in to start your session</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">person</i>
						</span>
						<div class="form-line">
							<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
						</div>
					</div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">lock</i>
						</span>
						<div class="form-line">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-8 p-t-5">
							<input type="checkbox" name="remember" id="rememberme" class="filled-in chk-col-pink">
							<label for="rememberme">Remember Me</label>
						</div>
						<div class="col-xs-4">
							<button type="submit" class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	<!-- Jquery Core Js -->
	<script src="<?= site_url('assets/plugins/jquery/jquery.min.js') ?> "></script>

	<!-- Bootstrap Core Js -->
	<script src="<?= site_url('assets/plugins/bootstrap/js/bootstrap.js') ?> "></script>

	<!-- Waves Effect Plugin Js -->
	<script src="<?= site_url('assets/plugins/node-waves/waves.js') ?> "></script>

	<!-- Bootstrap Notify Plugin Js -->
	<script src="<?= site_url('assets/plugins/bootstrap-notify/bootstrap-notify.js') ?>"></script>

	<!-- Validation Plugin Js -->
	<script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.js') ?> "></script>

	<!-- Custom Js -->
	<script src="<?= site_url('assets/js/admin.js') ?> "></script>
	<script src="<?= site_url('assets/js/pages/ui/notifications.js') ?>"></script>
	<script src="<?= site_url('assets/js/pages/examples/sign-in.js') ?> "></script>
</body>


<script type="text/javascript">
	$(document).ready(function() {

		$('#form-login').on('submit', function() {
			$.ajax({
				url: '<?= site_url('Auth/login') ?>',
				type: 'POST',
				dataType:'JSON',
				data: $(this).serialize(),
				success:function(response) {
					showNotification(response.type, response.text);

					setTimeout(function(){ 
						window.location.href = response.redirect;
					}, 1500);
				}
			});

			return false;
		});
	});
</script>
</html>





