<?php
require('DbConnection.php');
class RandomText extends DbConnection {
    // Selects random quote from database (texts table)
    public function textQuery() {
        $connection = $this->getDbObject();
        $sql = "SELECT * FROM texts ORDER BY RAND() LIMIT 1";
        $results = array();
        foreach ($connection->query($sql) as $row) {
            $results += $row;
        }
        return $results;
    }
}
?>
