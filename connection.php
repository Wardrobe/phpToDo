<?php

global $conn;
$conn = new mysqli('localhost','root', 'root' , 'phptodo');
if($conn->connect_error) {
    die('Greska pri konekciji sa bazom');
}


?>