@extends('client.document')
@section('title')
    {{ 'فامنو | ' }}{{ $career->title }}
@endsection
@section('content')
    <div id="parentMenuPage" class="@if(Auth::check()) @if(count(Auth::user()->carts))mb-[100px]@endif @endif">
        <div class="w-full flex flex-row justify-between gap-3 py-3 lg:py-8 rounded-2xl">
            <div class="w-1/2 p-1 lg:p-3 text-xs lg:text-sm h-full font-medium">
                <a href="{{ route('show_career', [$career]) }}" class="text-sky-700">مشاهده جزئیات کسب وکار</a>
            </div>
            @if(Auth::check() && count(Auth::user()->orders))
                <div class="w-1/2 p-1 lg:p-3 text-xs lg:text-sm h-full font-medium">
                    <div class="text-sky-700 float-end cursor-pointer" onclick="orders('open')">سفارشات من</div>
                </div>
            @endif
        </div>
        <div class="w-full pt-4 lg:pt-16 pb-4 bg-[#F4F8F9]">
            <div class="pb-4 text-lg lg:text-3xl text-center font-bold">
                <h2>{{ $career->title }}</h2>
            </div>
            @if (!$career->banner)
                <img src="{{ asset('storage/images/banner01.jpg') }}"
                     class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="career banner">
            @else
                <img src="{{ asset('storage/' . $career->banner) }}"
                     class="w-11/12 h-[120px] sm:h-[180px] mx-auto rounded-md object-cover" alt="career banner">
            @endif
        </div>
        <div class="w-full py-3">
            <h3 class="w-11/12 mx-auto py-3 text-base font-bold lg:text-md">منو های {{ $career->title }}</h3>
            <div class="w-11/12 flex flex-row items-center gap-3 pb-3 mx-auto overflow-x-auto [&::-webkit-scrollbar]:hidden">
                @foreach ($career->menus as $menu)
                    <div class="cursor-pointer rounded-lg menuParent bg-white" title="{{ $menu->title }}"
                         onclick='showMenu(this, "{{ $menu->id }}")'>
                        <div class="w-20 gap-2 p-2 flex flex-col items-center">
                            <img class="size-10" src="{{ asset('storage/' . $menu->banner) }}" alt="menu image">
                            <span
                                    class="block w-full title_category_icon text-center truncate text-xs">{{ $menu->title }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @foreach ($career->menus as $menu)
            <div class="flex flex-col gap-3 mt-3 menus" data-menu-id="{{ $menu->id }}">
                @foreach ($menu->menu_categories as $category)
                    @if (count($category->menu_items))
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                            <!-- Category Header -->
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-2.5 lg:p-5 border-b border-gray-100 bg-gray-200">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/' . $category->image) }}"
                                         alt="{{ $category->title }}"
                                         class="size-14 rounded-lg object-cover border border-gray-200 shadow-sm bg-white">
                                    <div>
                                        <h2 class="lg:text-xl font-bold text-gray-800">{{ $category->title }}</h2>
                                        <p class="text-xs lg:text-sm text-gray-500 mt-1">{{ count($category->menu_items) }}
                                            آیتم</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Items List -->
                            <div class="p-2 lg:p-4">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                    @foreach ($category->menu_items as $item)
                                        <div class="w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative"
                                             data-menu-item-title="{{ $item->title }}">
                                            <!--<span class="absolute -top-1 -right-2 bg-[#eb3254] px-2 py-0.5 rounded text-sm text-white">ویژه</span>-->
                                            @if ($item->discount)
                                                <span class="text-xs text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">
                                                    {{ $item->percent }}%
                                                </span>
                                            @endif
                                            <div class="w-full flex items-center justify-between">
                                                <div class="w-full flex items-center gap-2 lg:gap-4 flex-1">
                                                    <img src="{{ asset('storage/' . $item->image) }}"
                                                         class="size-22 rounded-lg object-cover border border-gray-300"
                                                         alt="{{ $item->title }}">
                                                    <div class="flex-1 min-w-0 max-w-[100px]">
                                                        <h3 class="font-medium text-gray-800 truncate text-sm lg:text-base">{{ $item->title }}</h3>
                                                        <p class="text-sm text-gray-500 truncate mt-1 lg:text-sm">{{ $item->description }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-left pl-2 lg:pl-0 lg:ml-4 flex flex-col items-end gap-0.5 lg:gap-3">
                                                    <div class="flex flex-row items-center gap-3">

                                                        <div class="text-left flex flex-col items-end">
                                                            @if (!$item->discount)
                                                                <span class="font-bold text-xs lg:text-sm">{{ number_format($item->price) }} تومان</span>
                                                            @else
                                                                <span class="font-bold text-xs lg:text-sm">{{ number_format($item->discount) }} تومان</span>
                                                                <span class="text-gray-400 text-[10px] line-through lg:text-sm">{{ number_format($item->price) }} تومان</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @php
                                                        $userCart = $item->load(['carts' => function ($query) {
                                                                                    $query->whereNull('order_id')->where('user_id' , Auth::id());
                                                                                }]);

//                                                        dd($userCart->carts[0]->quantity);
                                                    @endphp
                                                    <div data-item-id="{{ $item->id }}">
                                                        @if((Auth::check() && count($currentUser->carts)) && count($userCart->carts))
                                                            <div class="relative w-16 lg:w-20">
                                                                <button class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                                        onclick="setCount(this, '+')">+
                                                                </button>
                                                                <input type="number"
                                                                       class="outline-none w-full rounded text-center text-sm py-1"
                                                                       min="1"
                                                                       value="{{ $userCart->carts[0]->quantity }}"
                                                                       disabled>
                                                                <button class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                                        onclick="setCount(this, '-')">
                                                                    @if($userCart->carts[0]->quantity > 1)
                                                                        -

                                                                    @else
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             class="size-[14px]" viewBox="0 0 448 512">
                                                                            <path fill="white"
                                                                                  d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"/>
                                                                        </svg>
                                                                    @endif
                                                                </button>
                                                            </div>
                                                        @else
                                                            <div class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                                                                <button class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer set"
                                                                        onclick="addToCart(this)">افزودن +
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
        @if(Auth::check() && $order)
            <div id="orderBasket"
                 class="w-full fixed bottom-15 right-0 z-1 @if(count(Auth::user()->carts)) block @else hidden @endif lg:hidden">
                <div class="w-11/12 mx-auto p-3 lg:p-5 bg-[#eb3254] rounded-md text-center text-white cursor-pointer"
                     onclick="openShoppingCart('phoneOpen')">
                    سبد خرید ( <span>{{ $cartCount }}</span> )
                </div>
            </div>
        @endif
        <div id="cartList"
             class="w-full fixed lg:hidden top-0 right-0 transition-all duration-300 z-5 max-h-0 overflow-hidden bg-white">
            <div class="flex flex-row justify-between items-center pt-3 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                     onclick="openShoppingCart('phoneClose')" viewBox="0 0 384 512">
                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
                <div class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                    <button class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer"
                            onclick="openAddressForm()"> ثبت سفارش
                    </button>
                </div>
            </div>
            <div class="w-full transition-all duration-300 [&::-webkit-scrollbar]:hidden flex flex-col items-center gap-3 p-5 overflow-y-auto"></div>
        </div>
        <div id="orderList"
             class="w-full fixed lg:hidden top-0 right-0 transition-all duration-300 z-5 max-h-0 overflow-hidden bg-white">
            <div class="flex flex-row items-center pt-3 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                     onclick="orders('close')" viewBox="0 0 384 512">
                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>

            </div>
            <div class="w-full transition-all duration-300 [&::-webkit-scrollbar]:hidden flex flex-col items-center gap-3 p-5 overflow-y-auto">
                <div class="w-full mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden lg:overflow-visible">
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
                    <div class="bg-white divide-y divide-[#f1f1f4]"></div>

                </div>
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
                           class="placeholder-gray-400 focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                           name="phoneNumber" placeholder="شماره تلفن" id="phoneNumber">
                    <input type="password"
                           class="placeholder-gray-400 focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                           name="password" placeholder="کلمه عبور" id="password">
                    <div class="w-full text-center">
                        <a href="{{ route('forget_password') }}"
                           class="text-[#eb3254] inline-block max-md:my-1 my-4 max-md:text-sm">فراموشی رمز عبور</a>
                    </div>
                    <button onclick="check(event)"
                            class="focus:bg-[#eb3254] hover:bg-[#eb3254] transition-all duration-400 text-center w-full bg-[#eb3254] p-2 md:p-3 rounded-[10px] text-white cursor-pointer">
                        ورود
                    </button>
                    <div class="w-full text-center">
                            <span class="text-[#4B5675] mt-1 md:mt-5 max-md:text-sm">
                                هنوز عضو نشدی؟
                                <a href="{{ route('signup') }}" class="text-[#eb3254] mr-2">ثبت نام!</a>
                            </span>
                    </div>
                </form>
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
                        <option disabled>انتخاب کنید</option>
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
                <h3 class="text-sm font-bold text-center">انتخاب شیوه ارسال</h3>
                <div class="w-full flex flex-col items-center gap-3 mt-6">
                    <div class="w-full text-center py-2 border-1 text-sm font-bold border-gray-300 rounded-md cursor-pointer"
                         onclick="setAddress()">انتخاب آدرس
                    </div>
                    @if($slug)
                        <div class="w-full text-center py-2 border-1 text-sm font-bold border-gray-300 rounded-md cursor-pointer"
                             onclick="setOrder('slug')">
                            سرو در محل
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        let shoppingCartCount = document.getElementById('shoppingCartCount')
        let orderBasket = document.getElementById('orderBasket')
        let parent = document.getElementById('parentMenuPage')
        let length = 0
        let cartList = document.getElementById('cartList')
        let orderList = document.getElementById('orderList')
        let authenticationDiv = document.getElementById('authenticationDiv')

        let message = document.getElementById('message')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

        let loginForm = document.getElementById('loginForm')
        let phoneNumber = document.getElementById('phoneNumber')
        let password = document.getElementById('password')
        let cartNumber = document.getElementById('cartNumber')
        let setOrders = document.querySelectorAll('.set')
        let newAddress = document.getElementById('newAddress')
        let setAddressSection = document.getElementById('setAddress')
        let address = document.getElementById('address')
        let sendWay = document.getElementById('sendWay')
        let sections = document.querySelectorAll('.section')

        function setCount(el, state) {
            console.log( orderBasket)
            el.setAttribute('disabled', true)
            el.innerHTML = `
                <div class="w-5 h-5 border-2 border-gray-200 border-t-gray-500 rounded-full animate-spin"></div>
            `

            if (state == "+") {
                el.parentElement.children[1].value++
                orderBasket.children[0].children[0].innerText++
                shoppingCartCount.innerText++
                length++
            }
            if (el.parentElement.children[1].value != 0 && orderBasket.children[0].children[0].innerText != 0) {
                if (state == "-") {
                    el.parentElement.children[1].value--
                    orderBasket.children[0].children[0].innerText--
                    shoppingCartCount.innerText--
                    length--
                }
            }
            if (el.parentElement.children[1].value == 0) {
                console.log('the count of item is zero');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('cart.delete') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'menu_item_id': el.parentElement.parentElement.getAttribute('data-item-id'),
                    },
                    success: function (data) {
                        console.log(data)
                        el.parentElement.parentElement.innerHTML = `
                            <div class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                                <button class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer set"
                                        onclick="addToCart(this)">افزودن +
                                </button>
                            </div>
                        `
                    },
                    error: function () {
                        showMessage('open')
                        element.innerHTML = `
                            <span>خطا در دریافت اطلاعات</span>
                            <span class="text-red-500">!</span>
                            `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }
                })
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('cart.update') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'career_id': "{{ $career->id }}",
                        'menu_item_id': el.parentElement.parentElement.getAttribute('data-item-id'),
                        'quantity': el.parentElement.children[1].value
                    },
                    success: function (data) {
                        console.log(data)
                        el.removeAttribute('disabled')

                        if (state == "+") {
                            el.innerHTML = "+"
                            el.parentElement.children[1].value == 1 ? el.parentElement.children[2].innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="size-[14px]" viewBox="0 0 448 512"><path fill="white" d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"/></svg>` : el.parentElement.children[2].innerHTML = "-"
                        }
                        if (state == "-") {
                            el.innerHTML = "-"
                            el.parentElement.children[1].value == 1 ? el.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="size-[14px]" viewBox="0 0 448 512"><path fill="white" d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"/></svg>` : el.innerHTML = "-"
                        }

                    },
                    error: function () {
                        showMessage('open')
                        element.innerHTML = `
                            <span>خطا در دریافت اطلاعات</span>
                            <span class="text-red-500">!</span>
                            `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }
                })
            }
        }

        function addToCart(el) {

            console.log(el.parentElement.parentElement.getAttribute('data-item-id'))
            el.innerHTML = `
                <div class="w-5 h-5 border-2 border-gray-200 border-t-green-500 rounded-full animate-spin"></div>
            `
            if ("{{ Auth::check() }}") {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('cart.store') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'career_id': "{{ $career->id }}",
                        'menu_item_id': el.parentElement.parentElement.getAttribute('data-item-id')
                    },
                    success: function (data) {
                        console.log(data)
                        if ("{{ Auth::check() }}") {
                            let length = "{{ $cartCount }}"
                            if (orderBasket.classList.contains('hidden')) {
                                orderBasket.classList.remove('hidden')
                                orderBasket.classList.add('block')
                                parent.classList = "mb-[113px] lg:mb-0"
                            }
                            length++
                            orderBasket.children[0].children[0].innerText = length
                            shoppingCartCount.innerText = length
                            el.parentElement.parentElement.innerHTML = `
                        <div class="relative w-16 lg:w-20">
                            <button class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer" onclick="setCount(this, '+')">+</button>
                            <input type="number" class="outline-none w-full rounded text-center text-sm py-1" min="1" value="1" disabled>
                            <button class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer" onclick="setCount(this, '-')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-[14px]" viewBox="0 0 448 512">
                                    <path fill="white" d="M177.1 48h93.7c2.7 0 5.2 1.3 6.7 3.6l19 28.4h-145l19-28.4c1.5-2.2 4-3.6 6.7-3.6zM354.2 80L317.5 24.9C307.1 9.4 289.6 0 270.9 0H177.1c-18.7 0-36.2 9.4-46.6 24.9L93.8 80H80.1 32 24C10.7 80 0 90.7 0 104s10.7 24 24 24H35.6L59.6 452.7c2.5 33.4 30.3 59.3 63.8 59.3H324.6c33.5 0 61.3-25.9 63.8-59.3L412.4 128H424c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8H367.9 354.2zm10.1 48L340.5 449.2c-.6 8.4-7.6 14.8-16 14.8H123.4c-8.4 0-15.3-6.5-16-14.8L83.7 128H364.3z"/>
                                </svg>
                            </button>
                        </div>
                    `
                        }
                    },
                    error: function () {
                        showMessage('open')
                        element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }
                })
            } else {
                authenticationDiv.classList.remove('invisible')
                authenticationDiv.classList.remove('opacity-0')
                authenticationDiv.children[0].classList.remove('scale-95')
            }

        }

        function saveAddress() {
            if (newAddress.value != "") {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('user.setAddress') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'address': newAddress.value
                    },
                    success: function (data) {
                        console.log(data)
                        newAddress.value = ""
                        address.classList.contains('hidden') && address.classList.remove('hidden')
                        let option = document.createElement('option')
                        option.value = data[0].id
                        option.innerText = data[0].address
                        address.appendChild(option)
                    },
                    error: function () {
                        showMessage('open')
                        element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }
                })
            } else {
                showMessage('open')
                element.innerHTML = `
                        <span>لطفا همه فیلد ها را پر کنید</span>
                        <span class="text-red-500">!</span>
                    `
                message.children[0].appendChild(element)
                setTimeout(() => {
                    showMessage('close')
                }, 2000)
            }
        }

        function closeSection() {
            sections.forEach((section) => {
                section.classList.add('invisible')
                section.classList.add('opacity-0')
            })
        }

        function check(ev) {
            ev.preventDefault()
            if (phoneNumber.value == "" || password.value == "") {
                showMessage('open')
                element.innerHTML = `
                        <span>لطفا همه فیلد ها را پر کنید</span>
                        <span class="text-red-500">!</span>
                    `
                message.children[0].appendChild(element)
                setTimeout(() => {
                    showMessage('close')
                }, 2000)
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('user.checkFromMenu') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                        'password': password.value
                    },
                    success: function (data) {

                        if (data == "incorrectPassword") {

                            showMessage('open')
                            element.innerHTML = `
                                <span>رمز عبور نادرست است</span>
                                <span class="text-red-500">!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        } else {
                            showMessage('open')
                            element.innerHTML = `
                                <span> خوش اومدی ${data.name} ${data.family} عزیز</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                closeLoginForm()
                            }, 2000)
                        }
                    },
                    error: function () {
                        showMessage('open')
                        element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }
                })
            }
        }

        function closeLoginForm() {
            authenticationDiv.classList.add('invisible')
            authenticationDiv.classList.add('opacity-0')
            authenticationDiv.children[0].classList.add('scale-95')
            setOrders.forEach((button) => {
                button.innerText = "افزودن +"
            })
        }

        function openShoppingCart(state) {

            if (state == 'phoneOpen') {
                cartList.children[1].innerHTML = ""
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('cart.showCarts') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'career_id': "{{ $career->id }}"
                    },
                    success: function (data) {
                        cartList.classList.remove('max-h-0')
                        cartList.classList.add('min-h-[calc(100vh-57px)]')
                        cartList.children[1].classList.add('h-[calc(100vh-89px)]')
                        console.log(data)
                        data.forEach((item) => {
                            let parentDiv = document.createElement('div')
                            parentDiv.classList = "w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative shoppingCartOrders"
                            parentDiv.setAttribute('data-menu-item-title', item.title)
                            parentDiv.setAttribute('data-order-id', item.cart_id)
                            // if(item.discount){
                            //     let campare = parseInt(item.price) - parseInt(item.discount)
                            //     let x = campare / parseInt(item.price)
                            //     let percent = parseInt(x * 100)
                            //     let span = document.createElement('span')
                            //     span.classList = "text-xs text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1"
                            //     span.innerText = percent + "%"
                            //     parentDiv.appendChild(span)
                            // }
                            parentDiv.innerHTML = `
                                <!--<span class="absolute -top-1 -right-2 bg-[#eb3254] px-2 py-0.5 rounded text-sm text-white">ویژه</span>-->

                                <div class="w-full flex items-center justify-between">
                                    <div class="w-full flex items-center gap-2 lg:gap-4 flex-1">
                                        <img src="{{ asset('storage/') }}/${item.image} "
                                             class="size-22 rounded-lg object-cover border border-gray-300"
                                             alt="${item.title}">
                                        <div class="flex-1 min-w-0 max-w-[100px]">
                                            <h3 class="font-medium text-gray-800 truncate text-sm lg:text-base">${item.title}</h3>
                                            <p class="text-sm text-gray-500 truncate mt-1 lg:text-sm">${item.description ? item.description : ""}</p>
                                        </div>
                                    </div>
                                    <div class="text-left pl-2 lg:pl-0 lg:ml-4 flex flex-col items-end gap-0.5 lg:gap-3">
                                        <div class="flex flex-row items-center gap-3">
                                            <div class="text-left flex flex-col items-end">
                                                <span class="font-bold text-xs lg:text-sm">${item.discount != 0 ? item.discount * item.quantity : item.price * item.quantity} تومان</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-row justify-end items-center gap-3" data-item-id="${item.id}">
                                            <div class="relative w-16 lg:w-20">
                                                <button class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                        onclick="setCount(this, '+')">+
                                                </button>
                                                <input type="number" class="outline-none w-full rounded text-center text-sm py-1"
                                                       min="1" value="${item.quantity}" disabled>
                                                <button class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"
                                                        onclick="setCount(this, '-')">-
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `
                            cartList.children[1].appendChild(parentDiv)
                        })
                    },
                    error: function () {
                        showMessage('open')
                        element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }
                })
            }
            if (state == 'phoneClose') {
                cartList.children[1].classList.remove('h-[calc(100vh-89px)]')
                cartList.classList.remove('min-h-[calc(100vh-57px)]')
                cartList.classList.add('max-h-0')
            }
        }

        function orders(state) {
            if (state == "open") {
                let counter = 1;
                orderList.children[1].children[0].children[1].innerHTML = ""
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('order.show') }}",
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        orderList.classList.remove('max-h-0')
                        orderList.classList.add('min-h-[calc(100vh-57px)]')
                        orderList.children[1].classList.add('h-[calc(100vh-89px)]')

                        data.forEach((item) => {

                            let parentDiv = document.createElement('div')
                            parentDiv.classList = "bg-white divide-y divide-[#f1f1f4]"
                            parentDiv.innerHTML = `
                            <div
                                class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] py-2">
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <span class="block w-10 lg:w-full">${counter}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                    <span class="block w-30 lg:w-full">${item.order_code}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-4">
                                    <span
                                        class="block w-[180px] lg:w-full">${item.address ? item.address.address : item.table}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-4">
                                    <span
                                        class="block w-[130px] lg:w-full">${item.status}</span>
                                </div>
                            </div>
`
                            orderList.children[1].children[0].children[1].appendChild(parentDiv)
                            counter++
                        })
                    },
                    error: function () {
                        showMessage('open')
                        element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }
                })
            }
            if (state == "close") {
                orderList.children[1].classList.remove('h-[calc(100vh-89px)]')
                orderList.classList.remove('min-h-[calc(100vh-57px)]')
                orderList.classList.add('max-h-0')
            }
        }

        function showMessage(state) {
            if (state == 'open') {
                message.classList.remove('top-0')
                message.classList.remove('opacity-0')
                message.classList.remove('invisible')
                message.classList.add('top-1/10')
            }
            if (state == 'close') {
                message.classList.remove('top-1/10')
                message.classList.add('top-0')
                message.classList.add('opacity-0')
                message.classList.add('invisible')
            }
        }

        function setOrder(way) {
            let orders = []
            let shoppingCartOrders = document.querySelectorAll('.shoppingCartOrders')
            shoppingCartOrders.forEach((item) => {
                orders.push(item.getAttribute('data-order-id'))
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('order.store') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'career_id': "{{ $career->id }}",
                    'address': way === 'address' ? address.value : null,
                    'carts': orders,
                    'slug': way === 'slug' ? "{{ $slug }}" : null
                },
                success: function (data) {
                    console.log(data)
                    closeSection()
                },
                error: function () {
                    showMessage('open')
                    element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                    message.children[0].appendChild(element)
                    setTimeout(() => {
                        showMessage('close')
                    }, 2000)
                }
            })
        }

        function setAddress() {
            sendWay.classList.add('opacity-0')
            sendWay.classList.add('invisible')
            sendWay.children[0].classList.add('scale-95')
            setAddressSection.classList.remove('invisible')
            setAddressSection.classList.remove('opacity-0')
            setAddressSection.children[0].classList.remove('scale-95')
        }

        function openAddressForm() {
            sendWay.classList.remove('invisible')
            sendWay.classList.remove('opacity-0')
            sendWay.children[0].classList.remove('scale-95')
        }
    </script>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
@endsection
