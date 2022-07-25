<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'db_eparkir');

$con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Filed');

?>