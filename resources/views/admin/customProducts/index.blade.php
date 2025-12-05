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
                    <div class="bg-gray-100 grid grid-cols-9 items-center divide-x divide-[#f1f1f4]">
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-1">نام محصول</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600">توضیحات</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600"> عکس محصول</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600"> حد مواد</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-3">عملیات</div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @foreach($allCustomProduct as $customProduct)
                        <div class="grid grid-cols-9 items-center divide-x divide-[#f1f1f4]">
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $customProduct->title}}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $customProduct->description}}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">
                                <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover" src="<?= asset("storage/" . $customProduct->image) ?>">
                            </div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $customProduct->material_limit}}</div>
                            <div class="w-full grid grid-cols-5 col-span-3 h-full divide-x divide-[#f1f1f4]">
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cp.single', [$customProduct]) }}" class="ml-4 text-sky-700">مشاهده</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cp.edit', [$customProduct])}}" class="ml-4 text-sky-700">ویرایش</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cp.delete', [$customProduct])}}" class="ml-4 text-sky-700">حذف</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cpv.create' , [$customProduct->career])}}" class="ml-4 text-sky-700">ایجاد نوع محصول</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cpv.list' , [$customProduct])}}" class="ml-4 text-sky-700">لیست انواع محصولات</a>
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