$("#insertButton").click((e) => {
    e.preventDefault();
    var xhttp = new XMLHttpRequest();

    var Magazzino = $("#Magazzino").val();

    if (Magazzino == "") {
        alert("Inserire il nome del magazzino");
        return;
    }

    // Stabilisco la connessione
    xhttp.open(
        "POST",
        "/5ATL/bandi.t.160803/GestioneMagazzino/querys/query-inserimento-ubicazione.php",
        true
    );
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Invio il risultato
    xhttp.send("Magazzino=" + Magazzino);

    // Controllo lo stato della connessione e se positivo stampo il risultato nel index.html
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            response = xhttp.responseText;

            if (response == 1) {
                alert("Categoria inserita con successo!");
                window.location.href =
                    "/5ATL/bandi.t.160803/GestioneMagazzino/scenes/tabella_ubicazioni.php";
            }

            if (response == 0) {
                alert("Errore nell'inserimento della categoria");
            }
        }
    };
});
