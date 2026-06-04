@extends('client.document')
@section('title')
    رینگا | {{ $career->title }}
@endsection
@section('content')

    <style>
        @import url('{{asset('assets/css/fontiran.css')}}');

        * {
            font-family: IRANSansX;
        }

        .shadow_box {
            box-shadow: 0px 0px 1px 1px #ebebeb;
        }

        .selected_shadow_box {
            box-shadow: 0px 0px 1px 1px var(--primary-color);
        }

        .through::after {
            content: '';
            position: absolute;
            height: 1px;
            width: 100%;
            background-color: gray;
            top: 35%;
        }

        .through {
            font-size: 8px !important;
        }
    </style>

    <div class="w-full px-5 flex flex-row items-center justify-between pt-3">
        <div class="w-1/2 flex flex-col gap-3">
            <div class="w-full @if(Auth::check() && count($orders)) block @else hidden @endif p-1 lg:p-3 text-xs lg:text-sm h-full font-medium"
                 id="orderLink">
                <div class="text-sky-700 cursor-pointer" onclick="orders('open')">سفارشات من</div>
            </div>

            @include('client.xMamad')
        </div>
    </div>
    <!-- hossain start -->
    <section class="flex justify-center items-center flex-col gap-3 pt-3">
        <div class="flex w-11/12 bg-black justify-between h-28 rounded-2xl overflow-hidden py-1 pr-1">
            <div class="w-7/12 bg-[#09132c] p-3 relative">
                <div class="absolute h-full w-20 bg-gradient-to-l from-[#09132c] -left-16 top-0"></div>
                <div class="flex flex-col gap-2">
                    <h1 class="text-[#d7d9e8] font-bold">{{ $career->title }}</h1>
                    <span class="text-[#aeb5c0] text-[.5rem] text-nowrap">{{ $career->description }}</span>
                    <div class="flex gap-4 py-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-3 fill-white">
                            <path d="M352 192c0-88.4-71.6-160-160-160S32 103.6 32 192c0 20.2 9.1 48.6 26.5 82.7c16.9 33.2 39.9 68.2 63.4 100.5c23.4 32.2 46.9 61 64.5 81.9c1.9 2.3 3.8 4.5 5.6 6.6c1.8-2.1 3.6-4.3 5.6-6.6c17.7-20.8 41.1-49.7 64.5-81.9c23.5-32.3 46.4-67.3 63.4-100.5C342.9 240.6 352 212.2 352 192zm32 0c0 88.8-120.7 237.9-170.7 295.9C200.2 503.1 192 512 192 512s-8.2-8.9-21.3-24.1C120.7 429.9 0 280.8 0 192C0 86 86 0 192 0S384 86 384 192zm-240 0a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 80a80 80 0 1 1 0-160 80 80 0 1 1 0 160z"/>
                        </svg>
                        <span class="text-[.47rem] text-[#aeb5c0] mb-1">
                            {{ $career->province.', '.$career->city.', '.$career->address }}
                    </span>
                    </div>
                </div>
            </div>
            <div class="min-w-53 max-w-53">
                <img class="rounded-xl bg-cover"
                     src="{{ $career->banner ? asset('storage/' . $career->banner) : asset('assets/img/a655ade8-91c6-4d98-8c36-35533450ab63.png')}}"
                     alt="">
            </div>
        </div>
        <div class="w-11/12 flex justify-between items-center">
            <div class="w-9/12 shadow_box rounded-full flex p-2 gap-2 px-3 items-center">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-[14px]">
                        <path d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z"/>
                    </svg>
                </button>
                <input type="text" class="outline-none w-full text-xs" placeholder="جستوجو در منو...   ">
            </div>
            <div class="w-4/24 shadow_box rounded-full p-2 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none" class="size-4">
                    <path d="M4 7H20"
                          stroke="#1D2433"
                          stroke-width="2"
                          stroke-linecap="round"/>
                    <path d="M4 17H20"
                          stroke="#1D2433"
                          stroke-width="2"
                          stroke-linecap="round"/>
                    <circle cx="9" cy="7" r="2"
                            stroke="#1D2433"
                            stroke-width="2"/>
                    <circle cx="15" cy="17" r="2"
                            stroke="#1D2433"
                            stroke-width="2"/>
                </svg>
                <span class="text-[.7rem]">فیلتر</span>
            </div>
        </div>
        <div class="w-11/12 flex gap-2 items-center overflow-x-auto p-1" style="scrollbar-width: thin;">
            @foreach($career->menus as $menu)
                <div class="flex gap-1 items-center rounded-full shadow_box menus py-1.5 px-2.5 cursor-pointer @if($career->menus[0]->id == $menu->id) bg-white border-1 border-(--primary-color) @endif menuParent" data-menu-id="{{ $menu->id }}"
                     onclick='showMenu(this, "{{ $menu->id }}")'>

                    <span class="text-[.6rem] font-bold">{{ $menu->title }}</span>
                </div>
            @endforeach
        </div>
    </section>


    <!-- hossain end -->

    <!-- mahdi start -->
    <div class="w-full flex flex-col items-center gap-5">
        <section class="w-11/12 gap-2 rounded-xl flex flex-col items-center mt-2" id="menuItemList">
            @foreach($career->menus as $menu)
                @if($career->menus[0]->id == $menu->id)
                    @foreach($menu->menu_items as $item)
                        @php
                            $userCart = $item->load([
                                'carts' => function ($query) {
                                    $query
                                        ->whereNull('order_id')
                                        ->where('user_id', Auth::id());
                                },
                            ]);
                        @endphp
                        <div class="w-full px-2 py-1.5 bg-white rounded-xl flex justify-between items-center shadow_box menuItems" data-menu-item-id="{{ $item->id }}">
                            <div class="w-full flex gap-3 items-center relative border-l-1 border-[#f3f3f3]">
                                <div class="w-7/12 relative">
                                    @if($item->percent != 0 || $item->percent != null)
                                        <div class="absolute right-0">
                                            <svg width="64" height="78" viewBox="0 0 64 78" class="size-8 rotate-180">
                                                <path d="M8 0H56V60L32 78L8 60Z" fill="#FF8A00"/>
                                                <circle cx="32" cy="58" r="4" fill="white" opacity="0.9"/>
                                                <text x="53" class="in-fa" y="10" textAnchor="middle" rotate="180"
                                                      fontSize="20" fontWeight="700" fill="white"
                                                      class="">{{ '%'.strrev($item->percent) }}</text>
                                            </svg>
                                        </div>
                                    @endif
                                    <img src="{{ $item->image ? asset('storage/'.$item->image) : asset('storage/resturan_img/807c88cc-7948-4f75-88e5-4c4598ab8175_1767800481_6872954f6e4630ba6c0eda84b2ca1882.jpg')}}"
                                         alt="" class="w-full min-h-24 max-h-24 rounded-xl">
                                </div>
                                <div class="w-full flex h-full flex-col gap-1 items-start">
                                    <div class="w-full flex gap-1 items-center">
                                        <span class="w-[7px] h-[7px] rounded-full bg-[#f6911e]"></span>
                                        <h3 class="text-[14px] font-bold">{{ $item->title }}</h3>
                                    </div>
                                    <div class="flex flex-row items-center gap-2">
                                        <div class="flex gap-1 relative @if($item->discount != 0) through @endif">
                                            <span class="text-[10px] text-[#f6911e] in-fa">{{ number_format($item->price) }}</span>
                                            <span class="text-[10px] text-[#f6911e] @if($item->discount != 0) hidden @endif">تومان</span>
                                        </div>
                                        <div class="flex gap-1 relative @if($item->discount == 0) hidden @endif">
                                            <span class="text-[10px] text-[#f6911e] font-bold in-fa">{{ number_format($item->discount) }}</span>
                                            <span class="text-[10px] text-[#f6911e]">تومان</span>
                                        </div>
                                    </div>
                                    <p class="text-[10px] text-[#6B7280] mt-0.5">{{ $item->description }}</p>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#f5d4ae] text-[#f6911e]">محبوب ها</span>
                                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                                        <span class="px-1.5 py-0.5 rounded-full text-[9px] bg-[#F3F3F3] ">محبوب ها</span>
                                    </div>
                                    <div class="w-full flex items-center gap-1 justify-end pl-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-3"
                                                 fill="#6B7280">
                                                <path d="M53.9 186.1C19.4 220.6 0 267.4 0 316.2v11.5C0 429.5 82.5 512 184.3 512h15.1C301.4 512 384 429.4 384 327.4c0-66.1-27.1-129.2-74.9-174.8L225.9 73.5c-6.3-6-9.9-14.4-9.9-23.2v-13-16C216 9.6 206.4 0 194.7 0c-6.7 0-13 3.2-17.1 8.5L168 21.3l-9.9 13.2c-14.4 19.3-23.2 42.2-25.2 66.2l-.9 10.8c-.3 3.9-.5 7.8-.4 11.7c.2 22.9 6.6 45.4 18.4 65c2.2 3.7 4.6 7.2 7.2 10.6L168 213.3l21.2 28.3c7 9.3 10.8 20.7 10.8 32.4v14c0 22.1-17.9 40-40 40s-40-17.9-40-40V229.3v-2.5V188.3c0-15.6-12.7-28.3-28.3-28.3c-1.3 0-2.6 .1-3.9 .3c-6 .8-11.7 3.6-16.1 8L53.9 186.1zm18.1 53V288c0 48.6 39.4 88 88 88s88-39.4 88-88V274c0-22.1-7.2-43.5-20.4-61.2l-32-42.7c-11.8-15.7-17.4-35.1-15.7-54.6l.9-10.8c.3-3.1 .7-6.1 1.3-9.1c3.1 4.5 6.7 8.8 10.8 12.6L276 187.4c38.3 36.5 60 87.1 60 140C336 402.9 274.9 464 199.4 464H184.3C109 464 48 403 48 327.7V316.2c0-27.7 8.5-54.6 24-77.2z"/>
                                            </svg>
                                        </div>
                                        <span class="text-[8px] text-[#6B7280]">گالری</span>
                                        <span class="text-[8px] text-[#6B7280]">120</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-1 items-center">
                                <div class="h-full flex flex-col gap-2 items-center justify-between px-1 count" data-item-id="{{ $item->id }}">
                                    @if (Auth::check() && count($currentUser->carts) && $item->quantity)
                                        <button class="size-6 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md changeButton cursor-pointer" onclick="setCount(this, '+', {{ $item->id }})">
                                            <span class="text-2xl text-white">+</span>
                                        </button>
                                        <input type="number" readonly min="1" value="{{ $item->quantity }}" class="size-6 text-center font-bold text-xs text-(--secondary-text-color) outline-none" name="" id="">
                                        <button class="size-6 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md changeButton cursor-pointer" onclick="setCount(this, '-', {{ $item->id }})">
                                            <span class="text-2xl text-white">
                                                @if ($userCart->carts[0]->quantity > 1)
                                                    -
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="size-[14px]"
                                                         viewBox="0 0 448 512">
                                                        <path fill="white"
                                                              d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z" />
                                                    </svg>
                                                @endif
                                            </span>
                                        </button>
                                    @else
                                        <div class="size-7 pt-1 bg-[#f6911e] flex justify-center items-center rounded-md changeButton cursor-pointer" onclick='addToCart(this, "{{ $item->id }}")'>
                                            <span class="text-2xl text-white">+</span>
                                        </div>
                                    @endif
{{--                                    <div class="size-7 bg-[#F3F3F3] flex justify-center items-center rounded-md">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4">--}}
{{--                                            <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="size-7 bg-[#F3F3F3] flex justify-center items-center rounded-md">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                                             width="24"--}}
{{--                                             height="24"--}}
{{--                                             viewBox="0 0 24 24">--}}
{{--                                            <circle cx="6" cy="12" r="2" fill="#1D2433"/>--}}
{{--                                            <circle cx="12" cy="12" r="2" fill="#1D2433"/>--}}
{{--                                            <circle cx="18" cy="12" r="2" fill="#1D2433"/>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach


        </section>
    </div>

    <div id="authenticationDiv"
         class="fixed w-full h-dvh bg-black/50 backdrop-blur-sm top-0 right-0 flex justify-center items-center transition-all duration-300 opacity-0 invisible">

        <div class="w-3/4 bg-white rounded-sm p-3 transition-all duration-300 delay-100 scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                 onclick="closeLoginForm()" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>
            <h3 class="text-center text-sm font-bold text-gray-800">ابتدا وارد شوید</h3>
            <form action="{{ route('user.check') }}" class="flex flex-col items-center my-6 gap-3 w-full"
                  method="post" id="loginForm">
                @csrf
                <input type="number"
                       class="placeholder-gray-400 focus:border-1 focus:border-(--primary-color) p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                       name="phoneNumber" id="phoneNumber" placeholder="شماره تلفن" required>
                <div class="w-full" id="login">
                    <div class="w-full flex flex-row items-center gap-3">
                        <input type="number"
                               class="w-8/12 p-2 placeholder-gray-400 focus:border-(--primary-color) md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                               name="code" placeholder="کد" required id="code">
                        <button type="button"
                                class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-(--primary-color) hover:bg-(--hover-primary-color) text-white cursor-pointer"
                                onclick="sendCode()" id="countDown">ارسال کد
                        </button>
                    </div>
                </div>
                <div class="w-full flex flex-row items-center justify-between" id="loginWay">
                    <a href="{{ route('forget_password') }}"
                       class="text-(--primary-color) inline-block max-md:my-1 my-4 max-md:text-sm">فراموشی رمز عبور</a>
                    <span class="text-(--primary-color) inline-block max-md:my-1 my-4 max-md:text-sm cursor-pointer"
                          onclick="loginWithPassKey(this)">ورود با رمز عبور</span>
                </div>
                <button onclick="check(event)"
                        class="focus:bg-(--primary-color) hover:bg-(--primary-color) transition-all duration-400 text-center w-full bg-(--primary-color) p-2 md:p-3 rounded-[10px] text-white cursor-pointer">
                    ورود
                </button>
                <div class="w-full text-center">
                            <span class="text-[#4B5675] mt-1 md:mt-5 max-md:text-sm">
                                هنوز عضو نشدی؟
                                <a href="{{ route('signup') }}" class="text-(--primary-color) mr-2">ثبت نام!</a>
                            </span>
                </div>
            </form>
        </div>
    </div>

    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-3/4 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500 z-99999999"
         id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer"
                 onclick="showMessage('close')" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>

        </div>
    </div>
{{--    @include('newMenuJs')--}}
    <div id="cartList"
         class="w-full fixed lg:hidden top-0 right-0 transition-all duration-300 z-5 max-h-0 overflow-hidden bg-white">
        <div class="flex flex-row justify-between items-center pt-3 px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                 onclick="openShoppingCart('phoneClose')" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>
            <div class="flex flex-row items-cetner justify-end gap-3">
                <div class="w-[97px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                    <button class="w-full px-3 h-full flex flex-row justify-center items-center bg-red-500 rounded text-white text-sm lg:text-base cursor-pointer"
                            onclick="deleteShoppingCart(this)">لغو سفارشات
                    </button>
                </div>
                <div class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                    <button class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer"
                            onclick="openAddressForm()"> ثبت سفارش
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full transition-all duration-300 flex flex-col items-center gap-3 p-5 overflow-y-auto"></div>
    </div>

    <div id="orderList"
         class="w-full fixed lg:hidden bottom-0 right-0 transition-all h-dvh duration-300 invisible opacity-0 z-5 bg-black/50 flex justify-center items-center">

        <div class="w-11/12 mx-auto rounded bg-white">
            <div class="w-full transition-all duration-300 flex flex-col items-center gap-3 relative">
                <div class="absolute -top-2 -right-2 bg-white rounded-full z-555">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                         onclick="orders('close')" viewBox="0 0 384 512">
                        <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                    </svg>
                </div>
                <div class="w-full shadow-md overflow-y-auto max-h-[500px]" style="scrollbar-width: thin;">
                    <div class="w-full rounded overflow-x-auto lg:overflow-visible" style="scrollbar-width: thin;">
                        <div
                                class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="block w-10 lg:w-full text-center">ردیف</span>
                            </div>
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                                <span class="block w-30 lg:w-full">شناسه سفارش</span>
                            </div>
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-4">
                                <span class="block w-[180px] lg:w-full">آدرس</span>
                            </div>
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-4">
                                <span class="block w-[130px] lg:w-full">وضعیت سفارش</span>
                            </div>
                        </div>
                        <div class="bg-white divide-y divide-[#f1f1f4] pb-4"></div>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <div id="setAddress"
         class="fixed w-full h-[calc(100vh-45px)] bg-black/50 backdrop-blur-sm top-0 right-0 flex justify-center items-center transition-all duration-300 z-99999 opacity-0 invisible section">
        <div class="w-3/4 bg-white rounded-sm p-3 transition-all duration-300 delay-100 scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                 onclick="closeSection()" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>
            <h3 class="text-center text-sm font-bold text-gray-800">انتخاب آدرس</h3>
            <div class="flex flex-col items-center mt-6 gap-3 w-full">
                <select name="address" id="address" onchange="setOrder('address')"
                        class="w-full font-bold px-2 py-1 md:px-2 outline-none text-gray-500 cursor-pointer border-1 border-gray-300 rounded-md @if(Auth::check() && !count(Auth::user()->addresses)) hidden @endif">
                    <option>انتخاب کنید</option>
                    @if(Auth::check())
                        @foreach (Auth::user()->addresses as $address)
                            <option value="{{ $address->id }}">{{ $address->address }}</option>
                        @endforeach
                    @endif
                </select>
                <div class="flex flex-col items-center my-6 gap-3 w-full">
                        <textarea
                                class="placeholder-gray-400 focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                                name="newAddress" placeholder="آدرس خود را وارد کنید" id="newAddress"></textarea>
                    <button onclick="saveAddress()"
                            class="focus:bg-[#eb3254] hover:bg-[#eb3254] transition-all duration-400 text-center w-full bg-[#eb3254] p-2 md:p-3 rounded-[10px] text-white cursor-pointer">
                        ثبت
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="sendWay"
         class="fixed w-full h-[calc(100vh-45px)] bg-black/50 backdrop-blur-sm top-0 right-0 flex justify-center items-center transition-all duration-300 z-99999 opacity-0 invisible section">
        <div class="w-3/4 bg-white rounded-sm p-3 transition-all duration-300 delay-100 scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                 onclick="closeSection()" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>
            {{-- <h3 class="text-sm font-bold text-center">انتخاب شیوه ارسال</h3> --}}
            <div class="w-full flex flex-col items-center gap-3 mt-6">
                {{-- <div class="w-full text-center py-2 border-1 text-sm font-bold border-gray-300 rounded-md cursor-pointer"
                     onclick="setAddress()">انتخاب آدرس
                </div> --}}
                <select onchange="setOrder('slug', this)"
                        class="w-full font-bold px-2 py-1 md:px-2 outline-none text-gray-500 cursor-pointer border-1 border-gray-300 rounded-md @if(Auth::check() && !count(Auth::user()->addresses)) hidden @endif">
                    <option>انتخاب میز</option>
                    @foreach ($career->qr_codes as $table)
                        <option value="{{ $table->slug }}" @if($slug && $table->slug == $slug) selected @endif>{{ $table->description }}</option>
                    @endforeach
                </select>
                @if($slug)
                    <div class="w-full text-center py-2 border-1 text-sm font-bold border-gray-300 rounded-md cursor-pointer"
                         onclick="setOrder('slug')">
                        سرو در
                        @php
                            $tableName = $career->qr_codes->where('slug', $slug)->first();
                        @endphp
                        {{ $tableName->description }}
                    </div>
                @endif
                {{--                    <div class="w-full text-center py-2 border-1 text-sm font-bold border-gray-300 rounded-md cursor-pointer"--}}
                {{--                         onclick="setOrder('address', this)">--}}
                {{--                         تحویل در محل--}}
                {{--                    </div>--}}
            </div>
        </div>
    </div>

@endsection