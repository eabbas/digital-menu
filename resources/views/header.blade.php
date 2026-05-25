<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    @PwaHead
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('storage/images/icon.png') }}" type="image/png">
    <script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>
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
        <header class="w-full bg-white flex justify-center items-center fixed z-3">
            <div class="w-11/12 flex items-center justify-between">
                <div class="flex relative p-1 flex justify-center items-center cursor-pointer">
                    <div class="flex items-center">
                        <div class="flex flex-col w-8 h-5 justify-between cursor-pointer" onclick="hamburgerMenu('open')"
                             id="menuBlockliet">
                            <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                            <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                            <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                        </div>
                    </div>
                </div>
                <div class="cursor-pointer">
                    <img src="{{asset('storage/logos/ringaLogo.png')}}" alt="" class="w-30 max-h-[60px] object-cover">
                </div>


                <div onclick="searchPopup('open')" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><path d="M384 208A176 176 0 1 0 32 208a176 176 0 1 0 352 0zM343.3 366C307 397.2 259.7 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 51.7-18.8 99-50 135.3L507.3 484.7c6.2 6.2 6.2 16.4 0 22.6s-16.4 6.2-22.6 0L343.3 366z"/></svg>

                </div>
                <div class="fixed w-full h-dvh z-99999 top-0 right-0 invisible opacity-0 bg-black/50 backdrop-blur transition-all duration-300"
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
                                class="w-full bg-white flex flex-row rounded-full items-center gap-2 px-3 bg-[#F9F9F9]">
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
                                        @if (!Auth::user()->email)
                                            <li
                                                class="hover:text-[#1B84FF] hover:bg-[#F1F1F4]  mt-1 w-11/12 ml-auto mr-auto rounded-lg">
                                                <a href="{{ route('user.compelete_form') }}"
                                                    class="block w-full p-2">تکمیل
                                                    پروفایل</a>
                                            </li>
                                        @endif
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
                        <div class="overflow-y-auto [&::-webkit-scrollbar]:hidden h-[calc(100vh-134px)] mb-7">
                            <div class="pt-2 flex flex-col">
                                <div>
                                    <a href="{{ route('home') }}" class="block text-gray-700 py-2 text-md">
                                        صفحه اول
                                    </a>
                                </div>
                                @if (!Auth::user()->email)
                                    <div>
                                        <a href="{{ route('user.compelete_form') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            تکمیل پروفایل
                                        </a>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('user.setting') }}" class="block text-gray-700 py-2 text-md">
                                        ویرایش پروفایل
                                    </a>
                                </div>
                            </div>
                            <div class="w-6/12 flex justify-start">
                                <a href="{{ route('dashboard') }}" class="block text-gray-700 py-2 text-md">
                                    داشبورد
                                </a>
                            </div>
                            <div class="pt-3">
                                <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5">فروشگاه ها</h3>
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
                                    <li class="pr-3.5 @if (Route::is('ecomm.ecomms')) bg-gray-100 @endif">
                                        <a href="{{ route('ecomm.ecomms') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            فروشگاه های من
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if (Route::is('ecomm.create')) bg-gray-100 @endif">
                                        <a href="{{ route('ecomm.create') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            فروشگاه جدید
                                        </a>
                                    </li>
                                    @if (in_array(1, $ids))
                                        <li class="pr-3.5 @if (Route::is('ecomm.list')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('ecomm.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                همه فروشگاه ها
                                            </a>
                                        </li>
                                    @endif

                                    @if (count(Auth::user()->ecomms))
                                        <li class="pr-3.5 @if (Route::is('ecomm_category.index')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('ecomm_category.index') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                همه دسته ها
                                            </a>
                                        </li>
                                    @endif

                                    <li class="pr-3.5 @if (Route::is('ecomm_category.create')) bg-gray-100 @endif">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('ecomm_category.create') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            دسته جدید
                                        </a>
                                    </li>
                                    @if (count(Auth::user()->ecomms))
                                        <li class="pr-3.5 @if (Route::is('ecomm_product.index')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('ecomm_product.index') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                همه محصولات
                                            </a>
                                        </li>
                                    @endif
                                    <li class="pr-3.5 @if (Route::is('ecomm_product.create')) bg-gray-100 @endif">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('ecomm_product.create') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            محصول جدید
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pt-3">
                                <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5">آموزشگاه ها</h3>
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
                                    <li class="pr-3.5 @if (Route::is('institute.create')) bg-gray-100 @endif">
                                        <a href="{{ route('institute.create') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            ایجاد آموزشگاه جدید
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if (Route::is('institute.institutes')) bg-gray-100 @endif">
                                        <a href="{{ route('institute.institutes') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            لیست آموزشگاه ها
                                        </a>
                                    </li>
                                    @if (Auth::user()->role[0]->title == 'admin')
                                        <li class="pr-3.5 @if (Route::is('field.fields')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('field.fields') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                لیست همه رشته ها
                                            </a>
                                        </li>
                                        <li class="pr-3.5 @if (Route::is('lesson.lessons')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('lesson.lessons') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                لیست همه درس ها
                                            </a>
                                        </li>
                                        <li class="pr-3.5 @if (Route::is('class.classes')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('class.classes') }}"
                                                class="block text-gray-700 py-2 text-md">
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
                                        <h3 class="text-md font-bold text-gray-800 mb-1.5"> چک لیست</h3>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="size-4 transition-all duration-300 @if (Route::is('checkList.formCheckList') || Route::is('checkList.myList')) rotate-180 @endif"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                        </svg>
                                    </div>
                                    <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('checkList.formCheckList') || Route::is('checkList.myList')) max-h-[1000px] @else max-h-0 @endif">
                                        <li class="pr-3.5 @if (Route::is('checkList.formCheckList')) bg-gray-100 @endif">
                                            <a href="{{ route('checkList.formCheckList') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ثبت چک لیست
                                            </a>
                                        </li>
                                        <li class="pr-3.5 @if (Route::is('myList')) bg-gray-100 @endif">
                                            <a href="{{ route('checkList.myList') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                لیست چک لیست های من
                                            </a>
                                        </li>
                                        @if (Auth::user()->phoneNumber == '09147794595')
                                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5  rounded-sm">
                                                <span class="size-1 bg-white rounded-sm"></span>
                                                <a href="{{ route('checkList.checkList_Users') }}"
                                                    class=" py-1 block">
                                                    مشاهده کاربران
                                                </a>
                                            </li>
                                            <li
                                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5  rounded-sm @if (Route::is('checkList.checkList_Users')) bg-gray-700 @endif">
                                                <span class="size-1 bg-white rounded-sm"></span>
                                                <a href="{{ route('checkList.all_user_check_lists') }}"
                                                    class=" py-1 block">
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
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5">پیشنهادات</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="size-4 transition-all duration-300 @if (Route::is('suggestion.*')) rotate-180 @endif"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                    </svg>
                                </div>
                                <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('suggestion.*')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5 @if (Route::is('suggestion.create')) bg-gray-100 @endif">
                                        <a href="{{ route('suggestion.create') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            افزودن
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if (Route::is('suggestion.list')) bg-gray-100 @endif">
                                        <a href="{{ route('suggestion.list') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            مشاهده
                                        </a>
                                    </li>

                                </ul>
                            </div>

                            <div class="pt-3">
                                <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5">رستوران ها</h3>
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
                                    <li class="pr-3.5 @if (Route::is('career.careers')) bg-gray-100 @endif">
                                        <a href="{{ route('career.careers') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            لیست رستوران های من
                                        </a>
                                    </li>

                                    <li class="pr-3.5 @if (Route::is('career.create')) bg-gray-100 @endif">
                                        <a href="{{ route('career.create') }}"
                                            class="block text-gray-700 py-2 text-md">
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
                                        <li class="pr-3.5 @if (Route::is('career.createUser')) bg-gray-100 @endif">
                                            <a href="{{ route('career.createUser') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد رستوران برای دیگری
                                            </a>
                                        </li>
                                    @endif
                                    @if (in_array(1, $ids))
                                        <li class="pr-3.5 @if (Route::is('career.list')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('career.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                همه رستوران ها
                                            </a>
                                        </li>

                                        <li class="pr-3.5 @if (Route::is('cc.create')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('cc.create') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد دسته رستوران
                                            </a>
                                        </li>
                                        <li class="pr-3.5 @if (Route::is('cc.list')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('cc.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                همه دسته های رستوران
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                            <div class="pt-3">
                                <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5">صفحه ها</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="size-4 transition-all duration-300 @if (Route::is('pages.*') || Route::is('socialMedia.*')) rotate-180 @endif"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                    </svg>
                                </div>
                                <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('pages.*') || Route::is('socialMedia.*')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5 @if (Route::is('pages.create')) bg-gray-100 @endif">
                                        <a href="{{ route('pages.create') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            ایجاد صفحه
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if (Route::is('pages.social_list')) bg-gray-100 @endif">
                                        <a href="{{ route('pages.social_list') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            لیست صفحه های من
                                        </a>
                                    </li>
                                    @if (in_array(1, $ids))
                                        <li class="pr-3.5 @if (Route::is('pages.list')) bg-gray-100 @endif">
                                            <a href="{{ route('pages.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                لیست همه صفحه ها
                                            </a>
                                        </li>
                                        <li class="pr-3.5 @if (Route::is('socialMedia.create')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('socialMedia.create') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد شبکه اجتماعی
                                            </a>
                                        </li>
                                        <li class="pr-3.5 @if (Route::is('socialMedia.list')) bg-gray-100 @endif">
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('socialMedia.list') }}"
                                                class="block text-gray-700 py-2 text-md">
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
                                        <h3 class="text-md font-bold text-gray-800 mb-1.5">کاربران</h3>
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
                                            <li class="pr-3.5 @if (Route::is('user.myUsers')) bg-gray-100 @endif">
                                                <a href="{{ route('user.myUsers') }}"
                                                    class="block text-gray-700 py-2 text-md">
                                                    مشتریان من
                                                </a>
                                            </li>
                                        @endif
                                        <li class="pr-3.5 @if (Route::is('user.list')) bg-gray-100 @endif">
                                            <a href="{{ route('user.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                همه کاربران
                                            </a>
                                        </li>
                                        <li class="pr-3.5 @if (Route::is('user.create_user')) bg-gray-100 @endif">
                                            <a href="{{ route('user.create_user') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد کاربر جدید
                                            </a>
                                        </li>
                                        @if (in_array(1, $ids) || in_array(4, $ids))
                                            <li class="pr-3.5 @if (Route::is('user.requestList')) bg-gray-100 @endif">
                                                <a href="{{ route('user.requestList') }}"
                                                    class="block text-gray-700 py-2 text-md">
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
                                        <h3 class="text-md font-bold text-gray-800 mb-1.5">اسلایدر</h3>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="size-4 transition-all duration-300 @if (Route::is('slider.*')) rotate-180 @endif"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                        </svg>
                                    </div>
                                    <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('slider.*')) max-h-[1000px] @else max-h-0 @endif">
                                        <li class="pr-3.5 @if (Route::is('slider.create')) bg-gray-100 @endif">
                                            <a href="{{ route('slider.create') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد اسلایدر
                                            </a>
                                        </li>
                                        <li class="pr-3.5 @if (Route::is('slider.list')) bg-gray-100 @endif">
                                            <a href="{{ route('slider.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                لیست اسلایدر ها
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="pt-3">
                                    <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                        <h3 class="text-md font-bold text-gray-800 mb-1.5">
                                            درباره ما
                                        </h3>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="size-4 transition-all duration-300 @if (Route::is('aboutUs.*')) rotate-180 @endif"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                        </svg>
                                    </div>
                                    <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('aboutUs.*')) max-h-[1000px] @else max-h-0 @endif">
                                        <li class="pr-3.5 @if (Route::is('aboutUs.create_edit')) bg-gray-100 @endif">
                                            <a href="{{ route('aboutUs.create_edit') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد درباره ما
                                            </a>
                                        </li>
                                        <li class="pr-3.5 @if (Route::is('aboutUs.list')) bg-gray-100 @endif">
                                            <a href="{{ route('aboutUs.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                درباره ما
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="pt-3">
                                    <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                        <h3 class="text-md font-bold text-gray-800 mb-1.5">
                                            ارتباط با ما
                                        </h3>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="size-4 transition-all duration-300 @if (Route::is('contactUs.*')) rotate-180 @endif"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                        </svg>
                                    </div>
                                    <ul
                                        class="transition-all duration-300 overflow-hidden @if (Route::is('contactUs.*')) max-h-[1000px] @else max-h-0 @endif">
                                        <li class="pr-3.5 @if (Route::is('contactUs.create')) bg-gray-100 @endif">
                                            <a href="{{ route('contactUs.create') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                فرم ارتباط باما
                                            </a>
                                        </li>
                                        <li class="pr-3.5 @if (Route::is('contactUs.list')) bg-gray-100 @endif">
                                            <a href="{{ route('contactUs.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                لیست تیکت ها
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            @endif
                            <div class="pt-3">
                                <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5">
                                        کیوآر کد
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="size-4 transition-all duration-300 @if (Route::is('generalQrCodes.*')) rotate-180 @endif"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                    </svg>
                                </div>
                                <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('generalQrCodes.*')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5 @if (Route::is('generalQrCodes.create')) bg-gray-100 @endif">
                                        <a href="{{ route('generalQrCodes.create') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            ایجاد کیوآر کد جدید
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if (Route::is('generalQrCodes.list')) bg-gray-100 @endif">
                                        <a href="{{ route('generalQrCodes.list') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            لیست کیوآر کد های من
                                        </a>
                                    </li>

                                </ul>
                            </div>
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
                            <a href="{{ route('home') }}" class="w-full py-3 flex items-center gap-5">
                                <div class="p-2 bg-[#eb3254] rounded-full">
                                    <img src="{{ asset('storage/images/Famenu1.png') }}" class="size-[30px]"
                                        alt="">
                                </div>
                                <span class="text-sm text-gray-800 font-bold">رینگا</span>
                            </a>
                            <div class="pt-2 flex flex-col">
                                <div>
                                    <a href="{{ route('home') }}"
                                        class="block text-gray-700 py-2 text-md @if (Route::is('home')) bg-gray-100 @endif">
                                        صفحه اول
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('login') }}" class="block text-gray-700 py-2 text-md">
                                        ورود | ثبت نام
                                    </a>
                                </div>
                                {{-- <div>
                                    <a href="{{ route('signup') }}" class="block text-gray-700 py-2 text-md">
                                       ثبت نام
                                    </a>
                                </div> --}}
                                <div>
                                    <a href="{{ route('client.allPages') }}"
                                        class="block text-gray-700 py-2 text-md @if (Route::is('client.allPages')) bg-gray-100 @endif">
                                        صفحه ها
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('career.careersList') }}"
                                        class="block text-gray-700 py-2 text-md @if (Route::is('career.careersList')) bg-gray-100 @endif">
                                        رستوران ها
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

        @endif
    </header>
    <script src="{{ asset('assets/js/userPanel.js') }}"></script>
