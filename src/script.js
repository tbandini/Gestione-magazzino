var request;

$("#reload").click((e) => {
    e.preventDefault();
    var xhttp = new XMLHttpRequest();

    // Stabilisco la connessione
    xhttp.open("POST", "/5ATL/bandi.t.160803/GestioneMagazzino", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    if (request) {
        request.abort();
    }
    request = $.ajax({
        url: "reload.php",
        type: "post",
    });

    request.done((response, textStatus, jqXHR) => {
        console.log("Hooray, it worked!");
        $("#tabella").html(response);
    });

    request.fail((jqXHR, textStatus, errorThrown) => {
        console.error(
            "The following error occurred: " + textStatus,
            errorThrown
        );
    });
});
