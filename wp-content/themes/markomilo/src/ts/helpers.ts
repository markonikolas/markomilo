export const splitTextToNodes = (title: Element | null) => {
    if (!title) {
        return;
    }

    const chars = title.textContent?.trim().split('');

    const fragment = document.createDocumentFragment();

    chars?.forEach((char: string) => {
        const el = document.createElement('span');

        el.textContent = char;

        el.classList.add('char');

        console.log(char);
        if (char === ' ') {
            el.classList.add('empty');
        }

        return fragment.append(el);
    });

    title.textContent = '';

    title.appendChild(fragment);
};
