<?php
header('Access-Control-Allow-Origin: *');
include 'connection.php';

$Codice = $_POST['Codice'];
$Nome = $_POST['Nome'];
$Descrizione = $_POST['Descrizione'];
$Attivo = $_POST['Attivo'];

// Query per inserire una nuova categoria che crea a sua volta una tabella collegata a questa categoria
$query = "INSERT INTO `Categorie` (`ID`, `Codice`, `Nome`, `Descrizione`, `Attivo`) VALUES (null, '$Codice', '$Nome', '$Descrizione', '$Attivo');
		CREATE TABLE `$Nome` (
			`ID` int(11) NOT NULL AUTO_INCREMENT,
			`Codice` varchar(255) NOT NULL,
			`Nome` varchar(255) NOT NULL,
			`Descrizione` varchar(255) NOT NULL,
			`Attivo` varchar(255) NOT NULL,
			PRIMARY KEY (`ID`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

$rs = mysqli_query($con, $query);

if($rs) {
	echo 1;
} else {
	echo 0;
}

?>
