require('./bootstrap');
window.$ = require('jquery');

import Item from './item';
import Bid from './bid';

(new Item()).init();
(new Bid()).init();