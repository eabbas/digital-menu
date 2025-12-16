@extends('admin.app.panel')
@section('title', 'دسته‌بندی‌های محصول')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="w-full min-h-screen pb-10 pt-6 bg-gray-50">
    <div class="w-11/12 mx-auto">
        



       
        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-xl font-semibold text-gray-800">دسته‌بندی‌های محصول</h1>
                    <p class="text-gray-600 text-sm mt-1">
                        محصول: <span class="font-medium">{{ $custom_product->title ?? 'نامشخص' }}</span> 
                        | {{ count($custom_product->customCategories ?? []) }} دسته‌بندی
                    </p>
                </div>
                <div onclick='openCform("{{ $custom_product->id }}")' 
                class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg cursor-pointer" >
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span class="text-sm font-medium"> ایجاد دسته بندی</span>
                </div>
             
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            
            <!-- Table Header -->
            <div class="bg-gray-50 border-b border-gray-200">
                <div class="grid grid-cols-12 gap-4 px-6 py-3">
                    <div class="col-span-3">
                        <span class="text-sm font-medium text-gray-700">نام دسته‌بندی</span>
                    </div>
                    <div class="col-span-3">
                        <span class="text-sm font-medium text-gray-700">وضعیت الزامی بودن</span>
                    </div>
                    <div class="col-span-2">
                        <span class="text-sm font-medium text-gray-700">حداکثر مواد</span>
                    </div>
                    <div class="col-span-4">
                        <span class="text-sm font-medium text-gray-700">عملیات</span>
                    </div>
                </div>
            </div>
            <!-- Table Rows -->
            <div class="divide-y divide-gray-100" id="custom_category_section">
                @php $hasCategory=false; @endphp
                @foreach($custom_product->customCategories as $category)
                @php $hasCategory = true; @endphp
                <div class="grid grid-cols-12 gap-4 px-6 py-4 hover:bg-gray-50/50 transition-colors newParameters" data-cp-id="{{ $category->id }}">
                    <!-- نام دسته‌بندی -->
                    <div class="col-span-3">
                        <span class="text-sm text-gray-800 font-medium">{{ $category->title }}</span>
                    </div>
                    
                    <!-- الزامی بودن -->
                    {{-- <div class="col-span-3">
                        @if($category->required == 1)
                            <span class="inline-flex items-center gap-1 text-red-600 text-xs font-medium bg-red-50 px-3 py-1 rounded-full">
                                <svg class="size-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.795-.833-2.565 0L4.238 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                              الزامی
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 text-green-600 text-xs font-medium bg-green-50 px-3 py-1 rounded-full">
                                <svg class="size-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                               اختیاری
                            </span>
                        @endif
                    </div> --}}
                     <div>
                        <span class="text-xs px-2 py-1 rounded {{ $category->required ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                            {{ $category->required ? 'الزامی' : 'اختیاری' }}
                        </span>
                    </div>
                    
                    <!-- حداکثر مواد -->
                    <div class="col-span-2">
                        <span class="text-sm text-gray-700">{{ $category->max_item_amount }}</span>
                    </div>
                    
                    <!-- عملیات -->
                    <div class="col-span-4">
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('custmCategory.single', [$category]) }}" 
                               class="text-blue-600 hover:text-blue-800 text-xs font-medium transition-colors">
                                مشاهده
                            </a>
                            {{-- href="{{ route('custmCategory.edit', [$category]) }}"  --}}
                            <div onclick='editCategory("{{ $category->id }}")' 
                               class="text-green-600 hover:text-green-800 text-xs font-medium transition-colors">
                                ویرایش
                            </div>
                            <div onclick='deleteC(this,"{{ $category->id }}")'
                               class="text-red-600 hover:text-red-800 text-xs font-medium transition-colors">
                                حذف
                            </div>
                            {{-- href="{{ route('cpm.create' , [$category]) }}" --}}
                            <div onclick='openCPMform("{{ $category->id }}")'
                            class="inline-flex items-center justify-center gap-2 text-indigo-500  py-2.5 rounded-lg text-sm transition-colors">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                ایجاد آیتم جدید
                            </div>
                            <a href="{{ route('custmCategory.item_list' , [$category]) }}" 
                            class="inline-flex items-center justify-center gap-2 text-indigo-500  py-2.5 rounded-lg text-sm transition-colors">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                مشاهده لیست آیتم‌ها
                            </a>
                        </div>
                    </div>
                </div>
             
                @endforeach
                @if(!$hasCategory)
                    <div class="py-12 text-center empty-message" id="empty-category-message">
                        <h3 class="text-lg font-medium text-gray-600 mb-2">هیچ دسته بندی یافت نشد</h3>
                        <p class="text-gray-500 text-sm mb-6">هنوز هیچ دسته بندی ای ایجاد نکرده‌اید</p>
                    </div>
                @endif
            </div>
        </div>
       
    </div>
     @foreach($custom_product->customCategories as $category)
    <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form" id="editCategoryform">
        <div class="w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative bg-white" id="closeEditCform">
            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200" onclick="closeForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                    <path fill="gray" d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
            </div>
            <form action="{{ route('custmCategory.update')}}" method="post" enctype='multipart/form-data'
                class="w-11/12 lg:w-3/4 mx-auto py-5 rounded-lg">
                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
                <input type="hidden" name="custom_pro_id" id="custom_pro_id_cat" value="{{ $category->custom_products->id }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 lg:gap-4">
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="title">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان
                            </legend>
                            <input type="title" name="title" id="customCategoryTitle" value="{{$category->title}}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="required">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">الزامی بودن یا نبودن
                            </legend>
                            <input type="checkbox" name="required" id="customCategoryRequired" value="{{ $category->required }}" @if($category->required) {{ "checked" }}  @endif
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="description">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                حداکثر مقدار مواد</legend>
                            <input type="text" name="max_item_amount" id="max_item_amount_category" value="{{ $category->max_item_amount }}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    
                </div>
                <div class="text-center md:px-12 mt-5 lg:mt-10">
                    <button onclick='updateCategory(event, "{{ $category->id }}")'
                        class="w-5/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-10 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ویرایش</button>
                </div>
            </form>
        </div>
    </div> 
    @endforeach
     @foreach($custom_product->customCategories as $category)
     <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form" id="createCPMform">
        <div class="w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative bg-white" id="closeEditCform">
            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200" onclick="closeForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                    <path fill="gray" d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
            </div>
            <form action="{{ route('cpm.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- ستون اول -->
                    <div class="space-y-4">
                        <div>
                            <label for="title" class="block text-sm font-medium mb-1">
                                عنوان *
                            </label>
                            <input type="text" 
                                name="title" 
                                id="cpmtitle"
                                required
                                class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium mb-1">
                                توضیحات
                            </label>
                            <textarea name="description" 
                                    id="cpmdescription"
                                    rows="3"
                                    class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none"></textarea>
                        </div>

                        <div>
                            <label for="price_per_unit" class="block text-sm font-medium mb-1">
                                قیمت هر واحد *
                            </label>
                            <input type="number" 
                                name="price_per_unit" 
                                id="cpm_price_per_unit"
                                required
                                min="0"
                                class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="order" class="block text-sm font-medium mb-1">
                                ترتیب
                            </label>
                            <input type="number" 
                                name="order" 
                                id="cpmorder"
                                min="0"
                                required
                                class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none">
                        </div>
                    </div>

                    <!-- ستون دوم -->
                    <div class="space-y-4">
                        <div>
                            {{-- <label for="image" class="block text-sm font-medium mb-1">
                                تصویر
                            </label>
                            <input type="file" 
                                name="image" 
                                id="image"
                                accept="image/*"
                                class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none">
                        </div> --}}

                        <div>
                            <label for="max_unit_amount" class="block text-sm font-medium mb-1">
                                حداکثر تعداد واحد
                            </label>
                            <input type="number" 
                                name="max_unit_amount" 
                                id="cpm_max_unit_amount"
                                min="1"
                                required
                                class="w-full p-2 border rounded focus:border-blue-500 focus:outline-none">
                        </div>
                        {{-- @dd($customCategory->id); --}}
                        <input type="hidden" name="custom_pro_id" id="custom_pro_id_field">
                        <input type="hidden" name="category_id" id="category_id_field">
                        <div class="flex items-center">
                            <input type="checkbox" 
                                name="required" 
                                id="cpmrequired"
                                value="1"
                                class="ml-2">
                            <label for="required" class="text-sm">
                                اجباری
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="submit" onclick="cpmStore(event)" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        ثبت محصول
                    </button>
                </div>
            </form>
        </div>
    </div>  
    @endforeach
