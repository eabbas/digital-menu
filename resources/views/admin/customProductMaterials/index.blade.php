@extends('admin.app.panel')
@section('title', 'انواع محصولات')
@section('content')


    <div class="w-full flex flex-col pb-4">
    <div class="bg-white rounded-lg">
        <div class="pb-4">
            <h2 class="text-lg font-bold text-gray-800">اطلاعات نوع محصولات</h2>
        </div>
        <div class="flex flex-col gap-5">
            <div class="overflow-x-auto shadow-md" style="scrollbar-width: none;">
                <div class="min-w-full bg-gray-200">
                    <div class="bg-gray-100 grid grid-cols-8 items-center divide-x divide-[#f1f1f4]">
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-1">نام محصول</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600">توضیحات</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600"> قیمت بر اساس واحد </div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600"> ترتیب</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600"> لزوم</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600"> حداکثر واحد </div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600"> نام محصول شخصی سازی </div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600"> عکس</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-3">عملیات</div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @foreach($cpmWithCustomproduct as $cpm)
                        <div class="grid grid-cols-8 items-center divide-x divide-[#f1f1f4]">
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $cpm->title}}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $cpm->description}}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $cpm->price_per_unit}}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $cpm->order}}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $cpm->required}}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $cpm->max_uni_amount}}</div>
                            @if($cpm->custom_product_id)
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $cpm->custom_product->title }}</div>
                            @endif
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">
                                <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover" src="<?= asset("storage/" . $cpm->image) ?>">
                            </div>
                            <div class="w-full grid grid-cols-4 col-span-3 h-full divide-x divide-[#f1f1f4]">
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cpm.single', [$cpm]) }}" class="ml-4 text-sky-700">مشاهده</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cpm.edit', [$cpm])}}" class="ml-4 text-sky-700">ویرایش</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cpm.delete', [$cpm])}}" class="ml-4 text-sky-700">حذف</a>
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