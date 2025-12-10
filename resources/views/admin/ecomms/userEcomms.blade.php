@extends('admin.app.panel')

@section('title', 'فروشگاههای من')

@section('content')
<?php// dd($user); ?>
<div class="w-full flex flex-col pb-4">
    <div class="bg-white rounded-lg">
        <div class="pb-4">
            <h2 class="text-lg font-bold text-gray-800">اطلاعات فروشگاه</h2>
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
                            <span class="block w-20 lg:w-full">لوگو</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-3">
                            <span class="block w-60 lg:w-full">عملیات</span>
                        </div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @foreach($user->ecomms as $ecomm)
                        @if($ecomm)
                        <div class="w-full flex flex-row lg:grid lg:grid-cols-6 items-center divide-x divide-[#f1f1f4]">
                            <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                <span class="block w-20 lg:w-full">{{ $ecomm->title}}</span>
                            </div>
                            <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 w-[500px] lg:w-full text-center">
                                <span class="block w-24 lg:w-full">{{ $ecomm->description}}</span>
                            </div>
                            <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                <div class="w-20 lg:w-full">
                                    <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover" src="<?= asset("storage/" . $ecomm->logo) ?>">
                                </div>
                            </div>
                            <div class="w-full col-span-3">
                                <div class="grid grid-cols-5 h-full divide-x divide-[#f1f1f4] w-60 lg:w-full">

                                   
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('ecomm.single', [$ecomm]) }}"  class="transition-all duration-150 hover:text-sky-400">مشاهده</a>
                                    </div>
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('ecomm.edit', [$ecomm])}}"  class="transition-all duration-150 hover:text-sky-400">ویرایش</a>
                                    </div>
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('ecomm.delete', [$ecomm])}}"  class="transition-all duration-150 hover:text-sky-400">حذف</a>
                                    </div>
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{route('ecomm_category.ecomm_categories',[$ecomm])}}"  class="transition-all duration-150 hover:text-sky-400">دسته بندی محصولات</a>
                                    </div>
                                    {{-- @if($ecomm->menu)
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('menu.list', [$ecomm])}}"  class="transition-all duration-150 hover:text-sky-400">مشاهده منو</a>
                                    </div>
                                    @endif
                                    @if(!$ecomm->menu)
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('menu.create', [$ecomm])}}"  class="transition-all duration-150 hover:text-sky-400">ایجاد منو</a>
                                    </div>
                                    @endif --}}
                                    @if($ecomm->menu_categories)
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('menuCat.list')}}"  class="transition-all duration-150 hover:text-sky-400">مشاهده دسته بندی منو</a>
                                    </div>
                                    @else
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('menuCat.create', [$ecomm])}}"  class="transition-all duration-150 hover:text-sky-400">ایجاد دسته منو</a>
                                    </div>
                                    @endif
                                </div>
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