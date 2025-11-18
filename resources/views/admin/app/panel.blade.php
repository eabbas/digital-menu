<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <title>@yield('title')</title>
</head>

<body>
    <div class="w-full flex flex-row">
        <div class="hidden lg:block lg:w-[265px] bg-[#0D0E12] fixed z-50 right-0 top-0 h-dvh px-5 text-sm">
            <div class="w-full">
                <a href="{{ route('home') }}" class="block w-full py-3 text-center font-bold text-3xl text-white border-b border-[darkslategray]">
                  famenu.ir
                </a>
            </div>
            <div class="py-5 h-[80%] overflow-y-auto flex flex-col gap-5" style="scrollbar-width: none;">
                <div class="flex flex-row items-start gap-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                        <path fill="white" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                    </svg>
                    <a href="{{ route('home') }}" class="block w-full text-white py-1">
                       خانه
                    </a>
                </div>
                <div class="dashboard">
                    <div class="flex justify-between flex-row-reverse">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 fill-white w-[15px]">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">کسب و کار ها</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 384 512">
                                <path fill="white" d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/>
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('career.careers') }}" class=" text-white py-1">کسب و
                                کار های
                                من</a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('career.create') }}" class=" text-white py-1">ایجاد
                                کسب و کار
                                جدید</a>
                        </li>
                        @if(Auth::user()->type == 'admin')

                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('career.list') }}" class=" text-white py-1">
                                مشاهده همه کسب و کار ها
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('cc.create') }}" class=" text-white py-1">
                                ایجاد دسته کسب و کار
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('cc.list') }}" class=" text-white py-1">
                                همه دسته های کسب و کارها
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dashboard">
                    <div class="flex flex-row-reverse justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 fill-white w-[15px]">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">کاربران</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 448 512">
                                <path fill="white" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.list') }}" class=" text-white py-1">
                                مشاهده همه کاربران
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.adminCreate') }}" class=" text-white py-1">
                                ایجاد ادمین
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dashboard">
                    <div class="flex flex-row-reverse justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 fill-white w-[15px]">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">اسلایدر</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="800px" height="800px"
                                class="w-[30px] h-[30px] fill-white " viewBox="0 0 100 100"
                                enable-background="new 0 0 100 100" xml:space="preserve">
                                <path
                                    d="M22.5,19.7h20c1.4,0,2.5,1.1,2.5,2.5v54.9c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V22.2  C20,20.8,21.1,19.7,22.5,19.7z" />
                                <path
                                    d="M57.5,19.6h20c1.4,0,2.5,1.1,2.5,2.5V42c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V22.1  C55,20.7,56.1,19.6,57.5,19.6z" />
                                <path
                                    d="M57.5,54.6h20c1.4,0,2.5,1.1,2.5,2.5v19.9c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V57.1  C55,55.8,56.1,54.6,57.5,54.6z" />
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('slider.create') }}" class=" text-white py-1">
                                ایجاد اسلایدر
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('slider.list') }}" class=" text-white py-1">
                                لیست اسلایدر
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dashboard">
                    <div class="flex flex-row-reverse justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 fill-white w-[15px]">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">درباره ما</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 640 512">
                                <path fill="white" d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('aboutUs.create_edit') }}" class=" text-white py-1">
                                ایجاد درباره ما
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('aboutUs.list') }}" class=" text-white py-1">
                                لیست درباره ما
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="w-full">
        <header class="w-full fixed top-0 right-0 z-10">
            <div
                class="w-full float-end lg:w-[calc(100%-265px)] py-3 hidden lg:flex flex-row-reverse px-5 backdrop-blur-sm shadowHeader relative z-20">
                <div class="w-6/12 flex flex-row-reverse items-center">
                    <div class="relative hover_profile">
                        <div class="cursor-pointer">
                            @if(!Auth::user()->main_image)
                            <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar" class="size-10 rounded-xl">
                            @else
                            <img src="{{ asset('storage/'.Auth::user()->main_image) }}" alt="user__picture"
                                class="size-10 rounded-xl">
                            @endif
                        </div>
                        <div class="absolute left-0 pt-5 invisible opacity-0 transition-all duration-300">
                            <div class="w-[250px] rounded-xl  py-4 bg-white shadow__all__prof">
                                <div class="text-center px-2">
                                    <span class="font-bold">
                                        {{ Auth::user()->name }} {{ Auth::user()?->family }}
                                    </span>
                                </div>
                                <div class="w-full h-px bg-gray-300 mt-4 "></div>
                                <ul class="rtl text-right ">
                                    <li
                                        class="hover:text-[#1B84FF] hover:bg-[#F1F1F4] mt-1 w-11/12 ml-auto mr-auto rounded-lg">
                                        <a href="{{ route('user.profile', [Auth::user()]) }}"
                                            class="block w-full p-2">پروفایل من</a>
                                    </li>
                                    @if(!Auth::user()->email)
                                    <li
                                        class="hover:text-[#1B84FF] hover:bg-[#F1F1F4]  mt-1 w-11/12 ml-auto mr-auto rounded-lg">
                                        <a href="{{ route('user.compelete_form') }}" class="block w-full p-2">تکمیل
                                            پروفایل</a>
                                    </li>
                                    @endif

                                </ul>

                                <div class="w-full h-px bg-gray-300 my-2 "></div>
                                <div class="rtl text-right ">
                                    <div
                                        class="hover:text-[#1B84FF] hover:bg-[#F1F1F4] flex flex-row justify-between mt-1 w-11/12 ml-auto mr-auto rounded-lg">

                                        <a href="{{ route('user.setting') }}" class="block w-full p-2">تنظیمات اکانت</a>

                                    </div>
                                    <div
                                        class="hover:text-[#1B84FF] hover:bg-[#F1F1F4] flex flex-row justify-between mt-1 w-11/12 ml-auto mr-auto rounded-lg">

                                        <a href="{{ route('user.logout') }}" class="p-2 block w-full">خروج</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-6/12 flex justify-start">
                    <h3 class="text-2xl font-bold text-[#4B5675]">
                        داشبورد
                    </h3>
                </div>
            </div>
            <div
                class="flex lg:hidden flex-row justify-between items-center py-2 px-5 backdrop-blur-sm shadowHeader relative z-20">
                <div class="flex flex-col w-8 h-5 justify-between cursor-pointer"
                    onclick="hamburgerMenu('open', this)">
                    <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                    <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                    <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                </div>
                @if(!Auth::user()->main_image)
                <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar" class="size-16 rounded-xl">
                @else
                <img src="{{ asset('storage/'.Auth::user()->main_image) }}" alt="user__picture"
                    class="size-16 rounded-xl">
                @endif
            </div>
            <!-- hamburger menu -->
            <div class="w-full h-dvh fixed top-0 -left-full bg-black/50 flex flex-row z-50 transition-all duration-500">
                <div class="w-1/3 bg-inherit h-full" onclick="hamburgerMenu('close', this)"></div>
                <div class="w-2/3 bg-white h-full p-2 flex flex-col justify-between">
                    <div>
                        <div class="flex flex-row items-center gap-3 pb-2 border-b border-gray-300">
                            <div>
                                @if(!Auth::user()->main_image)
                                <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar"
                                    class="size-16 rounded-xl">
                                @else
                                <img src="{{ asset('storage/'.Auth::user()->main_image) }}" alt="user__picture"
                                    class="size-16 rounded-xl">
                                @endif
                            </div>
                            <div>
                                <span class="text-lg text-gray-700 font-semibold">{{ Auth::user()->name }} {{
                                    Auth::user()?->family }}</span>
                            </div>
                        </div>
                        <div class="pt-2">
                            <h3 class="text-md font-semibold text-gray-800 mb-1.5">کسب و کار ها</h3>
                            <ul class="pr-3.5">
                                <li>
                                    <a href="{{ route('home') }}" class="block text-gray-700 py-2 text-md">
                                        خانه 
                                    </a>
                                </li>
                                @if(!Auth::user()->email)
                                <li>
                                    <a href="{{ route('user.compelete_form') }}" class="block text-gray-700 py-2 text-md">
                                        تکمیل پروفایل
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ route('user.setting') }}" class="block text-gray-700 py-2 text-md">
                                        تنظیمات اکانت
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('career.careers') }}"
                                        class="block text-gray-700 py-2 text-md">کسب و کار های
                                        من</a>
                                </li>
                                <li>
                                    <a href="{{ route('career.create') }}"
                                        class="block text-gray-700 py-2 text-md">ایجاد کسب و کار
                                        جدید</a>
                                </li>
                                <li>
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('career.list') }}" class="block text-gray-700 py-2 text-md">
                                        مشاهده همه کسب و کار ها
                                    </a>
                                </li>
                                @if(Auth::user()->type == 'admin')
                                <li>
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('user.list') }}" class="block text-gray-700 py-2 text-md">
                                        مشاهده همه کاربران
                                    </a>
                                </li>
                                <li>
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('user.adminCreate') }}" class="block text-gray-700 py-2 text-md">
                                        ایجاد ادمین
                                    </a>
                                </li>
                                <li>
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('cc.create') }}" class="block text-gray-700 py-2 text-md">
                                        ایجاد دسته کسب و کار
                                    </a>
                                </li>
                                <li>
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('cc.list') }}" class="block text-gray-700 py-2 text-md">
                                       همه دسته های کسب و کارها
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('user.logout') }}"
                            class="block text-rose-700 py-1 font-medium text-sm text-center">خروج از حساب کاربری</a>
                    </div>
                </div>
            </div>
            <!-- hamburger menu end -->
        </header>
        <div class="w-full lg:w-[calc(100%-265px)] float-end mt-20 lg:px-5 overflow-y-auto px-5"
            style="scrollbar-width:none;">
            @yield('content')
        </div>
    </div>
    </div>
    <script src="{{ asset('assets/js/userPanel.js') }}"></script>
</body>

</html>