import barba from '@barba/core';
import gsap from 'gsap';
import { ITransitionData } from '@barba/core';

import InfiniteMenu from './infiniteMenu';
import { slideUp } from './animations';

const onPoetryTemplate = document.querySelector('.page-template-poetry');
const navigation = document.querySelector('nav.main-navigation');

if (onPoetryTemplate && navigation) {
    new InfiniteMenu(navigation);
}

const setActiveNavItem = (namespace: string) => {
    const menuItems = document.getElementsByClassName('menu-item__link');

    const nextActiveElement = [...menuItems].find((item) => item.getAttribute('data-barba-link') === namespace);
    const parentNode = nextActiveElement?.parentNode as HTMLElement;

    if (parentNode) {
        document.querySelector('.current-menu-item')?.classList.remove('current-menu-item');
        parentNode.classList.add('current-menu-item');
    }

};

const createCurtain = () => {
    const curtain = document.createElement('div');
    curtain.classList.add('curtain');

    return curtain;
};

const curtain = createCurtain();

barba.init({
    schema: {
        prefix: 'data-barba',
        wrapper: 'wrapper',
    },
    transitions: [
        {
            name: 'custom-transition',

            beforeLeave: (data: ITransitionData) => {
                document.body.appendChild(curtain);
                document.body.classList.add('transition');

                return gsap.fromTo(
                    curtain,
                    {
                        opacity: 0,
                        y: '100%',
                        duration: 0.5,
                        ease: 'expo.out',
                    },
                    {
                        opacity: 1,
                        y: 0,
                        ease: 'expo.out',
                    }
                );
            },

            afterLeave: (data: ITransitionData) => {
                return slideUp(data.current.container)
            },

            beforeEnter: (data: ITransitionData) => {
                const nextPage = data.next.namespace;

                setActiveNavItem(nextPage);

                return data;
            },

            enter: (data: ITransitionData): any => {
                window.scrollTo({ top: 0 });
                document.body.classList.remove('transition');

                gsap.to(data.current.container, {
                    opacity: 0,
                    display: 'none',
                    y: 0,
                });

                return gsap.to(curtain, {
                    opacity: 0,
                    y: '100%',
                    duration: 0.5,
                    ease: "expo.in.out"
                });
            },

            afterEnter: (data: ITransitionData) => {

                return gsap.from(data.next.container, {
                    opacity: 0,
                    duration: 0.5,
                    ease: "power2"
                });
            },
        },
    ],
});
