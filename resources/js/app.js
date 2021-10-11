require('./bootstrap');

$(document).ready(function () {
    if ($("#fixturesTable").length) {
        require('./datatables');
    }

    if ($("#fixtureComponent").length) {
        require('./fixturecontrol');
    }
});
