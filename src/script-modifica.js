$("#btnSave").click(() => {
    if (confirm("Sicuro delle modifiche?")) {
        var xhttp = new XMLHttpRequest();

        // Controllo quali checkbox sono selezionate
        var checked = [];
        $("input[type=checkbox]:checked").each(function () {
            checked.push($(this).val());
            console.log($(this).val());
        });

        // Controllo se qualcosa è stato modificato e se non è stato modificato nulla esco

        console.log(checked);

        // Stabilisco la connessione
        xhttp.open(
            "POST",
            "/5ATL/bandi.t.160803/GestioneMagazzino/query-modifica-categorie.php",
            true
        );
        xhttp.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
        );

        // Invio il risultato
        xhttp.send("checked=" + checked);

        // Controllo lo stato della connessione e se positivo stampo il risultato
        xhttp.onreadystatechange = () => {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                response = xhttp.responseText;

                if (response == 1) {
                    alert("Categorie modificate con successo!");
                    window.location.href =
                        "/5ATL/bandi.t.160803/GestioneMagazzino";
                }

                if (response == 0) {
                    alert("Errore nella modifica delle categorie");
                }

                console.log(response);
            }
        };
    } else {
        return;
    }
});
