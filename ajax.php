<?php

if (isset($_GET["Authentication"]))//Controls pin 17
{
  $PasswordAttempt = $_GET["Authentication"];
  //Temp password for testing
  $password = "1111";
  if($PasswordAttempt != $password)
  {
    if (isset($_GET["GetCurrentConfig"]))//Controls pin 17
    {

    }
    else if (isset($_GET["ManualOverride"]))
    {

    }
  }
}
?>
