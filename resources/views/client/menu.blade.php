@extends('client.document')
@section('title')
    {{ 'فامنو | ' }}{{ $career->title }}
@endsection
@section('content')
    <div id="parentMenuPage">
        <div class="w-full flex flex-row justify-between gap-3 py-3 lg:py-8 rounded-2xl">
            <div class="w-1/2 p-1 lg:p-3 text-xs lg:text-sm h-full font-medium">
                <a href="{{ route('show_career', [$career]) }}" class="text-sky-700">مشاهده جزئیات کسب وکار</a>
            </div>
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
                                                        $userOrder = $item->orders()->where('user_id', Auth::id())->first();
                                                    @endphp
                                                    <div data-item-id="{{ $item->id }}">
                                                        @if(Auth::check() && count($item->orders))
                                                            <div class="relative w-16 lg:w-20">
                                                                <button class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer" onclick="setCount(this, '+')">+</button>
                                                                <input type="number" class="outline-none w-full rounded text-center text-sm py-1" min="1" value="{{ $userOrder->quantity ?? 1 }}" disabled>
                                                                <button class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer" onclick="setCount(this, '-')">-</button>
                                                            </div>
                                                        @else
                                                            <div class="w-[82px] h-[32px] lg:w-[90px] lg:h-[36px] flex flex-row justify-end items-center gap-3">
                                                                <button class="w-full h-full flex flex-row justify-center items-center bg-green-500 rounded text-white text-sm lg:text-base cursor-pointer"
                                                                        onclick="setOrderCount(this)">افزودن +
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
        <div id="orderBasket" class="w-full fixed bottom-15 right-0 z-1 hidden lg:hidden">
            <div class="w-11/12 mx-auto p-3 lg:p-5 bg-[#eb3254] rounded-md text-center text-white cursor-pointer"
                 onclick="openShoppingCart('phoneOpen')">
                سبد خرید ( <span>{{ Auth::check() ? count(Auth::user()->orders) : 0 }}</span> )
            </div>
        </div>
        <div id="orderList"
             class="w-full fixed lg:hidden top-0 right-0 transition-all duration-300 z-5 max-h-0 overflow-hidden bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 mt-3 mr-3 cursor-pointer"
                 onclick="openShoppingCart('phoneClose')" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>
            {{--            <div class="w-full transition-all duration-300 [&::-webkit-scrollbar]:hidden flex flex-col items-center gap-3 p-5">--}}
            {{--                <div class="w-full flex items-center justify-between bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg p-2.5 lg:p-4 transition-all duration-150 relative"--}}
            {{--                     data-menu-item-title="{{ $item->title }}">--}}
            {{--                    <!--<span class="absolute -top-1 -right-2 bg-[#eb3254] px-2 py-0.5 rounded text-sm text-white">ویژه</span>-->--}}
            {{--                    @if ($item->discount)--}}
            {{--                        <span class="text-xs text-white bg-red-500 rounded-full px-1.5 -rotate-30 absolute top-0 -left-1">--}}
            {{--                            {{ $item->percent }}%--}}
            {{--                        </span>--}}
            {{--                    @endif--}}
            {{--                    <div class="w-full flex items-center justify-between">--}}
            {{--                        <div class="w-full flex items-center gap-2 lg:gap-4 flex-1">--}}
            {{--                            <img src="{{ asset('storage/' . $item->image) }}"--}}
            {{--                                 class="size-22 rounded-lg object-cover border border-gray-300"--}}
            {{--                                 alt="{{ $item->title }}">--}}
            {{--                            <div class="flex-1 min-w-0 max-w-[100px]">--}}
            {{--                                <h3 class="font-medium text-gray-800 truncate text-sm lg:text-base">{{ $item->title }}</h3>--}}
            {{--                                <p class="text-sm text-gray-500 truncate mt-1 lg:text-sm">{{ $item->description }}</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="text-left pl-2 lg:pl-0 lg:ml-4 flex flex-col items-end gap-0.5 lg:gap-3">--}}
            {{--                            <div class="flex flex-row items-center gap-3">--}}

            {{--                                <div class="text-left flex flex-col items-end">--}}
            {{--                                    @if (!$item->discount)--}}
            {{--                                        <span class="font-bold text-xs lg:text-sm">{{ number_format($item->price) }} تومان</span>--}}
            {{--                                    @else--}}
            {{--                                        <span class="font-bold text-xs lg:text-sm">{{ number_format($item->discount) }} تومان</span>--}}
            {{--                                        <span class="text-gray-400 text-[10px] line-through lg:text-sm">{{ number_format($item->price) }} تومان</span>--}}
            {{--                                    @endif--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <div class="flex flex-row justify-end items-center gap-3">--}}
            {{--                                <div class="relative w-16 lg:w-20">--}}
            {{--                                    <button class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"--}}
            {{--                                            onclick="setCount(this, '+')">+--}}
            {{--                                    </button>--}}
            {{--                                    <input type="number" class="outline-none w-full rounded text-center text-sm py-1"--}}
            {{--                                           min="1" value="1" disabled>--}}
            {{--                                    <button class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer"--}}
            {{--                                            onclick="setCount(this, '-')">---}}
            {{--                                    </button>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
        <div id="authenticationDiv"
             class="fixed w-full h-dvh bg-black/50 backdrop-blur-sm top-0 right-0 flex justify-center items-center transition-all duration-300 opacity-0 invisible">
            <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-3/4 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500 z-10"
                 id="message">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer"
                         onclick="showMessage('close')" viewBox="0 0 384 512">
                        <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                    </svg>

                </div>
            </div>
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
    </div>
    <script>
        let shoppingCartCount = document.getElementById('shoppingCartCount')
        let orderBasket = document.getElementById('orderBasket')
        let parent = document.getElementById('parentMenuPage')
        let length = 0
        let orderList = document.getElementById('orderList')

        let authenticationDiv = document.getElementById('authenticationDiv')

        let message = document.getElementById('message')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

        let loginForm = document.getElementById('loginForm')
        let phoneNumber = document.getElementById('phoneNumber')
        let password = document.getElementById('password')


        function setCount(el, state) {
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
                    // console.log('input : '+el.parentElement.children[1].value, 'span : '+orderBasket.children[0].children[0].innerText)
            if (el.parentElement.children[1].value != 0 && orderBasket.children[0].children[0].innerText != 0) {
                if (state == "-") {
                    el.parentElement.children[1].value--
                    orderBasket.children[0].children[0].innerText--
                    shoppingCartCount.innerText--
                    length--
                }
            }
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
                    'slug': "{{ $slug }}",
                    'menu_item_id' :  el.parentElement.parentElement.getAttribute('data-item-id'),
                    'quantity': el.parentElement.children[1].value
                },
                success: function(data){
                    // console.log(data, state)
                    el.removeAttribute('disabled')

                    if (state == "+"){
                        el.innerHTML = "+"
                    }if (state == "-"){
                        el.innerHTML = "-"
                    }

                },
                error: function(){
                    alert('error')
                }
            })
        }

        function setOrderCount(el) {
            el.innerHTML = `
                <div class="w-5 h-5 border-2 border-gray-200 border-t-green-500 rounded-full animate-spin"></div>
            `
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
                    'slug': "{{ $slug }}",
                    'menu_item_id': el.parentElement.parentElement.getAttribute('data-item-id')
                },
                success: function (data) {
                    console.log(data)
                    if ("{{ Auth::check() }}") {
                        if (orderBasket.classList.contains('hidden')) {
                            orderBasket.classList.remove('hidden')
                            orderBasket.classList.add('block')
                            // parent.setAttribute('class', 'mb-[113px]')
                            parent.classList = "mb-[113px] lg:mb-0"
                        }
                        length++
                        orderBasket.children[0].children[0].innerText = length
                        shoppingCartCount.innerText = length
                        el.parentElement.parentElement.innerHTML = `
                            <div class="relative w-16 lg:w-20">
                                <button class="absolute right-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer" onclick="setCount(this, '+')">+</button>
                                <input type="number" class="outline-none w-full rounded text-center text-sm py-1" min="1" value="1" disabled>
                                <button class="absolute left-0 bottom-1.5 rounded size-5 lg:size-6 flex justify-center bg-gray-400 items-center text-white cursor-pointer" onclick="setCount(this, '-')">-</button>
                            </div>
                        `
                    }
                },
                error: function () {
                    authenticationDiv.classList.remove('invisible')
                    authenticationDiv.classList.remove('opacity-0')
                    authenticationDiv.children[0].classList.remove('scale')
                }
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
                        alert('error in sendig data')
                    }
                })
            }
        }

        function closeLoginForm() {
            authenticationDiv.classList.add('invisible')
            authenticationDiv.classList.add('opacity-0')
            authenticationDiv.children[0].classList.add('scale')
        }

        function openShoppingCart(state) {

            if (state == 'phoneOpen') {
                orderList.classList.remove('max-h-0')
                orderList.classList.remove('overflow-hidden')
                orderList.classList.add('min-h-[calc(100vh-57px)]')
                orderList.classList.add('overflow-y-auto')
            }
            if (state == 'phoneClose') {
                orderList.classList.remove('min-h-[calc(100vh-57px)]')
                orderList.classList.remove('overflow-y-auto')
                orderList.classList.add('max-h-0')
                orderList.classList.add('overflow-hidden')
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
    </script>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
@endsection
