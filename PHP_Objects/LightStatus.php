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
    
  }
