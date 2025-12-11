@extends('admin.app.panel')
@section('title', 'دسته‌بندی‌های محصول')
@section('content')

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
            <div class="divide-y divide-gray-100">
                @foreach($custom_product->customCategories as $category)
                    {{-- @if($custom_product_id == $category->custom_pro_id) --}}
                <div class="grid grid-cols-12 gap-4 px-6 py-4 hover:bg-gray-50/50 transition-colors newParameters" data-cp-id="{{ $category->id }}">
                    <!-- نام دسته‌بندی -->
                    <div class="col-span-3">
                        <span class="text-sm text-gray-800 font-medium">{{ $category->title }}</span>
                    </div>
                    
                    <!-- الزامی بودن -->
                    <div class="col-span-3">
                        @if($category->required == 1)
                            <span class="inline-flex items-center gap-1 text-red-600 text-xs font-medium bg-red-50 px-3 py-1 rounded-full">
                                <svg class="size-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.795-.833-2.565 0L4.238 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                                انتخاب الزامی است
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 text-green-600 text-xs font-medium bg-green-50 px-3 py-1 rounded-full">
                                <svg class="size-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                انتخابی دلخواه
                            </span>
                        @endif
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
                            <a href="{{ route('custmCategory.delete', [$category]) }}" 
                               class="text-red-600 hover:text-red-800 text-xs font-medium transition-colors">
                                حذف
                            </a>
                            {{-- href="{{ route('cpm.create' , [$category]) }}" --}}
                            <div onclick='deleteC(this,"{{ $category->id }}")'
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
                {{-- @endif --}}
                @endforeach
               
            </div>
        </div>
        @if(count($custom_product->customCategories ?? []) == 0)
                <div class="py-16 text-center">
                    <div class="text-blue-400 mb-4">
                        <svg class="size-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-600 mb-2">دسته بندی یافت نشد</h3>
                    <p class="text-gray-500 text-sm mb-6">هنوز هیچ  دسته بندی ایجاد نکرده‌اید</p>
                    <a href="{{ route('cp.create', [$custom_product->career]) }}" 
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg transition-all duration-200 text-sm font-medium shadow-md hover:shadow-lg">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        ایجاد اولین دسته بندی
                    </a>
                </div>
                @endif
    </div>
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
</div>


<script>
    let categoryEditForm = document.getElementById('editCategoryform')
    let titleCategory = document.getElementById('customCategoryTitle')
    let requierdCategory = document.getElementById('customCategoryRequired')
    let category_max_item_amount = document.getElementById('max_item_amount_category')
    let category_custom_pro_id = document.getElementById('custom_pro_id_cat')
    let forms = document.querySelectorAll(".form")


    function closeForm(){
        forms.forEach((form)=>{
            form.classList.add('invisible')
            form.classList.add('opacity-0')
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
                newParameters.forEach((element)=>{
                    if(element.getAttribute('data-cp-id') == data.id){
                        element.children[0].children[0].innerText = data.title 
                        element.children[1].children[0].innerText = data.required 
                        element.children[3].children[0].innerText = data.max_item_amount 
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
    function deleteCPV(element , cpvId){
        // let newParameters = document.querySelectorAll('.newParameters')
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url : "{{ route('cpv.delete') }}" ,
            type : "POST" ,
            dataType : "json" ,
            data : {
                'id': id,
            },
            success: function(data){
                let row = element.parentElement.parentElement.parentElement.parentElement.parentElement;
                if (row) {
                row.remove();
            }
                // newParameters.forEach((element)=>{
                //     if(element.getAttribute('data-cp-id') == id){
                //         element.remove()
                //     }
                // })
            },
            error: function(){
                alert('خطا در ارسال داده')
            }
    
        })
    } 
</script>
@endsection