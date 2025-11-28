@extends('admin.app.panel')
@section('title')
 همه دسته های منوی کسب و کار {{ $categories[0]->career->title }}
@endsection
@section('content')
    <div class="flex flex-col w-full">
        <div class="flex flex-row justify-between items-center my-4">
            <div>
                {{-- <h1 class="text-xm font-bold"> محصولات </h1>
                <span class="text-sm text-gray-300">خانه _ تجارت - کاتالوگ</span> --}}
            </div>
            <div class="flex flex-row-reverse gap-2">
                <div class="cursor-pointer w-15 flex justify-center items-center rounded-lg h-9  bg-blue-500 text-white">
                    <a href="" class="text-sm">ساختن</a>
                </div>
                <div class="cursor-pointer w-15 flex justify-center items-center rounded-lg h-9  bg-gray-300">
                    <a href="#" class="text-sm">
                        فیلتر
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col p-6 gap-3 shadow__profaill__list_products rounded-[7px]">
            <div class="flex flex-rwo justify-between">
                <div class="bg-gray-100 pr-3 w-65 h-10 rounded-md flex flex-row items-center gap-2">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <input class="text-gray-600" type="text" placeholder="جستجو">
                </div>
                <div class="flex flex-row gap-3 justify-between">
                    {{-- <div class="cursor-pointer w-38 h-10 rounded-[7px] flex pr-3 items-center bg-gray-200 justify-between text-gray-500">
                        <a href="">وضعیت
                        </a>
                        <svg class="size-4 ml-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            strokeWidth={1.5} stroke="currentColor" className="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div> --}}
                    <div class="cursor-pointer w-38 h-10 rounded-[7px] flex justify-center items-center bg-blue-500 text-white">
                        <a href="{{ route('menuCat.create', [$categories[0]->career]) }}">افزودن دسته جدید</a>
                    </div>
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
                                    <img class="size-11 rounded-[7px]" src="{{ asset('storage/'.$category->image) }}" alt="">
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
                                <div class="absolute w-full top-full right-[calc(100%-20px)] z-555 opacity-0 invisible -translate-y-5 transition-all duration-200">
                                    <ul class="text-sm bg-gray-200 mt-1 rounded-sm p-1">
                                        {{-- اگه منو داشت، لینک ویرایش منو بیاد براش اگه نداشت ایجاد منو --}}
                                        <li>
                                            <a href="#" class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">ایجاد منو</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('menuCat.edit', [$category->id]) }}" class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">ویرایش</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('menuCat.delete', [$category->id]) }}" class="inline-block w-full hover:bg-gray-300 p-1 rounded-sm text-gray-700">حذف</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="flex justify-between items-center">
                <div class="bg-gray-200 p-1 px-2 rounded-[5px]">
                    <select name="" id="">
                        <option class=" bg-gray-200" value="">10</option>
                        <option class=" bg-gray-200" value="">25</option>
                        <option class=" bg-gray-200" value="">50</option>
                        <option class=" bg-gray-200" value="">100</option>
                    </select>
                </div>
                <div class="flex flex-row items-center gap-2">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>

                    <ul class="flex gap-1">
                        <div class="hover:bg-gray-200 size-9 rounded-sm flex justify-center items-center">
                            <li>
                                <a href="">1</a>
                            </li>
                        </div>
                        <div class="hover:bg-gray-200 size-9 rounded-sm flex justify-center items-center">
                            <li>
                                <a href="">2</a>
                            </li>
                        </div>
                        <div class="hover:bg-gray-200 size-9 rounded-sm flex justify-center items-center">
                            <li>
                                <a href="">3</a>
                            </li>
                        </div>
                        <div class="hover:bg-gray-200 size-9 rounded-sm flex justify-center items-center">
                            <li>
                                <a href="">4</a>
                            </li>
                        </div>
                    </ul>
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>

                </div>
            </div> --}}
        </div>
        <div class="flex justify-between my-5 items-center">
            <div class="flex gap-2">
                <span class="text-gray-400 text-sm">2024©</span>
                <a href="" class="text-sm">ساتراس وب</a>
            </div>
            <ul class="flex gap-4 ">
                <li>
                    <a class="text-gray-400 text-sm" href="">درباره ی ما</a>
                </li>
                <li>
                    <a class="text-gray-400 text-sm" href="">پشتیباتی</a>
                </li>
                <li>
                    <a class="text-gray-400 text-sm" href="">خرید</a>
                </li>
            </ul>
        </div>
    </div>
    <script src="{{ asset('assets/js/menuCat.js') }}"></script>
@endsection