$(document).ready(function () {
    $("#searchInput").on("input", function () {
        var searchText = $("#searchInput").val().toLowerCase();
        $("table tr").each(function () {
            if ($(this).text().toLowerCase().indexOf(searchText) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
});
