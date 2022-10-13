const transitionBefore = async (timeline: GSAPTimeline) => {
    document.querySelector('.curtain')?.classList.add('animate');
    document.querySelector('.animation-overlay')?.classList.add('visible');

    return await timeline.fromTo(
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
};

export default transitionBefore;
