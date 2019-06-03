<?php
  //Error Reporting
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  //Inclusions for the items to keep track of on the UI
  include 'Objects/acZoneStatus.php';
  include 'Objects/LightStatus.php';
?>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="bootstrap/main.css">
<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script rel="script" src="main.js"></script>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Patrician Control Center</title>
  </head>
  <body>
      <div class="TitleBox">
        <center>
          <h1 class="MainTitleText">Patrician Control Center</h1>
        </center>
      </div>
    </br>
      <div id="mainControlPanel" class="mainControlPanel">

        <center>
          <fieldset>
            <legend>Zone Airconditioning Controls</legend>
            <!-- Air Conditioning Control Panel Portion -->
            <div id="OutsideLightsClockContainer" class="container ItemContainer">
              <div class="row ControlItemTitleBox">
                <p class="col TableColumnTitle">Location</p>
                <p class="col TableColumnTitle">Current Temp</p>
                <p class="col TableColumnTitle">Vent Temp</p>
                <p class="col TableColumnTitle">Occupied</p>
                <p class="col TableColumnTitle">Set Temp</p>
              </div>
              <?php
                $exisitingZones = generateListOfZones();
                printAllZonesToUI($exisitingZones);
              ?>
            </br>
              <button type="button" class="btn btn-primary btn-lg btn-block AC-Control-Buttons" id="btnZoneTempRefresh">Refresh</button>
              <button type="button" class="btn btn-success btn-lg btn-block AC-Control-Buttons" id="btnZoneTempUpdate">Submit</button>
            </div>
          </fieldset>


          <fieldset>
            <legend>Fridge/Freezer Status</legend>
            <!-- Outside Lights Control Panel Portion -->
            <div id="OutsideLightsClockContainer" class="container ItemContainer">
              <div class="row ControlItemTitleBox">
                <p class="col TableColumnTitle">Sensor Location</p>
                <p class="col TableColumnTitle">Current Temperature</p>
              </div>
              <div class="TemperatureControlGridRow ControlItemBoxDeactivated row">
                <h4 class="col">Walkin Refrigerator:</h4>
                <h4 class="col" id="WalkinFridgeTempLabel">UNKNOWN</h4>
              </div>
              </br>
              <div class="TemperatureControlGridRow ControlItemBoxDeactivated row">
                <h4 class="col">Walkin Freezer:</h4>
                <h4 class="col" id="WalkinFreezerTempLabel">UNKNOWN</h4>
              </div>
            </div>
          </fieldset>


          <fieldset>
            <legend>External Lights Controls</legend>
            <!-- Outside Lights Control Panel Portion -->
            <div id="OutsideLightsClockContainer" class="container ItemContainer">
              <div class="row ControlItemTitleBox">
                <center>
                  <p class="col TableColumnTitle">Current Activation Times</p>
                </center>
              </div>
              <div class="ControlItemBox ControlItemBoxDeactivated row">
                <center>
                  <h4 class="col" id="NorthRoomCurrentTimeLabel">UNKNOWN</h4>
                </center>
              </div>
                </br>
            </div>
          </fieldset>
        </center>
        </br>
        </br>
        </br>
        </br>
      </div>
  </body>
</html>
