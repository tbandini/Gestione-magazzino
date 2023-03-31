<?php
include '../scripts/connection.php';

header('Access-Control-Allow-Origin: *');

$id = $_POST['id'];
$ids = explode(',', $id);

$codici = $_POST['codici'];
$arrayCodici = explode(',', $codici);

$nomi = $_POST['nomi'];
$arrayNomi = explode(',', $nomi);

$descrizioni = $_POST['descrizioni'];
$arrayDescrizioni = explode(',', $descrizioni);

$stati = $_POST['stati'];
$arrayStati = explode(',', $stati);

$stringChecked = $_POST['checked'];
$arrayChecked = explode(',', $stringChecked);

// Query per modificare le categorie
for ($i = 0; $i < count($arrayCodici); $i++) {
    $query = "UPDATE `Categorie` SET `Codice` = '$arrayCodici[$i]', `Nome` = '$arrayNomi[$i]', `Descrizione` = '$arrayDescrizioni[$i]', `Attivo` = '$arrayStati[$i]' WHERE `ID` = '$ids[$i]'";
    $queryModifiche = mysqli_query($con, $query);
}

if ($queryModifiche) {
    echo 1;
} else {
    echo 0;
}

echo " || ";

// Query per eliminare le categorie selezionate
foreach ($arrayChecked as $id) {
    $query = "DELETE FROM `Categorie` WHERE `ID` = '$id'";
    $queryEliminazione = mysqli_query($con, $query);
}

if ($queryEliminazione) {
    echo 1;
} else {
    echo 0;
}
