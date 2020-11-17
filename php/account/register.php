<?php
// TODO: Use some better way to have an "absolute" directory path so moving this file won't break filepaths.
require('../dbConnection.php');
require('../filterFormInput.php');
require('../session.php');

class Register extends dbConnection
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
        $this->results = $sanitizeRegister->sanitizeRegisterInput($this->username, $this->password);
        $this->availabilityQuery();
    }
    public function availabilityQuery()
    {
        try {
            // Prepare query
            $statement = $this->getDbObject()->prepare('SELECT username FROM users WHERE username=:username LIMIT 1');
            $statement->execute(['username' => $this->username]);
            // Execute query
            $user = $statement->fetch();
        } catch (PDOException $e) {
            // TODO: Add proper error site and logging
            $this->registerFail($e->getMessage());
        }
        $connection = NULL;
        if (!$user) $this->registerQuery($user);
        if ($user) $this->registerFail('This user already exists');
    }
    public function registerQuery()
    {
        try {
            // Prepare query
            $statement = $this->getDbObject()->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, "user")');
            $statement->bindParam(':username', $this->results['username']);
            $statement->bindParam(':password', $this->results['password']);
            // Execute query
            $statement->execute();
        } catch (PDOException $e) {
            // TODO: Add proper error site and logging
            $this->registerFail($e->getMessage());
        }
        $connection = NULL;
        $this->registerSuccess();
    }
    public function registerSuccess()
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $this->results['username'];
        header("Location: " . "../../index.php");
    }
    public function registerFail($e)
    {
        // TODO: Add proper error site and logging
        header("Location: " . "../../fail.php");
    }
}
$registerAccount = new Register();
$registerAccount->sanitizeInput();
