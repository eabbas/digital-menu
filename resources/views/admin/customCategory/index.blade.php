@extends('admin.app.panel')
@section('title', ' همه محصولات ')
@section('content')


    <div class="w-full flex flex-col pb-4">
    <div class="bg-white rounded-lg">
        <div class="pb-4">
            <h2 class="text-lg font-bold text-gray-800">اطلاعات محصولات</h2>
        </div>
        <div class="flex flex-col gap-5">
            <div class="overflow-x-auto shadow-md" style="scrollbar-width: none;">
                <div class="min-w-full bg-gray-200">
                    <div class="bg-gray-100 grid grid-cols-8 items-center divide-x divide-[#f1f1f4]">
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-1">نام محصول</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-1">الزامی بودن یا نبودن </div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600">حداکثر مقدار مواد</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-3">عملیات</div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @foreach($customCategories as $customCategory)
                        <div class="grid grid-cols-8 items-center divide-x divide-[#f1f1f4]">
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $customCategory->title}}</div>
                            @if($customCategory->required == 1)
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{  "انتخاب ان الزامی است" }}</div>
                            @else{{ 'انتخا به صورت دلبخواهی' }}
                            @endif
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $customCategory->max_item_amount}}</div>
                   
                            <div class="w-full grid grid-cols-4 col-span-3 h-full divide-x divide-[#f1f1f4]">
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('custmCategory.single', [$customCategory]) }}" class="ml-4 text-sky-700">مشاهده</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('custmCategory.edit', [$customCategory])}}" class="ml-4 text-sky-700">ویرایش</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('custmCategory.delete', [$customCategory])}}" class="ml-4 text-sky-700">حذف</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cpm.create')}}" class="ml-4 text-sky-700">ایجاد آیتم</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cpm.list')}}" class="ml-4 text-sky-700">لیست آیتم ها</a>
                                </div>
                            </div>
                        </div>
                     
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    @endsection