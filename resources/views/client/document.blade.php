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
    <header class="w-full px-3 pt-4 pb-4 bg-[#00a692]">
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
                        
                        <input class="outline-none py-2 w-full" type="text" name="search" placeholder="جستجوی کسب و کار">
                    </div>
                     <div class="p-2 flex justify-center items-center rounded-full bg-white mr-2 cursor-pointer">
                        <button class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
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
                    @if(Auth::check())
                    <div class="flex flex-col gap-1">
                        <div class="text-white font-medium">{{ Auth::user()->name }} {{ Auth::user()->family }}</div>
                        @if(Auth::user()->email)
                        <div class="text-white text-xs">{{ Auth::user()->email }}</div>
                        @endif
                    </div>
                    <img class="size-16 rounded-full" src="{{ asset('storage/'.Auth::user()->main_image) }}" alt="">
                    @endif
                    @if(!Auth::check())
                    <img class="size-16 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="">
                    @endif
                </div>
                <div class="w-full mt-28">
                    <ul class="w-full flex flex-col gap-1 pr-5">
                        @if(!Auth::check())
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 text-white font-medium">
                                ورود | ثبت نام
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('home') }}" class="block py-2 text-white font-medium">
                                خانه
                            </a>
                        </li>
                        @if(Auth::check())
                        <li>
                            <a href="{{ route('user.profile', [Auth::user()]) }}"
                                class="block py-2 text-white font-medium">
                                پروفایل
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('aboutUs.list') }}" class="block py-2 text-white font-medium">
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
                @if(Auth::check())
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
        
    </header>

    <main class="2xl:container mx-auto w-11/12 mb-16">
        @yield('content')
    </main>
     <footer class="fixed w-full bottom-0 right-0">
        <div
            class="w-full bg-[#00a693] absolute bottom-0 flex flex-col gap-1 pt-1 justify-center items-center rounded-t-sm">
            <span>آکادمی فائوس</span>
            <a href="tel:+989147794595" class="text-white">09147794595</a>
        </div>
    </footer>
        <script src="{{ asset('assets/js/home.js') }}"></script>
</body>

</html>