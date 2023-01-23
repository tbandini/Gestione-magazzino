<?php
include 'connection.php';

$Codice = $_POST['Codice'];
$Nome = $_POST['Nome'];
$Descrizione = $_POST['Descrizione'];
$Attivo = $_POST['Attivo'];

$query = "INSERT INTO `Categorie` (`ID`, `Codice`, `Nome`, `Descrizione`, `Attivo`) VALUES ('0', '$Codice', '$Nome', '$Descrizione', '$Attivo')";

$rs = mysqli_query($con, $query);

if($rs)
{
	echo "Categoria inserita con successo";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Gestione magazzino</title>
	<link rel="stylesheet" href="style.css" />
	<script src="index.js" defer></script>
</head>
<body>
	<header>
		<h1>Gestione magazzino</h1>
		<h2>inserimento-categorie</h2>
	</header>
	<form form method="POST" id="queryForm">
		<label for="Codice">Codice:</label>
		<input type="text" name="Codice" id="Codice">

		<label for="Nome">Nome:</label>
		<input type="text" name="Nome" id="Nome">

		<label for="Descrizione">Descrizione:</label>
		<input type="text" name="Descrizione" id="Descrizione">

		<label for="radioSelect">Attivo:</label>
		<div name="radioSelect">
			<input type="radio" name="attivo" id="Attivo" value="1">
			<p for="Attivo">Si</p>
			<input type="radio" name="attivo" id="nonAttivo" value="0">
			<p for="nonAttivo">No</p>
		</div>

		<button id="btn" type="submit">Invia</button>
	</form>
</body>
</html>