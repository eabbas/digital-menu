@extends('admin.app.panel')
@section('title', ' محصولات فروشگاه')
@section('content')
<?php //dd($ecomm_products); ?>
    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">
            <div class="pb-4">
                <h2 class="text-lg font-bold text-gray-800">اطلاعات محصولات</h2>
            </div>
            <div class="flex flex-col gap-5">
                <div class="overflow-x-auto shadow-md" style="scrollbar-width: none;">
                    <div class="min-w-full bg-gray-200">
                        <div class="w-full flex flex-row lg:grid lg:grid-cols-6 items-center divide-x divide-[#f1f1f4]">
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                  <span class="block w-20 lg:w-full">عنوان</span>
                            </div>
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="block w-24 lg:w-full">توضیحات</span>
                            </div>
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="block w-20 lg:w-full">قیمت</span>
                            </div>
                            <div
                            class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-60 lg:w-full">تخفیف</span>
                        </div>
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                               <span class="block w-20 lg:w-full">عکس محصول</span>
                            </div>
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                               <span class="block w-20 lg:w-full"> بخش های دیگر</span>
                            </div>
                 </div>
                        <div class="bg-white divide-y divide-[#f1f1f4]">
                            @foreach ($ecomm_products as $ecomm_product)
                                @if ($ecomm_product)
                                    <div
                                        class="w-full flex flex-row lg:grid lg:grid-cols-6 items-center divide-x divide-[#f1f1f4]">
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span class="block w-20 lg:w-full">{{ $ecomm_product->title }}</span>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 w-[500px] lg:w-full text-center">
                                            <span class="block w-24 lg:w-full">{{ $ecomm_product->description }}</span>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 w-[500px] lg:w-full text-center">
                                            <span class="block w-24 lg:w-full">{{ $ecomm_product->price}}</span>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 w-[500px] lg:w-full text-center">
                                            <span class="block w-24 lg:w-full">{{ $ecomm_product->discount}}</span>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                            <div class="w-20 lg:w-full">
                                                <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover"
                                                    src="<?= asset('storage/'.$ecomm_product->image_path) ?>">
                                            </div>
                                        </div>
                                        <div class="flex justify-center items-center gap-1 w-full ">
                                            
                                                <div
                                                    class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                    <a href="{{ route('ecomm_product.show', [$ecomm_product]) }}"
                                                         class="transition-all duration-150 hover:text-sky-400   hover:border-teal-500">مشاهده</a>
                                                </div>
                                                <div
                                                    class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                    <a href="{{ route('ecomm_product.edit', [$ecomm_product]) }}"
                                                         class="transition-all duration-150 hover:text-sky-400   hover:border-teal-500">ویرایش</a>
                                                </div>
                                                <div
                                                    class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                    <a href="{{ route('ecomm_product.delete', [$ecomm_product]) }}"
                                                         class="transition-all duration-150 hover:text-sky-400   hover:border-teal-500">حذف</a>
                                                </div>
                                                
                                                @if ($ecomm_product->menu)
                                                    <div
                                                        class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                        <a href="{{ route('menu.list', [$ecomm_product]) }}"
                                                             class="transition-all duration-150 hover:text-sky-400   hover:border-teal-500">مشاهده منو</a>
                                                    </div>
                                                @endif
                                                <!-- @if (!$ecomm_product->menu)
                                                    <div
                                                        class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                        <a href="ssss{sss{ddd route ddd( dd'menu.create', [$ecomm_product])ddddddd }}"
                                                            class="text-sky-700">ایجاد منو</a>
                                                    </div>
                                                @endif -->
                                             
                                        </div>
                                    </div>
                                @else
                                    <div>
                                        <div class="px-1 lg:px-6 py-4 text-center text-xs lg:text-sm text-gray-500">
                                            هیچ اطلاعاتی یافت نشد
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection