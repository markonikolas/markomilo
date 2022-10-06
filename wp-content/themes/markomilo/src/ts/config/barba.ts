import defaultTransition from '../transitions/default';
import works from '../views/works';

const config = {
    schema: {
        prefix: 'data-barba',
        wrapper: 'wrapper',
    },
    transitions: [defaultTransition],
    views: [works],
};

export default config;
