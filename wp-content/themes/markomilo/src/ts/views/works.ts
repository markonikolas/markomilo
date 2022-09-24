import { IHookData } from '../hooks/tyeps';
import infiniteMenu from '../hooks/initInfiniteMenu';

const works = {
    namespace: 'Works',

    beforeEnter: async (data: IHookData) => {
        infiniteMenu(data);
    },
};

export default works;
