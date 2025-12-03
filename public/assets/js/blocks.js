let block = document.getElementById('block')
function addBlock(state){
    if (state == 'open') {
        block.classList.remove('invisible')
        block.classList.remove('opacity-0')
        block.children[0].children[0].children[0].classList.remove('scale-95')
        block.children[0].children[0].children[0].classList.remove('opacity-0')
    }
    if (state == 'close') {
        block.classList.add('invisible')
        block.classList.add('opacity-0')
        block.children[0].children[0].children[0].classList.add('scale-95')
        block.children[0].children[0].children[0].classList.add('opacity-0')
    }
}