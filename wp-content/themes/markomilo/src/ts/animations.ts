import gsap from 'gsap';

const animate = (animation: Function) => (options: object) => (container: object) => animation(container, options);

const animateTo = animate(gsap.to);
const animateFrom = animate(gsap.from);

export const slideUp = animateTo({
    opacity: 0,
    y: '100%',
    duration: 0.5,
});

export const slideDown = animateTo({
    opacity: 0,
    y: '-100%',
    duration: 0.5,
})
