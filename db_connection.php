<?php

//Connection server info
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'assignment7';

//Create the db connection
$db = new mysqli($servername, $username, $password, $dbname);

//Check for connection errors
if ($db->connect_error) {
    die('Connection failed...');
}
