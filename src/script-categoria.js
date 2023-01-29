$("#insertButton").click((e) => {
    e.preventDefault();
    var xhttp = new XMLHttpRequest();

    var Codice = $("#Codice").val();
    var Nome = $("#Nome").val();
    var Descrizione = $("#Descrizione").val();

    if ($("#attivo").is(":checked")) {
        var stato = 1;
    } else if ($("#inattivo").is(":checked")) {
        var stato = 0;
    } else {
        alert("Seleziona uno stato");
        return;
    }

    if (Codice == "" || Nome == "" || Descrizione == "") {
        alert("Compila tutti i campi");
        return;
    }

    // Stabilisco la connessione
    xhttp.open(
        "POST",
        "/5ATL/bandi.t.160803/GestioneMagazzino/query-categoria.php",
        true
    );
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Invio il risultato
    xhttp.send(
        "Codice=" +
            Codice +
            "&Nome=" +
            Nome +
            "&Descrizione=" +
            Descrizione +
            "&Attivo=" +
            stato
    );

    // Controllo lo stato della connessione e se positivo stampo il risultato nel index.html
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            response = xhttp.responseText;

            if (response == 1) {
                alert("Categoria inserita con successo!");
                window.location.href = "/5ATL/bandi.t.160803/GestioneMagazzino";
            }

            if (response == 0) {
                alert("Errore nell'inserimento della categoria");
            }
        }
    };
});
