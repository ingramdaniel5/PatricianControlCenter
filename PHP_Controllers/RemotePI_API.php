<?php

//require_once 'HTTP/Request2.php';
class RemotePiAPI{

  //  Testing URLs
  public static $RemoteAPI_URLs = array( 'http://localhost/PatricianSouthRoom/', 'http://localhost/PatricianNorthRoom/');

  //  Productoin URLs
  //public static $RemoteAPI_URLs = array( 'http://localhost/PatricianSouthRoom/', 'http://localhost/PatricianNorthRoom/');


  //Decided to be moved to js operations:
  public static function updateRemotePIsTimeSetting($timeObject){

  }

  public static function getRemotePIsTimeSetting(){
    $responses = array();
    for ($x=0; $x<count(RemotePiAPI::$RemoteAPI_URLs);  $x++)
    {
      array_push($responses, RemotePiAPI::POST_REQ(RemotePiAPI::$RemoteAPI_URLs[$x], "GetCurrentTime", 1));
    }
    //Error if one of the remote sites isnt reachable
    if (count($responses) != count(RemotePiAPI::$RemoteAPI_URLs))
    {
      return "ERROR!, One of the remote sites is unreachable!";
    }
    else
    {
      return $responses[0];
    }
  }
  //{"TimeOn":"2020-05-15 06:41:15pm","TimeOff":"2020-05-15 09:41:15pm"}
  public static function POST_REQ($URL, $ObjectKey, $ObjectValue)
  {
    $request = new HTTP_Request2();
    $request->setUrl($URL);
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
      'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
      'Content-Type' => 'application/x-www-form-urlencoded'
    ));
    $request->addPostParameter(array(
      'pwd' => 'fdsh4359483u9a584566578495634gbndfbgsfjdshcvsnjrkbgfrsklkejfoewjkf',
      $ObjectKey => $ObjectValue
    ));
    try {
      $response = $request->send();
      if ($response->getStatus() == 200) {
        return $response->getBody();
      }
      else {
        return 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .$response->getReasonPhrase();
      }
    }
    catch(HTTP_Request2_Exception $e) {
      return 'Error: ' . $e->getMessage();
    }
  }

}
