<?php
require('php/utility.php');
$db = getDbObject();
$sql = "SELECT texts FROM texts WHERE id=1";

$result = $db->query($sql);

$ilmoittautuneet = array();
while ($row = $result->fetch()) {
    $ilmoittautuneet[] = $row;
}
var_dump($ilmoittautuneet);
foreach ($ilmoittautuneet as $rivi) {
        extract($rivi);
        echo $texts;
};
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cat Racer</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/master.css">
  </head>
  <body>
    <!--Navigation Bar-->
    <nav>
      <ul>
        <a href="#"><li>Home</li></a>
        <a href="#"><li>Home</li></a>
        <a href="#"><li>Home</li></a>
      </ul>
    </nav>
    <!--Header-->
    <header>
      <?php

      ?>
    </header>
    <!--Main content after this-->
    <div>

    </div>
  </body>
  <script src="/js/master.js" charset="utf-8"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
