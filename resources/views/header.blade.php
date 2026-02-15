<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    @PwaHead
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>-->
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('storage/images/icon.png') }}" type="image/png">
    <!--<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>-->
    <script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>
    <title>@yield('title')</title>
</head>

<body class="bg-[#ffffff]">

    

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
        {{-- mobile menu --}}
        <div class="w-full px-3 pt-4 pb-4 bg-[#eb3254] lg:hidden">
            <div class="w-full flex flex-row items-center justify-between gap-3">
                {{-- <!--<div class="flex flex-row items-center gap-3">-->
                <!--<div class="rounded-md p-2 bg-white/20 cursor-pointer" onclick="home_menu('open')">-->
                <!--    <div class="w-5 h-4 flex flex-col justify-between items-center">-->
                <!--        <span class="block w-full h-0.5 bg-white"></span>-->
                <!--        <span class="block w-full h-0.5 bg-white"></span>-->
                <!--        <span class="block w-full h-0.5 bg-white"></span>-->
                <!--    </div>-->
                <!--</div>-->
                <!--</div>--> --}}
                <div class="size-[50px]">
                    <a href="{{ route('home') }}">
                        <img class="size-full" src="{{ asset('storage/images/Famenu1.png') }}" alt="">
                    </a>
                </div>
                <form action="{{ route('search') }}" method="post" class="w-[calc(100%-60px)]">
                    @csrf
                    <div class="w-full flex flex-row items-center samim">

                        <div class="w-full bg-white flex flex-row rounded-full items-center gap-2 px-3">

                            <input class="outline-none py-2 w-full" type="text" name="search"
                                placeholder="جست و جو" @if(isset($searchTitle))  value="{{ $searchTitle }}" @endif>
                        </div>
                        <div class="p-2 flex justify-center items-center rounded-full bg-white mr-2 cursor-pointer">
                            <button class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            {{-- <!-- hamburger menu -->

            <!--<div class="fixed w-full h-dvh top-0 -right-full transition-all duration-500 opacity-0 bg-black/50 flex flex-row z-50"-->
            <!--    id="home_hamburger_menu">-->
            <!--    <div class="w-2/3 h-full bg-[#c9697a] p-3 relative">-->
            <!--        <div-->
            <!--            class="absolute w-full p-2 h-20 bg-[#c9697a] rounded-l-full -left-8 top-10 flex flex-row justify-end items-center gap-5">-->
            <!--            @if (Auth::check())-->
            <!--                <div class="flex flex-col gap-1">-->
            <!--                    <div class="text-white font-medium">{{ Auth::user()->name }} {{ Auth::user()->family }}-->
            <!--                    </div>-->
            <!--                    @if (Auth::user()->email)-->
            <!--                        <div class="text-white text-xs">{{ Auth::user()->email }}</div>-->
            <!--                    @endif-->
            <!--                </div>-->
            <!--                <img class="size-16 rounded-full" src="{{ asset('storage/' . Auth::user()->main_image) }}"-->
            <!--                    alt="">-->
            <!--            @endif-->
            <!--            @if (!Auth::check())-->
            <!--                <img class="size-16 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="">-->
            <!--            @endif-->
            <!--        </div>-->
            <!--        <div class="w-full mt-28">-->
            <!--            <ul class="w-full flex flex-col gap-1 pr-5">-->
            <!--                @if (!Auth::check())-->
            <!--                    <li>-->
            <!--                        <a href="{{ route('login') }}" class="block py-2 text-white font-medium">-->
            <!--                            ورود | ثبت نام-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                @else-->
            <!--                    <li>-->
            <!--                        <a href="{{ route('user.profile', [Auth::user()]) }}"-->
            <!--                            class="block py-2 text-white font-medium">-->
            <!--                            پروفایل-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                @endif-->
            <!--                <li>-->
            <!--                    <a href="{{ route('home') }}" class="block py-2 text-white font-medium">-->
            <!--                        خانه-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <a href="{{ route('aboutUs.clientList') }}" class="block py-2 text-white font-medium">-->
            <!--                        درباره ما-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--                <li>-->
            <!--                    <a href="{{ route('contactUs.create') }}" class="block py-2 text-white font-medium">-->
            <!--                        ارتباط با ما-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--            </ul>-->
            <!--        </div>-->
            <!--        @if (Auth::check())-->
            <!--            <a href="{{ route('user.logout') }}"-->
            <!--                class="absolute bottom-5 left-5 w-1/3 p-2 rounded-md bg-white/10 flex flex-row items-center gap-5">-->
            <!--                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">-->
            <!--                    <path fill="white"-->
            <!--                        d="M280 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V264c0 13.3 10.7 24 24 24s24-10.7 24-24V24zM134.2 107.3c10.7-7.9 12.9-22.9 5.1-33.6s-22.9-12.9-33.6-5.1C46.5 112.3 8 182.7 8 262C8 394.6 115.5 502 248 502s240-107.5 240-240c0-79.3-38.5-149.7-97.8-193.3c-10.7-7.9-25.7-5.6-33.6 5.1s-5.6 25.7 5.1 33.6c47.5 35 78.2 91.2 78.2 154.7c0 106-86 192-192 192S56 368 56 262c0-63.4 30.7-119.7 78.2-154.7z" />-->
            <!--                </svg>-->
            <!--                <span class="text-xs text-white">-->
            <!--                    خروج-->
            <!--                </span>-->
            <!--            </a>-->
            <!--        @endif-->
            <!--    </div>-->
            <!--    <div class="w-1/3 h-full bg-inherit" onclick="home_menu('close')"></div>-->
            <!--</div>-->

            <!-- hamburger menu end --> --}}
        </div>
        {{-- mobile menu end --}}

        <div class="w-full hidden lg:block border-b-1 bg-[#eb3254] border-b-gray-300">
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
                                    placeholder="جست و جو" @if(isset($searchTitle))  value="{{ $searchTitle }}" @endif>
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
                        <span class="absolute text-white text-sm -left-2 -top-3" id="shoppingCartCount">{{ Auth::check() ? count(Auth::user()->carts) : 0 }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-full rotate-y-180" viewBox="0 0 576 512">
                            <path fill="white" d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48H69.5c3.8 0 7.1 2.7 7.9 6.5l51.6 271c6.5 34 36.2 58.5 70.7 58.5H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H199.7c-11.5 0-21.4-8.2-23.6-19.5L170.7 288H459.2c32.6 0 61.1-21.8 69.5-53.3l41-152.3C576.6 57 557.4 32 531.1 32h-411C111 12.8 91.6 0 69.5 0H24zM131.1 80H520.7L482.4 222.2c-2.8 10.5-12.3 17.8-23.2 17.8H161.6L131.1 80zM176 512a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm336-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"/>
                        </svg>
                    </div>
                </div>

            </div>
        </div>
    </header>
