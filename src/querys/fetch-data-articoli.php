<?php
include '../scripts/connection.php';

header('Access-Control-Allow-Origin: *');

$db = $con;
$tableName = "Prodotti";
$columns = ['ID', 'Nome', 'Categoria', 'Ubicazione', 'Prezzo', 'Aliquota', 'Giacenza', 'Scorta', 'Attivo'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Erroe di connessione";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Colonne non valide";
    } elseif (empty($tableName)) {
        $msg = "Nome tabella vuoto";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY id ASC";
        $result = $db->query($query);
        if ($result == true) {
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg = $row;
            } else
                $msg = "Dati non trovati";
        } else
            $msg = mysqli_error($db);
    }
    return $msg;
}
