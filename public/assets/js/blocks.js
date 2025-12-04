let block = document.getElementById('block')
let editSocialM = document.getElementById('editsocialMediaForm')
let siteLinkForm = document.getElementById('siteLinkForm')
let group = document.getElementById('group')
let socialMediaForm = document.getElementById('socialMediaForm')
let linkForm = document.getElementById('editSiteLinkForm')


function addBlock(state) {
    if (state == 'open') {
        block.classList.remove('invisible')
        block.classList.remove('opacity-0')
        block.children[0].children[0].children[0].classList.remove('scale-95')
        block.children[0].children[0].children[0].classList.remove('opacity-0')
        editSocialM.classList.add('invisible')
        editSocialM.classList.add('opacity-0')
        socialMediaForm.classList.add('invisible')
        socialMediaForm.classList.add('opacity-0')
    }
    if (state == 'close') {
        block.classList.add('invisible')
        block.classList.add('opacity-0')
        block.children[0].children[0].children[0].classList.add('scale-95')
        block.children[0].children[0].children[0].classList.add('opacity-0')
        editSocialM.classList.add('invisible')
        editSocialM.classList.add('opacity-0')
        socialMediaForm.classList.add('invisible')
        socialMediaForm.classList.add('opacity-0')
    }
}

function addSocialMedia() {
    group.classList.add('hidden')
    editSocialM.classList.add('invisible')
    editSocialM.classList.add('opacity-0')
    socialMediaForm.classList.remove('invisible')
    socialMediaForm.classList.remove('opacity-0')
    socialMediaForm.classList.remove('top-full')
    socialMediaForm.classList.add('top-0')
    socialMediaForm.classList.add('-translate-y-1/2')
}

function closeSocialForm() {
    group.classList.remove('hidden')
    editSocialM.classList.add('invisible')
    editSocialM.classList.add('opacity-0')
    socialMediaForm.classList.add('invisible')
    socialMediaForm.classList.add('opacity-0')
    socialMediaForm.classList.add('top-full')
    socialMediaForm.classList.remove('top-0')
    socialMediaForm.classList.remove('-translate-y-1/2')
    block.classList.add('invisible')
    block.classList.add('opacity-0')
}

function addLink() {
    group.classList.add('hidden')
    siteLinkForm.classList.remove('invisible')
    siteLinkForm.classList.remove('opacity-0')
    siteLinkForm.classList.remove('top-full')
    siteLinkForm.classList.add('top-0')
    siteLinkForm.classList.add('-translate-y-1/2')
    editSocialM.classList.add('invisible')
    editSocialM.classList.add('opacity-0')
}

function closeLinkForm() {
    group.classList.remove('hidden')
    siteLinkForm.classList.add('invisible')
    siteLinkForm.classList.add('opacity-0')
    siteLinkForm.classList.add('top-full')
    siteLinkForm.classList.remove('top-0')
    siteLinkForm.classList.remove('-translate-y-1/2')
    block.classList.add('invisible')
    block.classList.add('opacity-0')
    editSocialM.classList.add('invisible')
    editSocialM.classList.add('opacity-0')
}


function editSocial(id) {
    group.classList.add('hidden')
    block.classList.remove('invisible')
    block.classList.remove('opacity-0')
    editSocialM.classList.remove('invisible')
    editSocialM.classList.remove('top-full')
    editSocialM.classList.add('top-0')
    editSocialM.classList.remove('opacity-0')
    editSocialM.classList.add('-translate-y-1/2')
}
function closeSocialForm() {
    group.classList.remove('hidden')
    block.classList.add('invisible')
    block.classList.add('opacity-0')
    editSocialM.classList.add('invisible')
    editSocialM.classList.add('top-full')
    editSocialM.classList.remove('top-0')
    editSocialM.classList.add('opacity-0')
    editSocialM.classList.remove('-translate-y-1/2')
}

function editLink(id) {
    group.classList.add('hidden')
    block.classList.remove('invisible')
    block.classList.remove('opacity-0')
    linkForm.classList.remove('invisible')
    linkForm.classList.remove('top-full')
    linkForm.classList.add('top-0')
    linkForm.classList.remove('opacity-0')
    linkForm.classList.add('-translate-y-1/2')
    
    editSocialM.classList.add('invisible')
    editSocialM.classList.add('opacity-0')
    socialMediaForm.classList.add('invisible')
    socialMediaForm.classList.add('opacity-0')
}
function closeSiteLinkForm() {
    group.classList.remove('hidden')
    block.classList.add('invisible')
    block.classList.add('opacity-0')
    linkForm.classList.add('invisible')
    linkForm.classList.add('top-full')
    linkForm.classList.remove('top-0')
    linkForm.classList.add('opacity-0')
    linkForm.classList.remove('-translate-y-1/2')
    
    editSocialM.classList.add('invisible')
    editSocialM.classList.add('opacity-0')
    socialMediaForm.classList.add('invisible')
    socialMediaForm.classList.add('opacity-0')
}
