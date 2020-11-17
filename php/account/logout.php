<?php
require('../session.php');
$sessionNew->destroySession();
header("Location: " . "../../index.php");
