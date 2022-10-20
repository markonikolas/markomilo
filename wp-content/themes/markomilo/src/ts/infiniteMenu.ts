// @ts-nocheck
function onLoad() {
    const menu = document.querySelector('.main-navigation');
    const items = document.querySelectorAll('.main__link');
    let disableScroll = false;
    let scrollHeight: number | undefined = 0;
    let scrollPos: number | undefined = 0;
    let clonesHeight = 0;
    let clones: any = [];

    function getScrollPos() {
        return menu?.scrollTop;
    }

    function setScrollPos(pos: number) {
        menu.scrollTop = pos;
    }

    function getClonesHeight() {
        clonesHeight = 0;

        [...clones].forEach((clone: any) => {
            clonesHeight += clone.offsetHeight;
        });

        return clonesHeight;
    }

    function reCalc() {
        scrollPos = getScrollPos();
        scrollHeight = menu?.scrollHeight;
        clonesHeight = getClonesHeight();

        if (scrollPos && scrollPos <= 0) {
            setScrollPos(1);
        }
    }

    function scrollUpdate() {
        if (!disableScroll) {
            scrollPos = getScrollPos();

            if (clonesHeight + scrollPos >= scrollHeight) {
                setScrollPos(1);
                disableScroll = true;
            } else if (scrollPos <= 0) {
                setScrollPos(scrollHeight - clonesHeight);
                disableScroll = true;
            }
        }

        reCalc();

        if (disableScroll) {
            window.setTimeout(() => {
                disableScroll = false;
            }, 40);
        }
    }
    items.forEach((item: any) => {
        const clone = item.cloneNode(true) as HTMLElement;

        menu?.appendChild(clone);
        clone.classList.add('js-clone');
    });

    clones = menu?.getElementsByClassName('js-clone');

    reCalc();

    menu?.addEventListener(
        'scroll',
        () => {
            window.requestAnimationFrame(scrollUpdate);
        },
        false
    );

    window.addEventListener(
        'resize',
        () => {
            window.requestAnimationFrame(reCalc);
        },
        false
    );
}

export default onLoad;
