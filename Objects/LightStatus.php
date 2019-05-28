<?php
  /**
   * A class which helps manage the start and stop times of the outside lights
   */
  class LightStatus
  {
    public $TimeOn;
    public $TimeOff;

    private $SaveFile = "LightsConfig.txt";

    function __construct($TimeOn, $TimeOff)
    {
      $this->TimeOn = $TimeOn;
      $this->TimeOff = $TimeOff;
      return $this;
    }

    public static function appendToLightsLog()
    {
      $myOpenFile = fopen($SaveFile, "w") or die("Unable to open save file!");
      fwrite($myOpenFile, json_encode($this));
      fclose($myfile);
    }

    public static function loadSelfFromTextFile()
    {
      $myOpenFile = fopen($SaveFile, "r") or die("Unable to open save file!");
      $jsonObject = fread($myOpenFile, filesize($SaveFile));
      fclose($myfile);
    }

    public function saveSelfToTextFile()
    {
      $myOpenFile = fopen($this->SaveFile, "w") or die("Unable to open save file!");
      fwrite($myOpenFile, json_encode($this));
      fclose($myOpenFile);
    }
  }
