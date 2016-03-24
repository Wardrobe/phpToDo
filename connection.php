<?php

$conn = new mysqli('localhost','root', '' , 'phptodo');
if($conn->connect_error) {
    die('Greska pri konekciji sa bazom');
}


?>