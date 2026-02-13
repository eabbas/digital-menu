@extends('client.document')
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
@section('title', 'فامنو | منوی دیجیتال کسب و کار شما')
@section('content')



    <div class="w-full pt-1 samim">


        <section>
            {{-- <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">پیشنهادات ویژه</h1>
                <a class="text-[13px] text-[#00a692]" href="#">مشاهده همه</a>
            </div> --}}
            <div class="my-3">
                <h2 class="lg:text-xl text-sm font-bold">
                    خدمات
                </h2>
                <div class="w-full grid grid-cols-3 gap-7 mt-4">
                    <a href="#" class="flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                            <path fill="#4a5565"
                                d="M96 160H64V64C64 28.7 92.7 0 128 0H357.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 18.7 28.3 18.7 45.3V160H416V90.5c0-8.5-3.4-16.6-9.4-22.6L380.1 41.4c-6-6-14.1-9.4-22.6-9.4H128c-17.7 0-32 14.3-32 32v96zm352 64H64c-17.7 0-32 14.3-32 32V384H64V352c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32v32h32V256c0-17.7-14.3-32-32-32zm0 192v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V416H32c-17.7 0-32-14.3-32-32V256c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V384c0 17.7-14.3 32-32 32H448zM96 352l0 128H416V352H96zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                        </svg>
                        <span class="text-xs font-bold text-gray-600">
                            چاپ
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                            <path fill="#4a5565" d="M256 480c16.7 0 40.4-14.4 61.9-57.3c9.9-19.8 18.2-43.7 24.1-70.7H170c5.9 27 14.2 50.9 24.1 70.7C215.6 465.6 239.3 480 256 480zM164.3 320H347.7c2.8-20.2 4.3-41.7 4.3-64s-1.5-43.8-4.3-64H164.3c-2.8 20.2-4.3 41.7-4.3 64s1.5 43.8 4.3 64zM170 160H342c-5.9-27-14.2-50.9-24.1-70.7C296.4 46.4 272.7 32 256 32s-40.4 14.4-61.9 57.3C184.2 109.1 175.9 133 170 160zm210 32c2.6 20.5 4 41.9 4 64s-1.4 43.5-4 64h90.8c6-20.3 9.3-41.8 9.3-64s-3.2-43.7-9.3-64H380zm78.5-32c-25.9-54.5-73.1-96.9-130.9-116.3c21 28.3 37.6 68.8 47.2 116.3h83.8zm-321.1 0c9.6-47.6 26.2-88 47.2-116.3C126.7 63.1 79.4 105.5 53.6 160h83.7zm-96 32c-6 20.3-9.3 41.8-9.3 64s3.2 43.7 9.3 64H132c-2.6-20.5-4-41.9-4-64s1.4-43.5 4-64H41.3zM327.5 468.3c57.8-19.5 105-61.8 130.9-116.3H374.7c-9.6 47.6-26.2 88-47.2 116.3zm-143 0c-21-28.3-37.5-68.8-47.2-116.3H53.6c25.9 54.5 73.1 96.9 130.9 116.3zM256 512A256 256 0 1 1 256 0a256 256 0 1 1 0 512z"/>
                        </svg>
                        <span class="text-xs font-bold text-gray-600">
                            طراحی سایت
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                            <path fill="#4a5565" d="M256 480c16.7 0 40.4-14.4 61.9-57.3c9.9-19.8 18.2-43.7 24.1-70.7H170c5.9 27 14.2 50.9 24.1 70.7C215.6 465.6 239.3 480 256 480zM164.3 320H347.7c2.8-20.2 4.3-41.7 4.3-64s-1.5-43.8-4.3-64H164.3c-2.8 20.2-4.3 41.7-4.3 64s1.5 43.8 4.3 64zM170 160H342c-5.9-27-14.2-50.9-24.1-70.7C296.4 46.4 272.7 32 256 32s-40.4 14.4-61.9 57.3C184.2 109.1 175.9 133 170 160zm210 32c2.6 20.5 4 41.9 4 64s-1.4 43.5-4 64h90.8c6-20.3 9.3-41.8 9.3-64s-3.2-43.7-9.3-64H380zm78.5-32c-25.9-54.5-73.1-96.9-130.9-116.3c21 28.3 37.6 68.8 47.2 116.3h83.8zm-321.1 0c9.6-47.6 26.2-88 47.2-116.3C126.7 63.1 79.4 105.5 53.6 160h83.7zm-96 32c-6 20.3-9.3 41.8-9.3 64s3.2 43.7 9.3 64H132c-2.6-20.5-4-41.9-4-64s1.4-43.5 4-64H41.3zM327.5 468.3c57.8-19.5 105-61.8 130.9-116.3H374.7c-9.6 47.6-26.2 88-47.2 116.3zm-143 0c-21-28.3-37.5-68.8-47.2-116.3H53.6c25.9 54.5 73.1 96.9 130.9 116.3zM256 512A256 256 0 1 1 256 0a256 256 0 1 1 0 512z"/>
                        </svg>
                        <span class="text-xs font-bold text-gray-600">
                            زبان
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 640 512">
                            <path fill="#4a5565" d="M202.4 36.4C207.8 15 227 0 249 0h23c8.8 0 16 7.2 16 16s-7.2 16-16 16H249c-7.3 0-13.7 5-15.5 12.1l-21 83.9H368c8.8 0 16 7.2 16 16s-7.2 16-16 16H288 192.4c-.2 0-.5 0-.7 0H16c-8.8 0-16-7.2-16-16s7.2-16 16-16H179.5l22.9-91.6zM60.3 468l-23-276H69.4L92.2 465.3c.7 8.3 7.6 14.7 15.9 14.7H260c3.7 11.9 9.7 22.7 17.5 32c-.6 0-1.1 0-1.7 0H108.2c-25 0-45.8-19.1-47.8-44zM330.9 279.4c-5.7 6.2-9.2 14.6-10.4 24.4h287c-1.2-9.8-4.7-18.2-10.4-24.4c-8.3-9-20.6-20.1-37.1-30.1c-.8 8.1-7.6 14.5-15.9 14.5c-8.8 0-16-7.2-16-16c0-4.6 1.9-8.7 5-11.6c-15.7-6.1-33.9-10.5-54.9-11.9c1.2 2.2 1.9 4.8 1.9 7.5c0 8.8-7.2 16-16 16s-16-7.2-16-16c0-2.7 .7-5.3 1.9-7.5c-21 1.4-39.2 5.9-54.9 11.9c3.1 2.9 5 7 5 11.6c0 8.8-7.2 16-16 16c-8.3 0-15.1-6.3-15.9-14.5c-16.6 10-28.8 21.1-37.1 30.1zM464 191.8c82 0 132.6 40 156.5 65.9c14.6 15.7 19.5 36.1 19.5 54.7c0 12.9-10.5 23.4-23.4 23.4H311.4c-12.9 0-23.4-10.5-23.4-23.4c0-18.7 4.9-39.1 19.5-54.7c24-25.8 74.5-65.9 156.5-65.9zm-176 184c0-8.8 7.2-16 16-16H624c8.8 0 16 7.2 16 16s-7.2 16-16 16H304c-8.8 0-16-7.2-16-16zm0 77.3c0-20.6 16.7-37.3 37.3-37.3H602.7c20.6 0 37.3 16.7 37.3 37.3c0 32.4-26.3 58.7-58.7 58.7H346.7c-32.4 0-58.7-26.3-58.7-58.7zm37.3-5.3c-2.9 0-5.3 2.4-5.3 5.3c0 14.7 11.9 26.7 26.7 26.7H581.3c14.7 0 26.7-11.9 26.7-26.7c0-2.9-2.4-5.3-5.3-5.3H325.3z"/>
                        </svg>
                        <span class="text-xs font-bold text-gray-600">
                            سفارش غذا
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                            <path fill="#4a5565" d="M512 32H64C46.3 32 32 46.3 32 64V256H544V64c0-17.7-14.3-32-32-32zm64 224v32 64c0 35.3-28.7 64-64 64H362.9l10.7 64H432c8.8 0 16 7.2 16 16s-7.2 16-16 16H360 216 144c-8.8 0-16-7.2-16-16s7.2-16 16-16h58.4l10.7-64H64c-35.3 0-64-28.7-64-64V288 256 64C0 28.7 28.7 0 64 0H512c35.3 0 64 28.7 64 64V256zM32 288v64c0 17.7 14.3 32 32 32H231.7c.2 0 .4 0 .6 0H343.7c.2 0 .4 0 .6 0H512c17.7 0 32-14.3 32-32V288H32zM234.9 480H341.1l-10.7-64H245.6l-10.7 64z"/></svg>
                        <span class="text-xs font-bold text-gray-600">
                            خدمات کامپیوتر
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                            <path fill="#4a5565" d="M32 64V448c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V154.5c0-8.5-3.4-16.6-9.4-22.6L252.1 41.4c-6-6-14.1-9.4-22.6-9.4H64C46.3 32 32 46.3 32 64zM0 448V64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64zM64 280V240c0-26.5 21.5-48 48-48h48 16 16 40 40c26.5 0 48 21.5 48 48v40 80 40c0 26.5-21.5 48-48 48H224 208 192 112c-26.5 0-48-21.5-48-48V360 280zM96 400c0 8.8 7.2 16 16 16h80V376H152 96v24zm176 16c8.8 0 16-7.2 16-16V376H224v40h48zm-64-72h80V296H232 176 96v48h56 56zm80-104c0-8.8-7.2-16-16-16H232 192v40h40 56V240zM160 224H112c-8.8 0-16 7.2-16 16v24h64V224z"/>
                        </svg>
                        <span class="text-xs font-bold text-gray-600">
                            اینترنت و شارژ
                        </span>
                    </a>
                </div>
            </div>
            <div class="my-5">
                <h2 class="lg:text-xl text-sm font-bold">
                   صفحه خودتو بساز
                </h2>
                <div class="w-full grid grid-cols-4 gap-5 mt-4">
                    <a href="#" class="flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                            <path fill="#4a5565" d="M16 0C7.2 0 0 7.2 0 16s7.2 16 16 16H53.9c7.6 0 14.2 5.3 15.7 12.8l58.9 288c6.1 29.8 32.3 51.2 62.7 51.2H496c8.8 0 16-7.2 16-16s-7.2-16-16-16H191.2c-15.2 0-28.3-10.7-31.4-25.6L152 288H466.5c29.4 0 55-20 62.1-48.5L570.6 71.8c5-20.2-10.2-39.8-31-39.8H99.1C92.5 13 74.4 0 53.9 0H16zm90.1 64H539.5L497.6 231.8C494 246 481.2 256 466.5 256H145.4L106.1 64zM168 456a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0zm200-24a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112z"/>
                        </svg>
                        <span class="text-xs font-bold text-gray-600">
                           فروشگاه
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                            <path fill="#4a5565" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                        </svg>
                        <span class="text-xs font-bold text-gray-600">
                           معرفی
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                            <path fill="#4a5565" d="M228.7 .5c-3.1-.6-6.3-.6-9.4 0l-200 40C8.1 42.7 0 52.6 0 64C0 74.3 6.5 83.3 16 86.6v71.8L.3 236.9c-.9 4.7 .3 9.6 3.3 13.3s7.6 5.9 12.4 5.9H48c4.8 0 9.3-2.1 12.4-5.9s4.3-8.6 3.3-13.3L48 158.4V93.3l171.3 34.3c3.1 .6 6.3 .6 9.4 0l200-40C439.9 85.3 448 75.4 448 64s-8.1-21.3-19.3-23.5l-200-40zM49.3 464c5.8-37.6 30-69.2 63.3-85.1l63.6 71.5c5 5.6 10.7 10.1 16.9 13.6H49.3zm349.4 0H254.9c6.2-3.4 11.9-7.9 16.9-13.6l63.6-71.5c33.3 15.8 57.5 47.4 63.3 85.1zM109.6 328.4C45.9 350 0 410.3 0 481.3c0 17 13.8 30.7 30.7 30.7H417.3c17 0 30.7-13.8 30.7-30.7c0-71-45.9-131.3-109.6-152.8c-10.9-3.7-22.7 .4-30.3 9L236 418.5c-6.4 7.2-17.6 7.2-23.9 0l-72.1-81.1c-7.6-8.6-19.4-12.7-30.3-9zM96 160c0 70.7 57.3 128 128 128s128-57.3 128-128V135.5l-48 9.6V160c0 44.2-35.8 80-80 80s-80-35.8-80-80V145.1l-48-9.6V160z"/>
                        </svg>
                        <span class="text-xs font-bold text-gray-600">
                           دوره
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 512 512">
                            <path fill="#4a5565" d="M48 192V416c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V192H48zM0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm436.7 0H363.3c-7.1 0-10.7 8.6-5.7 13.7l36.7 36.7c3.1 3.1 8.2 3.1 11.3 0l36.7-36.7c5-5 1.5-13.7-5.7-13.7zM128 232H384c13.3 0 24 10.7 24 24s-10.7 24-24 24H128c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 96H384c13.3 0 24 10.7 24 24s-10.7 24-24 24H128c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
                        </svg>
                        <span class="text-xs font-bold text-gray-600">
                           منو دیجیتال
                        </span>
                    </a>
                </div>
            </div>

            <div class="w-full bg-[#00ae6f] h-14 lg:h-100 overflow-hidden rounded-lg my-3 flex flex-row">
                <!--<img class="size-full rounded-inherit object-cover"-->
                <!--    src="{{ asset('assets/img/0f45cb57f458472281f94e87c7dfc67def10436d_1767515466.jpg') }}" alt="">-->
                <div class="w-6/12 lg:w-1/3 flex flex-row items-center justify-center">
                    <div class="flex flex-row pr-3 lg:flex-col gap-3 lg:gap-5 text-white lg:p-5 items-end">
                        <p class="font-bold text-[10px] lg:text-[30px]">
                            سلام دوست عزیز
                        </p>
                        <div>
                            <a href="{{ route('aboutUs.clientList') }}"
                                class="px-3 lg:px-5 py-1 bg-white rounded-full text-black font-bold text-xs lg:text-base">کلیک
                                کن</a>
                        </div>
                    </div>
                </div>
                <div class="w-7/12 lg:w-1/3 flex flex-row items-center justify-center">
                    <img src="{{ asset('storage/images/Famenu1.png') }}" class="w-4/12 h-auto">
                </div>
                <div class="hidden lg:block w-1/3 pt-14 lg:pt-20">
                    <div class="flex flex-row items-center gap-3">
                        <img src="{{ asset('storage/images/icon.png') }}" class="size-10">
                        <span class="text-white text-sm lg:text-lg font-bold">فامنو</span>
                    </div>
                </div>
            </div>
            {{-- <div class="my-3 flex flex-row justify-center items-center gap-2">
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-[#00a692]"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
            </div> --}}
            <div>
                <div class="flex flex-row justify-between items-center pt-1">
                    <h1 class="lg:text-xl text-sm font-bold">صفحات</h1>
                    <a class="text-[13px] text-[#eb3254] font-bold" href="{{ route('client.allPages') }}">مشاهده
                        همه</a>
                </div>
                <div class="flex flex-row gap-3 py-4 overflow-x-auto overflow-y-clip" style="scrollbar-width: none;">
                    @foreach ($pages as $page)
                        @if (count($page->socialMedia))
                            <a href="{{ route('client.loadLink', [$page->id]) }}"
                                class="flex flex-col gap-1 pb-2 justify-center items-center cursor-pointer careerCat relative">
                                <div class="absolute -top-1 -left-8 rotate-45 hidden arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="#eb3254"
                                            d="M512 176c0-35.3-28.7-64-64-64l-188.8 0c-3.6-5.2-7.6-10.2-11.9-14.9L228.8 76.8C212.1 58.5 188.5 48 163.7 48l-10.2 0C99.5 48 49.5 76.7 22.2 123.4L20.7 126C7.1 149.3 0 175.7 0 202.6L0 328c0 66.3 53.7 120 120 120l8 0 96 0c35.3 0 64-28.7 64-64c0-2.8-.2-5.6-.5-8.3c19.4-11 32.5-31.8 32.5-55.7c0-5.3-.7-10.5-1.9-15.5c20.2-10.8 33.9-32 33.9-56.5c0-2.7-.2-5.4-.5-8l96.5 0c35.3 0 64-28.7 64-64zm-64-16c8.8 0 16 7.2 16 16s-7.2 16-16 16l-136 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16l-8 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16c-9.1 0-17.4 5.1-21.5 13.3s-3.2 17.9 2.3 25.1c2 2.7 3.2 6 3.2 9.6c0 8.8-7.2 16-16 16l-96 0-8 0c-39.8 0-72-32.2-72-72l0-125.4c0-18.4 4.9-36.5 14.2-52.4l-20-11.7 20 11.7 1.5-2.6c18.6-32 52.8-51.6 89.8-51.6l10.2 0c11.3 0 22 4.8 29.6 13.1L210.5 128 168 128c-8.8 0-16 7.2-16 16s7.2 16 16 16l78 0 2 0 200 0z" />
                                    </svg>
                                </div>
                                <div class="size-20 rounded-md border border-gray-300 p-2 overflow-hidden">
                                    @if ($page->logo_path)
                                        <img class="h-full w-full rounded-full object-cover"
                                            src="{{ asset('storage/' . $page->logo_path) }}" alt="career category avatar">
                                    @else
                                        <img class="h-full w-full rounded-lg object-cover"
                                            src="{{ asset('assets/img/user.png') }}" alt="career category icon">
                                    @endif
                                </div>
                                <span class="text-xs font-medium text-center">{{ $page->title }}</span>
                            </a>
                        @endif
                    @endforeach

                </div>
            </div>
            <div>
                <div class="flex flex-row justify-between items-center pt-1">
                    <h2 class="lg:text-xl text-sm font-bold"> دسته بندی کسب و کارها</h2>
                    <a class="text-[13px] text-[#eb3254] font-bold" href="{{ route('career.careersCategories') }}">مشاهده
                        همه</a>
                </div>
                <div class="flex flex-row gap-3 py-4 overflow-x-auto overflow-y-clip" style="scrollbar-width: none;">
                    <div class="flex flex-col gap-1 pb-2 justify-center items-center cursor-pointer careerCat relative"
                        onclick='showCareer(0, this)'>
                        <div class="absolute -top-1 -left-8 rotate-45 hidden arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                <path fill="#eb3254"
                                    d="M512 176c0-35.3-28.7-64-64-64l-188.8 0c-3.6-5.2-7.6-10.2-11.9-14.9L228.8 76.8C212.1 58.5 188.5 48 163.7 48l-10.2 0C99.5 48 49.5 76.7 22.2 123.4L20.7 126C7.1 149.3 0 175.7 0 202.6L0 328c0 66.3 53.7 120 120 120l8 0 96 0c35.3 0 64-28.7 64-64c0-2.8-.2-5.6-.5-8.3c19.4-11 32.5-31.8 32.5-55.7c0-5.3-.7-10.5-1.9-15.5c20.2-10.8 33.9-32 33.9-56.5c0-2.7-.2-5.4-.5-8l96.5 0c35.3 0 64-28.7 64-64zm-64-16c8.8 0 16 7.2 16 16s-7.2 16-16 16l-136 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16l-8 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16c-9.1 0-17.4 5.1-21.5 13.3s-3.2 17.9 2.3 25.1c2 2.7 3.2 6 3.2 9.6c0 8.8-7.2 16-16 16l-96 0-8 0c-39.8 0-72-32.2-72-72l0-125.4c0-18.4 4.9-36.5 14.2-52.4l-20-11.7 20 11.7 1.5-2.6c18.6-32 52.8-51.6 89.8-51.6l10.2 0c11.3 0 22 4.8 29.6 13.1L210.5 128 168 128c-8.8 0-16 7.2-16 16s7.2 16 16 16l78 0 2 0 200 0z" />
                            </svg>
                        </div>
                        <div class="size-20 rounded-md border border-gray-300 p-2 overflow-hidden">
                            <img class="h-full w-full rounded-lg object-cover"
                                src="{{ asset('assets/img/cash-machine.png') }}" alt="career category icon">
                        </div>
                        <span class="text-xs font-medium text-center">همه</span>
                    </div>
                    @foreach ($careerCategories as $careerCategory)
                        @if (count($careerCategory->careers))
                            @if ($careerCategory->show_in_home == 1)
                                <div class="flex flex-col gap-1 pb-2 justify-center items-center cursor-pointer careerCat relative"
                                    onclick='showCareer({{ $careerCategory->id }}, this)'>
                                    <div class="absolute -top-1 -left-8 rotate-45 hidden arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                            <path fill="#eb3254"
                                                d="M512 176c0-35.3-28.7-64-64-64l-188.8 0c-3.6-5.2-7.6-10.2-11.9-14.9L228.8 76.8C212.1 58.5 188.5 48 163.7 48l-10.2 0C99.5 48 49.5 76.7 22.2 123.4L20.7 126C7.1 149.3 0 175.7 0 202.6L0 328c0 66.3 53.7 120 120 120l8 0 96 0c35.3 0 64-28.7 64-64c0-2.8-.2-5.6-.5-8.3c19.4-11 32.5-31.8 32.5-55.7c0-5.3-.7-10.5-1.9-15.5c20.2-10.8 33.9-32 33.9-56.5c0-2.7-.2-5.4-.5-8l96.5 0c35.3 0 64-28.7 64-64zm-64-16c8.8 0 16 7.2 16 16s-7.2 16-16 16l-136 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16l-8 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16c-9.1 0-17.4 5.1-21.5 13.3s-3.2 17.9 2.3 25.1c2 2.7 3.2 6 3.2 9.6c0 8.8-7.2 16-16 16l-96 0-8 0c-39.8 0-72-32.2-72-72l0-125.4c0-18.4 4.9-36.5 14.2-52.4l-20-11.7 20 11.7 1.5-2.6c18.6-32 52.8-51.6 89.8-51.6l10.2 0c11.3 0 22 4.8 29.6 13.1L210.5 128 168 128c-8.8 0-16 7.2-16 16s7.2 16 16 16l78 0 2 0 200 0z" />
                                        </svg>
                                    </div>
                                    <div class="size-20 rounded-md border border-gray-300 p-2 overflow-hidden">
                                        @if ($careerCategory->main_image)
                                            <img class="h-full w-full rounded-full object-cover"
                                                src="{{ asset('storage/' . $careerCategory->main_image) }}"
                                                alt="career category avatar">
                                        @else
                                            <img class="h-full w-full rounded-lg object-cover"
                                                src="{{ asset('assets/img/cash-machine.png') }}"
                                                alt="career category icon">
                                        @endif
                                    </div>
                                    <span class="text-xs font-medium text-center">{{ $careerCategory->title }}</span>
                                </div>
                            @endif
                        @endif
                    @endforeach

                </div>
            </div>

            <div class="flex flex-row justify-between items-center mt-5 mb-3">
                <h2 class="lg:text-xl text-sm font-bold" id="careerCatTitle">
                    کسب و کار ها
                </h2>
                <a class="text-[13px] text-[#eb3254] font-bold" href="{{ route('career.careersList') }}">مشاهده همه</a>
            </div>
            <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">

                @foreach ($careers as $career)
                    <div class="relative careers" data-index="{{ $career->career_category_id }}">
                        <!-- آیکون قلب در گوشه بالا سمت چپ -->
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 absolute top-2 right-2 cursor-pointer" onclick="favoriteCareer({{$career->id}},this)">
                        <path fill="gray" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                    </svg> --}}
                        <a href="{{ route('client.menu', [$career]) }}"
                            class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2">
                            <div class="w-full rounded-md overflow-hidden">
                                <img class="size-26 mx-auto rounded-[7px] object-cover"
                                    src="{{ asset('storage/' . $career->logo) }}" alt="career logo">
                            </div>
                            <span class="text-gray-500 text-sm font-medium">
                                {{ $career->title }}
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    <script>
        //    function favoriteCareer(id,el){
        //     // event.preventDefault();
        //     el.children[0].setAttribute('fill', 'red');

        //     $.ajaxSetup({
        //         headers:{
        //             'X-CSRF-TOKEN':"{{ csrf_token() }}"
        //         }
        //     });

        //     $.ajax({
        //         url:"{{ route('favoriteCareer.create') }}",
        //         type:'POST',
        //         dataType:'json',
        //         data:{'id':id},
        //         success:function(response){
        //             console.log("success")
        //         }

        //     })
        //    }
    </script>
@endsection
