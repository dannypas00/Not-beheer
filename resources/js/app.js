require('./bootstrap');

$(document).ready(function () {
    if ($("#fixturesTable").length) {
        require('./datatables');
    }
})
