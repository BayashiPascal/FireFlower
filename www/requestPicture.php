 <?php 
  /* ============= requestPicture.php =========== */
  // Ensure no message will interfere with output
  ini_set('display_errors', 'Off');
  error_reporting(0);

  // Turn on display of errors and warning for debug
  /*ini_set('display_errors', 'On');
  error_reporting(E_ALL ^ E_WARNING);
  error_reporting(E_ALL | E_STRICT);*/

  // Start the PHP session
  session_start();

  try {
    // Create the command
    $cmd = "./FireFlower out.tga";
    // Set the time limit
    if (set_time_limit(1800) == false) {
      $data["error"] = "set time limit failure ";
    } else {
      // Execute the command
      unset($output);
      unset($returnVal);
      exec($cmd, $output, $returnVal); 
      // Prepare the returned data
      $data["return"] = $returnVal;
      $data["message"] = $output;
      if ($returnVal == 0) {
        $data["error"] = "";
        // Convert the result image to JPG
        $cmdJPG = "convert ./out.tga ./out.jpg";
        unset($outputJPG);
        unset($returnJPG);
        exec($cmdJPG, $outputJPG, $returnJPG);
        if ($returnJPG != 0) {
          // The conversion to JPG failed
          $data["error"] = "conversion to JPG failed " . $returnJPG;
          $data["message"] = $outputJPG;
        }
      } else {
        $data["error"] = "binary failure " . $returnVal;
      }
    }
    // Convert the object to JSON format
    $ret = json_encode($data);
    // Mouchard
    $to = "pascalbayashi@docomo.ne.jp";
    $subject = "FireFlower:requestPicture";
    $msg = $ret;
    //mail($to, $subject, $msg);
    // Return the JSON formatted result
    echo $ret;
  } catch (Exception $e) {
     ManageException("requestPicture.php " . $e);
  }
?>
