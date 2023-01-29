<?php
header('Access-Control-Allow-Origin: *');
include 'connection.php';

$stringChecked = $_POST['checked'];
$arrayChecked = explode(',', $stringChecked);

$Codice = $_POST['Codice'];
$Nome = $_POST['Nome'];
$Descrizione = $_POST['Descrizione'];
$Attivo = $_POST['Attivo'];

// Query per eliminare le categorie selezionate
foreach($arrayChecked as $id) 
{   
    $query = "DELETE FROM `Categorie` WHERE `ID` = '$id'";
    $rs = mysqli_query($con, $query);
}

if ($rs) {
    echo 1;
} else {
    echo 0;
}

// Query per modificare le categorie


for($i=0; $i<count($Codice); $i++)
{
    $query = "UPDATE `Categorie` SET `Codice` = '$Codice[$i]', `Nome` = '$Nome[$i]', `Descrizione` = '$Descrizione[$i]', `Attivo` = '$Attivo[$i]' WHERE `ID` = '$i'";
    $rs = mysqli_query($con, $query);
}

if($rs)
{
    echo "Modifiche salvate con successo<br>clicca qui per tornare alla pagina principale";
}
else
{
    echo "Errore durante il salvataggio delle modifiche";
}
?>
