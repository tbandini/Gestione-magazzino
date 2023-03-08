<?php
include("../fetch-data.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestione magazzino</title>
    <link rel="icon" href="./icons/warehouse-icon.svg" />
    <link rel="stylesheet" href="style.css" />
    <script src="script-modifica.js"></script>
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <header>
                <h1>
                    <a href="http://lezioni.alberghetti.it/5ATL/bandi.t.160803/GestioneMagazzino">
                        <img class="logo" src="./icons/warehouse-icon.svg" alt="warehouse-icon" /> <br />
                        Gestione magazzino
                    </a>
                </h1>
                <hr>
                <h2>categorie</h2>
            </header>
            <? echo $deleteMsg ?? ''; ?>
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
                    if (is_array($fetchData)) {
                        $sn = 1;
                        foreach ($fetchData as $data) {
                    ?>
                            <tr>
                                <td><?php echo $data['ID']; ?></td>
                                <td><?php echo $data['Codice']; ?></td>
                                <td class="tdNome"><?php echo $data['Nome']; ?></td>
                                <td><?php echo $data['Descrizione']; ?></td>
                                <td><?php if ($data['Attivo']) {
                                        echo "✅";
                                    } else {
                                        echo "❌";
                                    } ?></td>
                            </tr>
                        <?
                            $sn++;
                        }
                    } else { ?>
                        <tr>
                            <td colspan="8">
                                <? echo $fetchData; ?>
                            </td>
                        <tr>
                        <?
                    } ?>
                </tbody>
            </table>
            <div class="buttons">
                <button id="btnInserisci" onclick="document.location.href='scenes/form-nuova-categoria.php'">inserisci</button>
                <button id="btnModifica" onclick="document.location.href='scenes/form-modifica-categorie.php'">modifica</button>
            </div>
        </div>
        <footer>
            <p>
                2023 - Bandini Tommaso 5ATL ITIS F. Alberghetti
                <a href="https://github.com/tbandini"> <br />
                    <img id="github-icon" src="./icons/github-icon.svg" alt="github-icon" />
                </a>
            </p>
        </footer>
    </div>
</body>

</html>