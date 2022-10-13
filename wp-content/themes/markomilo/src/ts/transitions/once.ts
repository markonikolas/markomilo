import { splitTextToNodes } from '../helpers';

const transitionOnce = async (timeline: GSAPTimeline) => {
    document.querySelector('.curtain')?.classList.add('animate');
    document.querySelector('.animation-overlay')?.classList.add('visible');

    splitTextToNodes(document.querySelector('.animation-text'));

    const video = document.querySelector('.animation') as HTMLVideoElement;

    await video.play();

    await timeline.fromTo(
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

    await timeline
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

    await timeline
        .to('.animation-overlay .animation-text', {
            display: 'block',
            opacity: 1,
        })
        .to('.animation-overlay .animation-text .char', {
            y: 0,
            duration: 1.25,
            stagger: {
                amount: 0.3,
                from: 'start',
            },
            ease: 'circ.out',
        });

    await timeline
        .to('.animation', {
            display: 'block',
            zIndex: 99,
        })
        .to('.animation-overlay', {
            opacity: 0,
            duration: 0.5,
        })

        .to('#curtain-path', {
            duration: 0.5,
            attr: { d: 'M0 502S175 272 500 272s500 230 500 230V0H0Z' },
            ease: 'expo.in',
        })
        .to('#curtain-path', {
            duration: 0.5,
            attr: { d: 'M0 2S175 1 500 1s500 1 500 1V0H0Z' },
            ease: 'expo.out',
        });

    const curtain = document.querySelector('#curtain') as HTMLElement;
    curtain.classList.remove('animate');

    curtain.style.transform = 'translateY(-100%)';
    document.querySelector('.animation-overlay')?.classList.remove('visible');
    document
        .querySelector('#curtain-path')
        ?.setAttribute('d', 'M0,1005S175,995,500,995s500,5,500,5V0H0Z');

    video.pause();
};

export default transitionOnce;
