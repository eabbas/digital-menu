<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('storage/images/icon.png') }}" type="image/png">
    <title>@yield('title')</title>
</head>

<body>
@php
    $roles = Auth::user()->role;
    $ids = $roles->pluck('id')->toArray();
@endphp
<div class="w-full flex flex-row relative z-999">
    <div class="hidden lg:block lg:w-[265px] bg-[#0D0E12] fixed z-50 right-0 top-0 h-dvh px-3 text-sm">
        <div class="w-full">
            <a href="{{ route('home') }}"
               class="block w-full py-3 text-center font-bold text-3xl text-white border-b border-[darkslategray]">
                famenu.ir
            </a>
        </div>
        <div class="py-5 h-[90%] overflow-y-auto flex flex-col gap-5" style="scrollbar-width: none;">
            <div class="flex flex-row items-center gap-2.5 px-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                    <path fill="white"
                          d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                </svg>
                <a href="{{ route('home') }}" class="block w-full text-white py-1" target="_blank">
                    صفحه اول
                </a>
            </div>
            <div
                    class="flex flex-row items-center gap-2.5 rounded-sm px-2 @if (Route::is('dashboard')) bg-gray-700 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                    <path fill="white"
                          d="M256 464c7.4 0 27-7.2 47.6-48.4c8.8-17.7 16.4-39.2 22-63.6H186.4c5.6 24.4 13.2 45.9 22 63.6C229 456.8 248.6 464 256 464zM178.5 304h155c1.6-15.3 2.5-31.4 2.5-48s-.9-32.7-2.5-48h-155c-1.6 15.3-2.5 31.4-2.5 48s.9 32.7 2.5 48zm7.9-144H325.6c-5.6-24.4-13.2-45.9-22-63.6C283 55.2 263.4 48 256 48s-27 7.2-47.6 48.4c-8.8 17.7-16.4 39.2-22 63.6zm195.3 48c1.5 15.5 2.2 31.6 2.2 48s-.8 32.5-2.2 48h76.7c3.6-15.4 5.6-31.5 5.6-48s-1.9-32.6-5.6-48H381.8zm58.8-48c-21.4-41.1-56.1-74.1-98.4-93.4c14.1 25.6 25.3 57.5 32.6 93.4h65.9zm-303.3 0c7.3-35.9 18.5-67.7 32.6-93.4c-42.3 19.3-77 52.3-98.4 93.4h65.9zM53.6 208c-3.6 15.4-5.6 31.5-5.6 48s1.9 32.6 5.6 48h76.7c-1.5-15.5-2.2-31.6-2.2-48s.8-32.5 2.2-48H53.6zM342.1 445.4c42.3-19.3 77-52.3 98.4-93.4H374.7c-7.3 35.9-18.5 67.7-32.6 93.4zm-172.2 0c-14.1-25.6-25.3-57.5-32.6-93.4H71.4c21.4 41.1 56.1 74.1 98.4 93.4zM256 512A256 256 0 1 1 256 0a256 256 0 1 1 0 512z"/>
                </svg>
                <a href="{{ route('dashboard') }}" class="block w-full text-white py-1">
                    داشبورد
                </a>
            </div>
            <div class="dashboard">
                <div class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if(Route::is('ecomm.*') || Route::is('ecomm.ecomms') || Route::is('ecomm.list') || Route::is('ecomm_category.index') || Route::is('ecomm_category.create') || Route::is('ecomm_product.index') || Route::is('ecomm_product.create')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 transition-all duration-200 @if(Route::is('ecomm.*') || Route::is('ecomm.ecomms') || Route::is('ecomm.list') || Route::is('ecomm_category.index') || Route::is('ecomm_category.create') || Route::is('ecomm_product.index') || Route::is('ecomm_product.create')) rotate-180 @endif"
                         viewBox="0 0 448 512">
                        <path fill="white"
                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                    </svg>

                    <div class="flex flex-row-reverse items-center gap-2">
                        <span class=" text-[white] flex justify-end font-bold">فروشگاه</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                            <path fill="white"
                                  d="M507.1 129.5l0 0c5.8 9.2 6.4 20.5 2.3 30.1c-3.9 9.2-11.1 14.8-20.1 16c-2 .3-3.9 .4-5.8 .4c-11.7 0-22.2-5.1-29.7-13.2c-9.1-10-22-15.7-35.6-15.7s-26.5 5.8-35.5 15.8c-7.3 8.1-17.7 13.2-29.6 13.2c-11.8 0-22.3-5.1-29.6-13.2c-9.1-10.1-22-15.8-35.6-15.8s-26.5 5.7-35.6 15.8c-7.3 8.1-17.7 13.2-29.6 13.2c-11.8 0-22.3-5.1-29.6-13.2c-9.1-10.1-22-15.8-35.6-15.8s-26.5 5.7-35.6 15.8c-7.3 8.1-17.7 13.2-29.6 13.2c-1.8 0-3.8-.1-5.8-.4c-8.9-1.2-16-6.8-19.9-16c-4.1-9.6-3.5-20.9 2.3-30.1l0 0 0 0L120.4 48H455.6l51.5 81.5zM483.5 224c4.1 0 8.1-.3 12-.8c55.5-7.4 81.8-72.5 52.1-119.4L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c0 0 0 0 0 0c19.6 0 37.5-6.4 51.9-17c4.8-3.5 9.2-7.6 13.2-11.9c4 4.4 8.4 8.4 13.2 11.9c14.5 10.6 32.4 17 52 17c19.6 0 37.5-6.4 52-17c4.8-3.5 9.2-7.6 13.2-12c4 4.4 8.4 8.4 13.2 11.9c14.5 10.6 32.4 17 52 17c19.8 0 37.8-6.5 52.3-17.3c4.7-3.5 9-7.4 12.9-11.7c3.9 4.3 8.3 8.3 13 11.8c14.5 10.7 32.5 17.2 52.2 17.2c0 0 0 0 0 0zM112 336V254.4c-6.4 1.1-12.9 1.6-19.6 1.6c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V336v48 64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 336 252.6c-4 1-8 1.8-12.3 2.3l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-6.6 0-13.1-.5-19.4-1.6V336H112zm352 48v64c0 8.8-7.2 16-16 16H128c-8.8 0-16-7.2-16-16V384H464z"/>
                        </svg>
                    </div>
                </div>

                <ul class="my-1 pr-3 transition-all duration-500 overflow-hidden @if(Route::is('ecomm.*') || Route::is('ecomm.ecomms') || Route::is('ecomm.list') || Route::is('ecomm_category.index') || Route::is('ecomm_category.create') || Route::is('ecomm_product.index') || Route::is('ecomm_product.create')) max-h-[500px] @else max-h-0 @endif">
                    <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('ecomm.create')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('ecomm.create') }}" class="text-white py-1 block">
                            فروشگاه
                            جدید</a>
                    </li>
                    <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('ecomm.ecomms')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('ecomm.ecomms') }}" class="text-white py-1 block">
                            فروشگاه های
                            من</a>
                    </li>

                    @if (count(Auth::user()->ecomms))

                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('ecomm_category.index')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('ecomm_category.index') }}" class="text-white py-1 block"> دسته ها </a>
                        </li>
                    @endif

                    <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('ecomm_category.create')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('ecomm_category.create') }}" class="text-white py-1 block">ایجاد دسته </a>
                    </li>
                    @if (count(Auth::user()->ecomms))

                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('ecomm_product.index')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('ecomm_product.index') }}" class="text-white py-1 block">محصولات </a>
                        </li>
                    @endif

                    <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('ecomm_product.create')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('ecomm_product.create') }}" class="text-white py-1 block"> ایجاد
                            محصول </a>
                    </li>
                    @if (Auth::user()->role[0]->title == 'admin')
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('ecomm.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('ecomm.list') }}" class="text-white py-1 block">
                                همه فروشگاه ها
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            @if(in_array(1,$ids) || in_array(5,$ids))

                <div class="dashboard">
                    <div class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if(Route::is('checkList.formCheckList') || Route::is('checkList.myList') || Route::is('checkList.checkList_Users')) bg-gray-700 @endif">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-4 transition-all duration-200 @if(Route::is('checkList.formCheckList') || Route::is('checkList.myList') || Route::is('checkList.checkList_Users')) rotate-180 @endif"
                             viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                        </svg>

                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">چک لیست</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                <path fill="white"
                                      d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                            </svg>
                        </div>
                    </div>
                    <ul class="my-1 pr-3 transition-all duration-500 overflow-hidden @if(Route::is('checkList.formCheckList') || Route::is('checkList.myList') || Route::is('checkList.checkList_Users')) max-h-[1000px] @else max-h-0 @endif">
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if(Route::is('checkList.formCheckList')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('checkList.formCheckList') }}" class="text-white py-1 block">ثبت چک
                                لیست </a>
                        </li>
                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if(Route::is('checkList.myList')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('checkList.myList') }}" class="text-white py-1 block">لیست چک لیست های
                                من</a>
                        </li>
                        @if (Auth::user()->phoneNumber == '09147794595')
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('checkList.checkList_Users') }}" class="text-white py-1 block">
                                    مشاهده کاربران
                                </a>
                            </li>
                            <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if(Route::is('checkList.checkList_Users')) bg-gray-700 @endif">
                                <span class="size-1 bg-white rounded-sm"></span>
                                <a href="{{ route('checkList.all_user_check_lists') }}" class="text-white py-1 block">
                                    لیست تمام چک لیست ها
                                </a>
                            </li>
                        @endif


                    </ul>
                </div>
            @endif





            {{-- Suggestion --}}
            @if (Auth::user()->role[0]->title == 'admin')
                <div class="dashboard">
                    <div
                            class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if  (Route::is('suggestion.*')) bg-gray-700 @endif ">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-4 transition-all duration-200 @if (Route::is('suggestion.*')) rotate-180 @endif"
                             viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                        </svg>

                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold"> پیشنهادات</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                <path fill="white"
                                      d="M32 32H480c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H32C14.3 128 0 113.7 0 96V64C0 46.3 14.3 32 32 32zm0 128H480V416c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V160zm128 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/>
                            </svg>
                        </div>
                    </div>
                    <ul
                            class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('suggestion.*')) max-h-[500px] @else max-h-0 @endif">
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('suggestion.create')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('suggestion.create') }}" class="text-white py-1 block">
                                ارسال پیشنهاد
                            </a>
                        </li>
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('suggestion.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('suggestion.list') }}" class="text-white py-1 block">
                                لیست پیشنهاد ها
                            </a>
                        </li>

                    </ul>
                </div>
            @endif
            {{-- end-Suggestion --}}
            <div class="dashboard">
                <div
                        class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('career.*') ||
                                Route::is('menu.createMenu') ||
                                Route::is('menu.user_menus') ||
                                Route::is('cc.create') ||
                                Route::is('cc.list')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 transition-all duration-200 @if (Route::is('career.*') ||
                                    Route::is('menu.createMenu') ||
                                    Route::is('menu.user_menus') ||
                                    Route::is('cc.create') ||
                                    Route::is('cc.list')) rotate-180 @endif"
                         viewBox="0 0 448 512">
                        <path fill="white"
                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                    </svg>
                    <div class="flex flex-row-reverse items-center gap-2">
                        <span class=" text-[white] flex justify-end font-bold">رستوران</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                            <path fill="white"
                                  d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/>
                        </svg>
                    </div>
                </div>
                <ul
                        class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('career.*') ||
                                Route::is('menu.createMenu') ||
                                Route::is('menu.user_menus') ||
                                Route::is('cc.create') ||
                                Route::is('cc.list')) max-h-[500px] @else max-h-0 @endif">

                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('career.create')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('career.create') }}" class="text-white py-1 block">
                            ایجاد رستوران
                        </a>
                    </li>
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('career.careers')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('career.careers') }}" class="text-white py-1 block">
                            لیست رستوران های من
                        </a>
                    </li>


                    @if (count(Auth::user()->careers))
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('menu.createMenu')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('menu.createMenu') }}" class="text-white py-1 block">
                                ایجاد منو برای رستوران
                            </a>
                        </li>
                    @endif
                    @if (count(Auth::user()->menus))
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('menu.user_menus')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('menu.user_menus', [Auth::user()]) }}" class="text-white py-1 block">
                                لیست منو های من
                            </a>
                        </li>
                    @endif
                    {{-- <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('favoriteCareer.list') }}" class="text-white py-1 block">لیست علاقه مندی ها</a>
                    </li> --}}
                    @if (in_array(1, $ids) || in_array(4, $ids))
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('career.createUser')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('career.createUser') }}" class="text-white py-1 block">
                                ایجاد رستوران برای دیگری
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role[0]->title == 'admin')

                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('cc.create')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('cc.create') }}" class="text-white py-1 block">
                                ایجاد دسته رستوران
                            </a>
                        </li>
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('cc.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('cc.list') }}" class="text-white py-1 block">
                                همه دسته های رستوران
                            </a>
                        </li>
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('career.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('career.list') }}" class="text-white py-1 block">
                                همه رستوران ها
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="dashboard">
                <div
                        class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('pages.*') || Route::is('socialMedia.create') || Route::is('socialMedia.list')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 transition-all duration-200 @if (Route::is('pages.*') || Route::is('socialMedia.create') || Route::is('socialMedia.list')) rotate-180 @endif"
                         viewBox="0 0 448 512">
                        <path fill="white"
                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                    </svg>
                    <div class="flex flex-row-reverse items-center gap-2">
                        <span class=" text-[white] flex justify-end font-bold">صفحه ها</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                            <path fill="white"
                                  d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
                        </svg>
                    </div>
                </div>
                <ul
                        class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('pages.*') || Route::is('socialMedia.create') || Route::is('socialMedia.list')) max-h-[500px] @else max-h-0 @endif">

                    {{-- <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('favoriteCareer.list') }}" class="text-white py-1 block">لیست علاقه مندی ها</a>
                    </li> --}}
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('pages.create')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('pages.create') }}" class="text-white py-1 block">ایجادصفحه
                        </a>
                    </li>
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('pages.social_list')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('pages.social_list') }}" class="text-white py-1 block"> لیست صفحه های من
                        </a>
                    </li>
                    @if (Auth::user()->role[0]->title == 'admin')

                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('pages.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('pages.list') }}" class="text-white py-1 block"> لیست همه صفحه ها
                            </a>
                        </li>
                    @endif
                    {{-- <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('pages.list') }}" class=" text-white py-1"> مشاهده لیست همه شبکه های اجتماعی کاربران</a>
                    </li> --}}
                    @if (Auth::user()->role[0]->title == 'admin')
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('socialMedia.create')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('socialMedia.create') }}" class="text-white py-1 block">
                                ایجاد شبکه اجتماعی
                            </a>
                        </li>
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('socialMedia.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('socialMedia.list') }}" class="text-white py-1 block">
                                لیست شبکه های اجتماعی
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="dashboard">
                <div
                        class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('user.list') ||
                                Route::is('user.create_user') ||
                                Route::is('user.myUsers') ||
                                Route::is('user.requestList')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 transition-all duration-200 @if (Route::is('user.list') ||
                                    Route::is('user.create_user') ||
                                    Route::is('user.myUsers') ||
                                    Route::is('user.requestList')) rotate-180 @endif"
                         viewBox="0 0 448 512">
                        <path fill="white"
                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                    </svg>
                    <div class="flex flex-row-reverse items-center gap-2">
                        <span class=" text-[white] flex justify-end font-bold">کاربران</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                        </svg>
                    </div>
                </div>
                <ul
                        class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('user.list') ||
                                Route::is('user.create_user') ||
                                Route::is('user.myUsers') ||
                                Route::is('user.requestList')) max-h-[500px] @else max-h-0 @endif">
                    @if (in_array(1, $ids) || in_array(4, $ids))

                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('user.myUsers')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.myUsers') }}" class="text-white py-1 block">
                                مشتریان من
                            </a>
                        </li>
                    @endif

                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('user.list')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('user.list') }}" class="text-white py-1 block">
                            همه کاربران
                        </a>
                    </li>
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('user.create_user')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('user.create_user') }}" class="text-white py-1 block">
                            ایجاد کاربر جدید
                        </a>
                    </li>

                    @if (in_array(1, $ids) || in_array(4, $ids))
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('user.requestList')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('user.requestList') }}" class="text-white py-1 block">
                                لیست درخواست ها
                            </a>
                        </li>

                    @endif
                    @if (in_array(1, $ids))

                    @endif
                </ul>
            </div>
            <div class="dashboard">
                <div
                        class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('slider.*')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 transition-all duration-200 @if (Route::is('slider.*')) rotate-180 @endif"
                         viewBox="0 0 448 512">
                        <path fill="white"
                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                    </svg>
                    <div class="flex flex-row-reverse items-center gap-2">
                        <span class=" text-[white] flex justify-end font-bold">اسلایدر</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="800px" height="800px"
                             class="size-5 fill-white " viewBox="0 0 100 100" enable-background="new 0 0 100 100"
                             xml:space="preserve">
                                <path
                                        d="M22.5,19.7h20c1.4,0,2.5,1.1,2.5,2.5v54.9c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V22.2  C20,20.8,21.1,19.7,22.5,19.7z"/>
                            <path
                                    d="M57.5,19.6h20c1.4,0,2.5,1.1,2.5,2.5V42c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V22.1  C55,20.7,56.1,19.6,57.5,19.6z"/>
                            <path
                                    d="M57.5,54.6h20c1.4,0,2.5,1.1,2.5,2.5v19.9c0,1.4-1.1,2.5-2.5,2.5h-20c-1.4,0-2.5-1.1-2.5-2.5V57.1  C55,55.8,56.1,54.6,57.5,54.6z"/>
                            </svg>
                    </div>
                </div>
                <ul
                        class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('slider.*')) max-h-[500px] @else max-h-0 @endif">
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('slider.create')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('slider.create') }}" class="text-white py-1 block">
                            ایجاد اسلایدر
                        </a>
                    </li>
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('slider.list')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('slider.list') }}" class="text-white py-1 block">
                            لیست اسلایدر
                        </a>
                    </li>
                </ul>
            </div>
            {{-- contactUs --}}
            @if (Auth::user()->role[0]->title == 'admin')
                <div class="dashboard">
                    <div
                            class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('contactUs.*')) bg-gray-700 @endif">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-4 transition-all duration-200 @if (Route::is('contactUs.*')) rotate-180 @endif"
                             viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                        </svg>

                        <div class="flex flex-row-reverse items-center gap-2">
                            <span class=" text-[white] flex justify-end font-bold">ارتباط باما</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                                <path fill="white"
                                      d="M384 48c8.8 0 16 7.2 16 16V448c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H384zM96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H208zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/>
                            </svg>
                        </div>
                    </div>
                    <ul
                            class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('contactUs.*')) max-h-[500px] @else max-h-0 @endif">
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('contactUs.list')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('contactUs.list') }}" class="text-white py-1 block">
                                لیست تیکت ها
                            </a>
                        </li>
                        <li
                                class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('contactUs.create')) bg-gray-700 @endif">
                            <span class="size-1 bg-white rounded-sm"></span>
                            <a href="{{ route('contactUs.create') }}" class="text-white py-1 block">
                                فرم ارتباط با ما
                            </a>
                        </li>

                    </ul>
                </div>
            @endif
            {{-- end-contactUs --}}
            <div class="dashboard">
                <div
                        class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('aboutUs.*')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 transition-all duration-200 @if (Route::is('aboutUs.*')) rotate-180 @endif"
                         viewBox="0 0 448 512">
                        <path fill="white"
                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                    </svg>
                    <div class="flex flex-row-reverse items-center gap-2">
                        <span class=" text-[white] flex justify-end font-bold">درباره ما</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 640 512">
                            <path fill="white"
                                  d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>
                        </svg>
                    </div>
                </div>
                <ul
                        class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('aboutUs.create_edit') || Route::is('aboutUs.list')) max-h-[500px] @else max-h-0 @endif">
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('aboutUs.create_edit')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('aboutUs.create_edit') }}" class="text-white py-1 block">
                            ایجاد درباره ما
                        </a>
                    </li>
                    <li
                            class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('aboutUs.list')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('aboutUs.list') }}" class="text-white py-1 block">
                            درباره ما
                        </a>
                    </li>
                </ul>
            </div>
            <div class="dashboard">
                <div class="flex justify-between flex-row-reverse cursor-pointer px-2 rounded-sm py-1.5 @if (Route::is('generalQrCodes.*')) bg-gray-700 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 transition-all duration-200 @if (Route::is('generalQrCodes.*')) rotate-180 @endif"
                         viewBox="0 0 448 512">
                        <path fill="white"
                              d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                    </svg>
                    <div class="flex flex-row-reverse items-center gap-2">
                        <span class=" text-[white] flex justify-end font-bold">کیوآر کد</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 448 512">
                            <path fill="white"
                                  d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z"/>
                        </svg>
                    </div>
                </div>
                <ul class="my-1 pr-3 transition-all duration-500 overflow-hidden @if (Route::is('generalQrCodes.create') || Route::is('generalQrCodes.list')) max-h-[500px] @else max-h-0 @endif">
                    <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('generalQrCodes.create')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('generalQrCodes.create') }}" class="text-white py-1 block">
                            ایجاد کیوآر کد جدید </a>
                    </li>
                    <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5 pr-5 rounded-sm @if (Route::is('generalQrCodes.list')) bg-gray-700 @endif">
                        <span class="size-1 bg-white rounded-sm"></span>
                        <a href="{{ route('generalQrCodes.list') }}" class="text-white py-1 block">
                            لیست کیوآر کد های من
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="w-full relative">
    <header class="w-full fixed top-0 right-0 z-10">
        <div
                class="w-full float-end lg:w-[calc(100%-265px)] py-3 hidden lg:flex flex-row-reverse px-5 backdrop-blur-sm shadowHeader relative z-20">
            <div class="w-6/12 flex flex-row-reverse items-center">
                <div class="relative hover_profile">
                    <div class="cursor-pointer">
                        @if (!Auth::user()->main_image)
                            <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar"
                                 class="size-10 rounded-full">
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->main_image) }}" alt="user__picture"
                                 class="size-10 rounded-full object-cover">
                        @endif
                    </div>
                    <div class="absolute left-0 pt-5 invisible opacity-0 transition-all duration-300">
                        <div class="w-[250px] rounded-xl  py-4 bg-white shadow__all__prof">
                            <div class="text-center px-2">
                                    <span class="font-bold">
                                        {{ Auth::user()?->name }} {{ Auth::user()?->family }}
                                    </span>
                            </div>
                            <div class="w-full h-px bg-gray-300 mt-4 "></div>
                            <ul class="rtl text-right ">
                                <li
                                        class="hover:text-[#1B84FF] hover:bg-[#F1F1F4] mt-1 w-11/12 ml-auto mr-auto rounded-lg">
                                    <a href="{{ route('user.profile') }}" class="block w-full p-2">پروفایل من</a>
                                </li>
                                @if (!Auth::user()->name && !Auth::user()->family)
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
                                    <a href="{{ route('user.setting') }}" class="block w-full p-2">
                                        ویرایش پروفایل
                                    </a>
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
                    <a href="{{ route('dashboard') }}">
                        داشبورد
                    </a>
                </h3>
            </div>
        </div>
        <div
                class="flex lg:hidden flex-row justify-between items-center py-2 px-5 backdrop-blur-sm shadowHeader relative z-20">
            <div class="flex flex-col w-8 h-5 justify-between cursor-pointer"
                 onclick="hamburgerMenu('open')" id="menuBlockliet">
                <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
                <span class="w-full h-0.5 bg-black transition-all duration-300"></span>
            </div>
            <div onclick="pup_up_profil('open')">
                @if (!Auth::user()->main_image)
                    <img src="{{ asset('assets/img/user.png') }}" alt="user__avatar"
                         class="size-12 object-cover rounded-full">
                @else
                    <img src="{{ asset('storage/' . Auth::user()->main_image) }}" alt="user__picture"
                         class="size-12 rounded-full object-cover">
                @endif
            </div>
        </div>

        {{--                    pup_up_user_profile_start--}}


        <div class="w-50 bg-white border-black shadow-[15px_0px_30px_#bab2b29e] absolute top-19  left-1/20 px-3 flex flex-col gap-2 rounded-lg  max-h-0 overflow-hidden transition-all duration-400 invisible opacity-0 z-2"
             id="pup_up_profile">
            <div class="w-full flex gap-5 justify-start items-center px-4" onclick="account_user()">
                {{--                                    <div class="w-8 h-8 bg-[#eb3153] rounded-full absolute -top-4 -right-3 flex justify-center items-center" onclick="pup_up_profil('close')">--}}
                {{--                                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 "  fill="#fff"><path d="M345 137l17-17L328 86.1l-17 17-119 119L73 103l-17-17L22.1 120l17 17 119 119L39 375l-17 17L56 425.9l17-17 119-119L311 409l17 17L361.9 392l-17-17-119-119L345 137z"/></svg>--}}
                {{--                                    </div>--}}
                @if(Auth::check())
                    @if(Auth::user()->name && Auth::user()->family)
                        <h2 class=" font-bold text-nowrap">{{Auth::user()->name}} {{Auth::user()->family}}</h2>
                    @else
                        <h2 class=" font-bold">نام من</h2>
                    @endif
                @endif
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="transition-all duration-400 rotate-180" id="account_user_sample">
                    <polyline points="18 15 12 9 6 15"></polyline>
                </svg>
            </div>
            <div class="w-full px-4 flex flex-col gap-2 overflow-y-hidden max-h-0 transition-all duration-400"
                 id="account_user_items">
                @foreach(Auth::user()->pages as $page)
                    <a href="{{ route('pages.single', [$page]) }}"
                       class="block w-full rounded-lg cursor-pointer py-1 hover:bg-[#F9FAFC] flex gap-5 items-center">
                        <div class="min-w-10 max-w-10 min-h-10 max-h-10">
                            <img src="{{ $page->logo_path ? asset('storage/'. $page->logo_path) : asset('assets/img/user.png') }}"
                                 class="size-9 rounded-full" alt="user accont image">
                        </div>
                        <span class="text-xs text-[#5b5c75]">{{$page->title}}</span>
                    </a>
                @endforeach
                <!--<a href="" class="block w-full rounded-lg cursor-pointer py-1 hover:bg-[#F9FAFC] flex gap-5 items-center">-->
                <!--    <img src="{{ Auth::user()->main_image ? asset('storage/'.Auth::user()->main_image) : asset('assets/img/user.png') }}" class="size-9 rounded-full" alt="user accont image">-->
                <!--    <span class="text-sm text-[#5b5c75]">محمد</span>-->
                <!--</a>-->
            </div>
            <a href="{{ route('dashboard') }}"
               class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                    <path d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z"></path>
                </svg>
                <span class="text-sm text-[#5b5c75]">داشبورد</span>
            </a>
            <a href="{{ route('user.profile') }}"
               class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4">
                    <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                </svg>
                <span class="text-sm text-[#5b5c75]">اطلاعات کاربری</span>
            </a>
            <a href="{{ route('user.logout') }}"
               class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20"
                     id="entypo-log-out" class="w-4" fill="#eb3153">
                    <g>
                        <path d="M19 10l-6-5v3H6v4h7v3l6-5zM3 3h8V1H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H3V3z"></path>
                    </g>
                </svg>
                <span class="text-sm text-[#eb3153]">خروج</span>
            </a>

        </div>


        <div class="w-full h-[100vh] fixed top-0 left-0 transition-all duration-400 invisible opacity-0"
             id="close_pup_up_profile_all_viwe" onclick="pup_up_profil('close')"></div>
        <script>
            let pup_up_profile = document.getElementById('pup_up_profile')
            let close_pup_up_profile_all_viwe = document.getElementById('close_pup_up_profile_all_viwe')

            function pup_up_profil(viwe) {
                if (viwe == 'open') {
                    pup_up_profile.classList.toggle('max-h-0')
                    pup_up_profile.classList.toggle('overflow-hidden')
                    pup_up_profile.classList.toggle('invisible')
                    pup_up_profile.classList.toggle('opacity-0')
                    pup_up_profile.classList.toggle('py-4')
                    close_pup_up_profile_all_viwe.classList.remove('invisible')
                    close_pup_up_profile_all_viwe.classList.remove('opacity-0')
                }
                if (viwe == 'close') {

                    pup_up_profile.classList.add('max-h-0')
                    pup_up_profile.classList.add('overflow-hidden')
                    pup_up_profile.classList.add('invisible')
                    pup_up_profile.classList.add('opacity-0')
                    pup_up_profile.classList.remove('py-4')
                    close_pup_up_profile_all_viwe.classList.add('invisible')
                    close_pup_up_profile_all_viwe.classList.add('opacity-0')
                }
            }

            //users
            let account_user_items = document.getElementById('account_user_items')
            let account_user_sample = document.getElementById('account_user_sample')

            function account_user() {
                account_user_items.classList.toggle('max-h-0')
                account_user_items.classList.toggle('py-1')
                account_user_sample.classList.toggle('rotate-180')
            }

            //users

        </script>
        {{--                      pup_up_user_profile_end--}}





        <!-- hamburger menu -->
        <div class="w-full h-dvh fixed top-0 right-0 invisible opacity-0 bg-black/50 flex flex-row-reverse z-99999 transition-all duration-500 backdrop-blur-sm"
             id="menuBlock">
            <div class="w-1/3 h-full relative" onclick="hamburgerMenu('close', this)">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 absolute top-5 left-5 cursor-pointer"
                     viewBox="0 0 384 512">
                    <path fill="white"
                          d="M324.5 411.1c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L214.6 256 347.1 123.5c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L192 233.4 59.5 100.9c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L169.4 256 36.9 388.5c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L192 278.6 324.5 411.1z"/>
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
                                     alt="user__picture object-cover"
                                     class="size-14 rounded-full">
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
                                                Route::is('ecomm_category.create') || Route::is('ecomm_product.index') || Route::is('ecomm_product.create')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('ecomm.ecomms') ||
                                        Route::is('ecomm.*') ||
                                        Route::is('ecomm.list') ||
                                        Route::is('ecomm_category.index') ||
                                        Route::is('ecomm_category.create') || Route::is('ecomm_product.index') || Route::is('ecomm_product.create')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5 @if(Route::is('ecomm.ecomms')) bg-gray-100 @endif">
                                    <a href="{{ route('ecomm.ecomms') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        فروشگاه های من
                                    </a>
                                </li>
                                <li class="pr-3.5 @if(Route::is('ecomm.create')) bg-gray-100 @endif">
                                    <a href="{{ route('ecomm.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        فروشگاه جدید
                                    </a>
                                </li>
                                @if (Auth::user()->role[0]->title == 'admin')

                                    <li class="pr-3.5 @if(Route::is('ecomm.list')) bg-gray-100 @endif">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('ecomm.list') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            همه فروشگاه ها
                                        </a>
                                    </li>
                                @endif

                                @if (count(Auth::user()->ecomms))
                                    <li class="pr-3.5 @if(Route::is('ecomm_category.index')) bg-gray-100 @endif">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('ecomm_category.index') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            همه دسته ها
                                        </a>
                                    </li>
                                @endif

                                <li class="pr-3.5 @if(Route::is('ecomm_category.create')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('ecomm_category.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        دسته جدید
                                    </a>
                                </li>
                                @if (count(Auth::user()->ecomms))
                                    <li class="pr-3.5 @if(Route::is('ecomm_product.index')) bg-gray-100 @endif">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('ecomm_product.index') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            همه محصولات
                                        </a>
                                    </li>
                                @endif
                                <li class="pr-3.5 @if(Route::is('ecomm_product.create')) bg-gray-100 @endif">
                                    <span class="size-1 rounded-sm"></span>
                                    <a href="{{ route('ecomm_product.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        محصول جدید
                                    </a>
                                </li>
                            </ul>
                        </div>

                        @if(in_array(1,$ids) || in_array(5,$ids))
                            <div class="pt-3">
                                <div class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5"> چک لیست</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if(Route::is('checkList.formCheckList') || Route::is('checkList.myList')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                    </svg>
                                </div>
                                <ul class="transition-all duration-300 overflow-hidden @if(Route::is('checkList.formCheckList') || Route::is('checkList.myList')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5 @if(Route::is('checkList.formCheckList')) bg-gray-100 @endif">
                                        <a href="{{ route('checkList.formCheckList') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            ثبت چک لیست
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if(Route::is('myList')) bg-gray-100 @endif">
                                        <a href="{{ route('checkList.myList') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            لیست چک لیست های من
                                        </a>
                                    </li>
                                    @if (Auth::user()->phoneNumber == '09147794595')
                                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5  rounded-sm">
                                            <span class="size-1 bg-white rounded-sm"></span>
                                            <a href="{{ route('checkList.checkList_Users') }}" class=" py-1 block">
                                                مشاهده کاربران
                                            </a>
                                        </li>
                                        <li class="flex flex-row items-center gap-2.5 mt-2.5 mb-2.5  rounded-sm @if(Route::is('checkList.checkList_Users')) bg-gray-700 @endif">
                                            <span class="size-1 bg-white rounded-sm"></span>
                                            <a href="{{ route('checkList.all_user_check_lists') }}" class=" py-1 block">
                                                لیست تمام چک لیست ها
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                        @endif
                        {{--                            suggestion--}}
                        <div class="pt-3">
                            <div
                                    class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                <h3 class="text-md font-bold text-gray-800 mb-1.5">پیشنهادات</h3>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="size-4 transition-all duration-300 @if (Route::is('suggestion.*')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('suggestion.*')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5 @if(Route::is('suggestion.create')) bg-gray-100 @endif">
                                    <a href="{{ route('suggestion.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        افزودن
                                    </a>
                                </li>
                                <li class="pr-3.5 @if(Route::is('suggestion.list')) bg-gray-100 @endif">
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
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                </svg>
                            </div>
                            <ul
                                    class="transition-all duration-300 overflow-hidden @if (Route::is('career.*') ||
                                            Route::is('menu.createMenu') ||
                                            Route::is('menu.user_menus') ||
                                            Route::is('cc.create') ||
                                            Route::is('cc.list')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5 @if(Route::is('career.careers')) bg-gray-100 @endif">
                                    <a href="{{ route('career.careers') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست رستوران های من
                                    </a>
                                </li>

                                <li class="pr-3.5 @if(Route::is('career.create')) bg-gray-100 @endif">
                                    <a href="{{ route('career.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ایجاد رستوران جدید
                                    </a>
                                </li>
                                @if (count(Auth::user()->menus))
                                    <li class="pr-3.5 @if(Route::is('menu.user_menus')) bg-gray-100 @endif">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('menu.user_menus', [Auth::user()]) }}"
                                           class="block text-gray-700 py-2 text-md">
                                            لیست منو های من
                                        </a>
                                    </li>
                                @endif
                                @if (count(Auth::user()->careers))
                                    <li class="pr-3.5 @if(Route::is('menu.createMenu')) bg-gray-100 @endif">
                                        <a href="{{ route('menu.createMenu') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            ایجاد منو برای رستوران
                                        </a>
                                    </li>
                                @endif
                                @if (in_array(1, $ids) || in_array(4, $ids))

                                    <li class="pr-3.5 @if(Route::is('career.createUser')) bg-gray-100 @endif">
                                        <a href="{{ route('career.createUser') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            ایجاد رستوران برای دیگری
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->role[0]->title == 'admin')
                                    <li class="pr-3.5 @if(Route::is('career.list')) bg-gray-100 @endif">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('career.list') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            همه رستوران ها
                                        </a>
                                    </li>

                                    <li class="pr-3.5 @if(Route::is('cc.create')) bg-gray-100 @endif">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('cc.create') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            ایجاد دسته رستوران
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if(Route::is('cc.list')) bg-gray-100 @endif">
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
                                     class="size-4 transition-all duration-300 @if(Route::is('pages.*')||Route::is('socialMedia.*')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                </svg>
                            </div>
                            <ul class="transition-all duration-300 overflow-hidden @if(Route::is('pages.*')||Route::is('socialMedia.*')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5 @if(Route::is('pages.create')) bg-gray-100 @endif">
                                    <a href="{{ route('pages.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ایجاد صفحه
                                    </a>
                                </li>
                                <li class="pr-3.5 @if(Route::is('pages.social_list')) bg-gray-100 @endif">
                                    <a href="{{ route('pages.social_list') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        لیست صفحه های من
                                    </a>
                                </li>
                                @if (Auth::user()->role[0]->title == 'admin')

                                    <li class="pr-3.5 @if(Route::is('pages.list')) bg-gray-100 @endif">
                                        <a href="{{ route('pages.list') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            لیست همه صفحه ها
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->role[0]->title == 'admin')
                                    <li class="pr-3.5 @if(Route::is('socialMedia.create')) bg-gray-100 @endif">
                                        <span class="size-1 rounded-sm"></span>
                                        <a href="{{ route('socialMedia.create') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            ایجاد شبکه اجتماعی
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if(Route::is('socialMedia.list')) bg-gray-100 @endif">
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
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5">کاربران</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if (Route::is('user.list') || Route::is('user.create_user') || Route::is('user.myUsers') || Route::is('user.requestList')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                    </svg>
                                </div>
                                <ul class="transition-all duration-300 overflow-hidden @if (Route::is('user.list') || Route::is('user.create_user') || Route::is('user.myUsers') || Route::is('user.requestList')) max-h-[1000px] @else max-h-0 @endif">
                                    @if (in_array(1, $ids) || in_array(4, $ids))
                                        <li class="pr-3.5 @if(Route::is('user.myUsers')) bg-gray-100 @endif">
                                            <a href="{{ route('user.myUsers') }}"
                                               class="block text-gray-700 py-2 text-md">
                                                مشتریان من
                                            </a>
                                        </li>
                                    @endif


                                    <li class="pr-3.5 @if(Route::is('user.list')) bg-gray-100 @endif">
                                        <a href="{{ route('user.list') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            همه کاربران
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if(Route::is('user.create_user')) bg-gray-100 @endif">
                                        <a href="{{ route('user.create_user') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            ایجاد کاربر جدید
                                        </a>
                                    </li>

                                    @if (in_array(1, $ids) || in_array(4, $ids))
                                        @if (in_array(1, $ids))
                                            <li class="pr-3.5 @if(Route::is('user.requestList')) bg-gray-100 @endif">
                                                <a href="{{ route('user.requestList') }}"
                                                   class="block text-gray-700 py-2 text-md">
                                                    لیست درخواست ها
                                                </a>
                                            </li>
                                        @endif

                                    @endif

                                </ul>
                            </div>
                        @endif

                        @if (Auth::user()->role[0]->title == 'admin')
                            <div class="pt-3">
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5">اسلایدر</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if(Route::is('slider.*')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                    </svg>
                                </div>
                                <ul class="transition-all duration-300 overflow-hidden @if(Route::is('slider.*')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5 @if(Route::is('slider.create')) bg-gray-100 @endif">
                                        <a href="{{ route('slider.create') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            ایجاد اسلایدر
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if(Route::is('slider.list')) bg-gray-100 @endif">
                                        <a href="{{ route('slider.list') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            لیست اسلایدر ها
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        @if (Auth::user()->role[0]->title == 'admin')
                            <div class="pt-3">
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5">
                                        درباره ما
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if(Route::is('aboutUs.*')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                    </svg>
                                </div>
                                <ul class="transition-all duration-300 overflow-hidden @if(Route::is('aboutUs.*')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5 @if(Route::is('aboutUs.create_edit')) bg-gray-100 @endif">
                                        <a href="{{ route('aboutUs.create_edit') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            ایجاد درباره ما
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if(Route::is('aboutUs.list')) bg-gray-100 @endif">
                                        <a href="{{ route('aboutUs.list') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            درباره ما
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        @if (Auth::user()->role[0]->title == 'admin')
                            <div class="pt-3">
                                <div
                                        class="w-full flex flex-row justify-between items-center border-b-1 border-gray-300 py-2 parentFields cursor-pointer">
                                    <h3 class="text-md font-bold text-gray-800 mb-1.5">
                                        ارتباط با ما
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="size-4 transition-all duration-300 @if(Route::is('contactUs.*')) rotate-180 @endif"
                                         viewBox="0 0 448 512">
                                        <path
                                                d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                    </svg>
                                </div>
                                <ul class="transition-all duration-300 overflow-hidden @if(Route::is('contactUs.*')) max-h-[1000px] @else max-h-0 @endif">
                                    <li class="pr-3.5 @if(Route::is('contactUs.create')) bg-gray-100 @endif">
                                        <a href="{{ route('contactUs.create') }}"
                                           class="block text-gray-700 py-2 text-md">
                                            فرم ارتباط باما
                                        </a>
                                    </li>
                                    <li class="pr-3.5 @if(Route::is('contactUs.list')) bg-gray-100 @endif">
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
                                     class="size-4 transition-all duration-300 @if(Route::is('generalQrCodes.*')) rotate-180 @endif"
                                     viewBox="0 0 448 512">
                                    <path
                                            d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                                </svg>
                            </div>
                            <ul class="transition-all duration-300 overflow-hidden @if(Route::is('generalQrCodes.*')) max-h-[1000px] @else max-h-0 @endif">
                                <li class="pr-3.5 @if(Route::is('generalQrCodes.create')) bg-gray-100 @endif">
                                    <a href="{{ route('generalQrCodes.create') }}"
                                       class="block text-gray-700 py-2 text-md">
                                        ایجاد کیوآر کد جدید
                                    </a>
                                </li>
                                <li class="pr-3.5 @if(Route::is('generalQrCodes.list')) bg-gray-100 @endif">
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
        <!-- hamburger menu end -->
    </header>
    <div class="w-full h-dvh lg:w-[calc(100%-265px)] float-end pt-20 lg:px-5 overflow-y-auto px-5 relative bg-[#F2F2F2] z-9"
         style="scrollbar-width:none;">
        @yield('content')

    </div>
</div>


{{-- <script src="{{ asset('assets/js/ecomm_product_create.js') }}"></script> --}}

@yield('ajax')

<script>


    let parentFields = document.querySelectorAll('.parentFields')
    parentFields.forEach((parentField) => {
        parentField.addEventListener('click', () => {
            if (parentField.nextElementSibling.classList.contains('max-h-0')) {
                parentFields.forEach(row => {
                    row.nextElementSibling.classList.remove('max-h-[1000px]')
                    row.children[1].classList.remove('rotate-180')
                    row.nextElementSibling.classList.add('max-h-0')
                })
                parentField.nextElementSibling.classList.remove('max-h-0')
                parentField.nextElementSibling.classList.add('max-h-[1000px]')
                parentField.children[1].classList.add('rotate-180')
            } else {
                parentField.nextElementSibling.classList.remove('max-h-[1000px]')
                parentField.children[1].classList.remove('rotate-180')
                parentField.nextElementSibling.classList.add('max-h-0')
            }
        })
    })


</script>
<script src="{{ asset('assets/js/userPanel.js') }}"></script>
</body>

</html>


