
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');

    require('datatables.net-bs4');

    require("@chenfengyuan/datepicker");
} catch (e) {}
