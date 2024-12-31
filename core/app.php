<?php

require "config/app.php";

require 'App/Controller/Auth.php';

$sam = new Auth();
$Auth1 = $sam->check();

if ($Auth1['status'] == 'fail') {
    return $Auth1['message'];
}