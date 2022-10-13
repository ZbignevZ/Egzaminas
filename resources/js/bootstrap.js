import _ from 'lodash';
window._ = _;

import 'bootstrap';
import axios from 'axios';
window.axios = axios;

import Swiper, { Navigation } from 'swiper';
// import Swiper styles
import 'swiper/css';

const swiper = new Swiper('.swiper', {
    navigation: {
        // Optional parameters
        direction: 'vertical',
        loop: true
    },
});
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

