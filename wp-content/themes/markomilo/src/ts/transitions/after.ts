import gsap from 'gsap';

const transitionAfter = async (timeline: GSAPTimeline) => {
    const textTimeline = gsap.timeline();
    await timeline
        .to('.animation', {
            display: 'block',
            zIndex: 99,
            duration: 0,
        })
        .to('.animation-overlay', {
            opacity: 0,
            duration: 0,
        })
        .to('#curtain-path', {
            attr: { d: 'M0 502S175 272 500 272s500 230 500 230V0H0Z' },
            ease: 'expo.in',
            duration: 0.5,
        })
        .to('#curtain-path', {
            attr: { d: 'M0 2S175 1 500 1s500 1 500 1V0H0Z' },
            ease: 'expo.out',
            duration: 0.5,
        })
        .to(
            '.animation-text--page',
            {
                opacity: 1,
                duration: 0,
            },
            '<'
        )
        .to(
            '.animation-text--page .char',
            {
                y: 0,
                duration: 0.6,
                stagger: {
                    amount: 0.25,
                    from: 'start',
                },
                ease: 'circ.out',
            },
            '<'
        );

    const curtain = document.querySelector('#curtain') as HTMLElement;
    curtain.classList.remove('animate');

    curtain.style.transform = 'translateY(-100%)';
    document.querySelector('.animation-overlay')?.classList.remove('visible');
    return document
        .querySelector('#curtain-path')
        ?.setAttribute('d', 'M0,1005S175,995,500,995s500,5,500,5V0H0Z');
};

export default transitionAfter;
