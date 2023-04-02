let codiciPre = [];
let nomiPre = [];
let descrizioniPre = [];
let statiPre = [];

$(document).ready(() => {
    // Controllo lo stato di tutto prima delle modifiche e le salvo in un array
    $("input[class=codice]").each(function () {
        codiciPre.push($(this).val());
    });

    $("input[class=nome]").each(function () {
        nomiPre.push($(this).val());
    });

    $("textarea[class=descrizione]").each(function () {
        descrizioniPre.push($(this).val());
    });
});

$("#btnSave").click(() => {
    // Controllo quali checkbox sono selezionate per l'eliminazione della riga
    let checked = [];
    $("input[type=checkbox]:checked").each(function () {
        checked.push($(this).val());
    });

    // Controllo che cosa è stato modificato e lo salvo in un array se invece non è stato modificato inserisco uno 0
    let id = [];
    let codici = [];
    let nomi = [];
    let descrizioni = [];
    let stati = [];

    // Qui mi salvo l'ID di ogni riga
    $("p[class=id]").each(function () {
        id.push($(this).text());
    });

    // Variabile per controllo modifiche
    let modificati = 0;

    i = 0;
    $("input[class=codice]").each(function () {
        codici.push($(this).val());
        if ($(this).val() != codiciPre[i]) modificati++;
        i++;
    });

    i = 0;
    $("input[class=nome]").each(function () {
        nomi.push($(this).val());
        if ($(this).val() != nomiPre[i]) modificati++;
        i++;
    });

    i = 0;
    $("textarea[class=descrizione]").each(function () {
        descrizioni.push($(this).val());
        if ($(this).val() != descrizioniPre[i]) modificati++;
        i++;
    });

    i = 0;
    $("select[class=attivo]").each(function () {
        stati.push($(this).val());
        if ($(this).val() != statiPre[i]) modificati++;
        i++;
    });

    if (modificati == 0 && checked.length == 0) {
        alert("Nessuna modifica effettuata");
        return;
    }

    if (confirm("Sicuro delle modifiche?")) {
        let xhttp = new XMLHttpRequest();

        // Stabilisco la connessione
        xhttp.open(
            "POST",
            "/5ATL/bandi.t.160803/GestioneMagazzino/querys/query-modifica-categorie.php",
            true
        );

        xhttp.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
        );

        // Invio il risultato
        xhttp.send(
            "id=" +
                id +
                "&codici=" +
                codici +
                "&nomi=" +
                nomi +
                "&descrizioni=" +
                descrizioni +
                "&stati=" +
                stati +
                "&checked=" +
                checked
        );

        // Controllo se le query sono state eseguite correttamente e se positivo stampo il risultato
        xhttp.onreadystatechange = () => {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                response = xhttp.responseText;
                let responseArray = xhttp.responseText.split("||");
                if (responseArray[0] == 1 && responseArray[1] == 1) {
                    alert("Categorie modificate con successo!");
                    window.location.href =
                        "/5ATL/bandi.t.160803/GestioneMagazzino/scenes/tabella_categorie.php";
                }

                if (responseArray[0] == 0 && responseArray[1] == 1) {
                    alert("Errore nella modifica delle categorie");
                }

                if (responseArray[0] == 1 && responseArray[1] == 0) {
                    alert("Errore nella cancellazione delle categorie");
                }

                if (responseArray[0] == 0 && responseArray[1] == 0) {
                    alert(
                        "Errore nella cancellazione e modifica delle categorie"
                    );
                }
            }
        };
    } else {
        return;
    }
});
