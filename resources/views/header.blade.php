<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    @PwaHead
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('assets/js/tailwind.js#t=0.1') }}"></script>
    <script src="{{ asset('assets/js/jquery.js#t=0.1') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css#t=0.1') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('storage/logos/ringaLogo1.png#t=0.1') }}" type="image/png">
    {{--    <link rel="shortcut icon" href="{{ asset('storage/logos/ringaLogo1.png') }}" type="image/png">--}}
    <script src="{{ asset('assets/js/html5-qrcode.min.js#t=0.1') }}"></script>
    <title>@yield('title')</title>

</head>

<body class="bg-[#ffffff]">
@php
    if (Auth::check()) {
        $roles = Auth::user()->role;
        $ids = $roles->pluck('id')->toArray();
    }
@endphp

        <!-- مودال ساده -->
<div id="comingSoon" class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl max-w-xs w-full p-5 relative transform transition-all duration-300 scale-95 opacity-0"
         id="contentCommingSoon">
        <button id="closeModal" class="absolute top-3 left-3 text-gray-500 hover:text-gray-800 text-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <div class="text-center pt-2">
            <h3 class="text-lg font-bold text-gray-800 mb-2">به زودی</h3>
            <div class="inline-flex items-center justify-center w-16 h-16 bg-[#eb3254] rounded-full mb-4">
                <svg class="w-8 h-8 text-[#eb3254]" fill="white" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h6>سلام دوست عزیز</h6>
            <p class="text-gray-600 text-sm mb-5">
                فروشگاه در حال راه‌اندازی است
            </p>

            <button id="closeForm"
                    class="w-full bg-[#eb3254] hover:bg-[#eb3254] text-white py-2.5 rounded-lg text-sm font-medium transition">
                باشه
            </button>
        </div>
    </div>
</div>
<div id="cart" class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl max-w-xs w-full p-5 relative transform transition-all duration-300 scale-95 opacity-0"
         id="contentCart">
        <button id="closeCart" class="absolute top-3 left-3 text-gray-500 hover:text-gray-800 text-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <div class="text-center pt-2">
            <h3 class="text-lg font-bold text-gray-800 mb-2">به زودی</h3>
            <div class="inline-flex items-center justify-center w-16 h-16 bg-[#eb3254] rounded-full mb-4">
                <svg class="w-8 h-8 text-[#eb3254]" fill="white" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h6>سلام دوست عزیز</h6>
            <p class="text-gray-600 text-sm mb-5">
                پس از راه اندازی فروشگاه سبد خرید راه اندازی میشود
            </p>

            <button id="closeFormCart"
                    class="w-full bg-[#eb3254] hover:bg-[#eb3254] text-white py-2.5 rounded-lg text-sm font-medium transition">
                باشه
            </button>
        </div>
    </div>
