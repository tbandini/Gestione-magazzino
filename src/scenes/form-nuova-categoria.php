<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="../script-categoria.js" defer="defer"></script>
    <title>Gestione magazzino</title>
    <link rel="icon" href="../icons/warehouse-icon.svg" />
    <link rel="stylesheet" href="../style.css" />
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
                <h2>inserimento-categoria</h2>
            </header>
            <form id="queryForm" method="POST">
                <label for="Codice">Codice:</label>
                <input type="text" name="Codice" id="Codice" required />

                <label for="Nome">Nome:</label>
                <input type="text" name="Nome" id="Nome" required />

                <label for="Descrizione">Descrizione:</label>
                <textarea name="Descrizione" id="Descrizione" required></textarea>

                <label for="radioSelect">Attivo:</label>
                <div name="radioSelect" class="radioSelect">
                    <input type="radio" name="attivo" id="attivo" value="1" />
                    <p for="attivo">Si</p>
                    <input type="radio" name="attivo" id="inattivo" value="0" />
                    <p for="inattivo">No</p>
                </div>

                <button id="insertButton" class="insertButton" type="submit">Inserisci</button>
            </form>

            <p id="response"></p>
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