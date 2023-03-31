<?php
include("../querys/fetch-data-categorie.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestione magazzino</title>
    <link rel="icon" href="../icons/warehouse-icon.svg" />
    <link rel="stylesheet" href="../style.css" />
    <script src="../scripts/script-modifica.js"></script>
    <script src="../scripts/script-searchbar.js"></script>
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <header>
                <h1>
                    <a href="http://lezioni.alberghetti.it/5ATL/bandi.t.160803/GestioneMagazzino">
                        <img class="logo" src="../icons/warehouse-icon.svg" alt="warehouse-icon" /> <br />
                        Gestione magazzino
                    </a>
                </h1>
                <hr>
                <h2>categorie</h2>
            </header>
            <? echo $deleteMsg ?? ''; ?>

            <topbar>
                <div class="searchbar">
                    <input type="text" id="searchInput" placeholder="Cerca..." />
                </div>
                <div class="buttons">
                    <button id="btnInserisci" onclick="document.location.href='./form-nuova-categoria.php'">
                        <img class="add-icon" src="../icons/add-icon.svg" alt="add-icon" />
                    </button>
                    <button id="btnModifica" onclick="document.location.href='./form-modifica-categorie.php'">
                        <img class="edit-icon" src="../icons/edit-icon.svg" alt="edit-icon" />
                    </button>
                </div>
            </topbar>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>codice</th>
                        <th>nome</th>
                        <th>descrizione</th>
                        <th>attivo</th>
                    </tr>
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
                                <td><?php echo $data['Nome']; ?></td>
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
        </div>
        <footer>
            <p>
                2023 - Bandini Tommaso 5ATL ITIS F. Alberghetti
                <a href="https://github.com/tbandini"> <br />
                    <img id="github-icon" src="../icons/github-icon.svg" alt="github-icon" />
                </a>
            </p>
        </footer>
    </div>
</body>

</html>