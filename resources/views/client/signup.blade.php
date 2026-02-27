<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('storage/images/icon.png') }}" type="image/png">
    <title>ثبت نام</title>
</head>

<body>
    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500"
        id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer" onclick="showMessage('close')"
                viewBox="0 0 384 512">
                <path
                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
            </svg>

        </div>
    </div>
    <div class="w-full flex flex-col justify-start items-center md:flex-row-reverse">
        <div class="flex justify-center max-sm:h-30 max-md:h-35 md:h-dvh md:w-4/12 lg:w-5/12 xl:w-6/12 bg-[#eb3254]">
            <div class="flex flex-col my-12 items-center justify-center">
                <a href="https://famenu.ir" class="w-full flex flex-row justify-center items-center">
                    <img class="max-md:w-4/12 w-8/12" src="{{ asset('storage/images/Famenu1.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="w-full md:w-8/12 bg-white flex justify-center md:px-5 pt-10 lg:pt-0">
            <div class="flex flex-col items-center justify-center w-full">
                <h1 class="md:text-2xl font-bold text-base">ثبت نام</h1>
                <div class="w-2/3 md:w-1/2 mx-auto flex flex-col">
                    <form action="{{ route('user.store') }}"
                        class="w-full flex flex-col items-center my-6 gap-2 md:gap-3" method="post" id="signupForm">
                        @csrf
                        <input type="text"
                            class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-[#eb3254] mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="name" id="name" placeholder="نام" required>
                        <input type="text"
                            class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-[#eb3254] mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="family" id="family" placeholder="نام خانوادگی" required>
                        <input type="number"
                            class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-[#eb3254] mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="phoneNumber" placeholder="شماره تلفن" required id="phoneNumber">
                        <input type="password"
                            class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-[#eb3254] mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="password" placeholder="کلمه عبور" required>
                        <input type="text"
                            class="w-full p-2 md:p-[9px] placeholder-gray-400 focus:border-[#eb3254] mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                            name="ref_code" placeholder="کد معرف (اختیاری)">
                        <div class="w-full flex flex-row items-center gap-3">
                            <input type="number"
                                class="w-8/12 p-2 placeholder-gray-400 focus:border-[#eb3254] md:p-[9px] rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                                name="code" placeholder="کد" required id="code">
                            <button type="button"
                                class="w-4/12 text-xs lg:text-base h-full p-2 md:p-[9px] rounded-[7px] bg-[#eb3254] hover:bg-[#d52b4a] text-white cursor-pointer"
                                onclick="sendCode()" id="countDown">ارسال کد </button>
                        </div>
                        <div class="w-full flex gap-2 items-center ">
                            <input type="checkbox" name="rules" value="1" class="size-5 max-md:my-1"
                                onchange="checkRule()" id="rule">
                            <label for="rules" class="max-md:text-sm text-[#4B5675] cursor-pointer">قوانین را قبول
                                میکنم
                                <span class="text-[#eb3254] cursor-pointer" onclick="rules('open')">قوانین</span>
                            </label>
                        </div>
                        <!-- rules -->
                        <div class="fixed w-full h-dvh bg-black/50 top-0 right-0 opacity-0 invisible transition-all duration-500 backdrop-blur-xs"
                            id="rules">
                            <div
                                class="w-10/12 lg:w-2/3 h-5/6 lg:h-2/3 bg-white mx-auto mt-10 lg:mt-20 rounded-md transition-all duration-300 delay-200 opacity-0 scale-75 relative">
                                <div
                                    class="w-full py-3 text-center text-md font-medium sticky top-0 right-0 bg-white rounded-md">
                                    قوانین و مقررات
                                </div>
                                <div class="h-5/6 overflow-y-auto px-5"
                                    style="scrollbar-width: thin; scrollbar-color: rgb(180, 180, 180) white;">
                                    <p class="p-5 text-justify text-xs leading-loose lg:text-base">
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از
                                        طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                        لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود
                                        ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده،
                                        شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای
                                        طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد،
                                        در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط
                                        سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی
                                        سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. لورم ایپسوم
                                        متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                        است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای
                                        شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی
                                        می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و
                                        متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                                        الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان
                                        امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان
                                        رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل
                                        دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. لورم ایپسوم متن ساختگی با تولید
                                        سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون
                                        بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                                        مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای
                                        زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می
                                        طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان
                                        خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که
                                        تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد
                                        نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود
                                        طراحی اساسا مورد استفاده قرار گیرد.
                                    </p>
                                    <span
                                        class="inline-block float-left mb-5 px-5 py-1 border-1 border-gray-300 rounded-md text-gray-600 cursor-pointer transition-all duration-300 hover:border-black hover:text-black text-xs lg:text-base"
                                        onclick="rules('close')">بستن</span>
                                </div>
                                <span
                                    class="absolute p-1 border-1 border-gray-300 rounded-md text-gray-600 cursor-pointer top-2 right-2 transition-all duration-300 closeButtonXmark"
                                    onclick="rules('close')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                        <path fill="rgb(180, 180, 180)"
                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <!-- rules end -->
                        <button
                            class="focus:bg-[#eb3254] transition-all duration-400 text-center w-full bg-gray-400 py-2 md:p-3 rounded-[10px] text-white cursor-no-drop"
                            id="signupButton" disabled onclick="checkAuth(event)">ثبت نام</button>
                        <div class="w-full text-center my-1 md:my-4">
                            <span class="text-sm mt-5">
                                از قبل اکانت داری؟
                                <a href="{{ route('login') }}" class="text-[#eb3254]">
                                    ورود
                                </a>
                            </span>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="fixed bg-black/50 w-full h-full top-0 right-0 flex justify-center items-center invisible opacity-0 transition-all duration-300 z-50"
        id="popupQr">
        <div
            class="w-9/12 h-1/2 rounded-sm flex justify-center items-center p-5 transition-all duration-300 scale-95 relative">
            <!--loading scan-->
            <div class="absolute w-full h-full bg-white flex flex-row items-center justify-center invisible opacity-0 rounded-md"
                id="loading"></div>
            <!--loading scan  end-->
            <div class="p-3 rounded-full bg-white absolute top-1 right-1 z-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" onclick="scanQr('close')"
                    viewBox="0 0 384 512">
                    <path fill="red"
                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                </svg>
            </div>
            <div id="reader"></div>
        </div>
    </div>
    <style>
        #reader {
            width: 100%;
            height: 100%;
        }

        #reader>video {
            width: 100%;
            height: 100%;
        }
    </style>

    <div class="lg:hidden w-full fixed bottom-0 bg-white right-0">
        <div class="w-full flex flex-row justify-center">
            <ul
                class="w-full mx-auto flex flex-row justify-between items-center bg-white border-t-1 border-gray-300 p-2">
                <li>
                    {{-- category --}}
                    <a href="{{ route('home') }}"
                        class="size-10 flex justify-center items-center rounded-full @if (Route::is('home')) bg-[#eb3254] @endif"
                        id="homeIcon">
                        <?xml version="1.0" encoding="UTF-8"?>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-5 @if (Route::is('home')) fill-white @endif" id="Layer_1"
                            data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512">
                            <path
                                d="M22.849,7.68l-.869-.68h.021V2h-2v3.451L13.849,.637c-1.088-.852-2.609-.852-3.697,0L1.151,7.68c-.731,.572-1.151,1.434-1.151,2.363v13.957H9V15c0-.551,.448-1,1-1h4c.552,0,1,.449,1,1v9h9V10.043c0-.929-.42-1.791-1.151-2.363Zm-.849,14.32h-5v-7c0-1.654-1.346-3-3-3h-4c-1.654,0-3,1.346-3,3v7H2V10.043c0-.31,.14-.597,.384-.788L11.384,2.212c.363-.284,.869-.284,1.232,0l9,7.043c.244,.191,.384,.478,.384,.788v11.957Z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" id="shopIcon"
                        class="size-10 flex justify-center items-center rounded-full transition cursor-pointer">
                        <?xml version="1.0" encoding="UTF-8"?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 " id="Outline" viewBox="0 0 24 24"
                            width="512" height="512">
                            <path
                                d="M21,6H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V9A3,3,0,0,0,21,6ZM12,2a4,4,0,0,1,4,4H8A4,4,0,0,1,12,2ZM22,19a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V9A1,1,0,0,1,3,8H6v2a1,1,0,0,0,2,0V8h8v2a1,1,0,0,0,2,0V8h3a1,1,0,0,1,1,1Z" />
                        </svg>
                    </a>
                </li>
                <li onclick="scanQr('open')">
                    <div class="size-10 flex justify-center items-center rounded-full" id="qrIcon">
                        <?xml version="1.0" encoding="UTF-8"?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" id="Layer_1" data-name="Layer 1"
                            viewBox="0 0 24 24">
                            <path
                                d="m4,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm14-2h-7v7h7v-7Zm-2,5h-3v-3h3v3Zm-14,11h7v-7h-7v7Zm2-5h3v3h-3v-3Zm-3,7h4v2H3c-1.654,0-3-1.346-3-3v-4h2v4c0,.551.449,1,1,1Zm19-5h2v4c0,1.654-1.346,3-3,3h-4v-2h4c.551,0,1-.449,1-1v-4Zm2-14v4h-2V3c0-.551-.449-1-1-1h-4V0h4c1.654,0,3,1.346,3,3ZM2,7H0V3C0,1.346,1.346,0,3,0h4v2H3c-.551,0-1,.449-1,1v4Zm11,10h3v3h-3v-3Zm4-1v-3h3v3h-3Zm-4-3h3v3h-3v-3Z" />
                        </svg>

                    </div>
                </li>
                <li>
                    {{-- ecommerce --}}
                    <a href="#" id="cartIcon" class="size-10 flex justify-center items-center rounded-full">
                        <?xml version="1.0" encoding="UTF-8"?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" id="Outline" viewBox="0 0 24 24"
                            width="512" height="512">
                            <path
                                d="M22.713,4.077A2.993,2.993,0,0,0,20.41,3H4.242L4.2,2.649A3,3,0,0,0,1.222,0H1A1,1,0,0,0,1,2h.222a1,1,0,0,1,.993.883l1.376,11.7A5,5,0,0,0,8.557,19H19a1,1,0,0,0,0-2H8.557a3,3,0,0,1-2.82-2h11.92a5,5,0,0,0,4.921-4.113l.785-4.354A2.994,2.994,0,0,0,22.713,4.077ZM21.4,6.178l-.786,4.354A3,3,0,0,1,17.657,13H5.419L4.478,5H20.41A1,1,0,0,1,21.4,6.178Z" />
                            <circle cx="7" cy="22" r="2" />
                            <circle cx="17" cy="22" r="2" />
                        </svg>

                    </a>
                    {{-- ecommerce end --}}
                </li>
                <li>
                    <a href="{{ route('user.profile') }}"
                        class="size-10 flex justify-center items-center rounded-full @if (Route::is('login') || Route::is('signup') || Route::is('reset_password') || Route::is('forget_password')) bg-[#eb3254] @endif"
                        id="userIcon">
                        <?xml version="1.0" encoding="UTF-8"?>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-6 @if (Route::is('login') || Route::is('signup') || Route::is('reset_password') || Route::is('forget_password')) fill-white @else fill-black @endif"
                            id="Outline" viewBox="0 0 24 24" width="512" height="512">
                            <path
                                d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
                            <path
                                d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
                        </svg>

                    </a>
                </li>
            </ul>
        </div>
    </div>
    @if (Auth::check())
        <div class="w-full h-[calc(100vh-300px)] fixed z-40 right-0 border-t-1 border-x-1 border-gray-300 transition-all duration-200 -bottom-full bg-white rounded-t-xl"
            id="popupUser">
            <div class="w-full relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3 size-3 cursor-pointer"
                    onclick="openUserOptions('close')" viewBox="0 0 448 512">
                    <path
                        d="M41 39C31.6 29.7 16.4 29.7 7 39S-2.3 63.6 7 73l183 183L7 439c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l183-183L407 473c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-183-183L441 73c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-183 183L41 39z" />
                </svg>
                <h3 class="text-center py-4 font-bold bg-gray-200 rounded-t-[11px] border-b border-gray-300">
                    {{ Auth::user()->name }} {{ Auth::user()->family }}</h3>
                <ul class="flex flex-col px-3">
                    <li>
                        <a href="{{ route('user.profile') }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">پروفایل من</a>
                    </li>
                    <li>
                        <a href="{{ route('user.edit', [Auth::user()]) }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">
                            ویرایش پروفایل
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('aboutUs.clientList') }}"
                            class="block py-3 border-b border-gray-300 text-sm font-bold">درباره فامنو</a>
                    </li>
                    <li>
                        <a href="{{ route('contactUs.create') }}" class="block py-3 text-sm font-bold">ارتباط با
                            ما</a>
                    </li>
                    <li>
                        <a href="{{ route('user.logout') }}"
                            class="block py-3  text-sm font-bold bg-[#eb3254]/30 text-center text-red-500 rounded-sm">خروج
                            از حساب کاربری</a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
    <footer class="hidden lg:block lg:w-full mx-auto fixed bottom-0 right-0">
        <div class="w-full bg-gray-600 flex flex-col gap-1 pt-1 justify-center items-center rounded-t-sm">
            <span class="text-white">آکادمی فائوس</span>
            <a href="tel:+989147794595" class="text-gray-100">09147794595</a>
        </div>
    </footer>


    <script>
        let message = document.getElementById('message')
        let code = document.getElementById('code')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"
        let name = document.getElementById('name')
        let family = document.getElementById('family')

        function sendCode() {

            let phoneNumber = document.getElementById('phoneNumber')
            if (phoneNumber.value == "") {
                showMessage('open')
                element.innerHTML = `
                        <span class="text-red-500">!</span>
                        <span>لطفا شماره تلفن را وارد کنید</span>
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
                    url: "{{ route('send_code') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                    },
                    success: function(data) {
                        console.log(data)
                        if (!data) {
                            counter()
                            showMessage('open')
                            element.innerHTML = `
                                <span>✅</span>
                                <span class="text-shadw-lg">کد ارسال شد</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        } else {
                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">کاربر قبلا با این شماره ثبت نام کرده است!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                // location.assign("{{ route('login') }}")
                            }, 2000)
                        }
                    },
                    error: function() {
                        showMessage('open')
                        element.innerHTML = `
                            <span>❌</span>
                            <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2500)
                    }
                })
            }
        }
        let countDown = document.getElementById('countDown')

        function counter() {
            let phoneNumber = document.getElementById('phoneNumber')
            countDown.classList.add('cursor-no-drop')
            countDown.classList.remove('cursor-pointer')
            countDown.classList.remove('hover:bg-[#d52b4a]')
            countDown.classList.add('hover:bg-[#d52b4a]/50')
            countDown.classList.remove('bg-[#eb3254]')
            countDown.classList.add('bg-[#eb3254]/50')
            countDown.setAttribute('disabled', true)
            countDown.setAttribute('dir', 'ltr')
            let count = 120
            let result = setInterval(() => {
                let minute = Math.floor(count / 60)
                let seconds = count % 60
                count -= 1
                if (count < 0) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('removeActivationCode') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            'phoneNumber': phoneNumber.value
                        },
                        success: function(data) {
                            console.log(data)
                            countDown.classList.remove('cursor-no-drop')
                            countDown.classList.add('bg-[#eb3254]')
                            countDown.classList.remove('bg-[#eb3254]/50')
                            countDown.classList.add('cursor-pointer')
                            countDown.classList.add('hover:bg-[#d52b4a]')
                            countDown.classList.remove('hover:bg-[#d52b4a]/50')
                            countDown.removeAttribute('disabled')
                            countDown.removeAttribute('dir')
                            countDown.innerText = "ارسال مجدد"
                        },
                        error: function() {
                            showMessage('open')
                            element.innerHTML = `
                                <span>❌</span>
                                <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2500)
                        }
                    })
                    clearInterval(result)
                }
                countDown.innerText = minute.toString().padStart(2, "0") + " : " + seconds.toString().padStart(2,
                    "0");
            }, 1000)
        }

        let signupForm = document.getElementById('signupForm')

        function checkAuth(e) {
            e.preventDefault()
            let phoneNumber = document.getElementById('phoneNumber')
            if (phoneNumber.value == "" && code.value == "" && name.value == "" && family.value == "") {
                showMessage('open')
                element.innerHTML = `
                        <span class="text-red-500">!</span>
                        <span>لطفا همه فیلد ها را پر کنید</span>
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
                    url: "{{ route('checkAuth') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                        'code': code.value
                    },
                    success: function(user) {
                        if (user.validate) {
                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">شما قبلا با این شماره ثبت نام کرده اید!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                location.assign("{{ route('login') }}")
                            }, 2000)
                        } else {
                            if (!user.checkCode) {
                                showMessage('open')
                                element.innerHTML = `
                                    <span>❌</span>
                                    <span class="text-shadw-lg">کد وارد شده نامعتبر!</span>
                                `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                }, 2000)
                            }
                            if (user.checkCode) {
                                signupForm.submit()
                            }
                        }
                    },
                    error: function() {
                        showMessage('open')
                        element.innerHTML = `
                            <span>❌</span>
                            <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2500)
                    }
                })
            }
        }

        function showMessage(state) {
            if (state == 'open') {
                message.classList.remove('top-0')
                message.classList.remove('opacity-0')
                message.classList.remove('invisible')
                message.classList.add('top-2/10')
            }
            if (state == 'close') {
                message.classList.remove('top-2/10')
                message.classList.add('top-0')
                message.classList.add('opacity-0')
                message.classList.add('invisible')
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            let shopIcon = document.getElementById('shopIcon');
            let comingSoon = document.getElementById('comingSoon');
            let contentCommingSoon = document.getElementById('contentCommingSoon');
            let closeBtn = document.getElementById('closeModal');
            let confirmBtn = document.getElementById('closeForm');

            if (shopIcon) {
                shopIcon.addEventListener('click', function(e) {
                    e.preventDefault()
                    openModal()
                })
            }

            function openModal() {
                comingSoon.classList.remove('hidden')
                contentCommingSoon.classList.remove('scale-95', 'opacity-0')
                contentCommingSoon.classList.add('scale-100', 'opacity-100')
            }

            function closeModal() {
                contentCommingSoon.classList.remove('scale-100', 'opacity-100')
                contentCommingSoon.classList.add('scale-95', 'opacity-0')
                comingSoon.classList.add('hidden')

            }

            if (closeBtn) closeBtn.addEventListener('click', closeModal)
            if (confirmBtn) confirmBtn.addEventListener('click', closeModal)

        })

        let cartIcon = document.getElementById('cartIcon');
        let cartModal = document.getElementById('cart');
        let cartContent = document.getElementById('contentCart');
        let closeCartBtn = document.getElementById('closeCart');
        let closeCartForm = document.getElementById('closeFormCart');
        // کد مربوط به سبد خرید
        if (cartIcon) {
            cartIcon.addEventListener('click', function(e) {
                e.preventDefault();
                openCartModal();
            });
        }

        function openCartModal() {
            cartModal.classList.remove('hidden')
            cartContent.classList.remove('scale-95', 'opacity-0')
            cartContent.classList.add('scale-100', 'opacity-100')
        }

        function closeCart() {
            cartContent.classList.remove('scale-100', 'opacity-100')
            cartContent.classList.add('scale-95', 'opacity-0')
            cartModal.classList.add('hidden')
        }
        if (closeCartBtn) closeCartBtn.addEventListener('click', closeCart)
        if (closeCartForm) closeCartForm.addEventListener('click', closeCart)


        let qrIcon = document.getElementById('qrIcon')
        let homeIcon = document.getElementById('homeIcon')
        let userIcon = document.getElementById('userIcon')
        let loading = document.getElementById('loading')
        let popupQr = document.getElementById('popupQr')

        function scanQr(state) {
            const html5QrCode = new Html5Qrcode("reader")

            if (state == 'open') {
                if ("{{ Route::is('home') }}") {
                    homeIcon.classList.remove('bg-[#eb3254]')
                    homeIcon.children[0].classList.remove('fill-white')
                    homeIcon.children[0].classList.add('fill-black')
                }
                if (
                    "{{ Route::is('login') || Route::is('signup') || Route::is('reset_password') || Route::is('forget_password') || Route::is('user.*') }}"
                ) {
                    userIcon.classList.remove('bg-[#eb3254]')
                    userIcon.children[0].classList.remove('fill-white')
                    userIcon.children[0].classList.add('fill-black')
                }
                qrIcon.children[0].classList.remove('fill-black')
                qrIcon.children[0].classList.add('fill-white')
                qrIcon.classList.add('bg-[#eb3254]')
                popupQr.classList.remove('invisible')
                popupQr.classList.remove('opacity-0')
                popupQr.children[0].classList.remove('scale-95')
                const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                    html5QrCode.stop()
                    loading.classList.remove('invisible')
                    loading.classList.remove('opacity-0')
                    loading.innerHTML = `
                    <div class="loading-wave">
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                    </div>
                    `
                    window.location.assign("https://" + decodedText)
                }
                const config = {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                };
                console.log(html5QrCode)
                console.log(html5QrCode.elementId)
                html5QrCode.start({
                    facingMode: "environment"
                }, config, qrCodeSuccessCallback)
            }
            if (state == 'close') {
                qrIcon.children[0].classList.remove('fill-white')
                qrIcon.classList.remove('bg-[#eb3254]')
                qrIcon.children[0].classList.add('fill-black')
                if ("{{ Route::is('home') }}") {
                    homeIcon.children[0].classList.remove('fill-black')
                    homeIcon.classList.add('bg-[#eb3254]')
                    homeIcon.children[0].classList.add('fill-white')
                }
                if (
                    "{{ Route::is('login') || Route::is('signup') || Route::is('reset_password') || Route::is('forget_password') || Route::is('user.*') }}"
                ) {
                    userIcon.children[0].classList.remove('fill-black')
                    userIcon.classList.add('bg-[#eb3254]')
                    userIcon.children[0].classList.add('fill-white')
                }
                popupQr.classList.add('invisible')
                popupQr.classList.add('opacity-0')
                popupQr.children[0].classList.add('scale-95')
                html5QrCode.stop()
            }

        }
    </script>
    <script src="{{ asset('assets/js/rules.js') }}"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
    @RegisterServiceWorkerScript
</body>

</html>
