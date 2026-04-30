let menuBlockliet = document.getElementById('menuBlockliet')
// let menuList = document.getElementById('menuList')
function hamburgerMenu(state){
    if (state == "open") {

        menuBlock.classList.remove('invisible')
        menuBlock.classList.remove('opacity-0')
        menuList.classList.remove('translate-x-full')
        // element.children[0].classList.add('-translate-x-[30px]')
        // element.children[0].classList.add('opacity-0')
        // element.children[1].classList.add('translate-x-[30px]')
        // element.children[1].classList.add('opacity-0')
        // element.children[2].classList.add('-translate-x-[30px]')
        // element.children[2].classList.add('opacity-0')
        menuBlockliet.children[0].classList.add('-translate-x-[30px]')
        menuBlockliet.children[0].classList.add('opacity-0')
        menuBlockliet.children[1].classList.add('translate-x-[30px]')
        menuBlockliet.children[1].classList.add('opacity-0')
        menuBlockliet.children[2].classList.add('-translate-x-[30px]')
        menuBlockliet.children[2].classList.add('opacity-0')
    }
    if (state == "close") {
        menuBlock.classList.add('invisible')
        menuBlock.classList.add('opacity-0')
        menuList.classList.add('translate-x-full')
        // element.parentElement.previousElementSibling.children[0].children[0].classList.remove('-translate-x-[30px]')
        // element.parentElement.previousElementSibling.children[0].children[0].classList.remove('opacity-0')
        // element.parentElement.previousElementSibling.children[0].children[1].classList.remove('translate-x-[30px]')
        // element.parentElement.previousElementSibling.children[0].children[1].classList.remove('opacity-0')
        // element.parentElement.previousElementSibling.children[0].children[2].classList.remove('-translate-x-[30px]')
        // element.parentElement.previousElementSibling.children[0].children[2].classList.remove('opacity-0')
        menuBlockliet.children[0].classList.remove('-translate-x-[30px]')
        menuBlockliet.children[0].classList.remove('opacity-0')
        menuBlockliet.children[1].classList.remove('translate-x-[30px]')
        menuBlockliet.children[1].classList.remove('opacity-0')
        menuBlockliet.children[2].classList.remove('-translate-x-[30px]')
        menuBlockliet.children[2].classList.remove('opacity-0')
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
let dashboards = document.querySelectorAll(".dashboard")
dashboards.forEach(dashboard => {
    dashboard.children[0].addEventListener('click',()=>{
        if (dashboard.children[1].classList.contains('max-h-0')) {
            dashboards.forEach((item)=>{
                item.children[1].classList.remove('max-h-[500px]')
                item.children[1].classList.add('max-h-0')
                item.children[0].children[0].classList.remove('rotate-180')
                item.children[0].children[0].classList.add('rotate-0')
            })
            dashboard.children[1].classList.remove('max-h-0')
            dashboard.children[1].classList.add('max-h-[500px]')
            dashboard.children[0].children[0].classList.remove('rotate-0')
            dashboard.children[0].children[0].classList.add('rotate-180')
        }else{
            dashboard.children[1].classList.remove('max-h-[500px]')
            dashboard.children[1].classList.add('max-h-0')
            dashboard.children[0].children[0].classList.remove('rotate-180')
            dashboard.children[0].children[0].classList.add('rotate-0')
        }
    })
})