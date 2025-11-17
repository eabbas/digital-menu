
let home_hamburger_menu = document.getElementById('home_hamburger_menu')
function home_menu(state){
    if (state == "open") {
        home_hamburger_menu.classList.remove('-right-full')
        home_hamburger_menu.classList.remove('opacity-0')
        home_hamburger_menu.classList.add('right-0')
    }
    if (state == "close") {
        home_hamburger_menu.classList.add('-right-full')
        home_hamburger_menu.classList.add('opacity-0')
        home_hamburger_menu.classList.remove('right-0')
    }
}

let careers = document.querySelectorAll('.careers')
function showCareer(index){
    careers.forEach((item)=>{
        item.classList.remove('flex')
        item.classList.add('hidden')
        if (item.getAttribute('data-index')==index) {
            item.classList.add('flex')
            item.classList.remove('hidden')
        }
    })
}