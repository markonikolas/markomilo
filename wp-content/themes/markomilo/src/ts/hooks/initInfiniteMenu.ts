import { IHookData } from './tyeps';

import InfiniteMenu from '../infiniteMenu';

const infiniteMenu = (data: IHookData) => {
    const navigation = document.querySelector('.main-navigation');

    const currentNamespace = data?.next.namespace;

    if (currentNamespace === 'Works' && navigation) {
        new InfiniteMenu(navigation);
    }
};

export default infiniteMenu;
