require('./bootstrap');

var $ = window.$ = window.jQuery = require('../../node_modules/jquery/dist/jquery');

require('../../node_modules/jquery.easing/jquery.easing');
require('../../node_modules/bootstrap/dist/js/bootstrap.bundle');

require('../jQuery-Validation-Engine-3.0.0/js/languages/jquery.validationEngine-pt_BR');
require('../jQuery-Validation-Engine-3.0.0/js/jquery.validationEngine');

window.__defaul_validationEngine_options = {
    promptPosition: 'topLeft'
};

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});
