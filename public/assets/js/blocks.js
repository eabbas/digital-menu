// plus icon
let block = document.getElementById('block')


// create link and create socialmedia div
let group = document.getElementById('group')


// create socialmedia form
let socialMediaForm = document.getElementById('socialMediaForm')


// link form
let siteLinkForm = document.querySelector('.createSiteLink')


// edit socialmedia div
let editSocialM = document.querySelector('.editsocialMediaForm')

//qrcode
let qrcode=document.getElementById('qrcode_card')

function addBlock(state) {
    if (state == 'open') {
        block.classList.remove('invisible')
        block.classList.remove('opacity-0')
        group.classList.remove('scale-95')
        group.classList.remove('opacity-0')
        group.classList.remove('invisible')
    }
    if (state == 'close') {
        block.classList.add('invisible')
        block.classList.add('opacity-0')
        group.classList.add('scale-95')
        group.classList.add('opacity-0')
        group.classList.add('invisible')
    }
}

function addSocialMedia() {
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
    socialMediaForm.classList.remove('invisible')
    socialMediaForm.classList.remove('opacity-0')
    socialMediaForm.classList.remove('top-full')
    socialMediaForm.classList.add('top-0')
    socialMediaForm.classList.add('lg:-translate-y-1/7')
}

function addLink() {
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')

    siteLinkForm.classList.remove('invisible')
    siteLinkForm.classList.remove('opacity-0')
    siteLinkForm.classList.remove('top-full')
    siteLinkForm.classList.add('top-0')
    siteLinkForm.classList.add('lg:-translate-y-1/7')
}


let forms = document.querySelectorAll('.form')
let editSMF = document.querySelector('.editSMF')
let editSLF = document.querySelector('.editSLF')
function closeForm(){
    forms.forEach((form)=>{
        form.classList.add('invisible')
        form.classList.add('opacity-0')
        form.classList.remove('lg:-translate-y-1/7')
    })
    editSMF.classList.remove('max-h-[500px]')
    editSMF.classList.add('max-h-0')
    editSLF.classList.remove('max-h-[500px]')
    editSLF.classList.add('max-h-0')
    block.classList.add('invisible')
    block.classList.add('opacity-0')
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
}

function openDropdown(page){
    if (page == 'media') {
        if(editSMF.classList.contains('max-h-0')){
            editSMF.classList.remove('max-h-0')
            editSMF.classList.add('max-h-[500px]')
        } else {
            editSMF.classList.remove('max-h-[500px]')
            editSMF.classList.add('max-h-0')
        }
    }
    if (page == 'link') {
        if(editSLF.classList.contains('max-h-0')){
            editSLF.classList.remove('max-h-0')
            editSLF.classList.add('max-h-[500px]')
        } else {
            editSLF.classList.remove('max-h-[500px]')
            editSLF.classList.add('max-h-0')
        }
    }
}
function qrCard(state){
    if (state == 'open') {
       qrcode.classList.remove('invisible')
       qrcode.classList.remove('opacity-0')
    }
    if (state == 'close') {
        qrcode.classList.add('invisible')
       qrcode.classList.add('opacity-0')
    }
    }

