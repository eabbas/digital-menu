
function hamburgerMenu(state, element){
    if (state == "open") {
        element.parentElement.nextElementSibling.classList.remove('-right-full')
        element.parentElement.nextElementSibling.classList.add('right-0')
        element.children[0].classList.add('-translate-x-[30px]')
        element.children[0].classList.add('opacity-0')
        element.children[1].classList.add('translate-x-[30px]')
        element.children[1].classList.add('opacity-0')
        element.children[2].classList.add('-translate-x-[30px]')
        element.children[2].classList.add('opacity-0')
    }
    if (state == "close") {
        element.parentElement.classList.remove('right-0')
        element.parentElement.classList.add('-right-full')
        element.parentElement.previousElementSibling.children[0].children[0].classList.remove('-translate-x-[30px]')
        element.parentElement.previousElementSibling.children[0].children[0].classList.remove('opacity-0')
        element.parentElement.previousElementSibling.children[0].children[1].classList.remove('translate-x-[30px]')
        element.parentElement.previousElementSibling.children[0].children[1].classList.remove('opacity-0')
        element.parentElement.previousElementSibling.children[0].children[2].classList.remove('-translate-x-[30px]')
        element.parentElement.previousElementSibling.children[0].children[2].classList.remove('opacity-0')
    }
}

// let menus = document.querySelectorAll('.dashboard')
// menus.forEach((element)=>{
//     element.children[0].addEventListener('click', ()=>{
//         menus.forEach((item)=>{
//             item.children[1].classList.remove('max-h-[500px]')
//             item.children[1].classList.add('max-h-0')
//         })
//         element.children[1].classList.remove('max-h-0');
//         element.children[1].classList.add('max-h-[500px]');
//     })
// })
