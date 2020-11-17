<?php
class Sanitize
{
    public $username;
    public $password;
    public $results;

    function __construct()
    {
        $this->results = array();
    }
    // Login
    public function sanitizeLoginInput($username)
    {
        $this->username = $username;
        $this->sanitizeUsername();
        return $this->results;
    }
    public function sanitizeRegisterInput($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->sanitizeUsername();
        $this->registerPassword();
        return $this->results;
    }
    public function sanitizeUsername()
    {
        $this->username = trim($this->username);
        $this->username = filter_var($this->username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
        $this->results['username'] = $this->username;
    }
    public function registerPassword()
    {
        $this->results['password'] = password_hash($this->password, PASSWORD_DEFAULT);
    }
}
