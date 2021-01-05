<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('your_expanses', 'DefaultController');
Router::get('contact', 'DefaultController');

Router::post('login', 'SecurityController');
Router::post('registration', 'SecurityController');

Router::run($path);