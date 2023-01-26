<?php
include("fetch-data.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gestione magazzino</title>
        <link rel="icon" href="./icons/icons8-warehouse-nawicon-outline-color-96.png" />
        <link rel="stylesheet" href="style.css" />
        <script src="index.js" defer></script>
    </head>
    <body>
        <header>
            <h1>Gestione magazzino</h1>
            <h2>categorie</h2>
        </header>
        <div class="container">
        <? echo $deleteMsg??''; ?>
            <table>
                <thead>
                    <th>ID</th>
                    <th>codice</th>
                    <th>nome</th>
                    <th>descrizione</th>
                    <th>attivo</th>
                </thead>
                <tbody>
                <?
                    if(is_array($fetchData)){      
                    $sn=1;
                    foreach($fetchData as $data){
                ?>
                    <td><?php echo $data['ID']; ?></td>
                    <td><?php echo $data['Codice']; ?></td>
                    <td><?php echo $data['Nome']; ?></td>
                    <td><?php echo $data['Descrizione']; ?></td>
                    <td><?php if ($data['Attivo']) {echo "✅";} else {echo "❌";}?></td>
                <?
                    $sn++;}}else{ ?>
                <tr>
                    <td colspan="8">
                <? echo $fetchData; ?>
                </td>
                <tr>
                <?
                }?>
            </tbody>
            </table>
            <div class="buttons">
                <button id="btnInserisci" onclick="document.location.href='nuova-categoria.php'">inserisci</button>
                <button id="btnModifica">modifica</button>
            </div>
        </div>
        <footer>
            <p>
                2023 - Bandini Tommaso 5ATL ITIS F. Alberghetti
                <a href="https://github.com/tbandini">Github</a>
            </p>
        </footer>
    </body>
</html>
