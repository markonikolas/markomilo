const winsize={width:window.innerWidth,height:window.innerHeight};export default class InfiniteMenu{constructor(e){this.DOM={el:e},this.DOM.menuItems=[...this.DOM.el.querySelectorAll(".main__link")],this.cloneItems(),this.initScroll(),this.initEvents(),requestAnimationFrame(()=>this.render())}getScrollPos(){return(this.DOM.el.pageYOffset||this.DOM.el.scrollTop)-(this.DOM.el.clientTop||0)}setScrollPos(e){this.DOM.el.scrollTop=e}cloneItems(){var e=this.DOM.menuItems[0].offsetHeight;const s=Math.ceil(winsize.height/e);this.DOM.el.querySelectorAll(".loop__clone").forEach(e=>this.DOM.el.removeChild(e));let i=0;this.DOM.menuItems.filter((e,t)=>t<s).map(e=>{const t=e.cloneNode(!0);t.classList.add("loop__clone"),this.DOM.el.appendChild(t),++i}),this.clonesHeight=i*e,this.scrollHeight=this.DOM.el.scrollHeight}initEvents(){window.addEventListener("resize",()=>this.resize()),window.addEventListener("load",()=>this.resize())}resize(){this.cloneItems(),this.initScroll()}initScroll(){this.scrollPos=this.getScrollPos(),this.scrollPos<=0&&this.setScrollPos(1)}scrollUpdate(){this.scrollPos=this.getScrollPos();var e=Number(window.getComputedStyle(this.DOM.el).paddingTop.split("px")[0]);0!==this.scrollPos&&(this.clonesHeight+this.scrollPos>=this.scrollHeight-e?this.setScrollPos(1):this.scrollPos<=0&&this.setScrollPos(this.scrollHeight-this.clonesHeight))}render(){this.scrollUpdate(),requestAnimationFrame(()=>this.render())}}