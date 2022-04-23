/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

import './styles/app.scss';

import 'bootstrap-icons/font/bootstrap-icons.css';

// start the Stimulus application
import './bootstrap';

const $ = require('jquery');

require('bootstrap');

$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});