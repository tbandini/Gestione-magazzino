<?php
include '../scripts/connection.php';

header('Access-Control-Allow-Origin: *');

$id = $_POST['id'];
$ids = explode(',', $id);

$magazzini = $_POST['magazzini'];
$arrayMagazzini = explode(',', $magazzini);

$stringChecked = $_POST['checked'];
$arrayChecked = explode(',', $stringChecked);

$queryModifiche = false;

// Query per modificare le ubicazioni
for ($i = 0; $i < count($ids); $i++) {
    $query = "UPDATE `Ubicazioni` SET `Magazzino` = '$arrayMagazzini[$i]' WHERE `ID` = '$ids[$i]'";
    $queryModifiche = mysqli_query($con, $query);
}

if ($queryModifiche) {
    echo 1;
} else {
    echo 0;
}

echo " || ";

// Query per eliminare le ubicazioni selezionate
foreach ($arrayChecked as $id) {
    $query = "DELETE FROM `Ubicazioni` WHERE `ID` = '$id'";
    $queryEliminazione = mysqli_query($con, $query);
}

if ($queryEliminazione) {
    echo 1;
} else {
    echo 0;
}
