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
                        محصول: <span class="font-medium">{{ $customProduct->title ?? 'نامشخص' }}</span> 
                        | {{ count($customProduct->customCategories ?? []) }} دسته‌بندی
                    </p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('custmCategory.create' , [$customProduct]) }}" 
                       class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        دسته‌بندی جدید
                    </a>
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
                @forelse($customProduct->customCategories as $customCategory)
                <div class="grid grid-cols-12 gap-4 px-6 py-4 hover:bg-gray-50/50 transition-colors">
                    <!-- نام دسته‌بندی -->
                    <div class="col-span-3">
                        <span class="text-sm text-gray-800 font-medium">{{ $customCategory->title }}</span>
                    </div>
                    
                    <!-- الزامی بودن -->
                    <div class="col-span-3">
                        @if($customCategory->required == 1)
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
                        <span class="text-sm text-gray-700">{{ $customCategory->max_item_amount }}</span>
                    </div>
                    
                    <!-- عملیات -->
                    <div class="col-span-4">
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('custmCategory.single', [$customCategory]) }}" 
                               class="text-blue-600 hover:text-blue-800 text-xs font-medium transition-colors">
                                مشاهده
                            </a>
                            <a href="{{ route('custmCategory.edit', [$customCategory]) }}" 
                               class="text-green-600 hover:text-green-800 text-xs font-medium transition-colors">
                                ویرایش
                            </a>
                            <a href="{{ route('custmCategory.delete', [$customCategory]) }}" 
                               class="text-red-600 hover:text-red-800 text-xs font-medium transition-colors">
                                حذف
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="py-16 text-center">
                    <div class="text-gray-300 mb-4">
                        <svg class="size-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h3 class="text-gray-600 font-medium mb-2">هنوز دسته‌بندی ایجاد نکرده‌اید</h3>
                    <p class="text-gray-500 text-sm mb-6">با کلیک بر روی دکمه زیر اولین دسته‌بندی را ایجاد کنید</p>
                    <a href="{{ route('custmCategory.create' , [$customProduct]) }}" 
                       class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2.5 rounded-lg text-sm transition-colors">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        ایجاد دسته‌بندی
                    </a>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Actions Footer -->
        @if(count($customProduct->customCategories ?? []) > 0)
        <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('cpm.create' , [$career , $customProduct]) }}" 
               class="inline-flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-2.5 rounded-lg text-sm transition-colors">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                ایجاد آیتم جدید
            </a>
            <a href="{{ route('cpm.list' , [$customProduct]) }}" 
               class="inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-lg text-sm transition-colors">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                مشاهده لیست آیتم‌ها
            </a>
        </div>
        @endif
    </div>
</div>

@endsection