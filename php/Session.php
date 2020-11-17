<?php
class Session
{
    function __construct()
    {
        return $this->startSession();
    }

    function startSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    function destroySession()
    {
        session_destroy();
        $_SESSION = NULL;
    }
}
$sessionNew = new Session();
