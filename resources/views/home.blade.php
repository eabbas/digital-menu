<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <title>home</title>
</head> 
<body class="bg-[#fffff]">
    <header class="w-full px-6 pt-4 pb-4 rounded-b-[15px] bg-[#00897b]">
        <div class="w-full flex flex-row items-center justify-between pb-5">
            <div class="flex flex-row items-center gap-3">
                <div class="rounded-md p-2 bg-white/20" onclick="home_menu('open')">
                    <div class="w-5 h-4 flex flex-col justify-between items-center">
                        <span class="block w-full h-0.5 bg-white"></span>
                        <span class="block w-full h-0.5 bg-white"></span>
                        <span class="block w-full h-0.5 bg-white"></span>
                    </div>
                </div>
                <div class="rounded-md p-1.5 bg-white/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5" viewBox="0 0 448 512">
                        <path fill="white" d="M208 16c0-8.8 7.2-16 16-16s16 7.2 16 16V32.8c80.9 8 144 76.2 144 159.2v29.1c0 43.7 17.4 85.6 48.3 116.6l2.8 2.8c8.3 8.3 13 19.6 13 31.3c0 24.5-19.8 44.3-44.3 44.3H44.3C19.8 416 0 396.2 0 371.7c0-11.7 4.7-23 13-31.3l2.8-2.8C46.6 306.7 64 264.8 64 221.1V192c0-83 63.1-151.2 144-159.2V16zm16 48C153.3 64 96 121.3 96 192v29.1c0 52.2-20.7 102.3-57.7 139.2L35.6 363c-2.3 2.3-3.6 5.4-3.6 8.7c0 6.8 5.5 12.3 12.3 12.3H403.7c6.8 0 12.3-5.5 12.3-12.3c0-3.3-1.3-6.4-3.6-8.7l-2.8-2.8c-36.9-36.9-57.7-87-57.7-139.2V192c0-70.7-57.3-128-128-128zM193.8 458.7c4.4 12.4 16.3 21.3 30.2 21.3s25.8-8.9 30.2-21.3c2.9-8.3 12.1-12.7 20.4-9.8s12.7 12.1 9.8 20.4C275.6 494.2 251.9 512 224 512s-51.6-17.8-60.4-42.7c-2.9-8.3 1.4-17.5 9.8-20.4s17.5 1.4 20.4 9.8z"/>
                    </svg>
                </div>
            </div>
            <div class="flex flex-col items-end gap-2">
                <!-- <span class="text-xs text-white/50">مکان</span> -->
                <div class="flex flex-row gap-1">
                    <p class="text-base text-white">
                        بناب
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                        <path fill="white" d="M352 192c0-88.4-71.6-160-160-160S32 103.6 32 192c0 15.6 5.4 37 16.6 63.4c10.9 25.9 26.2 54 43.6 82.1c34.1 55.3 74.4 108.2 99.9 140c25.4-31.8 65.8-84.7 99.9-140c17.3-28.1 32.7-56.3 43.6-82.1C346.6 229 352 207.6 352 192zm32 0c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192zm-240 0a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 80a80 80 0 1 1 0-160 80 80 0 1 1 0 160z"/>
                    </svg>
                </div>
            </div>
        </div>
        <!-- hamburger menu -->

        <div class="fixed w-full h-dvh top-0 -right-full transition-all duration-500 opacity-0 bg-black/50 flex flex-row z-50" id="home_hamburger_menu">
            <div class="w-2/3 h-full bg-[#fc6a43] p-3 relative">
                <div class="absolute w-full p-2 h-20 bg-[#fc6a43] rounded-l-full -left-8 top-10 flex flex-row justify-end items-center gap-5">
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
                                ورود | ثبتنام
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
                            <a href="{{ route('user.profile', [Auth::user()]) }}" class="block py-2 text-white font-medium">
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
                            <a href="#" class="block py-2 text-white font-medium">
                                ارتباط با ما
                            </a>
                        </li>
                    </ul>
                </div>
                @if(Auth::check())
                <a href="{{ route('user.logout') }}" class="absolute bottom-5 left-5 w-1/3 p-2 rounded-md bg-white/10 flex flex-row items-center gap-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                        <path fill="white" d="M280 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V264c0 13.3 10.7 24 24 24s24-10.7 24-24V24zM134.2 107.3c10.7-7.9 12.9-22.9 5.1-33.6s-22.9-12.9-33.6-5.1C46.5 112.3 8 182.7 8 262C8 394.6 115.5 502 248 502s240-107.5 240-240c0-79.3-38.5-149.7-97.8-193.3c-10.7-7.9-25.7-5.6-33.6 5.1s-5.6 25.7 5.1 33.6c47.5 35 78.2 91.2 78.2 154.7c0 106-86 192-192 192S56 368 56 262c0-63.4 30.7-119.7 78.2-154.7z"/>
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
        <div class="flex flex-row-reverse justify-between samim">
            <div class="size-10 flex justify-center items-center rounded-[7px] bg-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                </svg>
            </div>
            <div class="w-[calc(100%-3rem)] bg-white flex flex-row rounded-[7px] items-center gap-2 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input class="outline-none py-2 w-full" type="text" placeholder="جستجو">
            </div>
        </div>
    </header>
    <main class="w-full h-full pt-5 samim px-5">
        <section>
            <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">پیشنهادات ویژه</h1>
                <a class="text-[13px] text-[#00897b]" href="#">مشاهده همه</a>
            </div>
            <div class="w-full bg-green-300 h-40 overflow-hidden rounded-[15px] my-3">
                <!-- slider -->
                <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/b1ddaeba-d51c-4633-9813-5c71022038d1.png') }}" alt="">
                <!-- slider end -->
            </div>
            <div class="my-3 flex flex-row justify-center items-center gap-2">
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-[#00897b]"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
            </div>
             <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">محصولات</h1>
                <a class="text-[13px] text-[#00897b]" href="#">مشاهده همه</a>
            </div>
            <div class="flex flex-row gap-1 justify-between my-4">
                <div class="flex flex-col justify-center items-center">
                    <div class="size-17 rounded-full bg-gray-200 overflow-hidden">
                         <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/FiletMignon.png') }}" alt="">
                    </div>
                    <span class="text-sm ">غذای اصلی</span>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <div class="size-17 rounded-full bg-gray-200 overflow-hidden">
                         <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/Griledsalmon.png') }}" alt="">
                    </div>
                    <span class="text-sm ">دسر</span>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <div class="size-17 rounded-full bg-gray-200 overflow-hidden">
                        <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/CoqauVin.png') }}" alt="">
                    </div>
                    <span class="text-sm ">پیش غذا</span>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <div class="size-17 rounded-full bg-gray-200 overflow-hidden">
                         <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/AsianDuckBreast.png') }}" alt="">
                    </div>
                    <span class="text-sm ">نوشیدنی</span>
                </div>
            </div>
            <div class="flex flex-row justify-between items-center mt-5 mb-3">
          <h1 class="text-xl">پر فروش ترین محصولات</h1>
          <a class="text-[13px] text-[#00897b]" href="#">مشاهده همه</a>
      </div>
      <div class="flex flex-col gap-2">
        <div class="flex flex-row gap-3">
            <div class="relative after:content-[''] after:absolute after:top-2 after:right-2 after:size-7 after:bg-white after:rounded-full px-9 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2">
                <div class="w-full h-28 rounded-md overflow-hidden">
                    <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/38281431-4660-4c1c-a751-919550661c45.png') }}" alt="">
                </div>
            </div>
            <div class="relative after:content-[''] after:absolute after:top-2 after:right-2 after:size-7 after:bg-white after:rounded-full px-9 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2">
                <div class="w-full h-28 rounded-md overflow-hidden">
                    <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/d23dd270-36e2-4a16-b6f6-2f36ce0e3f14.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="flex flex-row gap-2">
            <div class="relative after:content-[''] after:absolute after:top-2 after:right-2 after:size-7 after:bg-white after:rounded-full px-9 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2">
                <div class="w-full h-28 rounded-md overflow-hidden">
                    <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/180026cb-69d9-4c84-9141-b98aa94d7c55.png') }}" alt="">
                </div>
            </div>
            <div class="relative after:content-[''] after:absolute after:top-2 after:right-2 after:size-7 after:bg-white after:rounded-full px-9 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2">
                <div class="w-full h-28 rounded-md overflow-hidden">
                    <img class="h-full w-full rounded-inherit object-cover" src="{{ asset('assets/img/2b83bf62-ce71-4225-82c5-33b0ad1d7e4d.png') }}" alt="">
                </div>
            </div>
        </div>
      </div>
        </section>
    </main>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
</body>

</html>