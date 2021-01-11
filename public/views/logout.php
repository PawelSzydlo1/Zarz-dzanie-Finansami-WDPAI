<?php
session_start();
unset($_SESSION['user']);
session_destroy();
$url="http://$_SERVER[HTTP_HOST]";
header("Location: {$url}/");