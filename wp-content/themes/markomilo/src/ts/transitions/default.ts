import { ITransitionData } from '@barba/core';
import gsap from 'gsap';

import { splitTextToNodes } from '../helpers';

// import transitionOnce from './once';
import transitionBefore from './before';
import transitionAfter from './after';

const timeline = gsap.timeline();

const defaultTransition = {
    name: 'default-transition',

    // once: (data: ITransitionData) => {
    //     gsap.to(data.next.container, {
    //         visibility: 'visible',
    //         duration: 0.5,
    //     });

    //     if (data.next.namespace === 'Works') {
    //         return transitionOnce(timeline);
    //     }
    // },

    before: () => transitionBefore(timeline),

    beforeEnter: async (data: ITransitionData) => {
        const title = data.next.container.querySelector('.main h1');
        title?.classList.add('animation-text', 'animation-text--page');
        splitTextToNodes(title);
    },

    enter: (data: ITransitionData) => {
        window.scrollTo({ top: 0 });
        gsap.to(data.next.container, {
            visibility: 'visible',
            duration: 0.5,
        });
    },

    after: () => transitionAfter(timeline),
};

export default defaultTransition;
