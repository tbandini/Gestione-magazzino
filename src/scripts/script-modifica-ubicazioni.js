let magazziniPre = [];

$(document).ready(() => {
    // Controllo lo stato di tutto prima delle modifiche e le salvo in un array
    $("input[class=magazzino]").each(function () {
        magazziniPre.push($(this).val());
    });
    console.log(magazziniPre);
});

$("#btnSave").click(() => {
    // Controllo quali checkbox sono selezionate per l'eliminazione della riga
    let checked = [];
    $("input[type=checkbox]:checked").each(function () {
        checked.push($(this).val());
    });

    // Controllo che cosa è stato modificato e lo salvo in un array se invece non è stato modificato inserisco uno 0
    let id = [];
    let magazzini = [];

    // Qui mi salvo l'ID di ogni riga
    $("p[class=id]").each(function () {
        id.push($(this).text());
    });

    // Variabile per controllo modifiche
    let modificati = 0;

    i = 0;
    $("input[class=magazzino]").each(function () {
        magazzini.push($(this).val());
        if ($(this).val() != magazziniPre[i]) modificati++;
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
            "/5ATL/bandi.t.160803/GestioneMagazzino/querys/query-modifica-ubicazioni.php",
            true
        );

        xhttp.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
        );

        console.log(magazzini);
        console.log(checked);

        // Invio il risultato
        xhttp.send(
            "id=" + id + "&magazzini=" + magazzini + "&checked=" + checked
        );

        // Controllo se le query sono state eseguite correttamente e se positivo stampo il risultato
        xhttp.onreadystatechange = () => {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                response = xhttp.responseText;
                let responseArray = xhttp.responseText.split("||");
                if (responseArray[0] == 1 && responseArray[1] == 1) {
                    alert("Ubicazioni modificate con successo!");
                    window.location.href =
                        "/5ATL/bandi.t.160803/GestioneMagazzino/scenes/tabella_ubicazioni.php";
                }

                if (responseArray[0] == 0 && responseArray[1] == 1) {
                    alert("Errore nella modifica delle ubicazioni");
                }

                if (responseArray[0] == 1 && responseArray[1] == 0) {
                    alert("Errore nella cancellazione delle ubicazioni");
                }

                if (responseArray[0] == 0 && responseArray[1] == 0) {
                    alert(
                        "Errore nella cancellazione e modifica delle ubicazioni"
                    );
                }
            }
        };
    } else {
        return;
    }
});
