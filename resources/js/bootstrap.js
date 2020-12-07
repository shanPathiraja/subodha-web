import 'simplebar';
import 'simplebar/dist/simplebar.css';

window._ = require('lodash');


try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    window.moment = require('moment');

    require('bootstrap');
    require('@fortawesome/fontawesome-free/js/all');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
