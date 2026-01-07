<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <title>@yield('title')</title>
</head>

<body class="bg-[#ffffff]">
    <header>
        {{-- mobile menu --}}
        <div class="w-full px-3 pt-4 pb-4 bg-[#00a692] lg:hidden">
            <div class="w-full flex flex-row items-center justify-between gap-3">
                <div class="flex flex-row items-center gap-3">
                    <div class="rounded-md p-2 bg-white/20 cursor-pointer" onclick="home_menu('open')">
                        <div class="w-5 h-4 flex flex-col justify-between items-center">
                            <span class="block w-full h-0.5 bg-white"></span>
                            <span class="block w-full h-0.5 bg-white"></span>
                            <span class="block w-full h-0.5 bg-white"></span>
                        </div>
                    </div>
                </div>
                <form action="{{ route('search') }}" method="post" class="w-full">
                    @csrf
                    <div class="w-full flex flex-row items-center samim">

                        <div class="w-full bg-white flex flex-row rounded-full items-center gap-2 px-3">

                            <input class="outline-none py-2 w-full" type="text" name="search"
                                placeholder="جستجوی کسب و کار">
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
            <!-- hamburger menu -->

            <div class="fixed w-full h-dvh top-0 -right-full transition-all duration-500 opacity-0 bg-black/50 flex flex-row z-50"
                id="home_hamburger_menu">
                <div class="w-2/3 h-full bg-[#00a692] p-3 relative">
                    <div
                        class="absolute w-full p-2 h-20 bg-[#00a692] rounded-l-full -left-8 top-10 flex flex-row justify-end items-center gap-5">
                        @if (Auth::check())
                            <div class="flex flex-col gap-1">
                                <div class="text-white font-medium">{{ Auth::user()->name }} {{ Auth::user()->family }}
                                </div>
                                @if (Auth::user()->email)
                                    <div class="text-white text-xs">{{ Auth::user()->email }}</div>
                                @endif
                            </div>
                            <img class="size-16 rounded-full" src="{{ asset('storage/' . Auth::user()->main_image) }}"
                                alt="">
                        @endif
                        @if (!Auth::check())
                            <img class="size-16 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="">
                        @endif
                    </div>
                    <div class="w-full mt-28">
                        <ul class="w-full flex flex-col gap-1 pr-5">
                            @if (!Auth::check())
                                <li>
                                    <a href="{{ route('login') }}" class="block py-2 text-white font-medium">
                                        ورود | ثبت نام
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('user.profile', [Auth::user()]) }}"
                                        class="block py-2 text-white font-medium">
                                        پروفایل
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('home') }}" class="block py-2 text-white font-medium">
                                    خانه
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('aboutUs.clientList') }}" class="block py-2 text-white font-medium">
                                    درباره ما
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contactUs.create') }}" class="block py-2 text-white font-medium">
                                    ارتباط با ما
                                </a>
                            </li>
                        </ul>
                    </div>
                    @if (Auth::check())
                        <a href="{{ route('user.logout') }}"
                            class="absolute bottom-5 left-5 w-1/3 p-2 rounded-md bg-white/10 flex flex-row items-center gap-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                <path fill="white"
                                    d="M280 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V264c0 13.3 10.7 24 24 24s24-10.7 24-24V24zM134.2 107.3c10.7-7.9 12.9-22.9 5.1-33.6s-22.9-12.9-33.6-5.1C46.5 112.3 8 182.7 8 262C8 394.6 115.5 502 248 502s240-107.5 240-240c0-79.3-38.5-149.7-97.8-193.3c-10.7-7.9-25.7-5.6-33.6 5.1s-5.6 25.7 5.1 33.6c47.5 35 78.2 91.2 78.2 154.7c0 106-86 192-192 192S56 368 56 262c0-63.4 30.7-119.7 78.2-154.7z" />
                            </svg>
                            <span class="text-xs text-white">
                                خروج
                            </span>
                        </a>
                    @endif
                </div>
                <div class="w-1/3 h-full bg-inherit" onclick="home_menu('close')"></div>
            </div>

            <!-- hamburger menu end -->
        </div>
        {{-- mobile menu end --}}

        <div class="w-full hidden lg:block border-b-1 border-b-gray-300">
            <div class="w-11/12 mx-auto grid grid-cols-3 gap-10">
                <div class="flex flex-row items-center gap-10">
                    {{-- logo --}}
                    <div>
                        <a href="{{ route('home') }}" class="text-lg font-bold">
                            {{-- <img src="" alt=""> --}}
                            famenu
                        </a>
                    </div>
                    <ul class="flex flex-row items-center gap-5">
                        <li>
                            <a href="{{ route('home') }}"
                                class="text-md text-sm hover:text-[#00a692] transition-all duration-200 py-5 inline-block">خانه</a>
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
                                class="text-md text-sm hover:text-[#00a692] transition-all duration-200 py-5 inline-block">درباره
                                ما</a>
                        </li>
                        <li>
                            <a href="{{ route('contactUs.create') }}"
                                class="text-md text-sm hover:text-[#00a692] transition-all duration-200 py-5 inline-block">ارتباط
                                با ما</a>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-row items-center">
                    <form action="{{ route('search') }}" method="post" class="w-full">
                        @csrf
                        <div class="w-full flex flex-row items-center samim">

                            <div class="w-full bg-white flex flex-row rounded-full items-center gap-2 px-3">

                                <input
                                    class="outline-none p-2 w-full rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7]"
                                    type="text" name="search" placeholder="جستجوی کسب و کار">
                            </div>
                            <div
                                class="p-2 flex justify-center items-center rounded-full bg-[#00a692] mr-2 cursor-pointer">
                                <button class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 rotate-y-180"
                                        viewBox="0 0 512 512">
                                        <path fill="white"
                                            d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="flex flex-row justify-end items-center">
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
                                <a href="{{ route('login') }}" class="text-xs font-bold text-[#00a692]">ورود | ثبت نام</a>
                            </div>

                        @endif
                        @if (Auth::check())
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
                                        <a href="{{ route('user.profile') }}" class="block w-full p-2">پروفایل من</a>
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
                </div>

            </div>
        </div>
    </header>

    <main class="2xl:container mx-auto w-11/12 mb-16">
        @yield('content')
    </main>
    {{-- bottom menu mobile --}}

    <div class="lg:hidden w-full fixed bottom-0 right-0 p-5 bg-[#00a692]">
        <ul class="w-full flex flex-row justify-between items-center">
            <li>
                {{-- category --}}
                <a href="#" class="size-10 flex justify-center items-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                        <defs>
                            <style>
                                .fa-secondary {
                                    opacity: .4
                                }
                            </style>
                        </defs>
                        <path class="fa-secondary"
                            d="M160 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zm32 128H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                        <path class="fa-primary"
                            d="M16 72c0-13.3 10.7-24 24-24H88c13.3 0 24 10.7 24 24v48c0 13.3-10.7 24-24 24H40c-13.3 0-24-10.7-24-24V72zm0 160c0-13.3 10.7-24 24-24H88c13.3 0 24 10.7 24 24v48c0 13.3-10.7 24-24 24H40c-13.3 0-24-10.7-24-24V232zM40 368H88c13.3 0 24 10.7 24 24v48c0 13.3-10.7 24-24 24H40c-13.3 0-24-10.7-24-24V392c0-13.3 10.7-24 24-24z" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="{{ route('career.careers') }}"
                    class="size-10 flex justify-center items-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                        <defs>
                            <style>
                                .fa-secondary {
                                    opacity: .4
                                }
                            </style>
                        </defs>
                        <path class="fa-secondary"
                            d="M184 48c-4.4 0-8 3.6-8 8V96H128V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96H336V56c0-4.4-3.6-8-8-8H184z" />
                        <path class="fa-primary"
                            d="M64 96C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H64z" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}" class="size-10 bg-white flex justify-center items-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                        <defs>
                            <style>
                                .fa-secondary {
                                    opacity: .4
                                }
                            </style>
                        </defs>
                        <path class="fa-secondary"
                            d="M64 270.5L64.1 472c0 22.1 17.9 40 40 40H184c22.1 0 40-17.9 40-40V383.7c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32V472c0 22.1 17.9 40 40 40h80.5c22.1 0 40-18 40-40.1l-.4-201.3L288 74.5 64 270.5z" />
                        <path class="fa-primary"
                            d="M266.9 7.9C279-2.6 297-2.6 309.1 7.9l256 224c13.3 11.6 14.6 31.9 3 45.2s-31.9 14.6-45.2 3L288 74.5 53.1 280.1c-13.3 11.6-33.5 10.3-45.2-3s-10.3-33.5 3-45.2l256-224z" />
                    </svg>
                </a>
            </li>
            <li>
                {{-- ecommerce --}}
                <a href="#" class="size-10 flex justify-center items-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                        <defs>
                            <style>
                                .fa-secondary {
                                    opacity: .4
                                }
                            </style>
                        </defs>
                        <path class="fa-secondary"
                            d="M170.7 288H459.2c32.6 0 61.1-21.8 69.5-53.3l41-152.3C576.6 57 557.4 32 531.1 32h-411c2 4.2 3.5 8.8 4.4 13.5L170.7 288z" />
                        <path class="fa-primary"
                            d="M0 24C0 10.7 10.7 0 24 0H69.5c26.9 0 50 19.1 55 45.5l51.6 271c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="{{ route('user.profile') }}" class="size-10 flex justify-center items-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                        <defs>
                            <style>
                                .fa-secondary {
                                    opacity: .4
                                }
                            </style>
                        </defs>
                        <path class="fa-secondary" d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128z" />
                        <path class="fa-primary"
                            d="M0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>

    {{-- bottom menu mobile end --}}
    <footer class="w-full pb-20 lg:pb-0">
        <div class="w-full bg-gray-600 flex flex-col gap-1 pt-1 justify-center items-center rounded-t-sm">
            <span class="text-white">آکادمی فائوس</span>
            <a href="tel:+989147794595" class="text-gray-100">09147794595</a>
        </div>
    </footer>
    <script src="{{ asset('assets/js/home.js') }}"></script>
</body>

</html>
