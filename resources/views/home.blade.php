@extends('client.document')
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
@section('title', 'فامنو | منوی دیجیتال کسب و کار شما')
@section('content')

    <div class="items-center bg-white p-5 rounded-[20px] w-[95%] mx-auto">
        <div class="w-11/12 mx-auto flex flex-row justify-between">
            <a href="#"
               class="text-sm font-bold text-gray-600 w-20 flex justify-center py-1 border-1 border-gray-300 rounded-lg">انتخاب
                شهر</a>
            <a href="#"
               class="text-sm font-bold text-gray-600 w-20 flex justify-center py-1 border-1 border-gray-300 rounded-lg">درآمد
                زایی</a>
            <a href="#"
               class="text-sm font-bold text-gray-600 w-20 flex justify-center py-1 border-1 border-gray-300 rounded-lg">خرید
                گروهی</a>
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
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
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
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
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
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/simCard.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                            اینترنت و شارژ
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/wall.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                           دیوار شهر شما
                        </span>
                    </a>
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
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/introduce.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                           معرفی
                        </span>
                    </a>
                    <a href="#" class="flex flex-col items-center gap-2 border-1 border-gray-300 rounded-lg py-1.5">
                        <img src="{{ asset('assets/img/educate.png') }}" class="size-10" alt="">
                        <span class="text-sm font-bold text-gray-800 text-center">
                           دوره
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

            <div class="bg-white p-5 rounded-[20px] w-[95%] mx-auto">
                <div class="flex flex-row justify-between items-center mt-5 mb-3">
                    <h2 class="lg:text-xl text-sm font-bold" id="careerCatTitle">
                        کسب و کار ها
                    </h2>
                    <a class="text-[13px] text-[#eb3254] font-bold" href="{{ route('career.careersList') }}">مشاهده
                        همه</a>
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
