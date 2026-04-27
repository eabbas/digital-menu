@extends('admin.app.panel')
@section('title')
    مشاهده محصول {{ $product->title }}
@endsection
@section('content')
    <div class="w-full flex flex-col items-center gap-4">
        <div class="w-full bg-[#f0f0f1] flex justify-center">
            <img src="{{ asset('storage/'.$product->main_image) }}" alt="" class="w-50" id="image">
        </div>
        <div class="w-full bg-white mb-5 rounded-md">
            <div class="w-full flex justify-between items-center px-5 pt-3">
                <div class=" flex items-center gap-2 text-[14px] text-[#91949a]">
                    <a href="{{ route('home') }}">خانه</a>
                    <span class="w-2 h-2 rotate-45 border-l-2 border-b-2 border-[#d2d3d5] "></span>
                    <a href="{{ route('pages.single', [$product->page->id]) }}">{{ $product->page->title }}</a>
                </div>
                <div class="flex gap-5">
                    <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer w-full flex justify-center items-center"
                        onclick='editIntroPro(this)'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                            <path fill="white"
                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                        </svg>
                    </div>
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5">
                        <path d="M244 130.6l-12-13.5-4.2-4.7c-26-29.2-65.3-42.8-103.8-35.8c-53.3 9.7-92 56.1-92 110.3v3.5c0 32.3 13.4 63.1 37.1 85.1L253 446.8c.8 .7 1.9 1.2 3 1.2s2.2-.4 3-1.2L443 275.5c23.6-22 37-52.8 37-85.1v-3.5c0-54.2-38.7-100.6-92-110.3c-38.5-7-77.8 6.6-103.8 35.8l-4.2 4.7-12 13.5c-3 3.4-7.4 5.4-12 5.4s-8.9-2-12-5.4zm34.9-57.1C311 48.4 352.7 37.7 393.7 45.1C462.2 57.6 512 117.3 512 186.9v3.5c0 36-13.1 70.6-36.6 97.5c-3.4 3.8-6.9 7.5-10.7 11l-184 171.3c-.8 .8-1.7 1.5-2.6 2.2c-6.3 4.9-14.1 7.5-22.1 7.5c-9.2 0-18-3.5-24.8-9.7L47.2 299c-3.8-3.5-7.3-7.2-10.7-11C13.1 261 0 226.4 0 190.4v-3.5C0 117.3 49.8 57.6 118.3 45.1c40.9-7.4 82.6 3.2 114.7 28.4c6.7 5.3 13 11.1 18.7 17.6l4.2 4.7 4.2-4.7c4.2-4.7 8.6-9.1 13.3-13.1c1.8-1.5 3.6-3 5.4-4.5z"/>
                    </svg> --}}
                </div>
            </div>
            <div class="w-full flex flex-col gap-2 px-5">
                <h2 class="font-bold" id="title">{{ $product->title }}</h2>
                <p class="text-[#8a8e94] text-[13px]" id="description">{{ $product->description }}</p>
            </div>
            <div class="w-full flex flex-col gap-2 my-5 px-5">
                <h2 class="font-bold">جدول مشخصات</h2>
                <div class="w-full" id="attributes">
                    @foreach (json_decode($product->attributes) as $attribute)
                        <div class="w-full flex border-b-1 border-[#e1e1e3] text-[12px] ">
                            <div class="w-4/10 flex items-center px-3 py-2 bg-[#f2f2f2] ">
                                <span class="w-full">{{ $attribute->key }}</span>
                            </div>
                            <div class="w-6/10 px-3 flex items-center py-2">
                                <span>{{ $attribute->value }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="w-full fixed top-0 right-0 h-full bg-black/50 backdrop-blur flex flex-row justify-end items-center invisible opacity-0 transition-all duration-300" id="box">
            <div class="w-full lg:w-[calc(100%-265px)] h-full flex justify-center items-center">
                <div class="w-10/12 bg-white p-5 rounded-md relative">
                     <svg xmlns="http://www.w3.org/2000/svg" onclick="closeBox()"
                        class="size-5 cursor-pointer" viewBox="0 0 384 512">
                        <path
                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                    </svg>
                    <div class="flex items-start justify-center max-h-[410px] lg:max-h-[450px] overflow-y-auto [&::-webkit-scrollbar]:hidden">
                        <div class="rounded-2xl p-3 w-full lg:w-3/4 ">
                            <div class="text-center mb-8">
                                <h3 class="lg:text-lg font-bold text-gray-800"> معرفی محصول </h3>
                            </div class="w-full">
                            <div class="text-center mb-4">
                                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                                    <div
                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">عنوان محصول</label>
                                        <div
                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <span
                                                class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                است!</span>
                                            <input
                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                type="text" name='introProTitle' id="introProTitle"
                                                placeholder="عنوان محصول">
                                        </div>
                                    </div>
                                    <div
                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">دسته محصول</label>
                                        <div
                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            
                                            <select
                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md" onchange="addCats(this)" name='introProCat' id="introProCat" multiple>
                                                <option value="0" disabled>انتخاب کنید</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div
                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">تصویر محصول</label>
                                        <div
                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <input
                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                type="file" name='introProImg' id="introProImg"
                                                placeholder="تصویر محصول">
                                        </div>
                                    </div>
                                    <div
                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                        <label class="text-sm mb-1 mt-2.5 flex">گالری تصاویر محصول</label>
                                        <div
                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            
                                            <input
                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                type="file" name='introProGallery' id="introProGallery"
                                                placeholder="گالری تصاویر محصول" multiple>
                                        </div>
                                    </div>
                                    <div
                                        class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1 lg:col-span-2">
                                        <label class="text-sm mb-1 mt-2.5 flex">توضیحات محصول</label>
                                        <div
                                            class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                            <textarea
                                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md"
                                                type="text" name='introProDescription' id="introProDescription"
                                                placeholder="توضیحات محصول"></textarea>
                                        </div>
                                    </div>
                                    <div
                                        class="w-full flex flex-col gap-4 itmes-center max-md:flex-col lg:col-span-2" id="features">
                                    </div>
                                </div>
                                <div class="w-full text-center">
                                    <button type="submit" onclick="addAttribute()"
                                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                        افزودن ویژگی
                                    </button>
                                </div>
                                <div class="w-full text-left">
                                    <button type="submit" onclick="updateProduct(this)"
                                        class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        let box = document.getElementById('box')
        let features = document.getElementById("features")

        let title = document.getElementById('title')
        let image = document.getElementById('image')
        let description = document.getElementById('description')
        let attributes = document.getElementById('attributes')

        let introProTitle = document.getElementById('introProTitle')
        let introProCat = document.getElementById('introProCat')
        let introProImg = document.getElementById('introProImg')
        let introProGallery = document.getElementById('introProGallery')
        let introProDescription = document.getElementById('introProDescription')
        function editIntroPro(el){
            let children = introProCat.children
            let icon = el.innerHTML
            el.innerHTML = `
            <div class="w-4 h-4 border-2 border-white border-t-green-500 rounded-full animate-spin"></div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('introPro.editSingle') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'page_id': "{{ $product->page->id }}",
                    'product_id': "{{ $product->id }}"
                },
                success: function(data){
                    introProCat.innerHTML = ""
                    features.innerHTML = ""
                    el.innerHTML = icon
                    introProTitle.value = data.product.title
                    introProDescription.value = data.product.description
                    data.categories.forEach((cat)=>{
                        let option = document.createElement('option')
                        option.value = cat.id
                        option.innerText = cat.title
                        introProCat.appendChild(option)
                    })
                    for(let child of children){
                        data.product.categories.forEach((cat)=>{
                            if (cat.id == child.value) {
                                child.selected = true
                            }
                        })
                    }
                    data.product.attributes.forEach((attr)=>{
                        let attrBox = document.createElement('div')
                        attrBox.classList = 'w-full grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 border-1 border-gray-300 rounded-lg relative feature-row'
                        attrBox.innerHTML = `
                            <span class="absolute -top-2 left-[-8px] px-2 py-1 bg-white rounded-full text-sm cursor-pointer shadow delete-btn">
                                ❌
                            </span>
                            <input
                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] key"
                                type="text" value="${attr.key}"
                                placeholder="نام ویژگی">
                            <input
                                class="p-4 w-full focus:outline-none text-sm font-bold mr-2 rounded-md focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] value"
                                type="text" value="${attr.value}"
                                placeholder="مقدار ویژگی">
                            
                            `
                        attrBox.querySelector('.delete-btn').addEventListener('click', () => {
                            attrBox.remove();
                        });
                        features.appendChild(attrBox)
                    })
                    box.classList.remove('invisible')
                    box.classList.remove('opacity-0')
                },
                error: function(){
                    console.log('error')
                }
            })
            
        }

        function addCats(el){
            categories = []
            
            let arr = el.selectedOptions
            for (let i = 0; i < arr.length; i++) {
                categories.push(arr[i].value)   
            }
            
        }

        function closeBox(){
            box.classList.add('invisible')
            box.classList.add('opacity-0')
        }

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

        function updateProduct(el){
            if(introProTitle.value == ""){
                el.parentElement.parentElement.children[0].children[1].children[0].classList.remove('opacity-0')
            } else {
                let buttonText = el.innerText
                el.setAttribute('disabled', true)
                el.innerHTML = `<div class="w-6 h-6 border-2 border-gray-200 border-t-blue-500 rounded-full animate-spin"></div>`
                let formData = new FormData()
                formData.append('title', introProTitle.value)
                formData.append('main_image', introProImg.files[0])
                formData.append('page_id', "{{ $product->page->id }}")
                formData.append('intro_product_id', "{{ $product->id }}")
                for (let i = 0; i < introProGallery.files.length; i++) {
                    formData.append('gallery[]', introProGallery.files[i])
                }
                let children = introProCat.children
                let array = [];
                for(let child of children){
                    if (child.selected == true) {
                        formData.append('categpries[]', child.value)
                    }
                }
                const rows = document.querySelectorAll('#features .feature-row');
                rows.forEach((row, index) => {
                    const keyInput   = row.querySelector('input.key');
                    const valueInput = row.querySelector('input.value');

                    const key   = keyInput.value;
                    const value = valueInput.value;
                    if (key && value) {
                        formData.append(`attributes[${index}][key]`,   key);
                        formData.append(`attributes[${index}][value]`, value);
                    }
                });
                formData.append('description', introProDescription.value)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('introPro.update') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(data){
                        title.innerText = data.title
                        description.innerText = data.description
                        image.removeAttribute('src')
                        image.setAttribute('src', "{{ asset('storage/') }}/"+data.main_image)
                        attributes.innerHTML = ""
                        data.attributes.forEach((attr)=>{
                            let element = document.createElement('div')
                            element.classList = "w-full flex border-b-1 border-[#e1e1e3] text-[12px]"
                            element.innerHTML = `
                                <div class="w-4/10 flex items-center px-3 py-2 bg-[#f2f2f2] ">
                                    <span class="w-full">${attr.key}</span>
                                </div>
                                <div class="w-6/10 px-3 flex items-center py-2">
                                    <span>${attr.value}</span>
                                </div>
                            `
                            attributes.appendChild(element)
                        })
                        el.innerHTML = buttonText
                        el.removeAttribute('disabled')
                        closeBox()
                    },
                    error: function(){
                        console.log('error')
                    }
                })
            }

        }
    </script>
@endsection