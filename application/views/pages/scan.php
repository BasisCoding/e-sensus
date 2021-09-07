

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
  <link href="<?= site_url('assets/css/themes/all-themes.css') ?>" rel="stylesheet">
</head>

<body class="login-page">
  <div class="login-box">
    <div class="logo text-center">
      <img width="150" height="150" src="<?= site_url('assets/images/logo.png') ?>">
    </div>
    <form id="sendDataToLokal">
      <div class="panel-group" role="tablist" aria-multiselectable="true" id="view-data">
      </div>
      <button type="submit" class="btn btn-success col-md-12 col-xs-12">Kirim Data Ke Lokal</button>
    </form>
  </div>

  <div class="modal fade" id="modal-login" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Anda harus melakukan login terlebih dahulu !!</h3>
        </div>
        <div class="modal-body">
          <form id="form-login" class="form_advanced_validation" method="POST">
            <div class="form-group">
              <label>USERNAME</label>
              <div class="form-line">
                <input type="text" class="form-control" name="username" required="">
              </div>
            </div>

            <div class="form-group">
              <label>PASSWORD</label>
              <div class="form-line">
                <input type="password" class="form-control" name="password" required="">
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="form-login" class="btn btn-link waves-effect">Login</button>
        </div>
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

  <script type="text/javascript">

    $(document).ready(function() {
      var login = '<?= $this->session->userdata('logged') ?>';
      if (login == false) {
        $('#modal-login').modal('show');
        $('.login-box').hide();
      }else{
        $('.login-box').show();
        getData();
      }

      function getData() {
        var no_kk = '<?= $this->uri->segment(2) ?>';
        $.ajax({
          url: '<?= base_url('ScanQRCode/getDataByScan') ?>',
          type: 'POST',
          data:{no_kk:no_kk},
          dataType: 'HTML',
          success:function (data) {
            $('#view-data').html(data);
          }
        });

        return false;

      }

      $('#form-login').on('submit', function() {
        $.ajax({
          url: '<?= site_url('Auth/login') ?>',
          type: 'POST',
          dataType:'JSON',
          data: $(this).serialize(),
          success:function(response) {
            $('#modal-login').modal('hide');
            showNotification(response.type, response.text);

            setTimeout(function(){ 
              window.location.reload();
            }, 1500);
          }
        });

        return false;
      });

      $('#sendDataToLokal').submit(function() {
        var data = $(this).serialize();
        $.ajax({
          url: '<?= base_url('ScanQRCode/SendToDataLokal') ?>',
          type: 'POST',
          dataType: 'JSON',
          data:data,
          success:function (response) {
            showNotification(response.type, response.text);

          // setTimeout(function(){ 
          //   window.location.href = response.redirect;
          // }, 1500);
        }
      });

        return false;
      });
    });
  </script>
</body>

</html>





