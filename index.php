<?php
require('php/session.php');
require('php/randomText.php');
$CatText = new RandomText();
$results = $CatText->textQuery();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cat Racer</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <?php require('php/navbar.php') ?>
    <!--Particle background-->
    <header>
        <canvas id="canvas" width="300" height="300"></canvas>
    </header>
    <!--Main content after this-->
    <div id="textContent">
        <div id="textSentence" class="text-left text-wrap text-break font-weight-bolder">
            <?php
            $sentence = explode(" ", $results["texts"]);
            for ($i = 0; $i < count($sentence); $i++) {
                echo "<div class='word'>";
                for ($ii = 0; $ii < strlen($sentence[$i]); $ii++) {
                    echo "<p class='letter'>" . $sentence[$i][$ii] . "</p>";
                };
                echo "</div>";
            };
            echo "<p id='textHidden'>" . $results["texts"] . "</p>";
            ?>
        </div>
    </div>
    <script src="js/typing.js" charset="utf-8"></script>
    <script src="js/form.js" charset="utf-8"></script>
    <script src="js/particles.js" charset="utf-8"></script>
</body>

</html>