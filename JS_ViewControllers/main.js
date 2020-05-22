var remoteServerURLs = ["http://localhost/PatricianSouthRoom/","http://localhost/PatricianNorthRoom/"];

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
