@extends('admin.app.panel')
@section('title', 'لیست آیتم‌ها')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="w-full min-h-screen pb-10 pt-6 bg-gray-50">
    <div class="w-11/12 mx-auto">
        
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-xl font-semibold text-gray-800">لیست آیتم‌ها</h1>
                    <p class="text-gray-600 text-sm mt-1">محصول: {{ $customCategory->custom_products->title }}</p>
                </div>
               
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            
            <!-- Table Header -->
            <div class="bg-gray-50 border-b border-gray-200">
                <div class="grid grid-cols-12 px-4 py-3">
                    <div class="col-span-3 text-sm font-medium text-gray-700">نام آیتم</div>
                    <div class="col-span-2 text-sm font-medium text-gray-700">قیمت</div>
                    <div class="text-sm font-medium text-gray-700">عکس</div>
                    <div class="text-sm font-medium text-gray-700">لزوم</div>
                    <div class="text-sm font-medium text-gray-700">دسته‌بندی</div>
                    <div class="col-span-3 text-sm font-medium text-gray-700">عملیات</div>
                </div>
            </div>

            <!-- Table Rows -->
            <div class="divide-y divide-gray-100">
                @php $hasItems = false; @endphp
                    @foreach ($customCategory->custom_product_material as $material)
                        @if($material->category_id == $customCategory->id)
                        @php $hasItems = true; @endphp
                        
                        <div class="grid grid-cols-12 px-4 py-3 hover:bg-gray-50 newParameters" data-cp-id="{{ $material->id }}">
                            <!-- نام آیتم -->
                            <div class="col-span-3">
                                <div class="text-sm font-medium text-gray-800">{{ $material->title }}</div>
                                <div class="text-xs text-gray-500 mt-1 truncate">{{ $material->description }}</div>
                            </div>
                            
                            <!-- قیمت -->
                            <div class="col-span-2">
                                <div class="text-sm text-gray-700">{{ $material->price_per_unit }} تومان</div>
                            </div>
                            
                            <!-- عکس -->
                            <div>
                                @if($material->image)
                                    <img class="size-10 object-cover rounded border border-gray-200" 
                                         src="{{ asset('storage/' . $material->image) }}">
                                @else
                                    <span class="text-xs text-gray-400">-</span>
                                @endif
                            </div>
                            
                            <!-- لزوم -->
                            <div>
                                <span class="text-xs px-2 py-1 rounded {{ $material->required ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                    {{ $material->required ? 'الزامی' : 'اختیاری' }}
                                </span>
                            </div>
                            
                            <!-- دسته‌بندی -->
                            <div>
                                <span class="text-sm text-gray-700">{{ $material->customCategory->title ?? '-' }}</span>
                            </div>
                            
                            <!-- عملیات -->
                            <div class="col-span-3">
                                <div class="flex gap-3">
                                    <a href="{{ route('cpm.single', [$material]) }}" 
                                       class="text-blue-600 hover:text-blue-800 text-sm">
                                        مشاهده
                                    </a>
                                    {{-- href="{{ route('cpm.edit', [$material]) }}"  --}}
                                    <div onclick='editCPM("{{ $material->id }}")' 
                                       class="text-green-600 hover:text-green-800 text-sm">
                                        ویرایش
                                    </div>
                                    {{-- href="{{ route('cpm.delete', [$material]) }}" --}}
                                    <div onclick='deleteCPM(this,"{{ $material->id }}")' 
                                       class="text-red-600 hover:text-red-800 text-sm">
                                        حذف
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                
                @if(!$hasItems)
                    <div class="py-12 text-center">
                        <p class="text-gray-500 mb-4">هیچ آیتمی یافت نشد</p>
                        <a href="{{ route('cpm.create' , [$customCategory]) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                            ایجاد اولین آیتم
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form" id="editCPMform">
        <div class="w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative bg-white" id="closeEditCPMform">
            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200" onclick="closeForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                    <path fill="gray" d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
            </div>
             <form action="{{ route('cpm.update')}}" method="post" enctype='multipart/form-data'
                class="w-11/12 lg:w-3/4 mx-auto py-5 rounded-lg">
                @csrf
                <input type="hidden" name="id" value="{{ $material->id }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 lg:gap-4">
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="title">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عنوان
                            </legend>
                            <input type="text" name="title" id="titlecpm" value="{{ $material->title }}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="description">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                توضیحات</legend>
                            <input type="text" name="description" id="descriptioncpm" value="{{ $material->description }}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="price_per_unit">
                            <legend class="p-1 w-25 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                 قیمت بر اساس هر واحد </legend>
                            <input type="text" name="price_per_unit" id="price_per_unit_cpm" value="{{ $material->price_per_unit }}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="required">
                            <legend class="p-1 w-30 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                لزوم   </legend>
                            <input type="checkbox" name="required" id="requiredcpm" value="{{ $material->required }}" @if($material->required) {{ "checked" }}  @endif
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="order">
                            <legend class="p-1 w-30 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                ترتیب   </legend>
                            <input type="text" name="order" id="ordercpm" value="{{ $material->order }}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="max_unit_amount">
                            <legend class="p-1 w-30 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">
                                حداکثر  واحد   </legend>
                            <input type="text" name="max_unit_amount" id="max_unit_amount_cpm" value="{{ $material->max_unit_amount }}"
                                class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                        </fieldset>
                    </div>
                    {{-- <div class="w-full flex flex-col">
                        <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] sm:py-1 pr-3"
                            for="image">
                            <legend class="p-1 w-20 sm:bg-blue-400 sm:text-white rounded-full flex flex-row justify-center text-sm">عکس
                            </legend>
                            <input type="file" name="image" class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500" value={{ $material->image }}>
                        </fieldset>
                    </div> --}}
                </div>
                <input type="hidden" name="custom_product_id" id="custom_product_id_cpm" value="{{ $material->custom_product->id }}"> 
                <input type="hidden" name="custom_category_id" id="custom_category_id_cpm" value="{{ $material->customCategory->id }}"> 
                <div class="text-center md:px-12 mt-5 lg:mt-10">
                    <button onclick='updatecpm(event, "{{ $material->id }}")'
                        class="w-5/12 max-sm:bg-blue-500 max-sm:text-white px-5 py-2 lg:px-10 lg:py-3 rounded-[8px] transition-all duration-250 bg-blue-400 text-white hover:bg-blue-600 hover:border-gray-400 hover:text-white text-gray-500 cursor-pointer">ویرایش</button>
                </div>
            </form>
        </div>
    </div> 
