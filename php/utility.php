<?php
    // $textVar = array();
    //     while ($row = $result->fetch()) {
    //         $textVar[] = $row;
    // };
    //
    // foreach ($textVar as $yupyup) {
    //         extract($yupyup);
    //         echo $texts;
    // };
class RandomText {
    // Declare database connection from utility.php
    private function getDbObject() {
        $rdbms = 'mysql';
        $host = 'localhost';
        $db = 'cat-racer';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';

        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $connectionString = "$rdbms:host=$host;dbname=$db;charset=$charset";
        return new PDO($connectionString, $user, $pass, $opt);
    }

    // Selects random quote from database (texts table)
    private function textGet() {
    }
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
$CatText = new RandomText();
?>
