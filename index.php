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
    <?php require('templates/navbar.php') ?>
    <!--Particle background-->
    <header tabindex="-1" aria-hidden="true">
        <canvas id="canvas" width="300" height="300" tabindex="-1" aria-hidden="true"></canvas>
    </header>
    <!--Main content after this-->
    <main id="textContent" aria-label="Typing area" tabindex="0">
        <div id="textSentence" class="text-left text-wrap text-break font-weight-bolder">
            <?php
            $sentence = explode(" ", $results["texts"]);
            for ($i = 0; $i < count($sentence); $i++) {
                echo "<div aria-label=" . $sentence[$i] . " class='word'>";
                for ($ii = 0; $ii < strlen($sentence[$i]); $ii++) {
                    echo "<p aria-hidden='true' class='letter'>" . $sentence[$i][$ii] . "</p>";
                };
                echo "</div>";
            };
            echo "<p id='textHidden' tabindex='-1'>" . $results["texts"] . "</p>";
            ?>
        </div>
        <button class="ttsButton btn btn-outline-light">
            <svg onclick="textToSpeech.ttsPause()" viewBox="0 0 16 16" class="bi bi-pause" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z" />
            </svg>
        </button>
        <button class="ttsButton btn btn-outline-light">
            <svg onclick="textToSpeech.ttsCancel()" viewBox="0 0 16 16" class="bi bi-stop" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3.5 5A1.5 1.5 0 0 1 5 3.5h6A1.5 1.5 0 0 1 12.5 5v6a1.5 1.5 0 0 1-1.5 1.5H5A1.5 1.5 0 0 1 3.5 11V5zM5 4.5a.5.5 0 0 0-.5.5v6a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V5a.5.5 0 0 0-.5-.5H5z" />
            </svg>
        </button>
        <button class="ttsButton btn btn-outline-light">
            <svg onclick="textToSpeech.ttsSpeak()" viewBox="0 0 16 16" class="bi bi-play" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z" />
            </svg>
        </button>
    </main>
    <script src="js/typing.js" charset="utf-8"></script>
    <script src="js/aria.js" charset="utf-8"></script>
    <script src="js/form.js" charset="utf-8"></script>
    <script src="js/textToSpeech.js" charset="utf-8"></script>
    <script src="js/particles.js" charset="utf-8"></script>
</body>

</html>