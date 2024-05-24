<?php
$env_path = __DIR__ . '/../.env';
$_ENV = parse_ini_file($env_path);

define('BASEURL', $_ENV['BASEURL']);
define('BASEDIR', $_ENV['BASEDIR']);
