<?php
// TODO: Use some better way to have an "absolute" directory path so moving this file won't break filepaths.
require('../dbConnection.php');
require('../filterFormInput.php');
require('../session.php');

class Login extends dbConnection
{
    public $username;
    public $password;
    public $results;

    function __construct()
    {
        if (empty($_POST['username']) || empty($_POST['password'])) header("Location: " . "../../index.php");

        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
    }
    public function sanitizeInput()
    {
        $sanitizeRegister = new Sanitize();
        $this->results = $sanitizeRegister->sanitizeLoginInput($this->username);
        $this->loginQuery();
    }
    public function loginQuery()
    {
        try {
            // Prepare query
            $statement = $this->getDbObject()->prepare('SELECT * FROM users WHERE username=:username LIMIT 1');
            $statement->execute(['username' => $this->username]);
            // Execute query
            $user = $statement->fetch();
        } catch (PDOException $e) {
            // TODO: Add proper error site and logging
            $this->loginFail($e->getMessage());
        }
        $connection = NULL;
        if (empty($user['username']) || empty($user['password'])) $this->loginFail('User data not defined');
        if ($user['username'] == $this->username && password_verify($this->password, $user['password'])) $this->loginSuccess($user);
    }
    public function loginSuccess($user)
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = htmlspecialchars($user['username']);
        $_SESSION['role'] = $user['role'];
        header("Location: " . "../../index.php");
    }
    public function loginFail($e)
    {
        // TODO: Add proper error site and logging
        header("Location: " . "../../fail.php");
    }
}
$loginAccount = new Login();
$loginAccount->sanitizeInput();
