<?php
$hostName = "lezioni.alberghetti.it";
$userName = "5ATL_bandi.t.160803";
$password = "Sedia123!";
$databaseName = "5ATL_bandi.t.160803";

$con = mysqli_connect($hostName, $userName, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}
?>