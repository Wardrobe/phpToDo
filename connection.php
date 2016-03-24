<?php
$connection = mysqli_connect('localhost','root', '' , 'phptodo');
if($connection -> connect_error) {
    die('Greska pri konekciji sa bazom');
}


?>