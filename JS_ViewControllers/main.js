//var remoteServerURLs = ["http://localhost/PatricianSouthRoom/","http://localhost/PatricianNorthRoom/"];
var remoteServerURLs = ["http://SouthRoomPI","http://NorthRoomPI"];

$(document).ready(function() {
  $().ready(function() {
    LoadDashboardResources();
  })});

//Gets the values of the text boxes ids bellow and make a http req to the remote servers
function GetTimeUpdatePostRequestSettings(url)
{
  var timeOn = document.getElementById('txtTurnOnAt').value;
  var timeOff = document.getElementById('txtTurnOffAt').value;
  console.log(timeOn);
  console.log(timeOff);
  var settings = {
    "url": url,
    "method": "POST",
    "timeout": 0,
    "crossDomain" : true,
    "headers": {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    "data": {
      "pwd": "fdsh4359483u9a584566578495634gbndfbgsfjdshcvsnjrkbgfrsklkejfoewjkf",
      "UpdateTime": "{\"TimeOn\":\"" + timeOn + "\",\"TimeOff\":\"" + timeOff + "\"}"
    }
  };
  return settings;
}

function GetCurrrentPiTimePostRequestSettings(url)
{
  var settings = {
    "url": url,
    "method": "POST",
    "timeout": 0,
    "crossDomain" : true,
    "headers": {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    "data": {
      "pwd": "fdsh4359483u9a584566578495634gbndfbgsfjdshcvsnjrkbgfrsklkejfoewjkf",
      "GetCurrentTime": "1"
    }
  };
  return settings;
}

function PingPi(url)
{
  var settings = {
    "url": url,
    "method": "POST",
    "timeout": 0,
    "crossDomain" : true,
    "headers": {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    "data": {
      "pwd": "fdsh4359483u9a584566578495634gbndfbgsfjdshcvsnjrkbgfrsklkejfoewjkf",
      "HelloIsAnyoneHome": "1"
    }
  };
  return settings;
}

function GetExternalLightsPIsSettingsAndUpdateUI() {
  console.log("Getting Existing Light settings...");
  for (var x=0; x<remoteServerURLs.length; x++)
  {
    var currentSettings =  GetCurrrentPiTimePostRequestSettings(remoteServerURLs[x]);
    $.ajax(currentSettings).done(function (response) {
      formattedResponse = JSON.parse(response);
      console.log("Remote Server Current Settings Query Response: " + formattedResponse.TimeOn + " " +  formattedResponse.TimeOff );
      document.getElementById('TimeOffCurrentSetting').innerHTML = formattedResponse.TimeOff;
      document.getElementById('TimeOnCurrentSetting').innerHTML = formattedResponse.TimeOn;
    });
  }
}

function PingRemotePisAndUpdateUI() {
  console.log("Pinging Remote Pis...");
  for (var x=0; x<remoteServerURLs.length; x++)
  {
    var currentSettings =  PingPi(remoteServerURLs[x]);
    $.ajax(currentSettings).done(function (response) {
      console.log("Remote Server Ping Response: " + response);
      // Basically Just checks if the response is from one of the two remote pis 
      if (response == "NorthRoomPi")
      {
        document.getElementById('NorthRoomPiStatus').innerHTML = "Online";
      }
      else if (response == "SouthRoomPi")
      {
        document.getElementById('SouthRoomPiStatus').innerHTML = "Online";
      }
      else
      {
        console.log("ERROR! Remote resource connection attempt failed!");
      }
    });
  }
}

function LoadDashboardResources(){
  console.log("Loading Remote Resources....");
  PingRemotePisAndUpdateUI();
  GetExternalLightsPIsSettingsAndUpdateUI();
}

function UpdateExternalLightsPIs() {
  //document.getElementById("myCheck").click();
  for (var x=0; x<remoteServerURLs.length; x++)
  {
    var currentSettings =  GetTimeUpdatePostRequestSettings(remoteServerURLs[x]);
    $.ajax(currentSettings).done(function (response) {
      console.log(response);
    });
  }
}
