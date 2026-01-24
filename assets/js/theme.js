/**
 * Drawer Open/close buttons
 *
 * since mosir 1.0
 */

const mosiDrawerInit = function(toggle, nav) {
    toggle.setAttribute('aria-expanded', 'false');
    nav.setAttribute('aria-hidden', 'true');
    // inert: Disable all operations within the element
    // https://developer.mozilla.org/ja/docs/Web/API/HTMLElement/inert
    nav.setAttribute('inert', 'inert');
};

const mosiDrawerOpen = function(toggles, nav, duration, open_focus) {
    toggles.forEach(toggle => {
        toggle.setAttribute('aria-expanded', 'true');
    });
    nav.classList.add('-is-opening');
    nav.classList.remove('-is-closing');

    // To allow for detailed CSS animations, the `.-is-opening` class is only added while the menu is opening.
    let queue = setTimeout(() => {
        nav.classList.remove('-is-opening');
        nav.setAttribute('aria-hidden', 'false');
        nav.removeAttribute('inert');
        open_focus.focus();
    },duration);
};

const mosiDrawerClose = function(toggles, nav, duration, close_focus) {
    toggles.forEach(toggle => {
        toggle.setAttribute('aria-expanded', 'false');
    });
    nav.classList.add('-is-closing');
    nav.classList.remove('-is-opening');

    // To allow for detailed CSS animations, the `.-is-closing` class is only added while the menu is closing.
    let queue = setTimeout(() => {
        nav.classList.remove('-is-closing');
        nav.setAttribute('aria-hidden', 'true');
        nav.setAttribute('inert', 'inert');
        close_focus.focus();
    },duration);
};

const mosiDrawerWindowResized = function(toggles, nav) {
    let queue = setTimeout(() => {
        clearTimeout(queue);
        toggles.forEach(toggle => {
            toggle.setAttribute('aria-expanded', 'false');
        });
        nav.setAttribute('aria-hidden', 'true');
        nav.setAttribute('inert', 'inert');
        nav.classList.remove('-is-closing', '-is-open');
    },50);
};

const mosiDrawerControls = function() {
    const action_default = 'toggle';
    const duration_default = 500;
    // drawer buttons - see: header.php, template-parts/drawer.php
    const toggles = document.querySelectorAll('.js-mosi-drawer');

    if( toggles.length ) {
        const nav = document.getElementById(toggles[0].getAttribute('aria-controls'));
        const contents = document.getElementById('mosi-drawer-contents');
        const close_focus = toggles[0];

        if(nav != undefined) {
            const open_focus = nav.querySelector('a, button, input');

            // If the window is resized, close the drawer.
            window.addEventListener('resize', function() {
                mosiDrawerWindowResized(toggles, nav);
                contents.removeAttribute('inert', 'inert');
            }, false);

            toggles.forEach(toggle => {
                const action = toggle.dataset.mosiDrawerAction ? toggle.dataset.mosiDrawerAction : action_default;
                const duration = toggle.dataset.mosiDrawerDuration ? parseFloat(toggle.dataset.mosiDrawerDuration) : duration_default;
                mosiDrawerInit(toggle, nav);
                contents.removeAttribute('inert', 'inert');

                toggle.addEventListener('click', ()=> {
                    if( ( action === 'toggle' ) && ( toggle.getAttribute('aria-expanded') === 'false') ) {
                        mosiDrawerOpen(toggles, nav, duration, open_focus);
                        contents.setAttribute('inert', 'inert');
                    } else {
                        mosiDrawerClose(toggles, nav, duration, close_focus);
                        contents.removeAttribute('inert', 'inert');
                    }
                });

            });
        }
    }
};

window.addEventListener('DOMContentLoaded', mosiDrawerControls );
