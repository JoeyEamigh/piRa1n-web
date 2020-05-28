<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code:400,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>piRa1n</title>
  </head>
  <body>
    <div class="header">
      <a href="https://github.com/raspberryenvoie/piRa1n" class="title">piRa1n</a><br>
      Made with ♥️ by <a href="https://www.reddit.com/user/raspberryenvoie" class="author">raspberryenvoie</a>
    </div>
    <div class="options">
      <form action="options.php" method="post">
        <p>
          Auto shutdown:<br>
          <input type="checkbox" name="autoShutdown"<?php
    if( shell_exec("grep 'while true' /home/pi/piRa1n/piRa1n.sh")) {
    }
    else {
      echo "checked";
    }
 ?>>
        </p>
        <p>
          Safe mode:<br>
          <input type="checkbox" name="safeMode"<?php
    if( shell_exec("grep ' -s' /home/pi/piRa1n/piRa1n.sh")) {
      echo "checked";
    }
 ?>>
        </p>
        <p>
          Verbose boot:<br>
          <input type="checkbox" name="verbose"<?php
    if( shell_exec("grep ' -v' /home/pi/piRa1n/piRa1n.sh")) {
      echo "checked";
    }
  ?>>
        </p>
        <input type="submit" name="optionsSubmit" value="Apply">
      </form>
    </div>
    <div class="shutdown">
      <form action="shutdown.php" method="post">
        <p>
        Shut down the Pi:<br>
        <input type="submit" value="Shut down" name="shutdownSubmit">
        </p>
      </form>
    </div>
    <div class="update">
    <?php
    $lookForUpdates = shell_exec('/home/pi/piRa1n-web/look_for_updates.sh');
    echo "$lookForUpdates";
    if ($lookForUpdates == "piRa1n is up to date!") {
      echo "piRa1n is up to date!";
    }
    elseif ($lookForUpdates == "An update is available!") {
      echo '      <form action="update.php" method="post">
              <p>$lookForUpdates<br><
                input type="submit" value="Update" name="updateSubmit">
              </p><
            /form>';
    }
    ?>
    </div>
  </body>
</html>
