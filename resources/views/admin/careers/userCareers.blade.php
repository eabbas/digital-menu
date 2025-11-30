@extends('admin.app.panel')

@section('title', 'کسب و کارهای من')

@section('content')
<div class="w-full flex flex-col pb-4">
    <div class="bg-white rounded-lg">
        <div class="pb-4">
            <h2 class="text-lg font-bold text-gray-800">اطلاعات کسب و کار</h2>
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
                        @foreach($user->careers as $career)
                        {{-- {{ dd($career->menu_categories) }} --}}
                        @if($career)
                        <div class="w-full flex flex-row lg:grid lg:grid-cols-6 items-center divide-x divide-[#f1f1f4]">
                            <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                <span class="block w-20 lg:w-full">{{ $career->title}}</span>
                            </div>
                            <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 w-[500px] lg:w-full text-center">
                                <span class="block w-24 lg:w-full">{{ $career->description}}</span>
                            </div>
                            <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                <div class="w-20 lg:w-full">
                                    <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover" src="<?= asset("storage/" . $career->logo) ?>">
                                </div>
                            </div>
                            <div class="w-full col-span-3">
                                <div class="grid grid-cols-4 h-full divide-x divide-[#f1f1f4] w-60 lg:w-full">
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('career.single', [$career]) }}" class="text-sky-700">مشاهده</a>
                                    </div>
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('career.edit', [$career])}}" class="text-sky-700">ویرایش</a>
                                    </div>
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('career.delete', [$career])}}" class="text-sky-700">حذف</a>
                                    </div>
                                    {{-- @if($career->menu)
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('menu.list', [$career])}}" class="text-sky-700">مشاهده منو</a>
                                    </div>
                                    @endif
                                    @if(!$career->menu)
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('menu.create', [$career])}}" class="text-sky-700">ایجاد منو</a>
                                    </div>
                                    @endif --}}
                                    @if (count($career->menu_categories))
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('menuCat.list')}}" class="text-sky-700">مشاهده دسته بندی منو</a>
                                    </div>
                                    @else
                                    <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('menuCat.create', [$career])}}" class="text-sky-700">ایجاد دسته منو</a>
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

                        @if (count($career->custom_product))
                            <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                <a href="{{ route('cp.list')}}" class="text-sky-700">مشاهده لیست  محصولات شخصی سازه شده  </a>
                            </div>
                            @else
                                <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cp.create', [$career])}}" class="text-sky-700">ایجاد محصولات شخصی سازی شده </a>
                                </div>
                        @endif
                          {{-- <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                        <a href="{{ route('cpm.create', [$career])}}" class="text-sky-700">ایجاد منوی شخصی سازی شده </a>
                                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection