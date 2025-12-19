<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <title>@yield('title')</title>
</head>

<body>

    <div class="w-full flex flex-row">
        <div class="hidden lg:block lg:w-[265px] bg-[#0D0E12] fixed z-50 right-0 top-0 h-dvh px-5 text-sm">
            <div class="w-full">
                <a href="{{ route('home') }}"
                    class="block w-full py-3 text-center font-bold text-3xl text-white border-b border-[darkslategray]">
                    famenu.ir
                </a>
            </div>
            <div class="py-5 h-[90%] overflow-y-auto flex flex-col gap-5" style="scrollbar-width: none;">
                <div class="flex flex-row items-start gap-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                        <path fill="white"
                            d="M256 464c7.4 0 27-7.2 47.6-48.4c8.8-17.7 16.4-39.2 22-63.6H186.4c5.6 24.4 13.2 45.9 22 63.6C229 456.8 248.6 464 256 464zM178.5 304h155c1.6-15.3 2.5-31.4 2.5-48s-.9-32.7-2.5-48h-155c-1.6 15.3-2.5 31.4-2.5 48s.9 32.7 2.5 48zm7.9-144H325.6c-5.6-24.4-13.2-45.9-22-63.6C283 55.2 263.4 48 256 48s-27 7.2-47.6 48.4c-8.8 17.7-16.4 39.2-22 63.6zm195.3 48c1.5 15.5 2.2 31.6 2.2 48s-.8 32.5-2.2 48h76.7c3.6-15.4 5.6-31.5 5.6-48s-1.9-32.6-5.6-48H381.8zm58.8-48c-21.4-41.1-56.1-74.1-98.4-93.4c14.1 25.6 25.3 57.5 32.6 93.4h65.9zm-303.3 0c7.3-35.9 18.5-67.7 32.6-93.4c-42.3 19.3-77 52.3-98.4 93.4h65.9zM53.6 208c-3.6 15.4-5.6 31.5-5.6 48s1.9 32.6 5.6 48h76.7c-1.5-15.5-2.2-31.6-2.2-48s.8-32.5 2.2-48H53.6zM342.1 445.4c42.3-19.3 77-52.3 98.4-93.4H374.7c-7.3 35.9-18.5 67.7-32.6 93.4zm-172.2 0c-14.1-25.6-25.3-57.5-32.6-93.4H71.4c21.4 41.1 56.1 74.1 98.4 93.4zM256 512A256 256 0 1 1 256 0a256 256 0 1 1 0 512z" />
                    </svg>
                    <a href="{{ route('home') }}" class="block w-full text-white py-1">
                        بازدید از سایت
                    </a>
                </div>
                <div class="flex flex-row items-start gap-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                        <path fill="white"
                            d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                    <a href="{{ route('user.profile', [Auth::id()]) }}" class="block w-full text-white py-1">
                        داشبورد
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
                            <span class=" text-[white] flex justify-end font-bold">فروشگاه</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                                <path fill="white"
                                    d="M507.1 129.5l0 0c5.8 9.2 6.4 20.5 2.3 30.1c-3.9 9.2-11.1 14.8-20.1 16c-2 .3-3.9 .4-5.8 .4c-11.7 0-22.2-5.1-29.7-13.2c-9.1-10-22-15.7-35.6-15.7s-26.5 5.8-35.5 15.8c-7.3 8.1-17.7 13.2-29.6 13.2c-11.8 0-22.3-5.1-29.6-13.2c-9.1-10.1-22-15.8-35.6-15.8s-26.5 5.7-35.6 15.8c-7.3 8.1-17.7 13.2-29.6 13.2c-11.8 0-22.3-5.1-29.6-13.2c-9.1-10.1-22-15.8-35.6-15.8s-26.5 5.7-35.6 15.8c-7.3 8.1-17.7 13.2-29.6 13.2c-1.8 0-3.8-.1-5.8-.4c-8.9-1.2-16-6.8-19.9-16c-4.1-9.6-3.5-20.9 2.3-30.1l0 0 0 0L120.4 48H455.6l51.5 81.5zM483.5 224c4.1 0 8.1-.3 12-.8c55.5-7.4 81.8-72.5 52.1-119.4L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c0 0 0 0 0 0c19.6 0 37.5-6.4 51.9-17c4.8-3.5 9.2-7.6 13.2-11.9c4 4.4 8.4 8.4 13.2 11.9c14.5 10.6 32.4 17 52 17c19.6 0 37.5-6.4 52-17c4.8-3.5 9.2-7.6 13.2-12c4 4.4 8.4 8.4 13.2 11.9c14.5 10.6 32.4 17 52 17c19.8 0 37.8-6.5 52.3-17.3c4.7-3.5 9-7.4 12.9-11.7c3.9 4.3 8.3 8.3 13 11.8c14.5 10.7 32.5 17.2 52.2 17.2c0 0 0 0 0 0zM112 336V254.4c-6.4 1.1-12.9 1.6-19.6 1.6c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V336v48 64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 336 252.6c-4 1-8 1.8-12.3 2.3l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-6.6 0-13.1-.5-19.4-1.6V336H112zm352 48v64c0 8.8-7.2 16-16 16H128c-8.8 0-16-7.2-16-16V384H464z" />
                            </svg>
                        </div>
                    </div>

                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a class="text-white" href="{{ route('ecomm.create') }}" class="text-white py-1">ایجاد
                                فروشگاه
                                جدید</a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a class="text-white" href="{{ route('ecomm.ecomms') }}" class="text-white py-1">
                                فروشگاه های
                                من</a>
                        </li>
                        @if (Auth::user()->role[0]->title == 'admin')
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('ecomm.list') }}" class="text-white py-1">
                                    مشاهده همه فروشگاه ها
                                </a>
                            </li>
                        @endif
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('ecomm_category.index') }}" class="text-white"> دسته ها </a>
                        </li>
                        @if (count(Auth::user()->ecomms))
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('ecomm_category.create') }}" class="text-white">ایجاد دسته </a>
                            </li>
                        @endif

                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('ecomm_product.index') }}" class="text-white">محصولات </a>
                        </li>
                        @if (count(Auth::user()->ecomms))
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('ecomm_product.create') }}" class="text-white"> ایجاد محصول </a>
                            </li>
                        @endif

                    </ul>
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                <path fill="white"
                                    d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z" />
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('career.careers') }}" class="text-white py-1">
                                لیست کسب و کار های من
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('career.create') }}" class="text-white py-1">ایجاد
                                کسب و کار
                                جدید</a>
                        </li>
                        @if (count(Auth::user()->careers))
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('menu.createMenu') }}" class="text-white py-1">
                                    ایجاد منو برای کسب و کار
                                </a>
                            </li>
                        @endif
                        @if (count(Auth::user()->menus))
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('menu.user_menus', [Auth::user()]) }}" class="text-white py-1">
                                    لیست منو های من
                                </a>
                            </li>
                        @endif
                        {{-- <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('favoriteCareer.list') }}" class="text-white py-1">لیست علاقه مندی ها</a>
                        </li> --}}
                        @if (Auth::user()->role[0]->title == 'admin')
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('cc.create') }}" class="text-white py-1">
                                    ایجاد دسته کسب و کار
                                </a>
                            </li>
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('cc.list') }}" class="text-white py-1">
                                    همه دسته های کسب و کارها
                                </a>
                            </li>
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('career.list') }}" class="text-white py-1">
                                    همه کسب و کارها
                                </a>
                            </li>

                    </ul>
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
                            <span class=" text-[white] flex justify-end font-bold">شبکه های اجتماعی</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                <path fill="white"
                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">

                        {{-- <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('favoriteCareer.list') }}" class="text-white py-1">لیست علاقه مندی ها</a>
                        </li> --}}
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('covers.create') }}" class="text-white py-1">ایجادصفحه شبکه های
                                اجتماعی</a>
                        </li>
                        @if (Auth::user()->role[0]->title == 'admin')
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('covers.list') }}" class="text-white py-1"> لیست صفحه شبکه های
                                اجتماعی</a>
                        </li>
                        
                        @endif
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('covers.social_list') }}" class="text-white py-1"> لیست صفحه شبکه های
                                اجتماعی من</a>
                        </li>
                        {{-- <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('covers.list') }}" class=" text-white py-1"> مشاهده لیست همه شبکه های اجتماعی کاربران</a>
                        </li> --}}
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('socialMedia.create') }}" class="text-white py-1">
                                ایجاد شبکه اجتماعی
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('socialMedia.list') }}" class="text-white py-1">
                                لیست شبکه های اجتماعی
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                                <path fill="white"
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.list') }}" class="text-white py-1">
                                مشاهده همه کاربران
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.create_user') }}" class="text-white py-1">
                                ایجاد کاربر جدید
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
                                class="size-5 fill-white " viewBox="0 0 100 100" enable-background="new 0 0 100 100"
                                xml:space="preserve">
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
                            <a href="{{ route('slider.create') }}" class="text-white py-1">
                                ایجاد اسلایدر
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('slider.list') }}" class="text-white py-1">
                                لیست اسلایدر
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- customPro_list --}}
                <div class="dashboard">
                    <div class="flex flex-row-reverse justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 fill-white w-[15px]">
                            <path fill-rule="evenodd"
                                d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>

                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold"> محصولات شخصی سازی
                                شده</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-white " viewBox="0 0 448 512">
                                <path
                                    d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                            </svg>
                        </div>
                    </div>
                    {{-- @foreach (Auth::user()->careers as $career) --}}
                    {{-- @dd($career) --}}
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        {{-- <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('cp.create', [$career->id]) }}" class="text-white py-1">
                                    ایجاد محصولات شخصی سازی شده
                                </a>
                            </li> --}}
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('cp.list') }}" class="text-white py-1">
                                همه محصولات
                            </a>
                        </li>
                    </ul>
                    {{-- @endforeach --}}
                </div>
                {{-- end customPro_list --}}
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
                                <path fill="white"
                                    d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                            </svg>
                        </div>
                    </div>
                    <ul class="mt-2.5 mb-2.5 pr-3 transition-all duration-500 overflow-hidden">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('aboutUs.create_edit') }}" class="text-white py-1">
                                ایجاد درباره ما
                            </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 mr-5">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('aboutUs.list') }}" class="text-white py-1">
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
                            @if (!Auth::user()->main_image)
                                <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar"
                                    class="size-10 rounded-xl">
                            @else
                                <img src="{{ asset('storage/' . Auth::user()->main_image) }}" alt="user__picture"
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
                    </div>
                </div>
                <div class="w-6/12 flex justify-start">
                    <h3 class="text-2xl font-bold text-[#4B5675]">
                        <a href="{{ route('user.profile', [Auth::id()]) }}">
                            داشبورد
                        </a>
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
                @if (!Auth::user()->main_image)
                    <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar" class="size-16 rounded-xl">
                @else
                    <img src="{{ asset('storage/' . Auth::user()->main_image) }}" alt="user__picture"
                        class="size-16 rounded-xl">
                @endif
            </div>
            <!-- hamburger menu -->
            <div
                class="w-full h-dvh fixed top-0 -right-full bg-black/50 flex flex-row-reverse z-50 transition-all duration-500 backdrop-blur-sm">
                <div class="w-1/3 bg-inherit h-full relative" onclick="hamburgerMenu('close', this)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 absolute top-5 left-5 cursor-pointer"
                        viewBox="0 0 384 512">
                        <path fill="white"
                            d="M324.5 411.1c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L214.6 256 347.1 123.5c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L192 233.4 59.5 100.9c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L169.4 256 36.9 388.5c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L192 278.6 324.5 411.1z" />
                    </svg>
                </div>
                <div class="w-2/3 bg-white h-full p-2 flex flex-col justify-between">
                    <div>
                        <div class="flex flex-row items-center gap-3 pb-2 border-b border-gray-300">
                            <div>
                                @if (!Auth::user()->main_image)
                                    <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar"
                                        class="size-16 rounded-xl">
                                @else
                                    <img src="{{ asset('storage/' . Auth::user()->main_image) }}" alt="user__picture"
                                        class="size-16 rounded-xl">
                                @endif
                            </div>
                            <div>
                                <span class="text-lg text-gray-700 font-semibold">{{ Auth::user()->name }}
                                    {{ Auth::user()?->family }}</span>
                            </div>
                        </div>
                        <div class="overflow-y-auto [&::-webkit-scrollbar]:hidden h-[calc(100vh-134px)]">
                            <div class="pt-2 flex flex-col">
                                <div>
                                    <a href="{{ route('home') }}" class="block text-gray-700 py-2 text-md">
                                        بازدید از سایت
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
                                        تنظیمات اکانت
                                    </a>
                                </div>
                            </div>


                            <div class="pt-3">
                                <h3 class="text-md font-semibold text-gray-800 mb-1.5">فروشگاه</h3>
                                <ul class="pr-3.5">
                                    <li>
                                        <a href="{{ route('ecomm.create') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            فروشگاه جدید
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('ecomm.ecomms') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            فروشگاه های من
                                        </a>
                                    </li>

                                    @if (Auth::user()->role[0]->title == 'admin')
                                        <li>
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('ecomm.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                همه فروشگاه ها
                                            </a>
                                        </li>
                                    @endif

                                    <li>
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('ecomm_category.index') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            دسته ها
                                        </a>
                                    </li>
                                    @if (count(Auth::user()->ecomms))
                                        <li>
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('ecomm_category.create') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد دسته
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('ecomm_product.index') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            محصولات
                                        </a>
                                    </li>
                                    @if (count(Auth::user()->ecomms))
                                        <li>
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('ecomm_product.create') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد محصول
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>


                            <div class="pt-3">
                                <h3 class="text-md font-semibold text-gray-800 mb-1.5">کسب و کار ها</h3>
                                <ul class="pr-3.5">
                                    <li>
                                        <a href="{{ route('career.careers') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            لیست کسب و کار های من
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('career.create') }}"
                                            class="block text-gray-700 py-2 text-md">ایجاد کسب و کار
                                            جدید</a>
                                    </li>
                                    @if (Auth::user()->role[0]->title == 'admin')
                                        <li>
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('career.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                مشاهده همه کسب و کار ها
                                            </a>
                                        </li>

                                        <li>
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('cc.create') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد دسته کسب و کار
                                            </a>
                                        </li>
                                        <li>
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('cc.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                همه دسته های کسب و کارها
                                            </a>
                                        </li>
                                        @endif
                                        @if (count(Auth::user()->menus))
                                        <li>
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('menu.user_menus', [Auth::user()]) }}"
                                                class="block text-gray-700 py-2 text-md">
                                               لیست منو های من
                                            </a>
                                        </li>
                                        
                                    @endif
                                </ul>
                            </div>
                            <div class="pt-3">
                                <h3 class="text-md font-semibold text-gray-800 mb-1.5">شبکه های اجتماعی</h3>
                                <ul class="pr-3.5">
                                    <li>
                                        <a href="{{ route('covers.create') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            ایجاد صفحه شبکه اجتماعی
                                        </a>
                                    </li>
                                    @if (Auth::user()->role[0]->title == 'admin')
                                    <li>
                                        <a href="{{ route('covers.list') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            لیست صفحه شبکه های اجتماعی
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('covers.social_list') }}"
                                            class="block text-gray-700 py-2 text-md">
                                            لیست صفحه شبکه های اجتماعی من
                                        </a>
                                    </li>
                        
                                    @if (Auth::user()->role[0]->title == 'admin')
                                        <li>
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('socialMedia.create') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد شبکه اجتماعی
                                            </a>
                                        </li>

                                        <li>
                                            <span class="size-1 rounded-sm"></span>
                                            <a href="{{ route('socialMedia.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                لیست شبکه های اجتماعی
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            @if (Auth::user()->role[0]->title == 'admin')
                                <div class="pt-3">
                                    <h3 class="text-md font-semibold text-gray-800 mb-1.5">کاربران</h3>
                                    <ul class="pr-3.5">
                                        <li>
                                            <a href="{{ route('user.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                مشاهده همه کاربران
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.create_user') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد کاربر جدید
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif

                            @if (Auth::user()->role[0]->title == 'admin')
                                <div class="pt-3">
                                    <h3 class="text-md font-semibold text-gray-800 mb-1.5">اسلایدر</h3>
                                    <ul class="pr-3.5">
                                        <li>
                                            <a href="{{ route('slider.create') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد اسلایدر
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('slider.list') }}"
                                                class="block text-gray-700 py-2 text-md">
                                                لیست اسلایدر ها
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif

                            {{-- @if (Auth::user()->role[0]->title == 'admin') --}}
                            <div class="pt-3">
                                <h3 class="text-md font-semibold text-gray-800 mb-1.5">
                                    محصولات شخصی سازی شده
                                </h3>
                                <ul class="pr-3.5">
                                    <li>
                                        <a href="{{ route('cp.list') }} }}" class="block text-gray-700 py-2 text-md">
                                            همه محصولات
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            {{-- @endif --}}
                            @if (Auth::user()->role[0]->title == 'admin')
                                <div class="pt-3">
                                    <h3 class="text-md font-semibold text-gray-800 mb-1.5">
                                        درباره ما
                                    </h3>
                                    <ul class="pr-3.5">
                                        <li>
                                            <a href="{{ route('aboutUs.create_edit') }} }}"
                                                class="block text-gray-700 py-2 text-md">
                                                ایجاد درباره ما
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('aboutUs.list') }} }}"
                                                class="block text-gray-700 py-2 text-md">
                                                لیست درباره ما
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
            <!-- hamburger menu end -->
        </header>
        <div class="w-full h-dvh lg:w-[calc(100%-265px)] float-end pt-20 lg:px-5 overflow-y-auto px-5 relative bg-[#F2F2F2]"
            style="scrollbar-width:none;">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('assets/js/userPanel.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/ecomm_product_create.js') }}"></script> --}}

    @yield('ajax')

    <script>
        function getEcommCategories(el, type) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "{{ route('ecomm_category.getEcommCategories') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    'key': el.value
                },
                success: function(categories) {
                    let mySelect = document.getElementById("ecomCategories")
                    mySelect.innerHTML = ``
                    categories.forEach((category) => {
                        let myOption = document.createElement('option')
                        if (type == "product" || type == "category" || type == "edit") {
                            myOption.innerHTML = `${category.title}`
                            myOption.value = `${category.id}`
                            mySelect.append(myOption)
                        }

                        if (type == "filter") {
                            let myElement = document.createElement('div')
                            let categoryId = category.id
                            myOption.innerHTML = `${category.title}`
                            myOption.value = `${category.id}`
                            mySelect.append(myOption)
                        }

                        if (type == "filter") {
                            let myElement = document.createElement('div')
                            let categoryId = category.id
                            myElement.innerHTML = `
                            <div class="bg-white divide-y divide-[#f1f1f4]">
                                    <div  class='w-full flex flex-row lg:grid lg:grid-cols-4 items-center divide-x divide-[#f1f1f4]'>          
                                                <div
                                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                                    <span class="block w-20 lg:w-full">${category.title}</span>
                                                </div>
                                                <div
                                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                                    <span class="block w-20 lg:w-full">${category.description}</span>
                                                </div>
                                                <div
                                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900">
                                                    <div class="w-20 lg:w-full">
                                                        <img class="max-w-[50px] max-h-[50px] mx-auto size-12 object-cover"
                                                            src="{{ asset('storage/${category.image_path}') }}">
                                                    </div>
                                                </div>
                                            
                                                <div class="flex justify-center items-center gap-1 w-full ">   

                                             
                                              <div
                                                         class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center">
                                                         <a href="{{ url('/ecomm_category/show/${category.id}') }}" 
                                                             class="hover:text-sky-400  ">مشاهده </a>
                                                     </div>
                                              <div
                                                         class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center">
                                                         <a href="{{ url('ecomm_product/category_product/${category.id}') }}" 
                                                             class="hover:text-sky-400  ">مشاهده محصولات</a>
                                                     </div>
                                              <div
                                                         class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center">
                                                         <a href="{{ url('/ecomm_category/edit_ecomm_categories/${category.id}') }}" 
                                                             class="hover:text-sky-400  ">ویرایش</a>
                                                     </div>
                                              <div
                                                         class="p-1 lg:p-3 text-xs text-center lg:text-sm h-full flex items-center justify-center">
                                                         <a href="{{ url('/ecomm_category/delete/${category.id}') }}" 
                                                             class="hover:text-sky-400  ">حذف</a>
                                                     </div>
                                             </div>
                                             </div>
                                             </div>`


                            mySelect.append(myElement)


                        }


                    })
                    if (type == "category") {
                        let myOption2 = document.createElement('option')
                        myOption2.innerHTML = "بدون والد"
                        myOption2.value = "0"
                        mySelect.append(myOption2)


                    }



                }

            });

        }
    </script>

</body>

</html>
