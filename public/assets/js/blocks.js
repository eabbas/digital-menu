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

let group = document.getElementById('group')
let socialMediaForm = document.getElementById('socialMediaForm')
function addSocialMedia(){
    group.classList.add('hidden')
    socialMediaForm.classList.remove('invisible')
    socialMediaForm.classList.remove('opacity-0')
    socialMediaForm.classList.remove('top-full')
    socialMediaForm.classList.add('top-0')
    socialMediaForm.classList.add('-translate-y-1/2')
}

function closeSocialForm(){
    group.classList.remove('hidden')
    socialMediaForm.classList.add('invisible')
    socialMediaForm.classList.add('opacity-0')
    socialMediaForm.classList.add('top-full')
    socialMediaForm.classList.remove('top-0')
    socialMediaForm.classList.remove('-translate-y-1/2')
    block.classList.add('invisible')
    block.classList.add('opacity-0')
}

let siteLinkForm = document.getElementById('siteLinkForm')
function addLink(){
    group.classList.add('hidden')
    siteLinkForm.classList.remove('invisible')
    siteLinkForm.classList.remove('opacity-0')
    siteLinkForm.classList.remove('top-full')
    siteLinkForm.classList.add('top-0')
    siteLinkForm.classList.add('-translate-y-1/2')
}

function closeLinkForm(){
    group.classList.remove('hidden')
    siteLinkForm.classList.add('invisible')
    siteLinkForm.classList.add('opacity-0')
    siteLinkForm.classList.add('top-full')
    siteLinkForm.classList.remove('top-0')
    siteLinkForm.classList.remove('-translate-y-1/2')
    block.classList.add('invisible')
    block.classList.add('opacity-0')
}