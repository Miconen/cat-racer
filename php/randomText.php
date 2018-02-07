<?php
// Declare function
function randomText(){
    // Declare database connection from utility.php
    $db = getDbObject();
    // Selects random quote from database (texts table)
    $sql = "SELECT texts FROM texts " .
           "ORDER BY RAND() " .
           "LIMIT 1";

    $result = $db->query($sql);

    $textVar = array();
        while ($row = $result->fetch()) {
            $textVar[] = $row;
    };

    foreach ($textVar as $yupyup) {
            extract($yupyup);
            echo $texts;
    };
};
?>
