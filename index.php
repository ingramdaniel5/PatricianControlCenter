<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
	  <link href="assets/css/gsdk.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Font Awesome     -->
    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
</head>
<?php
include_once 'PHP_Controllers/RemotePI_API.php';
  // Loading api resources:
  $externalLightsStatus = RemotePiAPI::getRemotePIsTimeSetting();
?>
<body>
  <div class="main">
    <div id="carousel">
        <!--
                IMPORTANT - This carousel can have a special class for a smooth transition "gsdk-transition". Since javascript cannot be overwritten, if you want to use it, you can use the bootstrap.js or bootstrap.min.js from the GSDKit or you can open your bootstrap.js file, search for "emulateTransitionEnd(600)" and change it with "emulateTransitionEnd(1200)"
        -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
          </ol>

          <!-- Wrapper for slides -->
          <center>
            <div class="well well-large">
              <div class="carousel-inner">

                <div class="item active">
                  <div class="hero-unit">
                    <div class="tim-title">
                        <h1>Outside Lights Schedule</h1>
                    </div>
                    <div class="row tim-row">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-5">
                            <h3>Turn On at:</h3>
                          </div>
                          <div class="col-md-5">
                            <input type="time" value="<?php echo $externalLightsStatus->TimeOn; ?>" id="txtTurnOffAt" placeholder="Turn On at:" class="form-control input-xlarge" />
                          </div>
                        </div>
                        </br>
                        <div class="row">
                          <div class="col-md-5">
                            <h3>Turn Off at:</h3>
                          </div>
                          <div class="col-md-5">
                            <input type="time" "<?php echo $externalLightsStatus->TimeOff; ?>" id="txtTurnOnAt" placeholder="Turn Off at:" class="form-control input-xlarge" />
                          </div>
                        </div>
                      </div>
                    </div>
                    </br>
                    <button class="btn btn-large btn-primary btn-fill" type="button" onclick="UpdateExternalLightsPIs()">Update</button>
                    </br>
                    </br>
                    </br>
                  </div>
                </div>


                <div class="item">
                  <div class="hero-unit">
                    <div class="tim-title">
                        <h1>Zone Temp Control</h1>
                    </div>
                  </div>
                </div>

                <div class="item">
                  <div class="hero-unit">
                    <div class="tim-title">
                        <h1>Fridge Status</h1>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </center>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
        </div>
    </div>
  </div>
</body>
<footer>
  <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  <script src="assets/js/gsdk-checkbox.js"></script>
  <script src="assets/js/gsdk-radio.js"></script>
  <script src="assets/js/gsdk-bootstrapswitch.js"></script>
  <script src="assets/js/get-shit-done.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Custom Scripts -->
  <script src="JS_ViewControllers/main.js"></script>

  <script type="text/javascript">
      $('.btn-tooltip').tooltip();
      $('.label-tooltip').tooltip();
      $('.pick-class-label').click(function(){
          var new_class = $(this).attr('new-class');
          var old_class = $('#display-buttons').attr('data-class');
          var display_div = $('#display-buttons');
          if(display_div.length) {
            var display_buttons = display_div.find('.btn');
            display_buttons.removeClass(old_class);
            display_buttons.addClass(new_class);
            display_div.attr('data-class', new_class);
          }
      });
      $( "#slider-range" ).slider({
  		range: true,
  		min: 0,
  		max: 500,
  		values: [ 75, 300 ],
  	});
  	$( "#slider-default" ).slider({
  			value: 70,
  			orientation: "horizontal",
  			range: "min",
  			animate: true
  	});
  	$('.carousel').carousel({
        interval: 9999999999
      });


  </script>
</footer>
