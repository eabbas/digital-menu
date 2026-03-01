// plus icon
let block = document.getElementById('block')


// create link and create socialmedia div
let group = document.getElementById('group')


// create socialmedia form
let socialMediaForm = document.getElementById('socialMediaForm')


// link form
let siteLinkForm = document.querySelector('.createSiteLink')

// Faq form
let faqForm = document.querySelector('.createFaq')

// edit socialmedia div
let editSocialM = document.querySelector('.editsocialMediaForm')

//qrcode
let qrcode = document.getElementById('qrcode_card')

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
    // socialMediaForm.classList.add('-translate-y-1/4')
}

function addLink() {
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')

    siteLinkForm.classList.remove('invisible')
    siteLinkForm.classList.remove('opacity-0')
    siteLinkForm.classList.remove('top-full')
    siteLinkForm.classList.add('top-0')
    // siteLinkForm.classList.add('-translate-y-1/4')
}

function addFaq() {
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')

    faqForm.classList.remove('invisible')
    faqForm.classList.remove('opacity-0')
    faqForm.classList.remove('top-full')
    faqForm.classList.add('top-0')
    faqForm.classList.add('-translate-y-1/9')
}

let forms = document.querySelectorAll('.form')
let editSMF = document.querySelector('.editSMF')
let editSLF = document.querySelector('.editSLF')
let editFAQ = document.querySelector('.editFAQ')

function closeForm() {
    forms.forEach((form) => {
        form.classList.add('invisible')
        form.classList.add('opacity-0')
        form.classList.remove('-translate-y-1/4')
    })
    editSMF.classList.remove('max-h-[500px]')
    editSMF.classList.add('max-h-0')
    editSLF.classList.remove('max-h-[500px]')
    editSLF.classList.add('max-h-0')
    editFAQ.classList.remove('max-h-[500px]')
    editFAQ.classList.add('max-h-0')
    block.classList.add('invisible')
    block.classList.add('opacity-0')
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
    features.innerHTML = ""
}

function openDropdown(page) {
    if (page == 'media') {
        if (editSMF.classList.contains('max-h-0')) {
            editSMF.classList.remove('max-h-0')
            editSMF.classList.add('max-h-[500px]')
        } else {
            editSMF.classList.remove('max-h-[500px]')
            editSMF.classList.add('max-h-0')
        }
    }
    if (page == 'link') {
        if (editSLF.classList.contains('max-h-0')) {
            editSLF.classList.remove('max-h-0')
            editSLF.classList.add('max-h-[500px]')
        } else {
            editSLF.classList.remove('max-h-[500px]')
            editSLF.classList.add('max-h-0')
        }
    }
    if (page == 'faq') {
        if (editFAQ.classList.contains('max-h-0')) {
            editFAQ.classList.remove('max-h-0')
            editFAQ.classList.add('max-h-[500px]')
        } else {
            editFAQ.classList.remove('max-h-[500px]')
            editFAQ.classList.add('max-h-0')
        }
    }
    if (page == 'title') {
        let editTLF = document.querySelector('.editTLF')
        if (editTLF.classList.contains('max-h-0')) {
            editTLF.classList.remove('max-h-0')
            editTLF.classList.add('max-h-[500px]')
        } else {
            editTLF.classList.remove('max-h-[500px]')
            editTLF.classList.add('max-h-0')
        }
    }
}
function qrCard(state) {
    if (state == 'open') {
        qrcode.classList.remove('invisible')
        qrcode.classList.remove('opacity-0')
    }
    if (state == 'close') {
        qrcode.classList.add('invisible')
        qrcode.classList.add('opacity-0')
    }
}

let introBox = document.getElementById('introBox')

function addIntroCategory(){
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
    introBox.classList.remove('invisible')
    introBox.classList.remove('opacity-0')
    introBox.classList.remove('top-full')
    introBox.classList.add('top-0')
}

let introProduct = document.getElementById('introProduct')

function addIntroProduct(){
    group.classList.add('scale-95')
    group.classList.add('opacity-0')
    group.classList.add('invisible')
    introProduct.classList.remove('invisible')
    introProduct.classList.remove('opacity-0')
    introProduct.classList.remove('top-full')
    introProduct.classList.add('top-0')
    introProduct.classList.add('-translate-y-1/6')
    setCategories()
}

let features = document.getElementById("features")
let featuresEdit = document.getElementById("featuresEdit")

function addAttribute(){
    let attrBox = document.createElement('div')
    attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative feature-row'
    attrBox.innerHTML = `
        <span class="absolute -top-2 left-[-8px] px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
            ❌
        </span>
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key"
            type="text"
            placeholder="نام ویژگی">
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value"
            type="text"
            placeholder="مقدار ویژگی">
        
        `
    attrBox.querySelector('.delete-btn').addEventListener('click', () => {
        attrBox.remove();
    });
    features.appendChild(attrBox)
}
function addAttributeEdit(){
    let attrBox = document.createElement('div')
    attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative feature-row'
    attrBox.innerHTML = `
        <span class="absolute -top-2 left-[-8px] px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
            ❌
        </span>
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key"
            type="text"
            placeholder="نام ویژگی">
        <input
            class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value"
            type="text"
            placeholder="مقدار ویژگی">
        
        `
    attrBox.querySelector('.delete-btn').addEventListener('click', () => {
        attrBox.remove();
    });
    featuresEdit.appendChild(attrBox)
}

function removeAttribute(el){
    el.parentElement.remove()
}
