<?php
include '../scripts/connection.php';

header('Access-Control-Allow-Origin: *');

$Magazzino = $_POST['Magazzino'];

// Query per inserire una nuova categoria
$query = "INSERT INTO `Ubicazioni` (`ID`, `Magazzino`) VALUES (null, '$Magazzino');";

$rs = mysqli_query($con, $query);

if ($rs) {
    echo 1;
} else {
    echo 0;
}
