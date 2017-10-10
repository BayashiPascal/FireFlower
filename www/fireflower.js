/* ============= mozait.js =========== */

// ------------ Global variables
var theFireFlower = {};

// ------------ MozaIt: main class

function FireFlower() {
  try {
    this.Request("");
  } catch (err) {
    console.log("FireFlower " + err.stack);
  }
}

// ------------ HTTP Request

FireFlower.prototype.Request = function(arg) {
  try {
    // Prepare the url for the PHP interfacing with the database
    url = "./requestPicture.php";
    // Create the HTTP request entity
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    } else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4) {
        console.log(xmlhttp.responseText);
        if (xmlhttp.status == 200) {
          // The request was successful, return the JSON data
          data = xmlhttp.responseText;
        } else {
          // The request failed, return error as JSON
          data ="{\"error\":\"HTTPRequest failed : " + 
            xmlhttp.status + 
            "\"}";
        }
        theFireFlower.ProcessReply(data);
      }
    };
    // Send the HTTP request
    console.log(url);
    xmlhttp.open("GET", url);
    xmlhttp.send();
  } catch (err) {
    console.log("FireFlower.Request " + err.stack);
  }
}

// ------------ Process the reply from the HTTPRequest

FireFlower.prototype.ProcessReply = function(data) {
  try {

  } catch (err) {
    console.log("FireFlower.ProcessReply " + err.stack);
  }
}

// ------------ OnLoad function

function BodyOnLoad() {
  try {
    // Create the FireFlower entity
    theFireFlower = new FireFlower();
  } catch (err) {
    console.log("BodyOnLoad " + err.stack);
  }
}


