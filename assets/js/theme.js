/**
 * Drawer toggle button
 *
 * since mosir 1.0
 */

const moDrawerToggle = function() {
    // drawer duration - see: src/scss/global/_variables-css.scss > --transition-cubic
    const duration = 500;
    // drawer button ID - see: header.php
    const toggle = document.getElementById('mo-drawer-toggle');

    if( toggle != undefined ) {
        const controls = toggle.getAttribute('aria-controls');
        const nav = document.getElementById(controls);

        if(nav != undefined) {
            let mos_queue = null;
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
                    const mos_queue = setTimeout(() => {
                        nav.classList.remove('-is-opening');
                        nav.setAttribute('aria-hidden', 'false');
                        nav.removeAttribute('inert');
                    },duration);
                } else {
                    toggle.setAttribute('aria-expanded', 'false');
                    nav.classList.add('-is-closing');
                    nav.classList.remove('-is-opening');

                    // To allow for detailed CSS animations, the `.-is-closing` class is only added while the menu is closing.
                    const mos_queue = setTimeout(() => {
                        nav.classList.remove('-is-closing');
                        nav.setAttribute('aria-hidden', 'true');
                        nav.setAttribute('inert', 'inert');
                    },duration);
                }
            });

            // If the window is resized, close the drawer.
            window.addEventListener('resize', () => {
                mos_queue = setTimeout(() => {
                    clearTimeout(mos_queue);
                    toggle.setAttribute('aria-expanded', 'false');
                    nav.setAttribute('aria-hidden', 'true');
                    nav.setAttribute('inert', 'inert');
                    nav.classList.remove('-is-closing', '-is-open');
                },50);
            },false);
        }
    }
};

const moDrawerClose = function() {
    // drawer duration - see: src/scss/global/_variables-css.scss > --transition-cubic
    const duration = 500;
    // close button ID - see: header.php
    const button = document.getElementById('mo-drawer-close');
    const toggle = document.getElementById('mo-drawer-toggle');

    if( button != undefined ) {
        const controls = button.getAttribute('aria-controls');
        const nav = document.getElementById(controls);

        if(nav != undefined) {
            let mos_queue = null;
            nav.setAttribute('aria-hidden', 'true');
            // inert: Disable all operations within the element
            // https://developer.mozilla.org/ja/docs/Web/API/HTMLElement/inert
            nav.setAttribute('inert', 'inert');

            button.addEventListener('click', ()=> {
                toggle.setAttribute('aria-expanded', 'false');
                nav.classList.add('-is-closing');
                nav.classList.remove('-is-opening');

                // To allow for detailed CSS animations, the `.-is-closing` class is only added while the menu is closing.
                const mos_queue = setTimeout(() => {
                    nav.classList.remove('-is-closing');
                    nav.setAttribute('aria-hidden', 'true');
                    nav.setAttribute('inert', 'inert');
                },duration);
            });
        }
    }
};

window.addEventListener('DOMContentLoaded', moDrawerToggle );
window.addEventListener('DOMContentLoaded', moDrawerClose );
