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
                            <!-- مشاهده -->
                            <div class="py-4 flex items-center justify-center">
                                <a href="{{ route('cp.single', [$custom_product]) }}" 
                                   class="flex flex-col items-center gap-1 text-blue-600 hover:text-blue-700 transition-colors group">
                                    <div class="size-8 rounded-lg bg-blue-50 flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                        <svg class="size-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-medium mt-1">مشاهده</span>
                                </a>
                            </div>
                            
                            <!-- ویرایش -->
                            <div class="py-4 flex items-center justify-center">
                                <a href="{{ route('cp.edit', [$custom_product]) }}" 
                                   class="flex flex-col items-center gap-1 text-blue-600 hover:text-blue-700 transition-colors group">
                                    <div class="size-8 rounded-lg bg-blue-50 flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                        <svg class="size-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-medium mt-1">ویرایش</span>
                                </a>
                            </div>
                            
                            <!-- حذف -->
                            <div class="py-4 flex items-center justify-center">
                                <a href="{{ route('cp.delete', [$custom_product]) }}" 
                                   class="flex flex-col items-center gap-1 text-red-600 hover:text-red-700 transition-colors group">
                                    <div class="size-8 rounded-lg bg-red-50 flex items-center justify-center group-hover:bg-red-100 transition-colors">
                                        <svg class="size-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-medium mt-1">حذف</span>
                                </a>
                            </div>
                            
                            <!-- ایجاد نوع محصول -->
                            <div class="py-4 flex items-center justify-center">
                                <a href="{{ route('cpv.create', [$career , $custom_product]) }}" 
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
                                <a href="{{ route('cpv.list', [$career, $custom_product]) }}" 
                                   class="flex flex-col items-center gap-1 text-blue-600 hover:text-blue-700 transition-colors group">
                                    <div class="size-8 rounded-lg bg-blue-50 flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                                        <svg class="size-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-medium mt-1">لیست انواع</span>
                                </a>
                            </div>
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