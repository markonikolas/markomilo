export const splitTextToNodes = (title: Element | null) => {
    if (!title) {
        return;
    }

    const chars = title.innerHTML?.split(' ');

    const fragment = document.createDocumentFragment();

    chars?.forEach((char: string, i: number) => {
        const el = document.createElement('span');
        let spacing = ' ';

        if (chars.length - 1 === i) {
            spacing = '';
        }

        el.innerHTML = char;

        el.classList.add('char');

        return fragment.append(el, spacing);
    });

    title.textContent = '';

    title.appendChild(fragment);
};
