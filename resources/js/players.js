$('#searchInput').keyup(function () {
    let query = $('#searchInput').val().trim().toLowerCase();
    $('.card-title').each(function () {
        if ($(this).text().toLowerCase().indexOf(query) < 0) {
            $(this).closest('#playerCard').fadeOut();
        } else {
            $(this).closest('#playerCard').fadeIn();
        }
    });
});
