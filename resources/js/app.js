require('./bootstrap');
window.$ = require('jquery');

import Item from './item';
import Bid from './bid';

(new Item()).displayBindOnLoad();
(new Bid()).init();