</div>
<header>
    <header class="w-full bg-white flex justify-center items-center top-0 left-0 fixed z-3"><!-- lg:w-[calc(100%-265px)] -->
        <div class="w-11/12 flex items-center justify-between">
            <div class="flex relative p-1 justify-center items-center cursor-pointer"> <!-- lg:hidden -->
                <div class="flex items-center">
                    <div class="flex flex-col w-8 h-5 justify-between cursor-pointer" onclick="hamburgerMenu('open')"
                         id="menuBlockliet">
                        <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                        <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                        <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                    </div>
                </div>
            </div>
            <a href="{{ route('home') }}" class="block cursor-pointer">
                <img src="{{asset('storage/logos/ringaLogo.png')}}" alt="" class="w-30 max-h-[60px] object-cover">
            </a>


            <div onclick="searchPopup('open')" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><path d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

            </div>
            <div class="fixed w-full lg:w-[calc(100%-265px)] h-dvh z-99999 top-0 left-0 invisible opacity-0 bg-black/50 backdrop-blur transition-all duration-300"
                 id="searchP">
                <div class="w-full pt-4 pb-8 bg-white transition-all duration-300 -translate-y-full"
                     id="searchSection">
                    <div class="w-full pb-5 pr-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                             viewBox="0 0 384 512" onclick="searchPopup('close')">
                            <path
                                    d="M324.5 411.1c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L214.6 256 347.1 123.5c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L192 233.4 59.5 100.9c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L169.4 256 36.9 388.5c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L192 278.6 324.5 411.1z" />
                        </svg>
                    </div>
                    <form action="{{ route('search') }}" method="post" class="w-[calc(100%-60px)] mx-auto">
                        @csrf
                        <div class="w-full flex flex-row items-center samim">
                            <div
                                    class="w-full bg-white border-1 border-gray-400 flex flex-row rounded-full items-center gap-2 px-3 relative">

                                <input class="outline-none py-3 w-full" type="text" name="search"
                                       placeholder="جست و جو"
                                       @if (isset($searchTitle)) value="{{ $searchTitle }}" @endif>
                                <div
                                        class="absolute top-1 left-1 p-2 flex justify-center items-center rounded-full bg-white mr-2 cursor-pointer">
                                    <button class="cursor-pointer flex flex-row justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6"
                                             viewBox="0 0 512 512">
                                            {{-- <path fill="white" --}}
                                            <path fill="gray"
                                                  d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            {{-- <div
                                class="p-2 flex justify-center items-center rounded-full bg-white mr-2 cursor-pointer">
                                <button class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                </button>
                            </div> --}}
                        </div>
                    </form>
                </div>
                <div class="w-full h-[calc(100%-122px)]" onclick="searchPopup('close')"></div>
            </div>
        </div>
        {{--            @include('newHeader')--}}
    </header>

    <div
            class="hidden border-b-1 bg-[#eb3254] border-b-gray-300 mb-5 @if (
                    Route::is('home') ||
                    Route::is('aboutUs.clientList') ||
                    Route::is('contactUs.create') ||
                    Route::is('search') ||
                    Route::is('career.categoryCareers') ||
                    Route::is('career.careersList') ||
                    Route::is('client.loadLink') ||
                    Route::is('client.allPages') ||
                    Route::is('career.careersCategories') ||
                    Route::is('career.careersList') ||
                    Route::is('client.menu')) w-full @else w-[calc(100%-265px)] float-end @endif">
        <div class="w-11/12 mx-auto grid grid-cols-3 gap-10">
            <div class="flex flex-row items-center gap-10">
                {{-- logo --}}
                <div class="size-[50px]">
                    <a href="{{ route('home') }}">
                        <img class="size-full" src="{{ asset('storage/images/Famenu1.png') }}" alt="">
                    </a>
                </div>
                <ul class="flex flex-row items-center gap-5">
                    <li>
                        <a href="{{ route('home') }}"
                           class="text-md text-sm text-white transition-all duration-200 py-5 inline-block">خانه</a>
                    </li>
                    {{-- @if (!Auth::check())
                        <li>
                            <a href="{{ route('login') }}"
                                class="text-md text-sm hover:text-[#00a692] transition-all duration-200 py-5 inline-block">
                                ورود | ثبت نام
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('user.profile', [Auth::user()]) }}"
                                class="text-md text-sm hover:text-[#00a692] transition-all duration-200 py-5 inline-block">
                                پروفایل
                            </a>
                        </li>
                    @endif --}}
                    <li>
                        <a href="{{ route('aboutUs.clientList') }}"
                           class="text-md text-sm transition-all text-white duration-200 py-5 inline-block">درباره
                            ما</a>
                    </li>
                    <li>
                        <a href="{{ route('contactUs.create') }}"
                           class="text-md text-sm transition-all text-white duration-200 py-5 inline-block">ارتباط
                            با ما</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-row items-center">
                <form action="{{ route('search') }}" method="post" class="w-full">
                    @csrf
                    <div class="w-full flex flex-row items-center samim">
                        <div
                                class="w-full flex flex-row rounded-full items-center gap-2 px-3 bg-[#F9F9F9]">
                            <input class="outline-none p-2 w-full rounded-lg" type="text" name="search"
                                   placeholder="جست و جو"
                                   @if (isset($searchTitle)) value="{{ $searchTitle }}" @endif>
                        </div>
                        <div
                                class="p-2 flex justify-center items-center rounded-full bg-white mr-2 cursor-pointer">
                            <button class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 rotate-y-180"
                                     viewBox="0 0 512 512">
                                    <path fill="#eb3254"
                                          d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-row justify-end items-center gap-5">
                <div class="relative hover_profile">
                    @if (Auth::check())
                        <div class="cursor-pointer">
                            @if (!Auth::user()->main_image)
                                <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar"
                                     class="size-10 rounded-full">
                            @else
                                <img src="{{ asset('storage/' . Auth::user()->main_image) }}" alt="user__picture"
                                     class="size-10 rounded-full">
                            @endif
                        </div>
                    @else
                        <div>
                            <a href="{{ route('login') }}" class="text-xs font-bold text-white">ورود | ثبت
                                نام</a>
                        </div>
                    @endif
                    @if (Auth::check())
                        <div class="absolute left-0 pt-5 invisible opacity-0 transition-all duration-300 z-999">
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
                                        <a href="{{ route('user.profile') }}" class="block w-full p-2">پروفایل
                                            من</a>
                                    </li>
                                    {{--                                        @if (!Auth::user()->email)--}}
                                    {{--                                            <li--}}
                                    {{--                                                class="hover:text-[#1B84FF] hover:bg-[#F1F1F4]  mt-1 w-11/12 ml-auto mr-auto rounded-lg">--}}
                                    {{--                                                <a href="{{ route('user.compelete_form') }}"--}}
                                    {{--                                                    class="block w-full p-2">تکمیل--}}
                                    {{--                                                    پروفایل</a>--}}
                                    {{--                                            </li>--}}
                                    {{--                                        @endif--}}
                                </ul>
                                <div class="w-full h-px bg-gray-300 my-2 "></div>
                                <div class="rtl text-right ">
                                    <div
                                            class="hover:text-[#1B84FF] hover:bg-[#F1F1F4] flex flex-row justify-between mt-1 w-11/12 ml-auto mr-auto rounded-lg">
                                        <a href="{{ route('user.setting') }}" class="block w-full p-2">تنظیمات
                                            اکانت</a>
                                    </div>
                                    <div
                                            class="hover:text-[#1B84FF] hover:bg-[#F1F1F4] flex flex-row justify-between mt-1 w-11/12 ml-auto mr-auto rounded-lg">
                                        <a href="{{ route('user.logout') }}" class="p-2 block w-full">خروج</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="size-7 relative cursor-pointer">
                        <span class="absolute text-white text-sm -left-2 -top-3"
                              id="shoppingCartCount">{{ Auth::check() ? count(Auth::user()->carts) : 0 }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-full rotate-y-180" viewBox="0 0 576 512">
                        <path fill="white"
                              d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48H69.5c3.8 0 7.1 2.7 7.9 6.5l51.6 271c6.5 34 36.2 58.5 70.7 58.5H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H199.7c-11.5 0-21.4-8.2-23.6-19.5L170.7 288H459.2c32.6 0 61.1-21.8 69.5-53.3l41-152.3C576.6 57 557.4 32 531.1 32h-411C111 12.8 91.6 0 69.5 0H24zM131.1 80H520.7L482.4 222.2c-2.8 10.5-12.3 17.8-23.2 17.8H161.6L131.1 80zM176 512a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm336-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::check())
        <div class="w-full h-dvh fixed top-0 right-0 invisible opacity-0 bg-black/50 flex flex-row-reverse z-99999 transition-all duration-500 backdrop-blur-sm"
             id="menuBlock">
            <div class="w-1/3 h-full relative" onclick="hamburgerMenu('close', this)">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 absolute top-5 left-5 cursor-pointer"
                     viewBox="0 0 384 512">
                    <path fill="white"
                          d="M324.5 411.1c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L214.6 256 347.1 123.5c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L192 233.4 59.5 100.9c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L169.4 256 36.9 388.5c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L192 278.6 324.5 411.1z" />
                </svg>
            </div>
            <div class="w-2/3 bg-white h-full p-2 flex flex-col justify-between transition-all duration-300 translate-x-full"
                 id="menuList">
                <div>
                    <a href="{{ route('user.profile') }}"
                       class="flex flex-row items-center gap-3 pb-2 border-b border-gray-300">
                        <div>
                            @if (!Auth::user()->main_image)
                                <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar"
                                     class="size-16 rounded-xl">
                            @else
                                <img src="{{ asset('storage/' . Auth::user()->main_image) }}"
                                     alt="user__picture object-cover" class="size-14 rounded-full">
                            @endif
                        </div>
                        <div>
                                <span class="text-lg text-gray-700 font-bold">{{ Auth::user()->name }}
                                    {{ Auth::user()?->family }}</span>
                        </div>
                    </a>
                    <div class="overflow-y-auto [&::-webkit-scrollbar]:hidden h-[calc(100vh-134px)] mb-12 pb-12">
                        <div class="pt-2 flex flex-col">
                            <div>
                                <a href="{{ route('home') }}" class="flex flex-row items-center gap-3 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5" fill="none" stroke="@if(Route::is('home')) var(--primary-color) @else var(--secondary-text-color) @endif" stroke-width="32" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                                    </svg>
                                    <span class="text-sm @if(Route::is('home')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">صفحه اول</span>
                                </a>
                            </div>
                            {{--                                @if (!Auth::user()->email)--}}
                            {{--                                    <div>--}}
                            {{--                                        <a href="{{ route('user.compelete_form') }}"--}}
                            {{--                                            class="block text-gray-700 py-2 text-md">--}}
                            {{--                                            تکمیل پروفایل--}}
                            {{--                                        </a>--}}
                            {{--                                    </div>--}}
                            {{--                                @endif--}}
                            <div>
                                <a href="{{ route('user.setting') }}" class="flex flex-row items-center gap-3 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5" viewBox="0 0 512 512">
                                        <path fill="@if(Route::is('user.setting')) var(--primary-color) @else var(--secondary-text-color) @endif" d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6l-219 219V400c0-8.8-7.2-16-16-16H128V352c0-8.8-7.2-16-16-16H99.4l219-219zM66.9 379.5c1.2-4 2.7-7.9 4.7-11.5H96v32c0 8.8 7.2 16 16 16h32v24.4c-3.7 1.9-7.5 3.5-11.6 4.7L39.6 472.4l27.3-92.8zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17zM331.3 202.7c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0l-128 128c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0l128-128z"/></svg>
                                    <span class="text-sm @if(Route::is('user.setting')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">ویرایش پروفایل</span>
                                </a>
                            </div>
                        </div>
                        <div class="w-6/12 flex justify-start">
                            <a href="{{ route('dashboard') }}" class="flex flex-row items-center gap-3 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 @if(Route::is('dashboard')) fill-(--primary-color) @else fill-(--secondary-text-color) @endif"  viewBox="0 0 512 512">
                                    <path fill="@if(Route::is('dashboard')) var-(--primary-color) @else var-(--secondary-text-color) @endif" d="M507.8 37.2c5.9 6.5 5.5 16.7-1.1 22.6l-176 160c-6.3 5.7-16 5.5-22.1-.5L190.4 101 25.4 220.9c-7.1 5.2-17.2 3.6-22.4-3.5s-3.6-17.2 3.5-22.4l176-128c6.4-4.6 15.2-3.9 20.7 1.6L320.5 185.9 485.2 36.2c6.5-5.9 16.7-5.5 22.6 1.1zM80 432V368c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16zM64 320c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48s-48-21.5-48-48V368c0-26.5 21.5-48 48-48zm144-48c0-8.8-7.2-16-16-16s-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V272zm-64 0c0-26.5 21.5-48 48-48s48 21.5 48 48V432c0 26.5-21.5 48-48 48s-48-21.5-48-48V272zM336 432V336c0-8.8-7.2-16-16-16s-16 7.2-16 16v96c0 8.8 7.2 16 16 16s16-7.2 16-16zM320 288c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48s-48-21.5-48-48V336c0-26.5 21.5-48 48-48zm144-16c0-8.8-7.2-16-16-16s-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V272zm-64 0c0-26.5 21.5-48 48-48s48 21.5 48 48V432c0 26.5-21.5 48-48 48s-48-21.5-48-48V272z"/>
                                </svg>
                                <span class="text-sm @if(Route::is('dashboard')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">داشبورد</span>

                            </a>
                        </div>
                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <div class="flex flex-row-reverse items-center gap-2">
                                    <h3 class="text-sm text-(--primary-text-color) mb-1">فروشگاه ها</h3>
                                    {{-- <span class=" text-[white] flex justify-end font-bold">فروشگاه</span> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                                        <path
                                                d="M507.1 129.5l0 0c5.8 9.2 6.4 20.5 2.3 30.1c-3.9 9.2-11.1 14.8-20.1 16c-2 .3-3.9 .4-5.8 .4c-11.7 0-22.2-5.1-29.7-13.2c-9.1-10-22-15.7-35.6-15.7s-26.5 5.8-35.5 15.8c-7.3 8.1-17.7 13.2-29.6 13.2c-11.8 0-22.3-5.1-29.6-13.2c-9.1-10.1-22-15.8-35.6-15.8s-26.5 5.7-35.6 15.8c-7.3 8.1-17.7 13.2-29.6 13.2c-11.8 0-22.3-5.1-29.6-13.2c-9.1-10.1-22-15.8-35.6-15.8s-26.5 5.7-35.6 15.8c-7.3 8.1-17.7 13.2-29.6 13.2c-1.8 0-3.8-.1-5.8-.4c-8.9-1.2-16-6.8-19.9-16c-4.1-9.6-3.5-20.9 2.3-30.1l0 0 0 0L120.4 48H455.6l51.5 81.5zM483.5 224c4.1 0 8.1-.3 12-.8c55.5-7.4 81.8-72.5 52.1-119.4L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c0 0 0 0 0 0c19.6 0 37.5-6.4 51.9-17c4.8-3.5 9.2-7.6 13.2-11.9c4 4.4 8.4 8.4 13.2 11.9c14.5 10.6 32.4 17 52 17c19.6 0 37.5-6.4 52-17c4.8-3.5 9.2-7.6 13.2-12c4 4.4 8.4 8.4 13.2 11.9c14.5 10.6 32.4 17 52 17c19.8 0 37.8-6.5 52.3-17.3c4.7-3.5 9-7.4 12.9-11.7c3.9 4.3 8.3 8.3 13 11.8c14.5 10.7 32.5 17.2 52.2 17.2c0 0 0 0 0 0zM112 336V254.4c-6.4 1.1-12.9 1.6-19.6 1.6c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V336v48 64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 336 252.6c-4 1-8 1.8-12.3 2.3l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-6.6 0-13.1-.5-19.4-1.6V336H112zm352 48v64c0 8.8-7.2 16-16 16H128c-8.8 0-16-7.2-16-16V384H464z" />
                                    </svg>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('ecomm.ecomms') ||
                                                Route::is('ecomm.*') ||
                                                Route::is('ecomm.list') ||
                                                Route::is('ecomm_category.index') ||
                                                Route::is('ecomm_category.create') ||
                                                Route::is('ecomm_product.index') ||
                                                Route::is('ecomm_product.create')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('ecomm.ecomms') ||
                                            Route::is('ecomm.*') ||
                                            Route::is('ecomm.list') ||
                                            Route::is('ecomm_category.index') ||
                                            Route::is('ecomm_category.create') ||
                                            Route::is('ecomm_product.index') ||
                                            Route::is('ecomm_product.create')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5">
                                    <a href="{{ route('ecomm.ecomms') }}"
                                       class="block text-sm @if (Route::is('ecomm.ecomms')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif py-2">
                                        فروشگاه های من
                                    </a>
                                </li>
                                <li class="pr-3.5">
                                    <a href="{{ route('ecomm.create') }}"
                                       class="block py-2 text-sm @if (Route::is('ecomm.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        فروشگاه جدید
                                    </a>
                                </li>
                                @if (in_array(1, $ids))
                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('ecomm.list') }}"
                                           class="block py-2 text-sm @if (Route::is('ecomm.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            همه فروشگاه ها
                                        </a>
                                    </li>
                                @endif

                                @if (count(Auth::user()->ecomms))
                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('ecomm_category.index') }}"
                                           class="block py-2 text-sm @if (Route::is('ecomm_category.index')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            همه دسته ها
                                        </a>
                                    </li>
                                @endif

                                <li class="pr-3.5">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('ecomm_category.create') }}"
                                       class="block py-2 text-sm @if(Route::is('ecomm_category.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        دسته جدید
                                    </a>
                                </li>
                                @if (count(Auth::user()->ecomms))
                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('ecomm_product.index') }}"
                                           class="block py-2 text-sm @if(Route::is('ecomm_product.index')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            همه محصولات
                                        </a>
                                    </li>
                                @endif
                                <li class="pr-3.5">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('ecomm_product.create') }}"
                                       class="block py-2 text-sm @if(Route::is('ecomm_product.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        محصول جدید
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <div class="flex flex-row-reverse items-center gap-2">
                                    {{-- <span class=" text-[white] flex justify-end font-bold">آموزشگاه ها</span> --}}
                                    <h3 class="text-sm text-(--primary-text-color) mb-1">آموزشگاه ها</h3>
                                    <svg width="26" height="26" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="m12 2.906-.328.164-7.5 3.68-.422.21v1.29h16.5V6.96l-.422-.21-7.5-3.68L12 2.906Zm0 1.688 4.406 2.156H7.594L12 4.594ZM5.25 9v7.5H4.5V18h15v-1.5h-.75V9h-1.5v7.5h-1.5V9h-1.5v7.5h-1.5V9h-1.5v7.5h-1.5V9h-1.5v7.5h-1.5V9h-1.5ZM3 18.75v1.5h18v-1.5H3Z">
                                        </path>
                                    </svg>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('institute.institutes') ||
                                                Route::is('institute.*') ||
                                                Route::is('field.fields') ||
                                                Route::is('lesson.lessons') ||
                                                Route::is('class.classes')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('institute.institutes') ||
                                            Route::is('institute.*') ||
                                            Route::is('field.fields') ||
                                            Route::is('lesson.lessons') ||
                                            Route::is('class.classes')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5">
                                    <a href="{{ route('institute.create') }}"
                                       class="block py-2 text-sm  @if(Route::is('institute.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        ایجاد آموزشگاه جدید
                                    </a>
                                </li>
                                <li class="pr-3.5">
                                    <a href="{{ route('institute.institutes') }}"
                                       class="block py-2 text-sm @if(Route::is('institute.institutes')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        لیست آموزشگاه ها
                                    </a>
                                </li>
                                @if (Auth::user()->role[0]->title == 'admin')
                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('field.fields') }}"
                                           class="block py-2 text-sm @if(Route::is('field.fields')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            لیست همه رشته ها
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('lesson.lessons') }}"
                                           class="block py-2 text-sm @if(Route::is('lesson.lessons')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            لیست همه درس ها
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('class.classes') }}"
                                           class="block py-2 text-sm @if(Route::is('class.classes')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            لیست همه کلاس ها
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        @if (in_array(1, $ids) || in_array(5, $ids))
                            <div class="pt-3">
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <div class="flex flex-row-reverse items-center gap-2">
                                        {{-- <span class=" text-[white] flex justify-end font-bold">چک لیست</span> --}}
                                        <h3 class="text-sm text-(--primary-text-color) mb-1"> چک لیست</h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                            <path
                                                    d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                        </svg>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if (Route::is('checkList.formCheckList') || Route::is('checkList.myList')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                    </svg>
                                </div>
                                <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('checkList.formCheckList') || Route::is('checkList.myList')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5">
                                        <a href="{{ route('checkList.formCheckList') }}"
                                           class="block py-2 text-sm @if(Route::is('checkList.formCheckList')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            ثبت چک لیست
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <a href="{{ route('checkList.myList') }}"
                                           class="block py-2 text-sm  @if(Route::is('checkList.myList')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            لیست چک لیست های من
                                        </a>
                                    </li>
                                    @if (Auth::user()->phoneNumber == '09147794595')
                                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5  rounded-sm">
                                            <span class="size-1 bg-white rounded-sm"></span>
                                            <a href="{{ route('checkList.checkList_Users') }}"
                                               class=" py-1 block text-sm @if(Route::is('checkList.checkList_Users')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                                مشاهده کاربران
                                            </a>
                                        </li>
                                        <li
                                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5  rounded-sm">
                                            <span class="size-1 bg-white rounded-sm"></span>
                                            <a href="{{ route('checkList.all_user_check_lists') }}"
                                               class=" py-1 block text-sm @if(Route::is('checkList.all_user_check_lists')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                                لیست تمام چک لیست ها
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                        @endif
                        {{-- suggestion --}}
                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <div class="flex flex-row-reverse items-center gap-2">
                                    {{-- <span class=" text-[white] flex justify-end font-bold"> پیشنهادات</span> --}}
                                    <h3 class="text-sm text-(--primary-text-color) mb-1">پیشنهادات</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                        <path
                                                d="M32 32H480c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H32C14.3 128 0 113.7 0 96V64C0 46.3 14.3 32 32 32zm0 128H480V416c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V160zm128 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" />
                                    </svg>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('suggestion.*')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('suggestion.*')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5">
                                    <a href="{{ route('suggestion.create') }}"
                                       class="block py-2 text-sm @if (Route::is('suggestion.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        افزودن
                                    </a>
                                </li>
                                <li class="pr-3.5">
                                    <a href="{{ route('suggestion.list') }}"
                                       class="block py-2 text-sm  @if (Route::is('suggestion.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        مشاهده
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <div class="flex flex-row-reverse items-center gap-2">
                                    {{-- <span class=" text-[white] flex justify-end font-bold">رستوران</span> --}}
                                    <h3 class="text-sm text-(--primary-text-color) mb-1">رستوران ها</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                        <path
                                                d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z" />
                                    </svg>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('career.*') ||
                                                Route::is('menu.createMenu') ||
                                                Route::is('menu.user_menus') ||
                                                Route::is('cc.create') ||
                                                Route::is('cc.list')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('career.*') ||
                                            Route::is('menu.createMenu') ||
                                            Route::is('menu.user_menus') ||
                                            Route::is('cc.create') ||
                                            Route::is('cc.list')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5">
                                    <a href="{{ route('career.careers') }}"
                                       class="block py-2 text-sm  @if(Route::is('career.careers')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        لیست رستوران های من
                                    </a>
                                </li>

                                <li class="pr-3.5">
                                    <a href="{{ route('career.create') }}"
                                       class="block py-2 text-sm @if (Route::is('career.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        ایجاد رستوران جدید
                                    </a>
                                </li>
                                {{-- @if (count(Auth::user()->menus))
                                <li class="pr-3.5 @if (Route::is('menu.user_menus')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('menu.user_menus', [Auth::user()]) }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست منو های من
                                    </a>
                                </li>
                            @endif --}}
                                {{-- @if (count(Auth::user()->careers))
                                <li class="pr-3.5 @if (Route::is('menu.createMenu')) bg-gray-100 @endif">
                                    <a href="{{ route('menu.createMenu') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ایجاد منو برای رستوران
                                    </a>
                                </li>
                            @endif --}}
                                @if (in_array(1, $ids) || in_array(4, $ids))
                                    <li class="pr-3.5">
                                        <a href="{{ route('career.createUser') }}"
                                           class="block py-2 text-sm  @if (Route::is('career.createUser')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            ایجاد رستوران برای دیگری
                                        </a>
                                    </li>
                                @endif
                                @if (in_array(1, $ids))
                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('career.list') }}"
                                           class="block py-2 text-sm  @if (Route::is('career.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            همه رستوران ها
                                        </a>
                                    </li>

                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('cc.create') }}"
                                           class="block py-2 text-sm  @if (Route::is('cc.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            ایجاد دسته رستوران
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('cc.list') }}"
                                           class="block py-2 text-sm @if (Route::is('cc.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            همه دسته های رستوران
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <div class="flex flex-row-reverse items-center gap-2">
                                    {{-- <span class=" text-[white] flex justify-end font-bold">صفحه ها</span> --}}
                                    <h3 class="text-sm text-(--primary-text-color) mb-1">صفحه ها</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                        <path
                                                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                                    </svg>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('pages.*') || Route::is('socialMedia.*')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('pages.*') || Route::is('socialMedia.*')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5">
                                    <a href="{{ route('pages.create') }}"
                                       class="block py-2 text-sm  @if(Route::is('pages.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        ایجاد صفحه
                                    </a>
                                </li>
                                <li class="pr-3.5">
                                    <a href="{{ route('pages.social_list') }}"
                                       class="block py-2 text-sm  @if (Route::is('pages.social_list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        لیست صفحه های من
                                    </a>
                                </li>
                                @if (in_array(1, $ids))
                                    <li class="pr-3.5">
                                        <a href="{{ route('pages.list') }}"
                                           class="block py-2 text-sm  @if (Route::is('pages.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            لیست همه صفحه ها
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('socialMedia.create') }}"
                                           class="block py-2 text-sm  @if (Route::is('socialMedia.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            ایجاد شبکه اجتماعی
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('socialMedia.list') }}"
                                           class="block py-2 text-sm  @if (Route::is('socialMedia.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            لیست شبکه های اجتماعی
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        @if (in_array(1, $ids))
                            <div class="pt-3">
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <div class="flex flex-row-reverse items-center gap-2">
                                        {{-- <span class=" text-[white] flex justify-end font-bold">کاربران</span> --}}
                                        <h3 class="text-sm text-(--primary-text-color) mb-1">کاربران</h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                                            <path
                                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                        </svg>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if (Route::is('user.list') ||
                                                    Route::is('user.create_user') ||
                                                    Route::is('user.myUsers') ||
                                                    Route::is('user.requestList')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                    </svg>
                                </div>
                                <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('user.list') ||
                                                Route::is('user.create_user') ||
                                                Route::is('user.myUsers') ||
                                                Route::is('user.requestList')) max-h-[1000px] @else max-h-0 @endif">
                                    @if (in_array(1, $ids) || in_array(4, $ids))
                                        <li class="pr-3.5">
                                            <a href="{{ route('user.myUsers') }}"
                                               class="block py-2 text-sm  @if (Route::is('user.myUsers')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                                مشتریان من
                                            </a>
                                        </li>
                                    @endif
                                    <li class="pr-3.5">
                                        <a href="{{ route('user.list') }}"
                                           class="block py-2 text-sm  @if (Route::is('user.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            همه کاربران
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <a href="{{ route('user.create_user') }}"
                                           class="block py-2 text-sm  @if (Route::is('user.create_user')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            ایجاد کاربر جدید
                                        </a>
                                    </li>
                                    @if (in_array(1, $ids) || in_array(4, $ids))
                                        <li class="pr-3.5">
                                            <a href="{{ route('user.requestList') }}"
                                               class="block py-2 text-sm  @if (Route::is('user.requestList')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                                لیست درخواست ها
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                        @if (in_array(1, $ids))
                            <div class="pt-3">
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <div class="flex flex-row-reverse items-center gap-2">
                                        {{-- <span class=" text-[white] flex justify-end font-bold">اسلایدر</span> --}}
                                        <h3 class="text-sm text-(--primary-text-color) mb-1">اسلایدر</h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="800px" height="800px"
                                             class="size-5" viewBox="0 0 100 100" enable-background="new 0 0 100 100"
                                             xml:space="preserve">
                                                <path
                                                        d="M22.5,19.7h20c1.4,0,2.5,1.1,2.5,2.5v54.9c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V22.2  C20,20.8,21.1,19.7,22.5,19.7z" />
                                            <path
                                                    d="M57.5,19.6h20c1.4,0,2.5,1.1,2.5,2.5V42c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V22.1  C55,20.7,56.1,19.6,57.5,19.6z" />
                                            <path
                                                    d="M57.5,54.6h20c1.4,0,2.5,1.1,2.5,2.5v19.9c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V57.1  C55,55.8,56.1,54.6,57.5,54.6z" />
                                            </svg>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if (Route::is('slider.*')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                    </svg>
                                </div>
                                <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('slider.*')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5">
                                        <a href="{{ route('slider.create') }}"
                                           class="block py-2 text-sm  @if (Route::is('slider.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            ایجاد اسلایدر
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <a href="{{ route('slider.list') }}"
                                           class="block py-2 text-sm  @if (Route::is('slider.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            لیست اسلایدر ها
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="pt-3">
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <div class="flex flex-row-reverse items-center gap-2">
                                        {{-- <span class=" text-[white] flex justify-end font-bold">درباره ما</span> --}}
                                        <h3 class="text-sm text-(--primary-text-color) mb-1">
                                            درباره ما
                                        </h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 640 512">
                                            <path
                                                    d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                        </svg>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if (Route::is('aboutUs.*')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                    </svg>
                                </div>
                                <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('aboutUs.*')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5">
                                        <a href="{{ route('aboutUs.create_edit') }}"
                                           class="block py-2 text-sm  @if (Route::is('aboutUs.create_edit')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            ایجاد درباره ما
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <a href="{{ route('aboutUs.list') }}"
                                           class="block py-2 text-sm  @if (Route::is('aboutUs.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            درباره ما
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="pt-3">
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <div class="flex flex-row-reverse items-center gap-2">
                                        {{-- <span class=" text-[white] flex justify-end font-bold">ارتباط باما</span> --}}
                                        <h3 class="text-sm text-(--primary-text-color) mb-1">
                                            ارتباط با ما
                                        </h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                            <path
                                                    d="M384 48c8.8 0 16 7.2 16 16V448c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H384zM96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H208zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z" />
                                        </svg>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if (Route::is('contactUs.*')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                    </svg>
                                </div>
                                <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('contactUs.*')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5">
                                        <a href="{{ route('contactUs.create') }}"
                                           class="block py-2 text-sm  @if (Route::is('contactUs.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            فرم ارتباط باما
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <a href="{{ route('contactUs.list') }}"
                                           class="block py-2 text-sm  @if (Route::is('contactUs.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            لیست تیکت ها
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        @endif
                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <div class="flex flex-row-reverse items-center gap-2">
                                    {{-- <span class=" text-[white] flex justify-end font-bold">کیوآر کد</span> --}}
                                    <h3 class="text-sm text-(--primary-text-color) mb-1">
                                        کیوآر کد
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 448 512">
                                        <path
                                                d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z" />
                                    </svg>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('generalQrCodes.*')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('generalQrCodes.*')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5">
                                    <a href="{{ route('generalQrCodes.create') }}"
                                       class="block py-2 text-sm  @if (Route::is('generalQrCodes.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        ایجاد کیوآر کد جدید
                                    </a>
                                </li>
                                <li class="pr-3.5">
                                    <a href="{{ route('generalQrCodes.list') }}"
                                       class="block py-2 text-sm  @if (Route::is('generalQrCodes.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                        لیست کیوآر کد های من
                                    </a>
                                </li>

                            </ul>
                        </div>
                        @if(Auth::user()->phoneNumber == '09148770811' || Auth::user()->phoneNumber == '09147794595' || Auth::user()->phoneNumber == '09215371995' || Auth::user()->phoneNumber == '09051612833')
                            <div class="pt-3">
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <div class="flex flex-row-reverse items-center gap-2">
                                        {{-- <span class=" text-[white] flex justify-end font-bold">کیوآر کد</span> --}}
                                        <h3 class="text-sm text-(--primary-text-color) mb-1">
                                            مستر شیمی آزمون
                                        </h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 448 512">
                                            <path
                                                    d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z"/>
                                        </svg>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if (Route::is('mtest.*')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                    </svg>
                                </div>
                                <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('mtest.*')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5">
                                        <a href="{{ route('mtest.create') }}"
                                           class="block py-2 text-sm  @if (Route::is('mtest.create')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            ایجاد ازمون
                                        </a>
                                    </li>
                                    <li class="pr-3.5">
                                        <a href="{{ route('mtest.list') }}"
                                           class="block py-2 text-sm  @if (Route::is('mtest.list')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            لیست ازمون ها
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="pt-3">
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <div class="flex flex-row-reverse items-center gap-2">
                                        {{-- <span class=" text-[white] flex justify-end font-bold">کیوآر کد</span> --}}
                                        <h3 class="text-sm text-(--primary-text-color) mb-1">
                                            مستر شیمی خانه
                                        </h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 448 512">
                                            <path
                                                    d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z"/>
                                        </svg>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if (Route::is('m.home')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                    </svg>
                                </div>
                                <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('m.home')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5">
                                        <a href="{{ route('m.home') }}"
                                           class="block py-2 text-sm  @if (Route::is('m.home')) font-bold text-(--primary-color) @else text-(--secondary-text-color) @endif">
                                            ایجاد ازمون
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif

                    </div>
                    <div class="mb-3 sticky bottom-0 right-0 py-3 bg-white border-t border-gray-300">
                        <a href="{{ route('user.logout') }}"
                           class="block text-rose-700 py-1 font-medium text-sm text-center">خروج از حساب
                            کاربری</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="w-full h-dvh fixed top-0 right-0 invisible opacity-0 bg-black/50 flex flex-row-reverse z-99999 transition-all duration-500 backdrop-blur-sm"
             id="menuBlock">
            <div class="w-1/3 h-full relative" onclick="hamburgerMenu('close', this)">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 absolute top-5 left-5 cursor-pointer"
                     viewBox="0 0 384 512">
                    <path fill="white"
                          d="M324.5 411.1c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L214.6 256 347.1 123.5c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L192 233.4 59.5 100.9c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L169.4 256 36.9 388.5c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L192 278.6 324.5 411.1z" />
                </svg>
            </div>
            <div class="w-2/3 bg-white h-full p-2 flex flex-col justify-between transition-all duration-300 translate-x-full"
                 id="menuList">
                <div>

                    <div class="overflow-y-auto [&::-webkit-scrollbar]:hidden h-[calc(100vh-134px)] mb-7">
                        <a href="{{ route('home') }}" class="w-full py-3 flex items-center justify-center gap-5">
                            <div class="p-2 rounded-full">
                                <img src="{{ asset('storage/logos/ringaLogo1.png') }}" class="w-20 max-h-[40px] object-cover"
                                     alt="">
                            </div>
                            {{--                                <span class="text-sm text-gray-800 font-bold">رینگا</span>--}}
                        </a>
                        <div class="pt-2 flex flex-col">
                            <div>
                                <a href="{{ route('home') }}"
                                   class="flex flex-row items-center gap-3 py-2 px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5" fill="none" stroke="@if (Route::is('home')) var(--primary-color) @else var(--secondary-text-color) @endif" stroke-width="32" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                                    </svg>
                                    <span class="text-sm font-bold @if(Route::is('home')) text-(--primary-color) @else text-(--secondary-text-color) @endif">صفحه اول</span>

                                </a>
                            </div>
                            <div>
                                <a href="{{ route('login') }}" class="flex flex-row items-center gap-3 px-1 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4" fill="@if (Route::is('login') || Route::is('signup')) var(--primary-color) @else var(--secondary-text-color) @endif">
                                        <path d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"></path>
                                    </svg>

                                    <span class="text-sm font-bold @if (Route::is('login') || Route::is('signup')) text-(--primary-color) @else text-(--secondary-text-color) @endif">ورود | ثبت نام</span>
                                </a>
                            </div>
                            {{-- <div>
                                <a href="{{ route('signup') }}" class="block text-gray-700 py-2 text-md">
                                   ثبت نام
                                </a>
                            </div> --}}
                            {{--                                <div>--}}
                            {{--                                    <a href="{{ route('client.allPages') }}"--}}
                            {{--                                        class="block text-gray-700 py-2 text-md @if (Route::is('client.allPages')) bg-gray-100 @endif">--}}
                            {{--                                        صفحه ها--}}
                            {{--                                    </a>--}}
                            {{--                                </div>--}}
                            {{--                                <div>--}}
                            {{--                                    <a href="{{ route('career.careersList') }}"--}}
                            {{--                                        class="block text-gray-700 py-2 text-md @if (Route::is('career.careersList')) bg-gray-100 @endif">--}}
                            {{--                                        رستوران ها--}}
                            {{--                                    </a>--}}
                            {{--                                </div>--}}
                        </div>


                    </div>
                </div>
            </div>

    @endif
</header>
<script src="{{ asset('assets/js/userPanel.js#t=0.1') }}"></script>
