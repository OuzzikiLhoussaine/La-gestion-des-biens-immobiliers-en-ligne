<?php
$con = mysqli_connect('localhost', 'root', '', 'estateagency');

// Check connection and TERMINATE if it fails
if (!$con) {
    die("Connection failed: " . mysqli_connect_error()); // This stops the script
}
?>