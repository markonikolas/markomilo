import barba from '@barba/core';

import config from './config/barba';

import replaceBodyClass from './hooks/replaceBodyClass';
import setActiveNavItem from './hooks/setNavMenuItem';

function init() {
    /**
     * Init Barba config.
     */
    barba.init(config);
    /**
     * Change active item on nav menu.
     */
    barba.hooks.afterEnter(setActiveNavItem);

    /**
     * Inject body class from next container's body.
     */
    barba.hooks.afterLeave(replaceBodyClass);
}

window.addEventListener('load', init);
