@extends('admin.app.panel')
@section('title', 'لیست آیتم‌ها')
@section('content')

<div class="w-full min-h-screen pb-10 pt-6 bg-gray-50">
    <div class="w-11/12 mx-auto">
        
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-xl font-semibold text-gray-800">لیست آیتم‌ها</h1>
                    <p class="text-gray-600 text-sm mt-1">محصول: {{ $customProduct->title }}</p>
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
                
                @foreach($customProduct->customCategories as $customCategory)
                    @foreach ($customCategory->custom_product_material as $material)
                        @php $hasItems = true; @endphp
                        
                        <div class="grid grid-cols-12 px-4 py-3 hover:bg-gray-50">
                            <!-- نام آیتم -->
                            <div class="col-span-3">
                                <div class="text-sm font-medium text-gray-800">{{ $material->title }}</div>
                                <div class="text-xs text-gray-500 mt-1 truncate">{{ $material->description }}</div>
                            </div>
                            
                            <!-- قیمت -->
                            <div class="col-span-2">
                                <div class="text-sm text-gray-700">{{ number_format($material->price_per_unit) }} تومان</div>
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
                                    <a href="{{ route('cpm.edit', [$material]) }}" 
                                       class="text-green-600 hover:text-green-800 text-sm">
                                        ویرایش
                                    </a>
                                    <a href="{{ route('cpm.delete', [$material]) }}" 
                                       class="text-red-600 hover:text-red-800 text-sm">
                                        حذف
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                
                @if(!$hasItems)
                    <div class="py-12 text-center">
                        <p class="text-gray-500 mb-4">هیچ آیتمی یافت نشد</p>
                        <a href="{{ route('cpm.create' , [$career , $customProduct]) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                            ایجاد اولین آیتم
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection