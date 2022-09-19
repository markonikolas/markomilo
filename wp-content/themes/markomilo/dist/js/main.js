import InfiniteMenu from './infiniteMenu.js';

if (jQuery('.page-template-poetry').length) {
    new InfiniteMenu(document.querySelector('nav.main-navigation'));
}
