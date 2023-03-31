<?php
include("../querys/fetch-data-articoli.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestione magazzino</title>
    <link rel="icon" href="../icons/warehouse-icon.svg" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../articoliStyle.css" />
    <script src="../scripts/script-inserimento-articoli.js"></script>
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
                <h2>articoli</h2>
            </header>
            <? echo $deleteMsg ?? ''; ?>

            <topbar>
                <div class="searchbar">
                    <input type="text" id="searchInput" placeholder="Cerca..." />
                </div>
                <!-- I bottoni vanno fatti in stile react, quindi quando cliccki metti un hide alla tabella e metti show ai vari form di inserimento e modifica -->
                <div class="buttons">
                    <button id="btnInserisci">
                        <img class="add-icon" src="../icons/add-icon.svg" alt="add-icon" />
                    </button>
                    <button id="btnModifica">
                        <img class="edit-icon" src="../icons/edit-icon.svg" alt="edit-icon" />
                    </button>
                </div>
            </topbar>

            <table id="tArticoli">
                <thead>
                    <th>ID</th>
                    <th>nome</th>
                    <th>categoria</th>
                    <th>ubicazione</th>
                    <th>prezzo</th>
                    <th>aliquota</th>
                    <th>giacenza</th>
                    <th>scorta</th>
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
                                <td><?php echo $data['Nome']; ?></td>
                                <td><?php echo $data['Categoria']; ?></td>
                                <td><?php echo $data['Ubicazione']; ?></td>
                                <td><?php echo $data['Prezzo']; ?></td>
                                <td><?php echo $data['Aliquota']; ?></td>
                                <td><?php echo $data['Giacenza']; ?></td>
                                <td><?php echo $data['Scorta']; ?></td>
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