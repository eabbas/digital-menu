@extends('admin.app.panel')
@section('title', 'محصولات شخصی سازی شده کسب وکار')
@section('content')

<div class="w-full min-h-screen pb-10 pt-6 bg-gradient-to-b from-blue-50 to-white">
    <div class="w-11/12 mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">محصولات شخصی‌سازی شده</h1>
                    <p class="text-blue-600 font-medium mt-1">{{ $career->name ?? 'کسب و کار' }}</p>
                </div>
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                    <div class="flex items-center gap-2 text-blue-600 bg-blue-50 px-4 py-2 rounded-lg">
                        <svg class="size-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm font-medium">{{ count($career->custom_product ?? []) }} محصول</span>
                    </div>
                    {{--   --}}
                    <a href="{{ route('cp.create', [$career]) }}"
                       class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span class="text-sm font-medium">محصول جدید</span>
                    </a>
                </div>
            </div>
            <div class="h-1 w-24 bg-gradient-to-r from-blue-500 to-blue-300 rounded-full"></div>
        </div>

       

        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-xl shadow-lg border border-blue-100 overflow-hidden">
            <!-- Table Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-500">
                <div class="grid grid-cols-12 items-center">
                    <div class="px-4 py-4 text-center text-sm font-semibold text-white col-span-2 border-l border-blue-400/30">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            نام محصول
                        </div>
                    </div>
                    <div class="px-4 py-4 text-center text-sm font-semibold text-white border-l border-blue-400/30">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h1m0 0h-1m1 0v4m-4-6h3m-6 3h6m-6 3h6m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            توضیحات
                        </div>
                    </div>
                    <div class="px-4 py-4 text-center text-sm font-semibold text-white border-l border-blue-400/30 col-span-2">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            عکس محصول
                        </div>
                    </div>
                    <div class="px-4 py-4 text-center text-sm font-semibold text-white border-l border-blue-400/30">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            حد مواد
                        </div>
                    </div>
                    <div class="px-4 py-4 text-center text-sm font-semibold text-white col-span-5 border-l border-blue-400/30">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            عملیات
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="divide-y divide-blue-50">
                @foreach($career->custom_product as $index => $custom_product)
                <div class="grid grid-cols-12 items-center hover:bg-blue-50/30 transition-all duration-200 {{ $index % 2 == 0 ? 'bg-white' : 'bg-blue-50/20' }}">
                    <!-- نام محصول -->
                    <div class="px-4 py-4 text-center border-l border-blue-100 col-span-2">
                        <span class="text-sm font-medium text-gray-800 break-words">{{ $custom_product->title }}</span>
                    </div>
                    
                    <!-- توضیحات -->
                    <div class="px-4 py-4 text-center border-l border-blue-100">
                        <span class="text-sm text-gray-600 line-clamp-2">{{ $custom_product->description }}</span>
                    </div>
                    
                    <!-- عکس محصول -->
                    <div class="px-4 py-4 text-center border-l border-blue-100 col-span-2">
                        <div class="flex justify-center">
                            <div class="relative">
                                <img class="size-16 object-cover rounded-lg border-2 border-blue-100 shadow-sm" 
                                     src="{{ asset('storage/' . $custom_product->image) }}"
                                     alt="{{ $custom_product->title }}">
                                <div class="absolute -bottom-1 -right-1 bg-blue-500 text-white text-xs rounded-full size-6 flex items-center justify-center">
                                    <svg class="size-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- حد مواد -->
                    <div class="px-4 py-4 text-center border-l border-blue-100">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-blue-100 to-blue-50 text-blue-600 border border-blue-200">
                            {{ $custom_product->material_limit }}
                        </span>
                    </div>
                    
                    <!-- عملیات -->
                    <div class="col-span-5 border-l border-blue-100">
                        <div class="grid grid-cols-5 divide-x divide-blue-100 h-full">
                           <ul class="text-sm mt-1 rounded-sm p-1 grid grid-cols-3 gap-4">
                            <li class="flex justify-center">
                                <a href="{{ route('cp.single', [$custom_product]) }}"
                                    class="w-fit flex flex-row items-center justify-center bg-sky-500 hover:bg-sky-600 p-1 rounded-sm" title="مشاهده">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                                        <path fill="white" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="flex justify-center">
                                <a href="{{ route('cp.edit', [$custom_product]) }}"
                                    class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm" title="ویرایش">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="flex justify-center">
                                <a href="{{ route('cp.delete', [$custom_product]) }}"
                                    class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm" title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                            
                            <!-- ایجاد نوع محصول -->
                            <div class="py-4 flex items-center justify-center">
                                <a href="{{ route('cpv.create', [$custom_product]) }}" 
                                   class="flex flex-col items-center gap-1 text-blue-600 hover:text-blue-700 transition-colors group">
                                    <div class="size-8 rounded-lg bg-blue-50 flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                        <svg class="size-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-medium mt-1">ایجاد نوع</span>
                                </a>
                            </div>
                            
                            <!-- لیست انواع محصولات -->
                            <div class="py-4 flex items-center justify-center">
                                <a href="{{ route('cpv.list', [$custom_product]) }}" 
                                   class="flex flex-col items-center gap-1 text-blue-600 hover:text-blue-700 transition-colors group">
                                    <div class="size-8 rounded-lg bg-blue-50 flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                        <svg class="size-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-medium mt-1">لیست انواع</span>
                                </a>
                            </div>
                            <a href="{{ route('custmCategory.create' , [$custom_product]) }}" 
                               class="text-indigo-600 hover:text-indigo-800 text-sm font-medium transition-colors">
                                ایجاد دسته
                            </a>
                            <a href="{{ route('cp.category_list' , [$custom_product]) }}" 
                               class="text-indigo-600 hover:text-indigo-800 text-sm font-medium transition-colors">
                                 لیست دسته 
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                
                @if(count($career->custom_product ?? []) == 0)
                <div class="py-16 text-center">
                    <div class="text-blue-400 mb-4">
                        <svg class="size-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-600 mb-2">محصولی یافت نشد</h3>
                    <p class="text-gray-500 text-sm mb-6">هنوز هیچ محصول شخصی‌سازی شده‌ای ایجاد نکرده‌اید</p>
                    <a href="{{ route('cp.create', [$career]) }}" 
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-lg transition-all duration-200 text-sm font-medium shadow-md hover:shadow-lg">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        ایجاد اولین محصول
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection