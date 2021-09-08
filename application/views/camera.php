<html>
<head>
  <!-- Bootstrap Core Css -->
  <link href="<?= site_url('assets/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

  <style type="text/css">
  .scanner-laser{
    position: absolute;
    margin: 40px;
    height: 30px;
    width: 30px;
  }
  .laser-leftTop{
    top: 0;
    left: 0;
    border-top: solid red 5px;
    border-left: solid red 5px; 
  }
  .laser-leftBottom{
    bottom: 0;
    left: 0;
    border-bottom: solid red 5px;
    border-left: solid red 5px; 
  }
  .laser-rightTop{
    top: 0;
    right: 0;
    border-top: solid red 5px;
    border-right: solid red 5px;    
  }
  .laser-rightBottom{
    bottom: 0;
    right: 0;
    border-bottom: solid red 5px;
    border-right: solid red 5px;    
  }
</style>
</head>
<body class="login-page">
  <div class="login-box">
    <div class="card">
      <div class="body">
        <canvas id="qr-canvas" class="col-md-12"></canvas>     
        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
    </div>
  </div>
</body>
<script src="<?= site_url('assets/plugins/jquery/jquery.min.js') ?> "></script>
<script src="<?= site_url('assets/plugins/bootstrap/js/bootstrap.js') ?> "></script>
<script type="text/javascript" src="<?= site_url('assets/js/qrcode-reader/qrcodelib.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('assets/js/qrcode-reader/WebCodeCam.js') ?>"></script>
<script type="text/javascript">
    //  defalut-settings
    $('#qr-canvas').WebCodeCam({
            ReadQRCode: true, // false or true
            ReadBarecode: true, // false or true
            width: 320,
            height: 240,
            videoSource: {  
                    id: true,      //default Videosource
                    maxWidth: 640, //max Videosource resolution width
                    maxHeight: 480 //max Videosource resolution height
                  },
            flipVertical: false,  // false or true
            flipHorizontal: false,  // false or true
            zoom: -1, // if zoom = -1, auto zoom for optimal resolution else int
            beep: "<?= site_url('assets/js/qrcode-reader/beep.mp3') ?>", // string, audio file location
            autoBrightnessValue: false, // functional when value autoBrightnessValue is int
            brightness: 0, // int 
            grayScale: false, // false or true
            contrast: 0, // int 
            threshold: 0, // int 
            sharpness: [], //or matrix, example for sharpness ->  [0, -1, 0, -1, 5, -1, 0, -1, 0]
            resultFunction: function(resText, lastImageSrc) {
                        /* resText as decoded code, lastImageSrc as image source
                        example:
                        alert(resText);
                        */ 
                      },
                      getUserMediaError: function() {
                        /* callback funtion to getUserMediaError
                        example:
                        alert('Sorry, the browser you are using doesn\'t support getUserMedia');
                        */
                      },
                      cameraError: function(error) {
                        /* callback funtion to cameraError, 
                        example:
                        var p, message = 'Error detected with the following parameters:\n';
                        for (p in error) {
                                message += p + ': ' + error[p] + '\n';
                        }
                        alert(message);
                        */
                      }
                    });
                  </script>
                  </html>