import { ITransitionData } from '@barba/core';
import gsap from 'gsap';

import { splitTextToNodes } from '../helpers';

const tl = gsap.timeline();

const defaultTransition = {
    name: 'default-transition',

    async before() {
        document.querySelector('.curtain')?.classList.add('animate');
        document.querySelector('.animation-overlay')?.classList.add('visible');

        splitTextToNodes(document.querySelector('.animation-text'));

        const video = document.querySelector('.animation') as HTMLVideoElement;

        await video.play();

        return await tl.fromTo(
            '.curtain',
            {
                y: '-100%',
            },
            {
                scaleY: 1.02,
                duration: 0.8,
                ease: 'power4.out',
                y: 0,
            }
        );
    },

    async beforeEnter(data: ITransitionData) {
        const title = data.next.container.querySelector('.main h1');
        title?.classList.add('animation-text', 'animation-text--page');
        splitTextToNodes(title);
    },

    enter() {
        window.scrollTo({ top: 0 });
    },

    async afterEnter() {
        await tl
            .to('.animation-overlay', {
                opacity: 1,
                duration: 0.5,
            })
            .to('.animation', {
                display: 'block',
                zIndex: 99,
            })
            .to('.animation', {
                opacity: 1,
                duration: 1,
            });

        return await tl
            .to('.animation-overlay .animation-text', {
                display: 'block',
                opacity: 1,
            })
            .to('.animation-overlay .animation-text .char', {
                y: 0,
                duration: 2,
                stagger: {
                    amount: 0.35,
                    from: 4,
                },
                ease: 'circ.out',
            });
    },

    async after() {
        await tl
            .to('.animation', {
                display: 'block',
                zIndex: 99,
            })
            .to('.animation-overlay', {
                opacity: 0,
                duration: 0.5,
            })

            .to('#curtain-path', {
                duration: 0.8,
                attr: { d: 'M0 502S175 272 500 272s500 230 500 230V0H0Z' },
                ease: 'expo.in',
            })
            .to('#curtain-path', {
                duration: 0.8,
                attr: { d: 'M0 2S175 1 500 1s500 1 500 1V0H0Z' },
                ease: 'expo.out',
            });
        gsap.to('.animation-text--page', {
            opacity: 1,
        });
        gsap.to('.animation-text--page .char', {
            y: 0,
            duration: 2,
            stagger: {
                amount: 0.35,
                from: 'start',
            },
            ease: 'circ.out',
        });

        const curtain = document.querySelector('#curtain') as HTMLElement;
        curtain.classList.remove('animate');

        curtain.style.transform = 'translateY(-100%)';
        document
            .querySelector('.animation-overlay')
            ?.classList.remove('visible');
        return document
            .querySelector('#curtain-path')
            ?.setAttribute('d', 'M0,1005S175,995,500,995s500,5,500,5V0H0Z');
    },
};

export default defaultTransition;
