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

const mosiDrawerClearTimer = function(nav) {
    if(nav._mosiDrawerTimer) {
        clearTimeout(nav._mosiDrawerTimer);
        nav._mosiDrawerTimer = null;
    }
};

const mosiDrawerOpen = function(toggles, nav, duration, open_focus) {
    toggles.forEach(toggle => {
        toggle.setAttribute('aria-expanded', 'true');
    });
    nav.classList.add('-is-opening');
    nav.classList.remove('-is-closing');

    // To allow for detailed CSS animations, the `.-is-opening` class is only added while the menu is opening.
    mosiDrawerClearTimer(nav);
    nav._mosiDrawerTimer = setTimeout(() => {
        nav.classList.remove('-is-opening');
        nav.setAttribute('aria-hidden', 'false');
        nav.removeAttribute('inert');
        if(open_focus && typeof open_focus.focus === 'function') {
            open_focus.focus();
        }
    },duration);
};

const mosiDrawerClose = function(toggles, nav, duration, close_focus) {
    toggles.forEach(toggle => {
        toggle.setAttribute('aria-expanded', 'false');
    });
    nav.classList.add('-is-closing');
    nav.classList.remove('-is-opening');

    // To allow for detailed CSS animations, the `.-is-closing` class is only added while the menu is closing.
    mosiDrawerClearTimer(nav);
    nav._mosiDrawerTimer = setTimeout(() => {
        nav.classList.remove('-is-closing');
        nav.setAttribute('aria-hidden', 'true');
        nav.setAttribute('inert', 'inert');
        if(close_focus && typeof close_focus.focus === 'function') {
            close_focus.focus();
        }
    },duration);
};

const mosiDrawerWindowResized = function(toggles, nav) {
    toggles.forEach(toggle => {
        toggle.setAttribute('aria-expanded', 'false');
    });
    nav.setAttribute('aria-hidden', 'true');
    nav.setAttribute('inert', 'inert');
    nav.classList.remove('-is-closing', '-is-opening', '-is-open');
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
            const open_focus = nav.querySelector('a, button, input') || close_focus;

            // If the window width is resized, close the drawer.
            let resize_queue;
            let window_width = window.innerWidth;
            window.addEventListener('resize', function() {
                const resized_width = window.innerWidth;
                if(window_width === resized_width) {
                    return;
                }
                window_width = resized_width;
                clearTimeout(resize_queue);
                resize_queue = setTimeout(() => {
                    mosiDrawerClearTimer(nav);
                    mosiDrawerWindowResized(toggles, nav);
                    if(contents) {
                        contents.removeAttribute('inert');
                    }
                },50);
            }, false);

            toggles.forEach(toggle => {
                const action = toggle.dataset.mosiDrawerAction ? toggle.dataset.mosiDrawerAction : action_default;
                const duration = toggle.dataset.mosiDrawerDuration ? parseFloat(toggle.dataset.mosiDrawerDuration) : duration_default;
                mosiDrawerInit(toggle, nav);
                if(contents) {
                    contents.removeAttribute('inert');
                }

                toggle.addEventListener('click', ()=> {
                    if( ( action === 'toggle' ) && ( toggle.getAttribute('aria-expanded') === 'false') ) {
                        mosiDrawerOpen(toggles, nav, duration, open_focus);
                        if(contents) {
                            contents.setAttribute('inert', 'inert');
                        }
                    } else {
                        mosiDrawerClose(toggles, nav, duration, close_focus);
                        if(contents) {
                            contents.removeAttribute('inert');
                        }
                    }
                });

            });
        }
    }
};

window.addEventListener('DOMContentLoaded', mosiDrawerControls );
