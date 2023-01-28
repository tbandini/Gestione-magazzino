// $(document).ready(() => {
//     $("tr:even").css("background-color", "#000000");
// });

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

            // Stampo il risultato
            $("#response").html(response);
        }
    };
});
