<?php 
  // ------------------ index.php --------------------->
  // Start the PHP session
  session_start();

  // Ensure no message will interfere with output
  ini_set('display_errors', 'Off');
  error_reporting(0);

  // Turn on display of errors and warning for debug
  /*ini_set('display_errors', 'On');
  error_reporting(E_ALL ^ E_WARNING);
  error_reporting(E_ALL | E_STRICT);*/

?>
<!DOCTYPE html>
<html>
  <head>

    <!-- Meta -->
    <meta content="text/html; charset=UTF-8;">
    <meta name="viewport" 
      content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="FireFlower" />
    <meta name="keywords" content="FireFlower" />
      
    <!-- Icon -->
    <link rel="icon" type="image/x-icon" 
      href="./Img/fireflower.ico" />

    <!-- Include the CSS files -->
    <link href = "./fireflower.css" 
      rel = "stylesheet" type = "text/css"> 

    <!-- Include the JS files -->
    <script charset = "UTF-8" src = "./jquery.min.js"></script>
    <script charset = "UTF-8" src = "./fireflower.js"></script>

    <title>FireFlower</title>
  </head>
  <body onload = <?php echo "'BodyOnLoad();'" ?>>
    <!-- Main div -->
    <div id = "divMain">
      
      <!-- Title div -->
      <div id = "divTitle">
        FireFlower<br>
        <div id = "divSubTitle">

        </div>
      </div>
      
      <!-- Main div -->
      <div id = "divBoard">
        <div id = "divOutputImg" class = "divTool">
          <img id = "imgOut" src = <?php echo "out.jpg?" . date("YmdHis"); ?>>
        </div>
      </div>
      
      <!-- footer div -->
      <div id = "divFooter">
        Copyright <a href="mailto:Pascal@BayashiInJapan.net">
            P. Baillehache
        </a>, 2017.<br>
      </div>

    </div>

  </body>

</html>
