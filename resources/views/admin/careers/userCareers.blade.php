@extends('admin.app.panel')

@section('title', 'کسب و کارهای من')

@section('content')

    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">
            <div class="pb-4">
                <h2 class="text-lg font-bold text-gray-800">اطلاعات کسب و کار</h2>
            </div>
            <div class="flex flex-col gap-5">
                <div class="w-2/3 mx-auto bg-gray-100 shadow-md rounded">
                    <div class="w-full flex flex-row lg:grid lg:grid-cols-5 items-center divide-x divide-[#f1f1f4]">
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-20 lg:w-full">عنوان</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-24 lg:w-full">توضیحات</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-20 lg:w-full">لوگو</span>
                        </div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @foreach (Auth::user()->careers as $career)
                            @if ($career)
                                <div
                                    class="w-full flex flex-row lg:grid lg:grid-cols-5 items-center divide-x divide-[#f1f1f4]">
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                        <span class="block w-20 lg:w-full">{{ $career->title }}</span>
                                    </div>
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 w-[500px] lg:w-full text-center">
                                        <span class="block w-24 lg:w-full">{{ $career->description }}</span>
                                    </div>
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                        <div class="w-20 lg:w-full">
                                            <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover"
                                                src="<?= asset('storage/' . $career->logo) ?>">
                                        </div>
                                    </div>
                                    <div class="col-span-2 grid grid-cols-2 divide-x divide-[#f1f1f4] items-center">
                                        <div class="w-full relative">
                                        
                                            <div
                                                class="w-25 bg-gray-200 flex justify-center items-center h-10 py-1 rounded-sm gap-2 cursor-pointer hover:bg-gray-300 activities m-auto">
                                                <span class="text-sm">عملیات</span>
                                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
                                                    className="size-6">
                                                    <path strokeLinecap="round" strokeLinejoin="round"
                                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </div>
                                            <div
                                                class="absolute w-full top-full right-0 z-555 opacity-0 invisible -translate-y-5 transition-all duration-200">
                                                <ul class="text-sm bg-gray-200 mt-1 rounded-sm p-1">
                                                    @if (count($career->menu_categories))
                                                    <li>
                                                        <a href="{{ route('menuCat.list', [$career]) }}"
                                                            class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">دسته منو</a>
                                                    </li>
                                                    @endif
                                                    <li>
                                                        <a href="{{ route('menuCat.create', [$career]) }}"
                                                            class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">ایجاد دسته منو</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('career.single', [$career]) }}"
                                                            class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">مشاهده</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('career.edit', [$career]) }}"
                                                            class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">ویرایش</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('career.delete', [$career]) }}"
                                                            class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">حذف</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- اینجا یک باگ است --}}
                                        @if (count($career->menu_categories))
                                        <div class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center font-medium">
                                            <a href="{{ route('menuCat.menu', [$career]) }}" class="text-sky-700">مشاهده منو</a>
                                        </div>
                                        @endif
                                        {{-- تمام --}}
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
    <script src="{{ asset('assets/js/menuCat.js') }}"></script>
@endsection
