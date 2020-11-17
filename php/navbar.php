<!--Navigation Bar-->
<?php // TODO: Change navbar content / don't show login & register if already logged in 
?>
<nav class="navbar navbar-expand-sm fixed-top navbar-dark justify-content-between">
    <div class="container">
        <a class="navbar-brand">Cat Racer</a>
        <div class="btn-group">
            <?php
            if (!isset($_SESSION['loggedin'])) echo '
            <button id="buttonLogin" class="btn btn btn-outline-light my-2 my-sm-0">Login</button>
            <button id="buttonRegister" class="btn btn btn-outline-light my-2 my-sm-0">Register</button>
            ';
            if (isset($_SESSION['loggedin'])) echo '
            <a class="navbar-brand">Hello, ' . $_SESSION['username'] . '</a>
            <button onclick="location.href=`php/account/logout.php`;" id="buttonLogout" class="btn btn btn-outline-light my-2 my-sm-0">Logout</button>
            ';
            ?>
        </div>
    </div>
</nav>

<!-- Login & Register popups -->
<div id="floatingForm">
    <div id="floatingFormLogin" class="floatingFormBox p-4 shadow-sm rounded">
        <form method='post' action="php/account/login.php">
            <h3>Login</h3>
            <div class="form-group">
                <label for="inputLoginUsername">Username</label>
                <input name='username' type="text" class="form-control" id="inputLoginUsername" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="inputLoginPassword">Password</label>
                <input name='password' type="password" class="form-control" id="inputLoginPassword" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div id="floatingFormRegister" class="floatingFormBox p-4 shadow-sm rounded">
        <form method='post' action="php/account/register.php">
            <h3>Register</h3>
            <div class="form-group">
                <label for="inputRegisterUsername">Username</label>
                <input name='username' type="text" class="form-control" id="inputRegisterUsername" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="inputRegisterPassword">Password</label>
                <input name='password' type="password" class="form-control" id="inputRegisterPassword" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>