</div>
    <script>
        let cpmEditForm = document.getElementById('editCPMform')
        let forms = document.querySelectorAll(".form")
        let custom_product_id_cpm = document.getElementById('custom_product_id_cpm')
        let custom_category_id_cpm = document.getElementById('custom_category_id_cpm')
        let titlecpm = document.getElementById('titlecpm')
        let descriptioncpm = document.getElementById('descriptioncpm')
        let price_per_unit_cpm = document.getElementById('price_per_unit_cpm')
        let requiredcpm = document.getElementById('requiredcpm')
        let ordercpm = document.getElementById('ordercpm')
        let max_unit_amount_cpm = document.getElementById('max_unit_amount_cpm')


        function closeForm(){
            forms.forEach((form)=>{
                form.classList.add('invisible')
                form.classList.add('opacity-0')
            })
        }
        function editCPM(cpmId){
        cpmEditForm.classList.remove('invisible')
        cpmEditForm.classList.remove('opacity-0')

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ route('cpm.edit') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                'id': cpmId
            },
            success: function(data){
                console.log(data)
                titlecpm.value = data.title
                requiredcpm.value = data.required
                price_per_unit_cpm.value = data.price_per_unit
                ordercpm.value = data.order
                max_unit_amount_cpm.value = data.max_unit_amount
                descriptioncpm.value = data.description
                custom_product_id_cpm.value = data.custom_product_id
                custom_category_id_cpm.value = data.category_id
            },
            error: function(){
                alert('خطا در دریافت داده ها')
            }
        })
    }


    function updatecpm(ev){
        let newParameters = document.querySelectorAll('.newParameters')
        ev.preventDefault()
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        })
         $.ajax({
            url : "{{ route('cpm.update') }}" ,
            type : "POST" ,
            dataType : "json" ,
            data : {
                'custom_product_id': custom_product_id_cpm.value,
                'title' : titlecpm.value,
                'description' : descriptioncpm.value,
                'price_per_unit' : price_per_unit_cpm.value,
                'required' : requiredcpm.value,
                'order' : ordercpm.value,
                'max_unit_amount' : max_unit_amount_cpm.value,
                'category_id' : custom_category_id_cpm.value
                // 'customProductImage' : customProductImage.value,
            },
            success: function(data){
                console.log(data)
                let div = document.createElement('div')
                newParameters.forEach((element)=>{
                    if(element.getAttribute('data-cp-id') == data.id){
                        element.children[0].children[0].innerText = data.title 
                        element.children[0].children[1].innerText = data.description 
                        element.children[1].children[0].innerText = data.price_per_unit 
                        element.children[3].children[0].innerText = data.required    
                        // element.children[4].children[0].innerText = data.required    
                    }
                })
                closeForm()
            },
            error: function(){
                alert('خطا در ارسال داده')
            }
    
        })
    }


    function deleteCPM(element , cpmId){
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url : "{{ route('cpm.delete') }}" ,
            type : "POST" ,
            dataType : "json" ,
            data : {
                'id': cpmId,
            },
            success: function(data){
                let row = element.parentElement.parentElement.parentElement;
                if (row) {
                row.remove();
            }
            },
            error: function(){
                alert('خطا در ارسال داده')
            }

        })
    }
    </script>

@endsection       