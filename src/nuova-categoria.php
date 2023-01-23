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
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
</body>
</html>