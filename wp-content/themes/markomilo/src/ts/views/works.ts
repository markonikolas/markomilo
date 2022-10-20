import { IHookData } from '../hooks/tyeps';
import onLoad from '../infiniteMenu';

const works = {
    namespace: 'Works',

    beforeEnter: async (data: IHookData) => {
        onLoad();
        return data;
    },
};

export default works;
