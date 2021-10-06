require('./bootstrap');
$(document).ready(function () {

    if ($("#fixtureComponent").length) {
        require('./fixturecontrol');
    }
});

