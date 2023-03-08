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
    <script src="../script-modifica.js" defer="defer"></script>
    <title>Gestione magazzino</title>
    <link rel="icon" href="../icons/warehouse-icon.svg" />
    <link rel="stylesheet" href="../style.css" />
    <script src="../script-searchbar.js"></script>
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
                <h2>modifica-categorie</h2>
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
                    <th>codice</th>
                    <th>nome</th>
                    <th>descrizione</th>
                    <th>attivo</th>
                    <th>elimina</th>
                </thead>
                <tbody>
                    <?
                    if (is_array($fetchData)) {
                        $sn = 1;
                        foreach ($fetchData as $data) {
                    ?>
                            <tr>
                                <td>
                                    <input type="text" class="codice" value="<?php echo $data['Codice']; ?>" />
                                </td>
                                <td>
                                    <input type="text" class="nome" value="<?php echo $data['Nome']; ?>" />
                                </td>
                                <td>
                                    <textarea class="descrizione"><?php echo $data['Descrizione']; ?></textarea>
                                </td>
                                <td>
                                    <select class="attivo" name="Attivo[]">
                                        <option value="1" <?php if ($data['Attivo'] == 1) {
                                                                echo "selected";
                                                            } ?>>Attivo</option>
                                        <option value="0" <?php if ($data['Attivo'] == 0) {
                                                                echo "selected";
                                                            } ?>>Non attivo</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="checkbox" name="delete[]" value="<?php echo $data['ID']; ?>" />
                                </td>
                            </tr>
                        <? $sn++;
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