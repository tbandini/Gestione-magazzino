<?php
header('Access-Control-Allow-Origin: *');
include 'connection.php';

$Codice = $_POST['Codice'];
$Nome = $_POST['Nome'];
$Descrizione = $_POST['Descrizione'];
$Attivo = $_POST['Attivo'];

// Query per inserire una nuova categoria
$query = "INSERT INTO `Categorie` (`ID`, `Codice`, `Nome`, `Descrizione`, `Attivo`) VALUES (null, '$Codice', '$Nome', '$Descrizione', '$Attivo');";

$rs = mysqli_query($con, $query);

if ($rs) {
	echo 1;
} else {
	echo 0;
}
?>	