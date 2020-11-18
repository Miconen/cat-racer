<!--Navigation Bar-->
<?php // TODO: Change navbar content / don't show login & register if already logged in 
?>
<nav class="navbar navbar-expand-sm fixed-top navbar-dark justify-content-between">
    <div class="container">
        <a href="index.php" class="navbar-brand h1" aria-label="Cat Racer frontpage link">Cat Racer</a>
        <div class="btn-group">
            <?php
            if (!isset($_SESSION['loggedin'])) echo '
            <button id="buttonLogin" class="btn btn-outline-light my-2 my-sm-0" aria-label="Open login form" aria-expanded="false">Login</button>
            <button id="buttonRegister" class="btn btn-outline-light my-2 my-sm-0" aria-label="Open registeration form" aria-expanded="false">Register</button>';
            if (isset($_SESSION['loggedin'])) echo '
            <a class="navbar-brand">Hello, ' . $_SESSION['username'] . '</a>
            <button onclick="location.href=`php/account/logout.php`;" id="buttonLogout" class="btn btn-outline-light my-2 my-sm-0" aria-label="Logout">Logout</button>
            ';
            ?>
        </div>
    </div>
</nav>

<!-- Login & Register popups -->
<?php // TODO: Add X button to exit out of form/modal 
?>
<div id="floatingForm">
    <form method='post' action="php/account/login.php" id="floatingFormLogin" class="floatingFormBox p-4 shadow-sm rounded" aria-label="Login information" aria-modal="true">
        <h3>Login</h3>
        <div tabindex="0" onfocus="document.getElementById('inputLoginSubmit').focus()"></div>
        <div class="form-group">
            <label for="inputLoginUsername">Username</label>
            <input name='username' type="text" class="loginInput form-control" id="inputLoginUsername" placeholder="Enter username" aria-label="Login username" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="inputLoginPassword">Password</label>
            <input name='password' type="password" class="loginInput form-control" id="inputLoginPassword" placeholder="Enter password" aria-label="Login password" autocomplete="off">
        </div>
        <button type="submit" class="loginInput btn btn-primary" id="inputLoginSubmit">Submit</button>
        <div tabindex="0" onfocus="document.getElementById('inputLoginUsername').focus()"></div>
    </form>
    <form method='post' action="php/account/register.php" id="floatingFormRegister" class="floatingFormBox p-4 shadow-sm rounded" aria-label="Registeration information" aria-modal="true">
        <h3>Register</h3>
        <div tabindex="0" onfocus="document.getElementById('inputRegisterSubmit').focus()"></div>
        <div class="form-group">
            <label for="inputRegisterUsername">Username</label>
            <input name='username' type="text" class="registerInput form-control" id="inputRegisterUsername" placeholder="Enter username" aria-label="Registeration username" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="inputRegisterPassword">Password</label>
            <input name='password' type="password" class="registerInput form-control" id="inputRegisterPassword" placeholder="Password" aria-label="Registeration password" autocomplete="off">
        </div>
        <button type="submit" class="registerInput btn btn-primary" id="inputRegisterSubmit">Submit</button>
        <div tabindex="0" onfocus="document.getElementById('inputRegisterUsername').focus()"></div>
    </form>
</div>