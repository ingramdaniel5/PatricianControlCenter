<?php
class acZoneStatus
{
  public $Name;
  public $TempCurrent;
  public $ZoneID;
  public $TempSet;
  public $CommandAssociatedWithZone;
  public $IsOccupied;
  public $FanStatus;

  function __construct($name, $zoneID, $tempCurrent, $tempSet, $commandAssociatedWithZone, $isOccupied, $fanStatus)
  {
    $this->Name = $name;
    $this->ZoneID = $zoneID;
    $this->TempCurrent = $tempCurrent;
    $this->TempSet = $tempSet;
    $this->CommandAssociatedWithZone = $commandAssociatedWithZone;
    $this->IsOccupied = $isOccupied;
    $this->FanStatus = $fanStatus;
    return $this;
  }

  public function printSelfForUI($isDark)
  {
    $IsOccupied = "Unoccupied";
    if($this->IsOccupied == 1)
      $IsOccupied = "Occupied";
    //Allows for the list to alternate colors
    if ($isDark)
    {
      echo "<div class=\"row TemperatureControlGridRow ControlItemDark\">";
    }
    else {
      echo "<div class=\"row TemperatureControlGridRow ControlItemLight\">";
    }
    echo "<h4 class=\"col tempControlText\" id=\"".$this->ZoneID."LocationLabel\">".$this->Name."</h4>";
    echo "<h4 class=\"col tempControlText\" id=\"".$this->ZoneID."CurrentTempLabel\">".$this->TempCurrent."</h4>";
    echo "<h4 class=\"col tempControlText\" id=\"".$this->ZoneID."VentTempLabel\">".$this->TempCurrent."</h4>";
    echo "<button class=\"col btn btn-outline-primary occupiedButton\" type=\"button\">Unoccupied</button>";
    echo "<div class=\"input-group col\" id=\"".$this->ZoneID."SetTempFormGroup\">";
    echo "<input type=\"number\" class=\"form-control\">";
    echo "<div class=\"input-group-append\" id=\"button-addon4\">";
    echo "<button class=\"btn btn-outline-primary\" type=\"button\">+</button>";
    echo "<button class=\"btn btn-outline-primary\" type=\"button\">-</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
}

function printAllZonesToUI($zonesList)
{
  $isDark = 0;
  for ($x=0; $x<count($zonesList); $x++)
  {
    $newZone = $zonesList[$x];
    $newZone->printSelfForUI($isDark);

    //Toggles the colors of the print
    if ($isDark == 0)
      $isDark = 1;
    else
      $isDark = 0;
  }
}

//($name, $tempCurrent, $tempSet, $commandAssociatedWithZone, $isOccupied, $fanStatus)
function generateListOfZones()
{
  $toReturn = array();
  array_push($toReturn, new acZoneStatus("Lobby Bathroom", "Bathroom", "UNKNOWN", "UNKNOWN", "1", 1, 1));
  array_push($toReturn, new acZoneStatus("North Zone", "NorthZone", "UNKNOWN", "UNKNOWN", "2", 1, 1));
  array_push($toReturn, new acZoneStatus("Center Zone", "CenterZone", "UNKNOWN", "UNKNOWN", "3", 1, 1));
  array_push($toReturn, new acZoneStatus("Middle East Zone", "MiddleEastZone", "UNKNOWN", "UNKNOWN", "4", 1, 1));
  array_push($toReturn, new acZoneStatus("Middle West Zone", "MiddleWestZone", "UNKNOWN", "UNKNOWN", "5", 1, 1));
  array_push($toReturn, new acZoneStatus("South East Zone", "SouthEastZone", "UNKNOWN", "UNKNOWN", "6", 1, 1));
  array_push($toReturn, new acZoneStatus("South West Zone", "SouthWestZone", "UNKNOWN", "UNKNOWN", "7", 1, 1));
  array_push($toReturn, new acZoneStatus("Front Office", "FrontOffice", "UNKNOWN", "UNKNOWN", "8", 1, 1));
  return $toReturn;
}




/*Original Element:
<!-- Lobby Bathroom air conditioning block -->
<div class="row TemperatureControlGridRow ControlItemBoxDeactivated">
  <h4 class="col tempControlText" id="BathroomLocationLabel">Lobby Bathroom</h4>
  <h4 class="col tempControlText" id="BathroomCurrentTempLabel">70 deg</h4>
  <h4 class="col tempControlText" id="BathroomVentTempLabel">70 deg</h4>
  <h4 class="col tempControlText" id="BathroomOccupiedLabel">Unoccupied</h4>
  <div class="input-group col" id="BathroomSetTempFormGroup">
    <input type="number" class="form-control">
    <div class="input-group-append" id="button-addon4">
      <button class="btn btn-outline-primary" type="button">+</button>
      <button class="btn btn-outline-primary" type="button">-</button>
    </div>
  </div>
</div>
*/
?>
