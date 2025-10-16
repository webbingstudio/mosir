/**
 * Drawer toggle button
 *
 * since minimalism 1.0
 */
const miDrawer = function() {
    // drawer duration - see: src/scss/global/_variables-css.scss
    const duration = 600;
    // drawer button ID - see: header.php
    const toggle = document.getElementById('drawer-toggle');

    if( toggle != undefined ) {
        const controls = toggle.getAttribute('aria-controls');
        const nav = document.getElementById(controls);

        if(nav != undefined) {
            let mi_queue = null;
            toggle.setAttribute('aria-expanded', 'false');
            nav.setAttribute('aria-hidden', 'true');
            // inert: Disable all operations within the element
            // https://developer.mozilla.org/ja/docs/Web/API/HTMLElement/inert
            nav.setAttribute('inert', 'inert');

            toggle.addEventListener('click', ()=> {
                if(toggle.getAttribute('aria-expanded') === 'false') {
                    toggle.setAttribute('aria-expanded', 'true');
                    nav.classList.add('-is-opening');
                    nav.classList.remove('-is-closing');

                    // To allow for detailed CSS animations, the `.-is-opening` class is only added while the menu is opening.
                    const mi_queue = setTimeout(() => {
                        nav.classList.remove('-is-opening');
                        nav.setAttribute('aria-hidden', 'false');
                        nav.removeAttribute('inert');
                    },duration);
                } else {
                    toggle.setAttribute('aria-expanded', 'false');
                    nav.classList.add('-is-closing');
                    nav.classList.remove('-is-opening');

                    // To allow for detailed CSS animations, the `.-is-closing` class is only added while the menu is closing.
                    const mi_queue = setTimeout(() => {
                        nav.classList.remove('-is-closing');
                        nav.setAttribute('aria-hidden', 'true');
                        nav.setAttribute('inert', 'inert');
                    },duration);
                }
            });

            // If the window is resized, close the drawer.
            window.addEventListener('resize', () => {
                mi_queue = setTimeout(() => {
                    clearTimeout(mi_queue);
                    toggle.setAttribute('aria-expanded', 'false');
                    nav.setAttribute('aria-hidden', 'true');
                    nav.setAttribute('inert', 'inert');
                    nav.classList.remove('-is-closing', '-is-open');
                },50);
            },false);
        }
    }
};

window.addEventListener('DOMContentLoaded', miDrawer );
