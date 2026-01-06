{{-- <!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <title>@yield('title')</title>
</head>
<body>
<header class="w-full px-6 pt-4 pb-4 rounded-b-[15px] bg-[#00897b]">
        <div class="w-full flex flex-row items-center justify-between">
            <div class="flex flex-row items-center gap-3">
                <div class="rounded-md p-2 bg-white/20 cursor-pointer" onclick="home_menu('open')">
                    <div class="w-5 h-4 flex flex-col justify-between items-center">
                        <span class="block w-full h-0.5 bg-white"></span>
                        <span class="block w-full h-0.5 bg-white"></span>
                        <span class="block w-full h-0.5 bg-white"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- hamburger menu -->
        <div class="fixed w-full h-dvh top-0 -right-full transition-all duration-500 opacity-0 bg-black/50 flex flex-row z-50"
        id="home_hamburger_menu">
            <div class="w-2/3 h-full bg-[#00897b] p-3 relative">
                <div
                    class="absolute w-full p-2 h-20 bg-[#00897b] rounded-l-full -left-8 top-10 flex flex-row justify-end items-center gap-5">
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
                            <a href="#" class="block py-2 text-white font-medium">
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
        <form action="{{ route('search') }}" method="post">
            @csrf
            <div class="flex flex-row-reverse justify-between samim mt-2">
                <div class="size-10 flex justify-center items-center rounded-[7px] bg-white w-[60px] mr-2">
                    <button>جستجو</button>
                </div>
                <div class="w-[calc(100%-3rem)] bg-white flex flex-row rounded-[7px] items-center gap-2 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <input class="outline-none py-2 w-full" type="text" name="search" placeholder="جستجو">
                </div>
            </div>
        </form>
    </header> --}}


@extends('client.document')
@section('title', 'جست و جو')
    
@section('content')
<div class="py-2 flex flex-row items-center overflow-x-auto [&::-webkit-scrollbar]:hidden lg:hidden mt-4">
    <div class="px-3 py-1 ml-2 rounded-full border border-[var(--color-border)]">
        <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px] w-[74px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 576 512">
                <path fill="var(--color-fill)"
                d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z" />
                </svg>
                <span class="text-xs">
                    مرتب سازی:
                </span>

        </div>
    </div>
    <div class="px-3 py-1 ml-2 rounded-full border border-[var(--color-border)]">
        <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 512 512">
            <path fill="var(--color-fill)"
            d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z" />
            </svg>
            <span class="text-xs">
                فیلتر
            </span>
        </div>
    </div>
    <div class="px-3 py-1 ml-2 rounded-full border border-[var(--color-border)]">
        <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
            <path fill="var(--color-fill)"
            d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
            </svg>
            <span class="text-xs">
                برند
            </span>
        </div>
    </div>
    <div class="px-3 py-1 ml-2 rounded-full border border-[var(--color-border)]">
        <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
            <path fill="var(--color-fill)"
            d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
            </svg>
            <span class="text-xs">
                رنگ
            </span>
        </div>
    </div>
    <div class="px-3 py-1 ml-2 rounded-full border border-[var(--color-border)]">
        <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px] w-[55px]">
            <span class="text-xs">
                ارسال سریع
            </span>
        </div>
    </div>
    <div class="px-3 py-1 ml-2 rounded-full border border-[var(--color-border)]">
        <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px] w-[88px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
            <path fill="var(--color-fill)"
            d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
            </svg>
            <span class="text-xs">
                محدوده قیمت
            </span>
        </div>
    </div>
</div>
<div class="grid grid-cols-1 gap-4 mt-10">
    @if($careerTitles && $careerTitles->count() > 0)
    @foreach($careerTitles as $careerTitle)
    <a href="{{ route('show_career', [$careerTitle]) }}" data-index="{{ $careerTitle->career_category_id }}"
    class="px-5 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2 careers">
        <div class="w-full h-28 rounded-md overflow-hidden">
            <img class="size-28 mx-auto roundede-md rounded-inherit object-cover"
            src="{{ asset('storage/'.$careerTitle->logo) }}" alt="career logo">
        </div>
        <span class="text-gray-500 text-sm font-medium">
            {{ $careerTitle->title }}
        </span>
    </a>
    @endforeach
</div>
        @else
            <div class="px-6 py-12 text-center">
                <div class="text-gray-400 text-4xl mb-3">📊</div>
                <div class="text-gray-500 text-lg">هیچ اطلاعاتی یافت نشد</div>
                <p class="text-gray-400 text-sm mt-2">لطفاً بعداً مراجعه کنید</p>
            </div>
    @endif
    
@endsection












{{--    
</html>
</body> --}}