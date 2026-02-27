@extends('client.document')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/tailwind.js') }}"></script>
@section('title', 'فامنو | منوی دیجیتال کسب و کار شما')
@section('content')
<style>
        .money{
            background: #86dbd8;
            background: linear-gradient(0deg, rgba(134, 219, 216, 1) 31%, rgba(89, 207, 203, 1) 80%);
        }
        .group{
            background: #ffbe6e;
            background: linear-gradient(0deg, rgba(255, 190, 110, 1) 31%, rgba(255, 160, 18, 1) 80%);
        }
        .group>img, .money>img{
            filter: drop-shadow(0 0 0.25rem white);
        }
    </style>
    <div class="items-center bg-white py-5 rounded-[20px] w-[95%] mx-auto">
        <div class="w-11/12 mx-auto flex flex-row gap-5">
            <a href="#"
               class="text-sm font-bold flex flex-col items-center rounded-3xl w-1/2 money text-white py-2 relative h-24">
                <img src="{{ asset('assets/img/income2.png') }}" class="size-24 absolute top-4 -right-5" alt="">
                <div class="absolute top-4 left-4 text-lg flex flex-col items-end gap-4">
                    <span>
                        درآمد زایی
                    </span>
                    <span class="text-xs font-bold">
                        کلیک کنید
                    </span>
                </div>
            </a>
            <a href="#"
               class="text-sm font-bold flex flex-col items-center rounded-3xl w-1/2 group text-white py-2 relative h-24">
                <img src="{{ asset('assets/img/group2.png') }}" class="size-26 absolute top-6 -right-5" alt="">
                <div class="absolute top-4 left-2 text-lg flex flex-col items-end gap-4">
                    <span>
                        خرید گروهی
                    </span>
                    <span class="text-xs font-bold">
                        کلیک کنید
                    </span>
                </div>
            </a>
        </div>
    </div>
    <div class="w-full pt-1 samim">


        <section>
            {{-- <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">پیشنهادات ویژه</h1>
                <a class="text-[13px] text-[#00a692]" href="#">مشاهده همه</a>
            </div> --}}
            <div class="my-3 bg-white p-5 rounded-[20px] w-[95%] mx-auto">

                <h2 class="lg:text-xl text-sm font-bold">
                    خدمات
                </h2>
                <div class="w-full grid grid-cols-4 gap-3 mt-7">
                    <a href="{{ route('printery') }}" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/printer.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                            چاپ
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/website.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                            طراحی سایت
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/globe.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                            زبان
                        </span>
                    </a>
                    <a href="{{ route('career.careersList') }}" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/food.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                            سفارش غذا
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/pc.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                            خدمات کامپیوتر
                        </span>
                    </a>
{{--                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">--}}
{{--                        <img src="{{ asset('assets/img/simCard.png') }}" class="size-10" alt="">--}}
{{--                        <span class="text-sm font-bold text-gray-800 text-center">--}}
{{--                            اینترنت و شارژ--}}
{{--                        </span>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">--}}
{{--                        <img src="{{ asset('assets/img/wall.png') }}" class="size-10" alt="">--}}
{{--                        <span class="text-sm font-bold text-gray-800 text-center">--}}
{{--                           دیوار شهر شما--}}
{{--                        </span>--}}
{{--                    </a>--}}
                </div>
            </div>
            <div class="my-3 bg-white p-5 rounded-[20px] w-[95%] mx-auto">
                <h2 class="lg:text-xl text-sm font-bold">
                    صفحه خودتو بساز
                </h2>
                <div class="w-full grid grid-cols-4 gap-3 mt-7">
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/shop.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                           فروشگاهی
                        </span>
                    </a>
                    <a href="{{ route('pages.create') }}" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/introduce.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                           معرفی
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/educate.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                           آموزشگاهی
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/menu.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                           منو دیجیتال
                        </span>
                    </a>
                </div>
            </div>
            <div class="w-[95%] mx-auto bg-[#00ae6f] h-14 lg:h-100 overflow-hidden rounded-lg my-3 flex flex-row">
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
            <div class="bg-white p-5 rounded-[20px] w-[95%] mx-auto my-3">
                <div class="flex flex-row justify-between items-center pt-1">
                    <div class="flex flex-row items-center gap-1.5">
                            <img src="{{ asset('assets/img/landingPage.png') }}" class="w-7" alt="">

                        <h3 class="lg:text-xl text-sm font-bold">صفحات</h3>
                    </div>
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
                                              d="M512 176c0-35.3-28.7-64-64-64l-188.8 0c-3.6-5.2-7.6-10.2-11.9-14.9L228.8 76.8C212.1 58.5 188.5 48 163.7 48l-10.2 0C99.5 48 49.5 76.7 22.2 123.4L20.7 126C7.1 149.3 0 175.7 0 202.6L0 328c0 66.3 53.7 120 120 120l8 0 96 0c35.3 0 64-28.7 64-64c0-2.8-.2-5.6-.5-8.3c19.4-11 32.5-31.8 32.5-55.7c0-5.3-.7-10.5-1.9-15.5c20.2-10.8 33.9-32 33.9-56.5c0-2.7-.2-5.4-.5-8l96.5 0c35.3 0 64-28.7 64-64zm-64-16c8.8 0 16 7.2 16 16s-7.2 16-16 16l-136 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16l-8 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16c-9.1 0-17.4 5.1-21.5 13.3s-3.2 17.9 2.3 25.1c2 2.7 3.2 6 3.2 9.6c0 8.8-7.2 16-16 16l-96 0-8 0c-39.8 0-72-32.2-72-72l0-125.4c0-18.4 4.9-36.5 14.2-52.4l-20-11.7 20 11.7 1.5-2.6c18.6-32 52.8-51.6 89.8-51.6l10.2 0c11.3 0 22 4.8 29.6 13.1L210.5 128 168 128c-8.8 0-16 7.2-16 16s7.2 16 16 16l78 0 2 0 200 0z"/>
                                    </svg>
                                </div>
                                <div class="size-20 rounded-md border border-gray-300 p-2 overflow-hidden">
                                    @if ($page->logo_path)
                                        <img class="h-full w-full rounded-full object-cover"
                                             src="{{ asset('storage/' . $page->logo_path) }}"
                                             alt="career category avatar">
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
            <div class="bg-white p-5 rounded-[20px] w-[95%] mx-auto my-3">
                <div class="flex flex-row justify-between items-center pt-1">
                    <div class="flex flex-row items-center gap-1">
                            <img src="{{ asset('assets/img/apps.png') }}" class="w-7" alt="">

                    <h2 class="lg:text-xl text-sm font-bold"> دسته بندی کسب و کارها</h2>

                    </div>
                    <a class="text-[13px] text-[#eb3254] font-bold" href="{{ route('career.careersCategories') }}">مشاهده
                        همه</a>
                </div>
                <div class="flex flex-row gap-3 py-4 overflow-x-auto overflow-y-clip" style="scrollbar-width: none;">
                    <div class="flex flex-col gap-1 pb-2 justify-center items-center cursor-pointer careerCat relative"
                         onclick='showCareer(0, this)'>
                        <div class="absolute -top-1 -left-8 rotate-45 hidden arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                <path fill="#eb3254"
                                      d="M512 176c0-35.3-28.7-64-64-64l-188.8 0c-3.6-5.2-7.6-10.2-11.9-14.9L228.8 76.8C212.1 58.5 188.5 48 163.7 48l-10.2 0C99.5 48 49.5 76.7 22.2 123.4L20.7 126C7.1 149.3 0 175.7 0 202.6L0 328c0 66.3 53.7 120 120 120l8 0 96 0c35.3 0 64-28.7 64-64c0-2.8-.2-5.6-.5-8.3c19.4-11 32.5-31.8 32.5-55.7c0-5.3-.7-10.5-1.9-15.5c20.2-10.8 33.9-32 33.9-56.5c0-2.7-.2-5.4-.5-8l96.5 0c35.3 0 64-28.7 64-64zm-64-16c8.8 0 16 7.2 16 16s-7.2 16-16 16l-136 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16l-8 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16c-9.1 0-17.4 5.1-21.5 13.3s-3.2 17.9 2.3 25.1c2 2.7 3.2 6 3.2 9.6c0 8.8-7.2 16-16 16l-96 0-8 0c-39.8 0-72-32.2-72-72l0-125.4c0-18.4 4.9-36.5 14.2-52.4l-20-11.7 20 11.7 1.5-2.6c18.6-32 52.8-51.6 89.8-51.6l10.2 0c11.3 0 22 4.8 29.6 13.1L210.5 128 168 128c-8.8 0-16 7.2-16 16s7.2 16 16 16l78 0 2 0 200 0z"/>
                            </svg>
                        </div>
                        <div class="size-20 rounded-md border border-gray-300 p-2 overflow-hidden">
                            <img class="h-full w-full rounded-lg object-cover"
                                 src="{{ asset('assets/img/all.png') }}" alt="career category icon">
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
                                                  d="M512 176c0-35.3-28.7-64-64-64l-188.8 0c-3.6-5.2-7.6-10.2-11.9-14.9L228.8 76.8C212.1 58.5 188.5 48 163.7 48l-10.2 0C99.5 48 49.5 76.7 22.2 123.4L20.7 126C7.1 149.3 0 175.7 0 202.6L0 328c0 66.3 53.7 120 120 120l8 0 96 0c35.3 0 64-28.7 64-64c0-2.8-.2-5.6-.5-8.3c19.4-11 32.5-31.8 32.5-55.7c0-5.3-.7-10.5-1.9-15.5c20.2-10.8 33.9-32 33.9-56.5c0-2.7-.2-5.4-.5-8l96.5 0c35.3 0 64-28.7 64-64zm-64-16c8.8 0 16 7.2 16 16s-7.2 16-16 16l-136 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16l-8 0c-10.3 0-19.5 6.6-22.8 16.4s.1 20.6 8.3 26.8c3.9 3 6.4 7.6 6.4 12.8c0 8.8-7.2 16-16 16c-9.1 0-17.4 5.1-21.5 13.3s-3.2 17.9 2.3 25.1c2 2.7 3.2 6 3.2 9.6c0 8.8-7.2 16-16 16l-96 0-8 0c-39.8 0-72-32.2-72-72l0-125.4c0-18.4 4.9-36.5 14.2-52.4l-20-11.7 20 11.7 1.5-2.6c18.6-32 52.8-51.6 89.8-51.6l10.2 0c11.3 0 22 4.8 29.6 13.1L210.5 128 168 128c-8.8 0-16 7.2-16 16s7.2 16 16 16l78 0 2 0 200 0z"/>
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

            <div class="bg-white p-5 rounded-[20px] w-[95%] mx-auto my-3">
                <div class="flex flex-row justify-between items-center mt-5 mb-3">
                    <h1 class="lg:text-xl text-sm font-bold" id="careerCatTitle">
                      کسب و کار ها
                    </h1>
                    <a class="text-[13px] text-[#eb3254] font-bold" href="{{ route('career.careersList') }}">مشاهده همه</a>
                </div>
                <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4" id="favorite_section">
                   
                    <div class="fixed w-full h-dvh bg-black/50 flex justify-center items-center top-0 right-0 z-40 invisible opacity-0 form" id="openFavorite">
                        <div class="w-2/4 h-2/3 overflow-y-auto [&::-webkit-scrollbar]:hidden bg-white rounded-lg flex flex-row justify-center items-start p-4 gap-4">
                            <div class="cursor-pointer absolute top-4 right-4 text-4xl close_icon hover:bg-red-500 bg-white size-8 rounded-full flex items-center justify-center transition-all duration-200"
                            onclick="closeForm()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                <path fill="gray"
                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                                </svg>
                            </div>
                            <div class="w-full flex flex-col items-center gap-2">
                                <div class="size-8 bg-[#eb3254] rounded-full" onclick="openDropdown()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 lg:size-8" viewBox="0 0 448 512">
                                        <path fill="white"
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                    </svg>
                                </div>
                                <div class="w-full flex flex-col items-center" id="parentFavorite">
                                    
                                </div>
                                <div class="w-full flex flex-col gap-3 items-center" id="parentItems">
                                    <div class="w-full py-2 bg-[#eb3254] rounded-lg text-white text-center">
                                        کلی
                                    </div>
    
                                </div>
                                <div class="md:text-left text-center md:px-12 mt-5 lg:mt-30">
                                    <button class="px-4 py-2 bg-[#eb3254] text-white rounded-lg cursor-pointer" onclick="finalSave(event)">ثبت</button>
                                    {{-- <button class="px-4 py-2 bg-[#eb3254] text-white rounded-lg cursor-pointer" onclick='deleteFavorite("{{ $career->id }}"  , "career" ,event)'>حذف از علاقه مندی ها</button> --}}
                                </div>
                               
                            </div>
                            
                        </div>
                    </div>
                    
                    @foreach($careers as $career)
                    {{-- @if(count($career->favorites))
                    @dd($career->favorites)
                    @endif --}}
                    <div class="relative careers" data-index="{{ $career->career_category_id }}">
                        <!-- آیکون قلب در گوشه بالا سمت چپ -->
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 absolute top-1 right-1 cursor-pointer rotate-20 {{ count($career->favorites) ? 'fill-red-500' : 'fill-gray-500' }}" onclick='addToFavorite("{{ $career->id }}" , "career" , this)'>
                            <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                        </svg> --}}
                        {{-- @dd($career->favorites) --}}
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-5 absolute top-1  cursor-pointer  {{ count($career->favorites)  ? 'fill-red-500' : 'fill-gray-400' }}" onclick='addToFavorite("{{ $career->id }}" , "career" , this)'>
                        <path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/>
                        </svg>
    
                        <a href="{{ route('client.menu', [$career]) }}"
                            class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2">
                            <div class="w-full rounded-md overflow-hidden">
                                <img class="size-26 mx-auto rounded-[7px] object-cover"
                                    src="{{ asset('storage/'.$career->logo) }}" alt="career logo">
                            </div>
                            <span class="text-gray-500 text-sm font-medium">
                                {{ $career->title }}
                            </span>
                        </a>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </section>
    </div>
<script>
    let favoriteData = []
    let multipleFavorite = []
    let favoriteElement = null
    let parentItems = document.getElementById('parentItems')

    function closeForm() {
        let forms = document.querySelectorAll(".form")
        forms.forEach((form) => {
            form.classList.add('invisible')
            form.classList.add('opacity-0')
        })
        favoriteData = []
        multipleFavorite = []
    }

    function addToFavorite(item_id, favoriteType, el) {
        favoriteData = [item_id, favoriteType]
        multipleFavorite = []
        parentItems.innerHTML = ""
        let openFavorite = document.getElementById('openFavorite')
        favoriteElement = el
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        })

        $.ajax({
            url: "{{route('favorite.create')}}",
            type: 'POST',
            dataType: "json",
            data: {
                'item_id': item_id,
                'favoriteType': favoriteType
            },
            success: function(response) {
                if (response.code == "304") {
                    alert('لطفا ابتدا وارد شوید')
                    location.assign("{{ route('login') }}")
                } else {
                    response.all.forEach((item) => {
                        let el = document.createElement('div')
                        el.classList = "w-full flex flex-row items-center gap-3"
                        el.innerHTML = `
                            <div class="w-full py-2 bg-[#eb3254] rounded-lg text-white text-center">
                                ${item.title}
                            </div>
                        `
                        
                        let element = document.createElement('div')
                        element.classList = "flex flex-row items-center gap-3"
                        element.innerHTML = `
                        <div class="p-1.5 rounded-md bg-red-500 cursor-pointer categoryIdElements" 
                             onclick='categoryIdElements(this)' 
                             data-cat-id="${item.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-4">
                                <path fill="white" d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/>
                            </svg>
                        </div>
                        <div class="p-1.5 rounded-md bg-red-500 cursor-pointer" data-category-id="${item.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" onclick='deleteFavoriteCat(this)' viewBox="0 0 448 512">
                                <path fill="white"
                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                            </svg>
                        </div>
                        `
                        el.appendChild(element)
                        parentItems.appendChild(el)

                        // اگر این دسته قبلا انتخاب شده
                        let found = false
                        for (let i = 0; i < response.favorite.length; i++) {
                            if (response.favorite[i].cat_id == item.id) {
                                found = true
                            }
                        }
                        
                        if (found) {
                            let catElement = element.querySelector('.categoryIdElements')
                            if (catElement) {
                                catElement.classList.remove('bg-red-500')
                                catElement.classList.add('bg-green-600')
                                // جلوگیری از اضافه شدن تکراری
                                let alreadyExists = false
                                for (let j = 0; j < multipleFavorite.length; j++) {
                                    if (multipleFavorite[j] == item.id) {
                                        alreadyExists = true
                                    }
                                }
                                if (!alreadyExists) {
                                    multipleFavorite.push(item.id)
                                }
                            }
                        }
                    })

                    openFavorite.classList.remove('invisible')
                    openFavorite.classList.remove('opacity-0')
                }
            },
            error: function() {
                alert('خطا در ارسال داده')
            }
        })
    }

    let parentFavorite = document.getElementById('parentFavorite')

    function openDropdown() {
        parentFavorite.innerHTML = `
        <form action="#" method="post">
            <div class="flex flex-row justify-center items-center">
                <input type="text" class="w-10/12 py-1 px-3 rounded-lg outline-none border-1 border-gray-300" placeholder="عنوان دسته" id="categoryTitle">
                <button class="w-2/12 h-full rounded-lg text-xl" onclick="addItem(event)">✅</button>
            </div>
        </form>
        `
    }

    function addItem(ev) {
        ev.preventDefault()
        let titleCat = document.getElementById('categoryTitle')
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        
        $.ajax({
            url: "{{ route('favoriteCategory.store') }}",
            type: "POST",
            dataType: "json",
            data: {
                'title': titleCat.value
            },
            success: function(data) {
                if (data.id) {
                    favoriteData.push(data.id)
                }
                
                let el = document.createElement('div')
                el.classList = "w-full flex flex-row items-center gap-3"
                el.innerHTML = `
                <div class="w-full py-2 bg-[#eb3254] rounded-lg text-white text-center">
                    ${data.title}
                </div>
                <div class="flex flex-row items-center gap-3">
                    <div class="p-1.5 rounded-md bg-red-500 cursor-pointer categoryIdElements" 
                         onclick='categoryIdElements(this)' 
                         data-cat-id="${data.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-4">
                            <path fill="white" d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/>
                        </svg>
                    </div>
                    <div class="p-1.5 rounded-md bg-red-500 cursor-pointer" data-category-id="${data.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" onclick='deleteFavoriteCat(this)' viewBox="0 0 448 512">
                            <path fill="white"
                                d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                        </svg>
                    </div>
                </div>
                `
                parentItems.appendChild(el)
                titleCat.value = ''
            },
            error: function() {
                alert('خطا در ارسال داده')
            }
        })
    }

   function finalSave(ev) {
    ev.preventDefault()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    })
    $.ajax({
        url: "{{ route('favorite.store') }}",
        type: "POST",
        dataType: "json",
        data: {
            'favoriteDataArray': favoriteData,
            'multipleFavorite': multipleFavorite
        },
        success: function(data) {
            if (multipleFavorite.length === 0) {
                favoriteElement.classList.remove('fill-red-500')
                favoriteElement.classList.add('fill-gray-400')
            } else {
                favoriteElement.classList.remove('fill-gray-400')
                favoriteElement.classList.add('fill-red-500')
            }
            
            favoriteData = []
            multipleFavorite = []
            closeForm()
        },
        error: function() {
            alert('خطا در ارسال داده')
        }
    })
}

    function categoryIdElements(el) {
        const catId = el.getAttribute('data-cat-id')
        
        if (el.classList.contains('bg-red-500')) {
            let exists = false
            for (let i = 0; i < multipleFavorite.length; i++) {
                if (multipleFavorite[i] == catId) {
                    exists = true
                 
                }
            }
            if (!exists) {
                multipleFavorite.push(catId)
            }
            el.classList.remove('bg-red-500')
            el.classList.add('bg-green-600')
        } else {
    
            let newArray = []
            for (let i = 0; i < multipleFavorite.length; i++) {
                if (multipleFavorite[i] != catId) {
                    newArray.push(multipleFavorite[i])
                }
            }
            multipleFavorite = newArray
            el.classList.remove('bg-green-600')
            el.classList.add('bg-red-500')
        }
    }

    function deleteFavorite(item_id, type, ev) {
        ev.preventDefault()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ route('favorite.delete') }}",
            type: "POST",
            dataType: "json",
            data: {
                'item_id': item_id,
                'favoriteType': type
            },
            success: function(data) {
                favoriteElement.classList.remove('fill-red-500')
                favoriteElement.classList.add('fill-gray-400')
                closeForm()
            },
            error: function() {
                alert('خطا در ارسال داده')
            }
        })
    }

    function deleteFavoriteCat(el) {
        let cat_id = el.parentElement.getAttribute('data-category-id')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ route('favoriteCategory.delete') }}",
            type: "POST",
            dataType: "json",
            data: {
                'cat_id': cat_id,
            },
            success: function(data) {
                el.parentElement.parentElement.parentElement.remove()
            },
            error: function() {
                alert('خطا در ارسال داده')
            }
        })
    }
</script>
@endsection
