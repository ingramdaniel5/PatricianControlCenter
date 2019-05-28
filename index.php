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
                <h4 class="col" id="WalkinFridgeTempLabel">20.0 deg</h4>
              </div>
              </br>
              <div class="TemperatureControlGridRow ControlItemBoxDeactivated row">
                <h4 class="col">Walkin Freezer:</h4>
                <h4 class="col" id="WalkinFreezerTempLabel">-4.0 deg</h4>
              </div>
            </div>
          </fieldset>


          <fieldset>
            <legend>External Lights Controls</legend>
            <!-- Outside Lights Control Panel Portion -->
            <div id="OutsideLightsClockContainer" class="container ItemContainer">
              <div class="row ControlItemTitleBox">
                <p class="col TableColumnTitle">Clock Location</p>
                <p class="col TableColumnTitle">Current Activation Times</p>
                <p class="col TableColumnTitle">Manual Override</p>
              </div>
              <div class="ControlItemBox ControlItemBoxDeactivated row">
                <h4 class="col">North Outside Lights:</h4>
                <h4 class="col" id="NorthRoomCurrentTimeLabel">7:45pm - 6:30am</h4>
                <button class="btn btn-sm btn-warning col manualTimeInputButton" type="button">Override</button>
              </div>
                </br>
              <div class="ControlItemBox ControlItemBoxDeactivated row">
                <h4 class="col">South Outside Lights:</h4>
                <h4 class="col" id="SouthRoomCurrentTimeLabel">7:45pm - 6:30am</h4>
                <button  class="btn btn-sm btn-warning col manualTimeInputButton" type="button">Override</button>
              </div>
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
