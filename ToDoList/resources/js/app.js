require('./bootstrap');

var $ = window.$ = window.jQuery = require('../../node_modules/jquery/dist/jquery');

require('../../node_modules/jquery.easing/jquery.easing');
require('../../node_modules/bootstrap/dist/js/bootstrap.bundle');

require('./jquery.validationEngine-pt_BR');
require('./jquery.validationEngine');

$(document).ready(function () {
    if ($(".sidebar").length) {
        require('./private');
    }
});
