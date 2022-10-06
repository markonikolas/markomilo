import { ITransitionData } from '@barba/core';
import gsap from 'gsap';

import { splitTextToNodes } from '../helpers';

import transitionOnce from './once';
import transitionBefore from './before';
import transitionAfter from './after';

const timeline = gsap.timeline();

const defaultTransition = {
    name: 'default-transition',

    async once(data: ITransitionData) {
        if (data.next.namespace === 'Works') {
            return transitionOnce(timeline);
        }
    },

    before: async () => transitionBefore(timeline),

    async beforeEnter(data: ITransitionData) {
        const title = data.next.container.querySelector('.main h1');
        title?.classList.add('animation-text', 'animation-text--page');
        splitTextToNodes(title);
    },

    enter() {
        window.scrollTo({ top: 0 });
    },

    after: async () => transitionAfter(timeline),
};

export default defaultTransition;
