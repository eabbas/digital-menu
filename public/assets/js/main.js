
let featureCount = 1
if (rowCount) {
    featureCount = rowCount
}

let valueCount = 0
if (v_count) {
    valueCount = v_count
}
function add() {
    valueCount = 0
    let attribute = document.getElementById('attribute')
    let div = document.createElement('div')
    div.setAttribute('data-count', featureCount);
    let element = `
        <div class="flex flex-col items-start lg:items-end gap-3 lg:gap-5 mt-3 md:mt-5 border-b border-gray-300 pb-3">
            <div class="w-full flex flex-row justify-between gap-2">
                <div class="flex flex-col">
                    <label class="font-bold mb-2"> عنوان :</label>
                    <input type="text" class="outline-none w-full pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]" placeholder="نام" name="menu_data[${featureCount}][name]">
                </div>
                <div class="flex flex-col">
                    <label class="font-bold mb-2"> تصویر :</label>
                    <input type="file" class="outline-none w-full lg:w-1/2 pr-5 py-3 cursor-pointer" name="menu_data[${featureCount}][menu_image]">
                </div>
                <div>
                    <button type="button" class="p-2 rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer" onclick="remove(this)">حذف</button> 
                </div>
                    
            
            </div>
            <div class="w-full flex flex-col gap-2" data-value="1">
                <div class="w-full flex flex-row items-end gap-3">
                    <div class="flex flex-col lg:flex-row items-center pr-10 gap-3">
                        <div class="w-full flex flex-col">
                            <label class="text-[#425a8bde] mb-2"> نام آیتم :</label>
                            <input type="text"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                placeholder="نوشابه" name="menu_data[${featureCount}][values][${valueCount}][title]">
                        </div>
                        <div class="w-full flex flex-col">
                            <label class="text-[#425a8bde] mb-2"> قیمت آیتم :</label>
                            <input type="number" placeholder="500.000تومان"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]" name="menu_data[${featureCount}][values][${valueCount}][price]">
                        </div>
                        <div class="w-full flex flex-col">
                            <label class="text-[#425a8bde] mb-2"> توضیحات آیتم :</label>
                            <input type="text"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                placeholder="بدون قند" name="menu_data[${featureCount}][values][${valueCount}][description]">
                        </div>
                        <div class="w-full flex flex-col">
                            <label class="text-[#425a8bde] mb-2"> تصویر آیتم :</label>
                            <input type="file"
                                class="outline-none pr-5 py-3 cursor-pointer"
                                name="menu_data[${featureCount}][values][${valueCount}][gallery]">
                        </div>

                    </div>
                    <div class="flex items-end">
                        <button type="button"
                            class="size-11 text-xs rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer"
                            onclick="removeAttrButton(this)">X</button>
                    </div>
                </div>
            </div>
            <button type="button" class="w-full rounded-lg bg-green-500 h-10 text-white text-lg text-center inline-block mt-3 cursor-pointer" onclick="addAttr(this)">+</button>
        </div>`
    div.innerHTML = element
    attribute.appendChild(div)
    featureCount++
    console.log(valueCount);
    
}


function addAttr(el) {
    let num = el.parentElement.parentElement.getAttribute('data-count')
    let div = document.createElement('div')
    valueCount++
    div.classList = "w-full flex flex-row items-end gap-3"
    let element = `
        <div class="w-full flex flex-col gap-2" data-value="${valueCount}">
            <div class="w-full flex flex-row items-end gap-3">
            <div class="flex flex-col lg:flex-row items-center pr-10 gap-3 mt-8 mb-0">
                    <div class="w-full flex flex-col">
                        <label class="text-[#425a8bde] mb-2"> نام آیتم :</label>
                        <input type="text"
                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                            placeholder="نوشابه" name="menu_data[${num}][values][${valueCount}][title]">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-[#425a8bde] mb-2"> قیمت آیتم :</label>
                        <input type="number" placeholder="500.000تومان"
                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]" name="menu_data[${num}][values][${valueCount}][price]">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-[#425a8bde] mb-2"> توضیحات آیتم :</label>
                        <input type="text"
                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                            placeholder="بدون قند" name="menu_data[${num}][values][${valueCount}][description]">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-[#425a8bde] mb-2"> تصویر آیتم :</label>
                        <input type="file"
                            class="outline-none pr-5 py-3 cursor-pointer"
                            name="menu_data[${num}][values][${valueCount}][gallery]">
                    </div>
                </div>
                <div class="flex items-end">
                    <button type="button" class="size-11 text-xs rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer" onclick="removeAttrButton(this)">X</button>
            </div>
        </div>
        </div> `
    div.innerHTML = element
    el.parentElement.children[1].appendChild(div)
    console.log(valueCount);
    
    
}

function removeAttrButton(element) {
    element.parentElement.parentElement.remove()
    element.parentElement.parentElement.remove()
}

function remove(el) {
    let element = el.parentElement.parentElement.parentElement.parentElement
    if (element) {
        element.remove()
    }
}
