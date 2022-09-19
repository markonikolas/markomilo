import InfiniteMenu from './infiniteMenu.js';

if (jQuery('.page-template-poetry').length) {
    new InfiniteMenu(document.querySelector('nav.main-navigation'));
}

const setActiveNavItem = (namespace) => {
    const menuItems = document.querySelectorAll('.menu-item__link');

    menuItems.forEach((item) => {
        item.parentNode.classList.remove('current-menu-item');

        if (item.getAttribute('data-barba-link') === namespace) {
            item.parentNode.classList.add('current-menu-item');
        }
    });
};

const createCurtain = () => {
    const curtain = document.createElement('div');
    curtain.classList.add('curtain');

    return curtain;
};

const curtain = createCurtain();

console.log(curtain);

barba.init({
    schema: {
        prefix: 'data-barba',
        wrapper: 'wrapper',
    },
    transitions: [
        {
            name: 'custom-opacity-transition',

            beforeLeave(data) {
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

            leave(data) {
                return gsap.to(data.current.container, {
                    opacity: 0,
                    x: 100,
                    duration: 0.25,
                });
            },

            afterLeave(data) {
                return gsap.to(data.current.container, {
                    display: 'none',
                });
            },

            beforeEnter(data) {
                gsap.to(curtain, {
                    opacity: 0,
                    y: '100%',
                    duration: 0.5,
                });

                setActiveNavItem(data.next.namespace);
                window.scrollTo({ top: 0 });
            },

            afterEnter(data) {
                document.body.classList.remove('transition');
                return gsap.from(data.next.container, {
                    opacity: 0,
                    x: 100,
                    duration: 0.25,
                });
            },
        },
    ],
});
