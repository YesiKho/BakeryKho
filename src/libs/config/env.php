<?php

$_ENV = parse_ini_file('.env');

define('BASEURL', $_ENV['BASEURL']);
