import { IHookData } from './tyeps';

const setActiveNavItem = (data: IHookData) => {
    if (!data) {
        throw new Error('Data is undefined.');
    }

    try {
        const menuItems = document.getElementsByClassName('menu-item__link');
        const current = document.querySelector('.current-menu-item');

        const { namespace } = data.next;

        current?.classList.remove('current-menu-item');

        const nextActiveElement = [...menuItems].find(
            (item) => item.getAttribute('data-barba-link') === namespace
        );

        if (!nextActiveElement) {
            return;
        }

        nextActiveElement?.parentElement?.classList.add('current-menu-item');
    } catch (error) {
        throw new Error('Body data class was not found!');
    }
};

export default setActiveNavItem;
