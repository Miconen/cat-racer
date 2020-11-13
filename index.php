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
        <nav class="navbar navbar-expand-sm fixed-top navbar-dark justify-content-between">
            <div class="container">
                <a class="navbar-brand">Cat Racer</a>
                <div class="btn-group">
                    <button id="buttonLogin" class="btn btn btn-outline-light my-2 my-sm-0">Login</button>
                    <button id="buttonRegister" class="btn btn btn-outline-light my-2 my-sm-0">Register</button>
                </div>
            </div>
        </nav>
        <!--Particle background-->
        <header>
            <canvas id="canvas" width="300" height="300"></canvas>
        </header>
        <!--Main content after this-->
        <div id="floatingForm">
            <div id="floatingFormLogin" class="floatingFormBox p-4 shadow-sm rounded">
                <form>
                    <h3>Login</h3>
                    <div class="form-group">
                        <label for="inputLoginUsername">Username</label>
                        <input type="text" class="form-control" id="inputLoginUsername" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="inputLoginPassword">Password</label>
                        <input type="password" class="form-control" id="inputLoginPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
            <div id="floatingFormRegister" class="floatingFormBox p-4 shadow-sm rounded">
                <form>
                    <h3>Register</h3>
                    <div class="form-group">
                        <label for="inputRegisterUsername">Username</label>
                        <input type="text" class="form-control" id="inputRegisterUsername" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="inputRegisterPassword">Password</label>
                        <input type="password" class="form-control" id="inputRegisterPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
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
        <script src="js/form.js" charset="utf-8"></script>
        <script src="js/particles.js" charset="utf-8"></script>
    </body>
</html>
