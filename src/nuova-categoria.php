<?php
header('Access-Control-Allow-Origin: *');
include 'connection.php';

$Codice = $_POST['Codice'];
$Nome = $_POST['Nome'];
$Descrizione = $_POST['Descrizione'];
$Attivo = $_POST['Attivo'];

$query = "INSERT INTO `Categorie` (`ID`, `Codice`, `Nome`, `Descrizione`, `Attivo`) VALUES ('0', '$Codice', '$Nome', '$Descrizione', '$Attivo')";

$rs = mysqli_query($con, $query);

if($rs)
{
	echo "Categoria inserita con successo<br>clicca qui per tornare alla pagina principale";
}
else
{
	echo "Errore durante l'inserimento della categoria";
}

?>
