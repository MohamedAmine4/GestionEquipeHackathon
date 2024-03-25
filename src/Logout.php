<?php

session_start();
$_SESSION = array();  // On écrase le tableau de session
session_destroy();
header('Location: Login.php');

?>