let parentMenu = document.querySelectorAll('.parent_menu')
function showMenu(ev, index) {
    ev.preventDefault();
    parentMenu.forEach((element) => {
        element.classList.add('hidden')
        element.classList.remove('flex')
        if (index == element.getAttribute('data-index-menu')) {
            element.classList.remove('hidden')
            element.classList.add('flex')
        }
    });
}

function calc(el, state) {
    if (state == '+') {
        el.parentElement.children[0].value++
    }
    if (state == '-') {
        el.parentElement.children[0].value--
        if (el.parentElement.children[0].value < 0) {
            el.parentElement.children[0].value = 0
        }
    }
}