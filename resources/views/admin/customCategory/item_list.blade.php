@extends('admin.app.panel')
@section('title', 'لیست آیتم‌ها')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="w-full min-h-screen pb-10 pt-6 bg-white">
    <div class="w-11/12 mx-auto">
        
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-xl font-semibold text-gray-800">لیست آیتم‌ها</h1>
                    <p class="text-gray-600 text-sm mt-1">محصول: {{ $customCategory->custom_products->title }}</p>
                </div>
                <div onclick='openCPMform("{{ $customCategory->id }}")'
                    class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg cursor-pointer" >
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span class="text-sm font-medium">ایجاد آیتم </span>
                </div>
               
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            
            <!-- Table Header -->
            <div class="bg-gray-100 border-b border-gray-200">
                <div class="grid grid-cols-12 px-4 py-3">
                    <div class="col-span-3 text-sm font-medium text-gray-700">نام آیتم</div>
                    <div class="col-span-2 text-sm font-medium text-gray-700">قیمت</div>
                    <div class="text-sm font-medium text-gray-700">عکس</div>
                    <div class="text-sm font-medium text-gray-700">لزوم</div>
                    <div class="text-sm font-medium text-gray-700">ترتیب</div>
                    <div class="text-sm font-medium text-gray-700">حداکثر مقدار</div>
                    <div class="text-sm font-medium text-gray-700">دسته‌بندی</div>
                    <div class="col-span-3 text-sm font-medium text-gray-700">عملیات</div>
                </div>
            </div>

            <!-- Table Rows -->
            <div class="divide-y divide-gray-100" id="product_item_section">
                @php $hasItems = false; @endphp
                    @foreach ($customCategory->custom_product_material as $material)
                        @if($material->category_id == $customCategory->id)
                        @php $hasItems = true; @endphp
                      
                        <div class="grid grid-cols-12 px-4 py-3 bg-gray-50 newParameters" data-cp-id="{{ $material->id }}">
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
                            {{-- ترتیب --}}
                             <div class="col-span-2">
                                <div class="text-sm text-gray-700">{{ $material->order }} </div>
                            </div>
                            {{-- حداکثر مقدار --}}
                             <div class="col-span-2">
                                <div class="text-sm text-gray-700">{{ $material->max_unit_amount }}  </div>
                            </div>
                            
                            <!-- دسته‌بندی -->
                            <div>
                                <span class="text-sm text-gray-700">{{ $material->customCategory->title ?? '-' }}</span>
                            </div>
                            
                            <!-- عملیات -->
                            <div class="col-span-3">
                                <div class="flex gap-3">
                                     <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-3 gap-4">
                                        <li class="flex justify-center">
                                            <a href="{{ route('cpm.single', [$material]) }}" 
                                                class="w-fit flex flex-row items-center justify-center bg-sky-500 hover:bg-sky-600 p-1 rounded-sm"
                                                title="مشاهده">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                    viewBox="0 0 576 512">
                                                    <path fill="white"
                                                        d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="flex justify-center">
                                            <div onclick='editCPM("{{ $material->id }}")'  class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                                title="ویرایش">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                    viewBox="0 0 512 512">
                                                    <path fill="white"
                                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                </svg>
                                            </div>
                                        </li>
                                        <li class="flex justify-center">
                                            <div onclick='deleteCPM(this, "{{ $material->id }}")'
                                                class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                                title="حذف">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                    viewBox="0 0 448 512">
                                                    <path fill="white"
                                                        d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                </svg>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                
                @if(!$hasItems)
                    <div class="py-12 text-center">
                        <h3 class="text-lg font-medium text-gray-600 mb-2">هیچ آیتمی یافت نشد</h3>
                        <p class="text-gray-500 text-sm mb-6">هنوز هیچ  آیتمی ایجاد نکرده‌اید</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @foreach ($customCategory->custom_product_material as $material)
    <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form" id="editCPMform">
        <div class="w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative " id="closeEditCPMform">
            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200" onclick="closeForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                    <path fill="gray" d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
            </div>
             <form action="{{ route('cpm.update')}}" method="post" enctype="multipart/form-data" class="bg-white w-1/2 p-5 rounded-lg relative">
                <div id="itemListLoading"
                    class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">
                </div>
                @csrf
                <input type="hidden" name="id" id="cpmId">
                    
                        <div class="mb-4">
                            <label for="titlecpm" class="block text-sm font-medium mb-2">
                                عنوان
                            </label>
                            <input type="text" 
                                name="title" 
                                id="titlecpm"
                                required
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="mb-4">
                            <label for="descriptioncpm" class="block text-sm font-medium mb-2">
                                عنوان
                            </label>
                            <input type="text" 
                                name="description" 
                                id="descriptioncpm"
                                required
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="mb-4">
                            <label for="price_per_unit_cpm" class="block text-sm font-medium mb-2">
                             قیمت بر اساس هر واحد 
                            </label>
                            <input type="text" 
                                name="price_per_unit" 
                                id="price_per_unit_cpm"
                                required
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="mb-4 flex flex-row items-center gap-3">
                            <input  type="checkbox" name="required" id="requiredcpm"  @if($material->required) {{ "checked" }}  @endif>
                            <label for="editTitleCP" class="block text-sm font-medium mb-2">
                                لزوم
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="max_item_amount_category" class="block text-sm font-medium mb-2">
                                ترتیب
                            </label>
                            <input type="text" 
                                name="order" 
                                id="ordercpm"
                                value="{{ $material->order }}"
                                required
                                placeholder="محدودیت متریال را وارد کنید"
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="mb-4">
                            <label for="max_unit_amount_cpm" class="block text-sm font-medium mb-2">
                               حداکثر  واحد 
                            </label>
                            <input type="text" 
                                name="max_unit_amount" 
                                id="max_unit_amount_cpm"
                                value="{{ $material->max_unit_amount }}"
                                required
                                placeholder="محدودیت متریال را وارد کنید"
                                class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
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
    @endforeach
     @foreach([$customCategory] as $category)
     <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form" id="createCPMform">
        <div class="w-[calc(100%-265px)] float-end flex justify-center items-center h-dvh relative" id="closeEditCform">
            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200" onclick="closeForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                    <path fill="gray" d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
            </div>
            {{-- <form action="{{ route('cpm.store') }}" method="post" enctype="multipart/form-data">
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
                        <input type="hidden" name="custom_pro_id" id="custom_pro_id_field" value="{{ $customCategory->custom_products->id }}">
                        <input type="hidden" name="category_id" id="category_id_field" value="{{ $customCategory->id }}">
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
            </form> --}}

            <form action="{{ route('cpm.store') }}" method="post" enctype="multipart/form-data" class="bg-white w-1/2 p-5 rounded-lg">
            @csrf
                                            
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium mb-2">
                    عنوان دسته بندی
                </label>
                <input type="text" 
                    name="title" 
                    id="cpmtitle"
                    required
                    class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
            </div>
            <div class="mb-4">
                <label for="cpmdescription" class="block text-sm font-medium mb-2">
                    توضیحات
                </label>
                <input type="text" 
                    name="description" 
                    id="cpmdescription"
                    required
                    class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
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
                    class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
            </div>
            <div>
                <label for="order" class="block text-sm font-medium mb-1 mt-3">
                    ترتیب
                </label>
                <input type="number" 
                    name="order" 
                    id="cpmorder"
                    min="0"
                    required
                    class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
            </div>
            <div class="space-y-4">
                <label for="cpm_max_unit_amount" class="block text-sm font-medium mb-1 mt-3">
                    حداکثر تعداد واحد
                </label>
                <input type="number" 
                    name="max_unit_amount" 
                    id="cpm_max_unit_amount"
                    min="1"
                    required
                    class="w-full p-2 border-1 rounded border-gray-300 focus:border-blue-500 focus:outline-none">
            </div>
            <input type="hidden" name="custom_pro_id" id="custom_pro_id_field" value="{{ $customCategory->custom_products->id }}">
            <input type="hidden" name="category_id" id="category_id_field" value="{{ $customCategory->id }}">
            <div class="flex items-center mt-3">
                <input type="checkbox" 
                    name="required" 
                    id="cpmrequired"
                    value="1"
                    class="ml-2">
                <label for="required" class="text-sm">
                    اجباری
                </label>
            </div>
            <div class="flex justify-end gap-3" >
                    <button onclick="cpmStore(event)" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 cursor-pointer">
                        ثبت
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>  
    @endforeach
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
        let createCPMform = document.getElementById('createCPMform')
        let product_item_section = document.getElementById('product_item_section')
        let cpmIdInp = document.getElementById("cpmId")

        let cpmtitle = document.getElementById('cpmtitle')
        let cpmdescription = document.getElementById('cpmdescription')
        let cpm_price_per_unit = document.getElementById('cpm_price_per_unit')
        let cpmorder = document.getElementById('cpmorder')
        let cpm_max_unit_amount = document.getElementById('cpm_max_unit_amount')
        let cpmrequired = document.getElementById('cpmrequired')

        let cpm_custom_pro_id = document.getElementById('custom_pro_id_field');
        let cpm_category_id = document.getElementById('category_id_field');

        let itemListLoading = document.getElementById('itemListLoading')
        
        function closeForm(){
            forms.forEach((form)=>{
                form.classList.add('invisible')
                form.classList.add('opacity-0')
            })
        }

        function openCPMform(catId){
            createCPMform.classList.remove('invisible')
            createCPMform.classList.remove('opacity-0')
        }
        function cpmStore(ev){
            ev.preventDefault()
            const categoryTitle = "{{ $customCategory->title }}";
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
                    'required' : cpmrequired.checked ? 1 : 0,
                    'order' : cpmorder.value,
                    'max_unit_amount' : cpm_max_unit_amount.value,
                    'custom_pro_id': cpm_custom_pro_id.value,
                    'category_id': "{{ $customCategory->id }}"
                    // 'customProductImage' : customProductImage.value,
                },
                success: function(data){
                    console.log(data)
               
                    let div = document.createElement('div')
                    let element = `
                        <div class="grid grid-cols-12 px-4 py-3 bg-gray-50 newParameters" data-cp-id="${data.id }">
                            <!-- نام آیتم -->
                            <div class="col-span-3">
                                <div class="text-sm font-medium text-gray-800">${ data.title }</div>
                                <div class="text-xs text-gray-500 mt-1 truncate">${ data.description }</div>
                            </div>
                            
                            <!-- قیمت -->
                            <div class="col-span-2">
                                <div class="text-sm text-gray-700">${ data.price_per_unit } </div>
                            </div>
                            
                            
                            <!-- لزوم -->
                            <div>
                                <span class="text-xs px-2 py-1 rounded ${ data.required ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }">
                                    ${ data.required ? 'الزامی' : 'اختیاری' }
                                </span>
                            </div>
                            {{-- ترتیب --}}
                             <div class="col-span-2">
                                <div class="text-sm text-gray-700">${ data.order } </div>
                            </div>
                            {{-- حداکثر مقدار --}}
                             <div class="col-span-2">
                                <div class="text-sm text-gray-700">${ data.max_unit_amount }</div>
                            </div>
                            <div>
                                <span class="text-sm text-gray-700">${categoryTitle}</span>
                            </div>
                            <!-- عملیات -->
                            <div class="col-span-3">
                                <div class="flex gap-3">
                                    <a href="/admin/cpm/single/${data.id}" 
                                       class="text-blue-600 hover:text-blue-800 text-sm">
                                        مشاهده
                                    </a>
                                  
                                    <div onclick='editCPM("${data.id}")' 
                                       class="text-green-600 hover:text-green-800 text-sm cursor-pointer">
                                        ویرایش
                                    </div>
                                    
                                    <div onclick='deleteCPM(this, "${data.id}")' 
                                       class="text-red-600 hover:text-red-800 text-sm cursor-pointer">
                                        حذف
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                    div.innerHTML = element
                    if (product_item_section.children.length > 0 && 
                        product_item_section.children[0].classList.contains('py-12')) {
                        // اگر پیام "هیچ آیتمی یافت نشد" وجود دارد، حذفش کن
                        product_item_section.innerHTML = '';
                    }
                    product_item_section.appendChild(div)
                    cpmtitle.value = ""
                    cpmdescription.value = ""
                    cpm_price_per_unit.value = ""
                    cpmorder.value = ""
                    cpm_max_unit_amount.value = ""
                    cpmrequired.checked = false
                    closeForm()
                },
                error: function(){
                    alert('خطا در ارسال داده')
                }
    
            })
        }
        function editCPM(cpmId){
            cpmEditForm.classList.remove('invisible')
            cpmEditForm.classList.remove('opacity-0')
            itemListLoading.classList.remove('hidden')
            itemListLoading.classList.add('flex')
            itemListLoading.innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `

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
                    // console.log(data.required)
                    itemListLoading.classList.remove('flex')
                    itemListLoading.classList.add('hidden')
                    
                    cpmIdInp.value = data.id
                    titlecpm.value = data.title
                    // requiredcpm.value = data.required
                    if (data.required) {
                        requiredcpm.setAttribute('checked', true)
                        // requiredcpm.value = 1
                    } 
                    if(!data.required){
                        requiredcpm.removeAttribute('checked')
                        // requiredcpm.value = 0
                    }
                    price_per_unit_cpm.value = data.price_per_unit
                    ordercpm.value = data.order
                    max_unit_amount_cpm.value = data.max_unit_amount
                    descriptioncpm.value = data.description
                    custom_product_id_cpm.value = data.custom_product_id
                    custom_category_id_cpm.value = data.category_id
                    // console.log(requiredcpm.value)
                },
                error: function(){
                    alert('خطا در دریافت داده ها')
                }
            })
        }


    function updatecpm(ev){
        let newParameters = document.querySelectorAll('.newParameters')
        ev.preventDefault()
        itemListLoading.classList.remove('hidden')
        itemListLoading.classList.add('flex')
        itemListLoading.innerHTML = `
        <div class="loading-wave">
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
            <div class="loading-bar"></div>
        </div>
        `

        let checkBoxStatus = requiredcpm.checked

        requiredcpm.value = 0

        if(checkBoxStatus){
            requiredcpm.value = 1
        }

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
                'id': cpmIdInp.value,
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
                itemListLoading.classList.remove('flex')
                itemListLoading.classList.add('hidden')
                
                // let div = document.createElement('div')
                newParameters.forEach((element)=>{
                    if(element.getAttribute('data-cp-id') == data.id){
                        element.children[0].children[0].innerText = data.title 
                        element.children[0].children[1].innerText = data.description 
                        element.children[1].children[0].innerText = data.price_per_unit 
                        if(data.required == 1){
                            element.children[3].children[0].innerText = 'الزامی'
                            element.children[3].children[0].classList.remove('bg-green-100')
                            element.children[3].children[0].classList.remove('text-green-700')
                            element.children[3].children[0].classList.add('bg-red-100')
                            element.children[3].children[0].classList.add('text-red-700')
                        }
                        if(data.required == 0){
                            element.children[3].children[0].innerText = 'اختیاری' 
                            element.children[3].children[0].classList.remove('bg-red-100')
                            element.children[3].children[0].classList.remove('text-red-700')
                            element.children[3].children[0].classList.add('bg-green-100')
                            element.children[3].children[0].classList.add('text-green-700')
                        }
                        element.children[4].children[0].innerText = data.order 
                        element.children[5].children[0].innerText = data.max_unit_amount 
                    }
                })
                closeForm()
            },
            error: function(){
                alert('خطا در ارسال داده')
            }
    
        })
    }


  function deleteCPM(element, cpmId){
    
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : "{{ csrf_token() }}"
        }
    })
    
    $.ajax({
        url : "{{ route('cpm.delete') }}",
        type : "POST",
        dataType : "json",
        data : {
            'id': cpmId,
        },
        success: function(data){
            let row = element.closest('.newParameters');
            if (row) {
                row.remove();
            }
            
            // اگر آیتمی باقی نماند، پیام نشان بده
            if (product_item_section.children.length === 0) {
                product_item_section.innerHTML = `
                    <div class="py-12 text-center">
                        <h3 class="text-lg font-medium text-gray-600 mb-2">هیچ آیتمی یافت نشد</h3>
                        <p class="text-gray-500 text-sm mb-6">هنوز هیچ آیتمی ایجاد نکرده‌اید</p>
                    </div>
                `;
            }
        },
        error: function(xhr){
            alert('خطا در حذف داده: ')
        }
    })
}
    </script>

@endsection       