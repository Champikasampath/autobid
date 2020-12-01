require('./bootstrap');
window.$ = require('jquery');

import Item from './item';

(new Item()).displayBindOnLoad();
// (new Item()).displayOnAction();