@extends('admin.app.panel')
@section('title', 'انواع محصولات')
@section('content')

<div class="w-full min-h-screen pb-10 pt-6 bg-gray-50">
    <div class="w-11/12 mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-xl font-semibold text-gray-800">انواع محصولات</h1>
                    <div class="flex items-center gap-3 mt-2">
                        {{-- <span class="text-sm text-gray-600">
                            محصول: <span class="font-medium">{{ $customProduct->title ?? 'نامشخص' }}</span>
                        </span> --}}
                        {{-- <span class="text-sm text-gray-500">
                            {{ count($customProduct->custom_product_variants ?? []) }} نوع
                        </span> --}}
                    </div>
                </div>
                <a href="{{ route('cpv.create', [$customProduct]) }}" 
                   class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors text-sm">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span>نوع جدید</span>
                </a>
            </div>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <!-- Table Header -->
            <div class="bg-gray-50 border-b border-gray-200">
                <div class="grid grid-cols-12 items-center">
                    <div class="px-4 py-3 text-right text-xs font-medium text-gray-600">نام نوع</div>
                    <div class="px-4 py-3 text-right text-xs font-medium text-gray-600">توضیحات</div>
                    <div class="px-4 py-3 text-right text-xs font-medium text-gray-600">حداقل واحد</div>
                    <div class="px-4 py-3 text-right text-xs font-medium text-gray-600">محصول اصلی</div>
                    <div class="px-4 py-3 text-right text-xs font-medium text-gray-600">زمان</div>
                    <div class="px-4 py-3 text-right text-xs font-medium text-gray-600 col-span-2">عکس</div>
                    <div class="px-4 py-3 text-right text-xs font-medium text-gray-600 col-span-4">عملیات</div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="divide-y divide-gray-100">
                @foreach($customProduct->custom_product_variants as $index => $cpVariant)
                <div class="grid grid-cols-12 items-center hover:bg-gray-50 transition-colors">
                    <!-- نام نوع -->
                    <div class="px-4 py-3 text-right">
                        <span class="text-sm text-gray-800 font-medium">{{ $cpVariant->title }}</span>
                    </div>
                    
                    <!-- توضیحات -->
                    <div class="px-4 py-3 text-right">
                        <span class="text-sm text-gray-600 line-clamp-1">{{ $cpVariant->description }}</span>
                    </div>
                    
                    <!-- حداقل مقدار واحد -->
                    <div class="px-4 py-3 text-right">
                        <span class="text-sm text-gray-700">{{ $cpVariant->min_amount_unit }}</span>
                    </div>
                    
                    <!-- محصول سفارشی شده -->
                    <div class="px-4 py-3 text-right">
                        <span class="text-sm text-gray-700">{{ $cpVariant->custom_product->title }}</span>
                    </div>
                    
                    <!-- زمان -->
                    <div class="px-4 py-3 text-right">
                        <span class="text-sm text-gray-600">{{ $cpVariant->duration }}</span>
                    </div>
                    
                    <!-- عکس -->
                    <div class="px-4 py-3 text-right col-span-2">
                        @if($cpVariant->image)
                        <div class="flex justify-end">
                            <img class="size-10 object-cover rounded border border-gray-200" 
                                 src="{{ asset('storage/' . $cpVariant->image) }}"
                                 alt="{{ $cpVariant->title }}">
                        </div>
                        @else
                        <span class="text-xs text-gray-400">-</span>
                        @endif
                    </div>
                    
                    <!-- عملیات -->
                    <div class="px-4 py-3 text-right col-span-4">
                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('cpv.single', [$cpVariant]) }}" 
                               class="text-blue-600 hover:text-blue-800 text-sm font-medium transition-colors">
                                مشاهده
                            </a>
                            {{-- @dd($cpVariant) --}}
                            {{-- @dd($customProduct->career->id) --}}
                            <a href="{{ route('cpv.edit', [$cpVariant]) }}" 
                               class="text-green-600 hover:text-green-800 text-sm font-medium transition-colors">
                                ویرایش
                            </a>
                            <a href="{{ route('cpv.delete', [$cpVariant]) }}" 
                               class="text-red-600 hover:text-red-800 text-sm font-medium transition-colors">
                                حذف
                            </a>
                            <a href="{{ route('custmCategory.create' , [$customProduct]) }}" 
                               class="text-indigo-600 hover:text-indigo-800 text-sm font-medium transition-colors">
                                ایجاد دسته
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
         
            </div>
        </div>

        <!-- List Categories Button -->
        @if(count($customProduct->custom_product_variants ?? []) > 0)
        <div class="mt-4 flex justify-end">
            <a href="{{ route('custmCategory.list' , [$customProduct]) }}" 
               class="flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors text-sm">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                <span>مشاهده لیست دسته‌بندی‌ها</span>
            </a>
        </div>
        @endif
    </div>
</div>

@endsection