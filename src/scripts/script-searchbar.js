$(document).ready(function () {
    $("#searchInput").on("input", function () {
        var searchText = $(this).val().toLowerCase();
        $("table tbody tr").each(function () {
            if (
                searchText === "" ||
                $(this).text().toLowerCase().indexOf(searchText) !== -1
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
