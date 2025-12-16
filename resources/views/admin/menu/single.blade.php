@extends('admin.app.panel')
@section('title')
    منو {{ $menu->title }}
@endsection
@section('content')
    <div class="w-full min-h-screen pb-10 pt-16 bg-[#F4F8F9]">
        <div class="w-11/12 mx-auto">
            <!-- Header Section -->
            <div class="pb-4 text-3xl text-center font-bold text-gray-800">
                <h2>{{ $menu->title }}</h2>
            </div>
            <div class="pb-6 text-xl text-gray-600 text-center font-semibold">
                <h3>{{ $menu->subtitle }}</h3>
            </div>

            <!-- Stats and Actions -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
                
                <div class="flex flex-wrap items-center justify-end gap-3">
                    <a href="{{ route('menuCat.create', [$menu]) }}"
                        class="text-sm px-5 py-2 bg-green-500 text-white hover:bg-green-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">
                        ایجاد دسته
                    </a>
                    @if (count($menu->menu_categories))
                        <a href="{{ route('menuCat.list', [$menu]) }}"
                            class="text-sm px-5 py-2 bg-emerald-500 text-white hover:bg-emerald-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">
                            مشاهده دسته ها
                        </a>
                    @endif
                    <a href="{{ route('menu.edit', [$menu]) }}"
                        class="text-sm px-5 py-2 bg-blue-500 text-white hover:bg-blue-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">
                        ویرایش منو
                    </a>
                    <a href="{{ route('menu.delete', [$menu]) }}"
                        class="text-sm px-5 py-2 bg-red-500 text-white hover:bg-red-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">
                        حذف منو
                    </a>
                    <a href="{{ route('menu.customProList' , [$menu->career])}}"
                        class="text-sm px-5 py-2 bg-violet-500 text-white hover:bg-violet-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">
                        محصولات شخصی‌سازی شده
                    </a>
                    {{-- @dd($menu->career->custom_product) --}}
                    {{-- <a href="{{ route('cp.create', [$menu->career])}}"
                        class="text-sm px-5 py-2 bg-indigo-500 text-white hover:bg-indigo-600 transition-all duration-150 rounded-lg shadow-sm hover:shadow-md">
                        ایجاد محصول شخصی‌سازی
                    </a> --}}
                    <div onclick="openCPform()" 
                       class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg cursor-pointer" >
                        
                        <span class="text-sm font-medium"> ایجاد محصول شخصی‌سازی</span>
                    </div>
                </div>
            </div>

            <!-- Banner Image -->
            <div class="mb-8">
                @if (!$menu->banner)
                    <img src="{{ asset('storage/images/banner01.jpg') }}"
                        class="w-full h-40 sm:h-52 md:h-64 mx-auto rounded-xl object-cover shadow-lg"
                        alt="menu banner">
                @else
                    <img src="{{ asset('storage/' . $menu->banner) }}"
                        class="w-full h-40 sm:h-52 md:h-64 mx-auto rounded-xl object-cover shadow-lg"
                        alt="menu banner">
                @endif
            </div>

            <!-- Categories Section -->
            <div class="space-y-6">
                @foreach ($menu->menu_categories as $category)
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <!-- Category Header -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-5 border-b border-gray-100 bg-gray-50">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $category->image) }}" 
                                     alt="{{ $category->title }}"
                                     class="size-14 rounded-lg object-cover border border-gray-200 shadow-sm">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">{{ $category->title }}</h2>
                                    <p class="text-sm text-gray-500 mt-1">{{ count($category->menu_items) }} آیتم</p>
                                </div>
                            </div>
                            <a href="{{ route('menuCat.edit', [$category->id]) }}"
                                class="flex items-center gap-2 bg-blue-50 hover:bg-blue-100 text-blue-600 hover:text-blue-700 border border-blue-200 rounded-lg px-4 py-2 text-sm font-medium transition-all duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                </svg>
                                ویرایش دسته
                            </a>
                        </div>

                        <!-- Items List -->
                        <div class="p-4">
                            @if(count($category->menu_items) > 0)
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                    @foreach ($category->menu_items as $item)
                                        <div class="flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-4 transition-all duration-150">
                                            <div class="flex items-center gap-4 flex-1">
                                                <img src="{{ asset('storage/' . $item->image) }}" 
                                                     class="size-12 rounded-lg object-cover border border-gray-300"
                                                     alt="{{ $item->title }}">
                                                <div class="flex-1 min-w-0">
                                                    <h3 class="font-medium text-gray-800 truncate">{{ $item->title }}</h3>
                                                    <p class="text-sm text-gray-500 truncate mt-1">{{ $item->description }}</p>
                                                </div>
                                                <div class="text-left ml-4">
                                                    <span class="font-bold text-green-600">{{ number_format($item->price) }} تومان</span>
                                                </div>
                                            </div>
                                            <a href="{{ route('menuItem.edit', [$item->id]) }}"
                                                class="mr-4 flex items-center justify-center size-8 bg-green-50 hover:bg-green-100 text-green-600 hover:text-green-700 border border-green-200 rounded-lg transition-all duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                                    <path fill="currentColor"
                                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                </svg>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <p class="text-gray-500">هیچ آیتمی در این دسته وجود ندارد</p>
                                    <a href="{{ route('menuItem.create', [$category->id]) }}"
                                        class="inline-block mt-3 text-sm text-blue-600 hover:text-blue-700 font-medium">
                                        افزودن آیتم جدید
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      
        <div class="fixed w-full h-dvh z-999 top-0 right-0 bg-black/50 invisible opacity-0 transition-all duration-300 form" id="createCPform">
                <div class="w-[calc(100%-265px)] float-end flex justify-center items-center bg-white h-dvh relative" id="closeCreateCPform">
                    <span class="cursor-pointer absolute top-4 right-4 text-4xl text-gray-500 hover:text-gray-700 transition-colors duration-200" onclick="closeForm()">×</span>
                    <form action="{{ route('cp.store') }}" method="post" enctype="multipart/form-data" class="space-y-6 w-full max-w-2xl">
                        @csrf
                        <div class="flex flex-col md:flex-row gap-6 mt-10">
                            <input type="hidden" name="career_id" value="{{$menu->career->id}}">
                            
                            <!-- Title Field -->
                            <div class="form-group flex-1 mt-10">
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-heading ml-2 text-gray-500"></i>
                                    عنوان محصول
                                </label>
                                <input 
                                    type="text" 
                                    name="title" 
                                    id="title"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                                    placeholder="عنوان محصول را وارد کنید"
                                >
                            </div>

                            <!-- Description Field -->
                            <div class="form-group flex-1">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-align-left ml-2 text-gray-500 mr-4"></i>
                                    توضیحات
                                </label>
                                <textarea 
                                    name="description" 
                                    id="description" 
                                    rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 resize-none"
                                    placeholder="توضیحات محصول را وارد کنید"
                                ></textarea>
                            </div>
                        </div>

                        <!-- Image Upload Field -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-image ml-2 text-gray-500"></i>
                                تصویر محصول
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-blue-400 transition duration-200">
                                <div class="space-y-1 text-center">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mx-auto"></i>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="customProductImage" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                            <span>آپلود فایل</span>
                                            <input 
                                                id="customProductImage" 
                                                name="customProductImage" 
                                                type="file" 
                                                accept="image/*"
                                                class="sr-only"
                                            >
                                        </label>
                                        <p class="pr-1">یا کشیدن و رها کردن</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF تا 2MB</p>
                                </div>
                            </div>
                            <div id="imagePreview" class="mt-4 hidden">
                                <img id="previewImage" class="max-h-48 rounded-lg shadow-md mx-auto">
                            </div>
                        </div>

                        <!-- Material Limit Field -->
                        <div class="form-group">
                            <label for="material_limit" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-ruler-combined ml-2 text-gray-500"></i>
                                محدودیت متریال
                            </label>
                            <input 
                                type="number" 
                                name="material_limit" 
                                id="material_limit"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                                placeholder="محدودیت متریال را وارد کنید"
                                required
                            >
                        </div>

                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex justify-center">
                                <button 
                                    type="submit" onclick="storeCP(event)"
                                    class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2.5 px-8 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 w-auto">
                                    <i class="fas fa-check ml-2"></i>
                                    ثبت محصول
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <script> 
        let forms = document.querySelectorAll(".form")
        let createCPform = document.getElementById('createCPform')   


        function closeForm(){
            forms.forEach((form)=>{
                form.classList.add('invisible')
                form.classList.add('opacity-0')
            })
        }
        function openCPform(){
            createCPform.classList.remove('invisible')
            createCPform.classList.remove('opacity-0')
        }
        function storeCP(ev){
        ev.preventDefault()
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url : "{{ route('cp.store') }}" ,
            type : "POST" ,
            dataType : "json" ,
            data : {
                'career_id' : "{{ $menu->career->id }}",
                'title' : title.value,
                'description' : description.value,
                // 'customProductImage' : customProductImage.value,
                'material_limit' : material_limit.value,
            },
            success: function(data){
                title.value= ""
                description.value= ""
                material_limit.value= ""
             
                closeForm()
                console.log(data)
            },
            error: function(){
                alert('خطا در ارسال داده')
            }
    
        })


    }


    </script>
@endsection