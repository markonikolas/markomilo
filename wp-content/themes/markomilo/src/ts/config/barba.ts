import defaultTransition from '../transitions/default';
import prevent from '../transitions/prevent';
import works from '../views/works';

const config = {
    schema: {
        prefix: 'data-barba',
        wrapper: 'wrapper',
    },
    transitions: [defaultTransition],
    views: [works],
    prevent,
};

export default config;
