import gsap from 'gsap';

import { createCurtain } from '../helpers';

const curtain = createCurtain();
const tl = gsap.timeline();

const defaultTransition = {
    name: 'default-transition',

    before() {
        document.body.appendChild(curtain);

        return tl.fromTo(
            curtain,
            {
                y: '-100%',
                duration: 1,
                ease: 'expo.out',
            },
            {
                y: 0,
                duration: 1,
                ease: 'expo.in',
            }
        );
    },

    enter() {
        window.scrollTo({ top: 0 });
    },

    after() {
        return tl.to(curtain, {
            y: '-100%',
            duration: 1,
            ease: 'expo.out',
            delay: 1,
        });
    },
};

export default defaultTransition;
