@extends('admin.app.panel')
@section('title', ' همه  منوها')
@section('content')
    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">
            <div class="pb-4">
                <h2 class="text-lg font-bold text-gray-800">اطلاعات   منو</h2>
            </div>
            <div class="flex flex-col gap-5">
                <div class="overflow-x-auto shadow-md" style="scrollbar-width: none;">
                    <div class="min-w-full bg-gray-200">
                        <div class="w-full flex flex-col lg:grid lg:grid-cols-4 items-center divide-x divide-[#f1f1f4]">
                            <div class="px-1 lg:px-4 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="block w-20 lg:w-full">عنوان</span>
                            </div>
                            <div class="px-1 lg:px-4 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="block w-24 lg:w-full">زیرعنوان</span>
                            </div>
                            <div class="px-1 lg:px-4 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="block w-20 lg:w-full">لوگو</span>
                            </div>
                            <div class="px-1 lg:px-4 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="block w-20 lg:w-full">کاور</span>
                            </div>
                            <div
                                class="px-1 lg:px-4 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-3">
                                <span class="block w-60 lg:w-full">عملیات</span>
                            </div>
                        </div>
                        <div class="bg-white divide-y divide-[#f1f1f4]">
                            @foreach ($covers as $cover)
                                @if ($cover)
                                    <div
                                        class="w-full flex flex-row lg:grid lg:grid-cols-6 items-center divide-x divide-[#f1f1f4]">
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span class="block w-20 lg:w-full">{{ $cover->title }}</span>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 w-[500px] lg:w-full text-center">
                                            <span class="block w-24 lg:w-full">{{ $cover->subTitle }}</span>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                            <div class="w-20 lg:w-full">
                                                <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover"
                                                    src="<?= asset('storage/' . $cover->logo) ?>">
                                            </div>
                                        </div>
                                        <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                            <div class="w-20 lg:w-full">
                                                <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover"
                                                    src="<?= asset('storage/' . $cover->cover) ?>">
                                            </div>
                                        </div>
                                        <div class="w-full col-span-3">
                                            <div
                                                class="grid grid-cols-4 h-full divide-x divide-[#f1f1f4] w-60 lg:w-full">
                                                <div
                                                    class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                    <a href="{{ route('socialAddress.create', [$cover])}}"
                                                        class="text-sky-700">افزودن شبکه اجتماعی</a>
                                                </div>
                                                <div
                                                    class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                    <a href="{{ route('socialAddress.list')}}"
                                                        class="text-sky-700">مشاهده شبکه های اجتماعی</a>
                                                </div>
                                                <div
                                                    class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                    <a href="{{ route('siteLink.create', [$cover])}}"
                                                        class="text-sky-700"> افزودن لینک</a>
                                                </div>
                                                <div
                                                    class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                    <a href="{{ route('siteLink.list')}}"
                                                        class="text-sky-700">مشاهده لینک ها</a>
                                                </div>
                                                <div
                                                    class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                    <a href="#"
                                                        class="text-sky-700">ویرایش</a>
                                                </div>
                                                <div
                                                    class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                                    <a href="#"
                                                        class="text-sky-700">حذف</a>
                                                </div>
                                          
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