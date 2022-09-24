const winsize = { width: window.innerWidth, height: window.innerHeight };

interface INavigationMenu {
    /**
     * Disabled type check here, 3rd party code.
     */
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    el: any;
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    menuItems?: any;
}

export default class InfiniteMenu {
    public DOM: INavigationMenu;
    public clonesHeight: number;
    public scrollHeight: number;
    public scrollPos: number;

    constructor(el: Element) {
        this.DOM = { el: el };
        this.DOM.menuItems = [...this.DOM.el.querySelectorAll('.main__link')];

        this.clonesHeight = 0;
        this.scrollHeight = 0;
        this.scrollPos = 0;

        this.cloneItems();
        this.initScroll();

        this.initEvents();

        // rAF/loop
        requestAnimationFrame(() => this.render());
    }

    getScrollPos() {
        return (
            (this.DOM.el.pageYOffset || this.DOM.el.scrollTop) -
            (this.DOM.el.clientTop || 0)
        );
    }
    setScrollPos(pos: number) {
        this.DOM.el.scrollTop = pos;
    }
    // Create menu items clones and append them to the menu items list
    // total clones = number of menu items that fit in the viewport
    cloneItems() {
        // Get the height of one menu item
        const itemHeight = this.DOM.menuItems[0].offsetHeight;
        // How many items fit in the window?
        const fitIn = Math.ceil(winsize.height / itemHeight);
        // Create [fitIn] clones from the beginning of the list

        // Remove any
        this.DOM.el
            .querySelectorAll('.loop__clone')
            .forEach((clone: Element) => this.DOM.el.removeChild(clone));
        // Add clones
        let totalClones = 0;
        this.DOM.menuItems
            .filter((_: Element, index: number) => index < fitIn)
            .map((target: Element) => {
                const clone = target.cloneNode(true) as HTMLElement;
                clone.classList.add('loop__clone');
                this.DOM.el.appendChild(clone);
                ++totalClones;
            });

        // All clones height
        this.clonesHeight = totalClones * itemHeight;
        // Scrollable area height
        this.scrollHeight = this.DOM.el.scrollHeight;
    }
    initEvents() {
        window.addEventListener('resize', () => this.resize());
        window.addEventListener('load', () => this.resize());
    }
    resize() {
        this.cloneItems();
        this.initScroll();
    }
    initScroll() {
        // Scroll 1 pixel to allow upwards scrolling
        this.scrollPos = this.getScrollPos();
        if (this.scrollPos <= 0) {
            this.setScrollPos(1);
        }
    }
    scrollUpdate() {
        this.scrollPos = this.getScrollPos();

        const paddingTop = Number(
            window.getComputedStyle(this.DOM.el).paddingTop.split('px')[0]
        );

        if (this.scrollPos === 0) {
            return;
        }

        if (
            this.clonesHeight + this.scrollPos >=
            this.scrollHeight - paddingTop
        ) {
            // Scroll to the top when you’ve reached the bottom
            this.setScrollPos(1); // Scroll down 1 pixel to allow upwards scrolling
        } else if (this.scrollPos <= 0) {
            // Scroll to the bottom when you reach the top
            this.setScrollPos(this.scrollHeight - this.clonesHeight);
        }
    }
    render() {
        this.scrollUpdate();
        requestAnimationFrame(() => this.render());
    }
}