</div>
<div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form" id="createCform">
    <div class="w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative" id="closeCreateCform">
    <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200" onclick="closeForm()">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
            <path fill="gray" d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
        </svg>
    </div>
    <form action="{{ route('custmCategory.store') }}" method="post" enctype="multipart/form-data" class="bg-white w-1/2 p-5 rounded-lg">
        @csrf
                                        
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium mb-2">
                عنوان دسته بندی
            </label>
            <input type="text" 
                name="titleCategory" 
                id="titleCustomCategory"
                required
                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
        </div>
        <div class="mb-4 flex flex-row gap-5">
            <input type="checkbox"
                name="requiredCategory" 
                id="requiredCustomCategory"
                value="1"
                class="p-1 border rounded focus:border-blue-500">
                <label for="required" class="text-sm font-medium">
                الزامی بودن یا نبودن 
                </label>
            </div>
                                            
            <div class="mb-6">
                <label for="max_item_amount" class="block text-sm font-medium mb-2">
                حداکثر تعداد آیتم
            </label>
            <input type="number" 
                name="max_item_amount" 
                id="max_item_amount_customCategory"
                required
                min="1"
                class="w-full p-2 rounded border-1 border-gray-300 rounded focus:border-blue-500 focus:outline-none">
            </div>

            <div class="flex justify-end gap-3" >
                <button type="submit" onclick="Categorystore(event)" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 cursor-pointer">
                    ثبت
                </button>
            </div>
            <input type="hidden" name="custom_pro_id"  id="custom_pro_id_customCategory">
    </form>
    </div>
