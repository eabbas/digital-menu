let rules_element = document.getElementById('rules')

function rules(state){
    if (state == 'open') {
        rules_element.classList.remove('invisible')
        rules_element.classList.remove('opacity-0')
        rules_element.children[0].classList.remove('scale-75')
        rules_element.children[0].classList.remove('opacity-0')
    }
    if (state == 'close') {
        rules_element.classList.add('invisible')
        rules_element.classList.add('opacity-0')
        rules_element.children[0].classList.add('scale-75')
        rules_element.children[0].classList.add('opacity-0')
    }

}
