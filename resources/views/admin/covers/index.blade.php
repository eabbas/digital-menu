@extends('admin.app.panel')
@section('title', ' همه صفحه شبکه های اجتماعی ')
@section('content')
    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">
            <div class="pb-4">
                <h2 class="text-lg font-bold text-gray-800">اطلاعات صفحه های اجتماعی</h2>
            </div>
            <div class="flex flex-col gap-5">
                <div class="overflow-x-auto shadow-md" style="scrollbar-width: none;">
                    <div class="min-w-full bg-gray-200">
                        <!-- هدر جدول -->
                        <div class="w-full grid grid-cols-6 items-center divide-x divide-[#f1f1f4]">
                            <div class="px-4 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span>عنوان</span>
                            </div>
                            <div class="px-4 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span>زیرعنوان</span>
                            </div>
                            <div class="px-4 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span>لوگو</span>
                            </div>
                            <div class="px-4 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span>کاور</span>
                            </div>
                            <div class="px-4 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                                <span>عملیات</span>
                            </div>
                        </div>
                        
                        <!-- بدنه جدول -->
                        <div class="bg-white divide-y divide-[#f1f1f4]">
                            @foreach ($covers as $cover)
                                @if ($cover)
                                    <div class="w-full grid grid-cols-6 items-center divide-x divide-[#f1f1f4]">
                                        <!-- عنوان -->
                                        <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span>{{ $cover->title }}</span>
                                        </div>
                                        
                                        <!-- زیرعنوان -->
                                        <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span>{{ $cover->subTitle }}</span>
                                        </div>
                                        
                                        <!-- لوگو -->
                                        <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">
                                            <div>
                                                <img class="w-12 h-12 object-cover mx-auto"
                                                    src="<?= asset('storage/' . $cover->logo_path) ?>">
                                            </div>
                                        </div>
                                        
                                        <!-- کاور -->
                                        <div class="p-3 text-sm h-full flex items-center justify-center text-gray-900">
                                            <div>
                                                <img class="w-12 h-12 object-cover mx-auto"
                                                    src="<?= asset('storage/' . $cover->cover_path) ?>">
                                            </div>
                                        </div>
                                        
                                        <!-- عملیات -->
                                        <div class="p-3 col-span-2">
                                            <div class="grid grid-cols-3 gap-2">
                                                <div class="text-center">
                                                    <a href="{{ route('socialAddress.create', [$cover])}}"
                                                        class="text-sky-700 text-sm block py-1">افزودن شبکه اجتماعی</a>
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{ route('socialAddress.list')}}"
                                                        class="text-sky-700 text-sm block py-1">مشاهده شبکه های اجتماعی</a>
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{ route('siteLink.create', [$cover])}}"
                                                        class="text-sky-700 text-sm block py-1">افزودن لینک</a>
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{ route('siteLink.list')}}"
                                                        class="text-sky-700 text-sm block py-1">مشاهده لینک ها</a>
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{ route('covers.edit',[$cover])}}"
                                                        class="text-sky-700 text-sm block py-1">ویرایش</a>
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{ route('covers.delete',[$cover])}}"
                                                        class="text-sky-700 text-sm block py-1">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div>
                                        <div class="px-6 py-4 text-center text-sm text-gray-500">
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