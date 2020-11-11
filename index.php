<?php
    require('php/RandomText.php');
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
        <!--Navigation Bar-->
        <nav class="navbar navbar-expand-sm fixed-top navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Cat Racer</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Info</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                    Login
                    </span>
                </div>
            </div>
        </nav>
        <!--Particle background-->
        <header>
            <canvas id="canvas" width="300" height="300"></canvas>
        </header>
        <!--Main content after this-->
        <div id="textContent">
            <div id="textSentence" class="text-left text-wrap text-break font-weight-bolder">
                <?php
                $sentence = explode(" ", $results["texts"]);
                for ($i=0; $i < count($sentence); $i++) {
                    echo "<div class='word'>";
                    for ($ii=0; $ii < strlen($sentence[$i]); $ii++) {
                        echo "<p class='letter'>" . $sentence[$i][$ii] . "</p>";
                    };
                    echo "</div>";
                };
                echo "<p id='textHidden'>" . $results["texts"] . "</p>";
                ?>
            </div>
        </div>
        <script src="js/typing.js" charset="utf-8"></script>
        <script src="js/particles.js" charset="utf-8"></script>
    </body>
</html>