</div>


<script>
    let categoryEditForm = document.getElementById('editCategoryform')
    let createCategoryform = document.getElementById('createCform')

    let titleCategory = document.getElementById('customCategoryTitle')
    let requierdCategory = document.getElementById('customCategoryRequired')
    let category_max_item_amount = document.getElementById('max_item_amount_category')
    let category_custom_pro_id = document.getElementById('custom_pro_id_cat')
    let forms = document.querySelectorAll(".form")
    let custom_category_section = document.getElementById('custom_category_section')
    let custom_pro_id_customCategory = document.getElementById('custom_pro_id_customCategory')
    
    let cpmformCreate = document.getElementById('createCPMform')

    let cpmtitle = document.getElementById('cpmtitle')
    let cpmdescription = document.getElementById('cpmdescription')
    let cpm_price_per_unit = document.getElementById('cpm_price_per_unit')
    let cpmorder = document.getElementById('cpmorder')
    let cpm_max_unit_amount = document.getElementById('cpm_max_unit_amount')
    let cpmrequired = document.getElementById('cpmrequired')
    let cpm_category_id = document.getElementById('category_id_field')
    let cpm_custom_pro_id = document.getElementById('custom_pro_id_field')
    let titleCustomCategory = document.getElementById('titleCustomCategory')
    let category = document.getElementById('requiredCustomCategory')
    let max_item_amount_customCategory = document.getElementById('max_item_amount_customCategory')



  
    

    function closeForm(){
        forms.forEach((form)=>{
            form.classList.add('invisible')
            form.classList.add('opacity-0')
        })
    }
   
    function openCPMform(catId){
        cpmformCreate.classList.remove('invisible')
        cpmformCreate.classList.remove('opacity-0')
        cpm_category_id.value = catId;
        cpm_custom_pro_id.value = "{{ $custom_product->id }}";
    }
    function openCform(cpId){
        createCategoryform.classList.remove('invisible')
        createCategoryform.classList.remove('opacity-0')
        custom_pro_id_customCategory.value = cpId
    }
    function cpmStore(ev){
        ev.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url : "{{ route('cpm.store') }}" ,
            type : "POST" ,
            dataType : "json" ,
            data : {
                'title' : cpmtitle.value,
                'description' : cpmdescription.value,
                'price_per_unit' : cpm_price_per_unit.value,
                'requierd' : cpmrequired.value,
                'order' : cpmorder.value,
                'max_unit_amount' : cpm_max_unit_amount.value,
                'custom_pro_id': cpm_custom_pro_id.value,
                'category_id': cpm_category_id.value
                // 'customProductImage' : customProductImage.value,
            },
            success: function(data){
                console.log(data)
                cpmtitle.value = ""
                cpmdescription.value = ""
                cpm_price_per_unit.value = ""
                cpmorder.value = ""
                cpm_max_unit_amount.value = ""
                cpmrequired.checked = 0
                cpm_custom_pro_id.value = ""
                cpm_category_id.value = ""
               
                closeForm()
            },
            error: function(){
                alert('خطا در ارسال داده')
            }
    
        })
    }

    function Categorystore(ev){
    ev.preventDefault()
    let checkBoxStatus = category.checked

    category.value = 0

    if(checkBoxStatus){
        category.value = 1
    }

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : "{{ csrf_token() }}"
        }
    })
    $.ajax({
        url : "{{ route('custmCategory.store') }}" ,
        type : "POST" ,
        dataType : "json" ,
        data : {
            'title' : titleCustomCategory.value,
            'required' : category.value,
            'max_item_amount' : max_item_amount_customCategory.value,
            'custom_pro_id' : custom_pro_id_customCategory.value,
        },
        success: function(data){
            console.log(data)
            custom_pro_id_customCategory.value = ""
            max_item_amount_customCategory.value =""
            category.checked = 0
            titleCustomCategory.value =""
            
            // حذف پیام "هیچ دسته بندی یافت نشد" اگر وجود دارد
            let emptyMessage = document.getElementById('empty-category-message');
            if (emptyMessage) {
                emptyMessage.remove();
            }
            
            let div = document.createElement('div')
            let element = `
                <div class="grid grid-cols-12 gap-4 px-6 py-4 hover:bg-gray-50/50 transition-colors newParameters" data-cp-id="${ data.id }">
                    <!-- نام دسته‌بندی -->
                    <div class="col-span-3">
                        <span class="text-sm text-gray-800 font-medium">${ data.title }</span>
                    </div>

                    <div>
                        <span class="text-xs px-2 py-1 rounded ${ data.required ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }">
                            ${ data.required ? 'الزامی' : 'اختیاری' }
                        </span>
                    </div>

                    <!-- حداکثر مواد -->
                    <div class="col-span-2">
                        <span class="text-sm text-gray-700">${ data.max_item_amount }</span>
                    </div>
                    
                    <!-- عملیات -->
                    <div class="col-span-4">
                        <div class="flex flex-wrap gap-4">
                            <a href="/admin/customCategories/${data.id}" 
                               class="text-blue-600 hover:text-blue-800 text-xs font-medium transition-colors">
                                مشاهده
                            </a>
                           
                            <div onclick='editCategory(${data.id})' 
                               class="text-green-600 hover:text-green-800 text-xs font-medium transition-colors">
                                ویرایش
                            </div>
                            <div onclick='deleteC(this,${data.id})'
                               class="text-red-600 hover:text-red-800 text-xs font-medium transition-colors">
                                حذف
                            </div>
                            <div onclick='openCPMform(${data.id})'
                            class="inline-flex items-center justify-center gap-2 text-indigo-500  py-2.5 rounded-lg text-sm transition-colors">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                ایجاد آیتم جدید
                            </div>
                            <a href="/admin/customCategories/${data.id}/items" 
                            class="inline-flex items-center justify-center gap-2 text-indigo-500  py-2.5 rounded-lg text-sm transition-colors">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                مشاهده لیست آیتم‌ها
                            </a>
                        </div>
                    </div>
                </div>
                `
            div.innerHTML = element
            custom_category_section.appendChild(div)
            // alert('دسته ' + data.title + 'با موفقیت ذخیره شد')
            closeForm()
        },
        error: function(){
            alert('خطا در ارسال داده')
        }

    })
}
    function editCategory(id){
        categoryEditForm.classList.remove('invisible')
        categoryEditForm.classList.remove('opacity-0')

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ route('custmCategory.edit') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                'id': id
            },
            success: function(data){
                console.log(data)
                category_custom_pro_id.value = data.id
                titleCategory.value = data.title
                requierdCategory.value = data.required
                category_max_item_amount.value = data.max_item_amount
            },
            error: function(){
                alert('خطا در دریافت داده ها')
            }
        })
    }

 





    function updateCategory(ev){
        let newParameters = document.querySelectorAll('.newParameters')
        ev.preventDefault()
     let checkBoxStatus = requierdCategory.checked

        requierdCategory.value = 0

        if(checkBoxStatus){
            requierdCategory.value = 1
        }
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        })
         $.ajax({
            url : "{{ route('custmCategory.update') }}" ,
            type : "POST" ,
            dataType : "json" ,
            data : {
                'id': category_custom_pro_id.value,
                'title' : titleCategory.value,
                'required' : requierdCategory.value,
                // 'customProductImage' : customProductImage.value,
                'max_item_amount' : category_max_item_amount.value,
            },
            success: function(data){
                // let div = document.createElement('div')
                newParameters.forEach((element)=>{
                    if(element.getAttribute('data-cp-id') == data.id){
                        element.children[0].children[0].innerText = data.title 
                        if(data.required == 1){
                            element.children[1].children[0].classList.remove('bg-green-50')
                            element.children[1].children[0].classList.remove('text-green-600')
                            element.children[1].children[0].classList.add('bg-red-50')
                            element.children[1].children[0].innerText = 'الزامی'
                            element.children[1].children[0].classList.add('text-red-600')
                        }
                        if(data.required == 0){
                            element.children[1].children[0].innerText = 'اختیاری' 
                            element.children[1].children[0].classList.remove('bg-red-50')
                            element.children[1].children[0].classList.remove('text-red-600')
                            element.children[1].children[0].classList.add('bg-green-50')
                            element.children[1].children[0].classList.add('text-green-600')
                        }
                        // element.children[1].children[0].innerText = data.required 
                        element.children[2].children[0].innerText = data.max_item_amount 
                    }
                })
                closeForm()
                console.log(data)
            },
            error: function(){
                alert('خطا در ارسال داده')
            }
    
        })
    }

    
    function deleteC(element , catId){
    
    
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : "{{ csrf_token() }}"
        }
    })
    
    $.ajax({
        url : "{{ route('custmCategory.delete') }}" ,
        type : "POST" ,
        dataType : "json" ,
        data : {
            'id': catId,
        },
        success: function(data){
            let row = element.parentElement.parentElement.parentElement;
            
            
            
            if (row) {
                row.remove();
            }
            
        
            let remainingCategories = custom_category_section.querySelectorAll('.newParameters');
            if (remainingCategories.length === 0) {
                custom_category_section.innerHTML = `
                    <div class="py-12 text-center empty-message" id="empty-category-message">
                        <h3 class="text-lg font-medium text-gray-600 mb-2">هیچ دسته بندی یافت نشد</h3>
                        <p class="text-gray-500 text-sm mb-6">هنوز هیچ دسته بندی ای ایجاد نکرده‌اید</p>
                    </div>
                `;
            }
        },
        error: function(){
            alert('خطا در حذف داده: ')
        }
    })
}
</script>
@endsection