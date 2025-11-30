@extends('admin.app.panel')
@section('title')
    همه دسته های منوی کسب و کار {{ $categories[0]->career->title }}
@endsection
@section('content')
    <div class="flex flex-col w-full mb-3">
        <div class="flex flex-row justify-between items-center my-4">
            <div>
                <h1 class="text-xm font-bold">  همه دسته های منوی کسب و کار {{ $categories[0]->career->title }} </h1>
            </div>
        </div>
        <div class="flex flex-col p-6 gap-3 shadow__profaill__list_products rounded-[7px]">
            <div class="flex flex-rwo justify-end">
                <div class="cursor-pointer w-38 h-10 rounded-[7px] flex justify-center items-center bg-blue-500 text-white">
                    <a href="{{ route('menuCat.create', [$categories[0]->career]) }}">افزودن دسته جدید</a>
                </div>
            </div>
            <div class="p-3">
                <table class="w-2/3 m-auto">
                    <thead>
                        <tr>
                            <td class="py-3 text-sm text-gray-500 w-[106px]"></td>
                            <td class="py-3 text-sm text-gray-500 w-[148px]">نام دسته</td>
                            <td class="py-3 text-sm text-gray-500">توضیحات دسته</td>
                            <td class="py-3 text-sm text-gray-500 w-[106px]"></td>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="flex flex-row gap-4 items-center">
                                    {{-- <input class="size-5 ml-2 bg-gray-300" type="checkbox"> --}}
                                    <div class="flex gap-4 flex-row-reverse items-center">
                                        <img class="size-11 rounded-[7px]" src="{{ asset('storage/' . $category->image) }}"
                                            alt="">
                                    </div>
                                </td>
                                <td class="text-sm">{{ $category->title }}</td>
                                <td class="column text-sm">{{ $category->description }}</td>
                                <td class="flex w-full relative">
                                    <div
                                        class="w-25 bg-gray-200 flex justify-center items-center h-10 py-1 rounded-sm gap-2 cursor-pointer hover:bg-gray-300 activities">
                                        <span>عملیات</span>
                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </div>
                                    <div
                                        class="absolute w-full top-full right-0 z-555 opacity-0 invisible -translate-y-5 transition-all duration-200">
                                        <ul class="text-sm bg-gray-200 mt-1 rounded-sm p-1">
                                            <li>
                                                <a href="{{ route('menu.create', [$category->id]) }}"
                                                    class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">ایجاد
                                                    آیتم منو</a>
                                            </li>
                                            @if (count($category->menu_items))
                                                <li>
                                                    <a href="{{ route('menu.items', [$category->id]) }}"
                                                        class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">آیتم
                                                        ها</a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="{{ route('menuCat.edit', [$category->id]) }}"
                                                    class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">ویرایش</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('menuCat.delete', [$category->id]) }}"
                                                    class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">حذف</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/menuCat.js') }}"></script>
@endsection
