<?php
include("../querys/fetch-data-ubicazioni.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="../scripts/script-modifica-ubicazioni.js" defer="defer"></script>
    <title>Gestione magazzino</title>
    <link rel="icon" href="../icons/warehouse-icon.svg" />
    <link rel="stylesheet" href="../style.css" />
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
                <h2> <a href="http://lezioni.alberghetti.it/5ATL/bandi.t.160803/GestioneMagazzino/scenes/tabella_ubicazioni.php">
                        ubicazioni</a>/modifica</h2>
            </header>

            <topbar>
                <div class="searchbar">
                    <input type="text" id="searchInput" placeholder="Cerca..." />
                </div>
                <div class="buttons">
                    <button id="btnSave">
                        <img class="save-icon" src="../icons/save-icon.svg" alt="save-icon" />
                    </button>
                </div>
            </topbar>

            <table>
                <thead>
                    <th>ID</th>
                    <th>nome</th>
                </thead>
                <tbody>
                    <?
                    if (is_array($fetchData)) {
                        $sn = 1;
                        foreach ($fetchData as $data) {
                    ?>
                            <tr>
                                <td>
                                    <p class="id"><?php echo $data['ID']; ?></p>
                                </td>
                                <td>
                                    <input type="text" class="magazzino" value="<?php echo $data['Magazzino']; ?>" />
                                </td>
                                <td>
                                    <input type="checkbox" name="delete[]" value="<?php echo $data['ID']; ?>" />
                                </td>
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