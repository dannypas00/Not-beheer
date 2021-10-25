datatable = $('#fixturesTable').DataTable(
    {dom: 'lrtip'}
);

$('#searchInput').keyup(function () {
    datatable.search($(this).val()).draw() ;
})
