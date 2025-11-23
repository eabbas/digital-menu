@extends('admin.app.panel')
    @section('title', ' همه کسب وکارها')
    @section('content')


    <div class="w-full flex flex-col pb-4">
    <div class="bg-white rounded-lg">
        <div class="pb-4">
            <h2 class="text-lg font-bold text-gray-800">اطلاعات  دسته بندی</h2>
        </div>
        <div class="flex flex-col gap-5">
            <div class="overflow-x-auto shadow-md" style="scrollbar-width: none;">
                <div class="min-w-full bg-gray-200">
                    <div class="bg-gray-100 grid grid-cols-8 items-center divide-x divide-[#f1f1f4]">
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-1">نام دسته</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600">توضیحات</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600">نمایش در صفحه</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600"> عکس دسته</div>
                        <div class="px-6 py-3 text-center text-xs font-medium text-gray-600 col-span-3">عملیات</div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @foreach($careerCategories as $careerCategory)
                        <div class="grid grid-cols-8 items-center divide-x divide-[#f1f1f4]">
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $careerCategory->title}}</div>
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ $careerCategory->description}}</div>
                            @if($careerCategory->show_in_home == 1)
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">{{ "در صفحه اول وجود دارد" }}</div>
                            @endif
                            <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">
                                <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover" src="<?= asset("storage/" . $careerCategory->main_image) ?>">
                            </div>
                            <div class="w-full grid grid-cols-4 col-span-3 h-full divide-x divide-[#f1f1f4]">
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cc.single', [$careerCategory]) }}" class="ml-4 text-sky-700">مشاهده</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cc.edit', [$careerCategory])}}" class="ml-4 text-sky-700">ویرایش</a>
                                </div>
                                <div class="p-3 text-sm h-full flex items-center justify-center font-medium">
                                    <a href="{{ route('cc.delete', [$careerCategory])}}" class="ml-4 text-sky-700">حذف</a>
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