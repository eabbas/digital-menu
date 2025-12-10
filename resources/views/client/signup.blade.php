<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <title>ثبت نام</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="w-full h-dvh flex flex-col justify-start items-center md:flex-row-reverse">
        <div class="flex justify-center max-sm:h-25 max-md:h-30 md:h-dvh md:w-4/12 lg:w-5/12 xl:w-6/12 bg-[#056EE9]">
            <div class="flex flex-col my-12 items-center justify-center">
                <div class="w-full flex flex-row justify-center items-center">
                    <img class="max-md:w-4/12 w-8/12"
                        src="{{ asset('assets/img/e125edbd-f303-47f3-9dbc-af414f99ccb2.webp') }}" alt="Faos">

                </div>
            </div>
        </div>
        <div class="w-full md:w-8/12 bg-white flex justify-center md:px-5 mt-5">
            <div class="flex flex-col items-center justify-center w-full">
                <h1 class="md:text-2xl font-bold text-base">ثبت نام</h1>
                <div class="w-2/3 md:w-1/2 mx-auto flex flex-col">
                    <form action="{{ route('user.store') }}"
                        class="w-full flex flex-col items-center my-6 gap-2 md:gap-3" method="post" id="signupForm">
                        @csrf
                        <input type="text"
                            class="w-full p-2 md:p-[9px] mb-0.5 md:mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="name" placeholder="نام" required>
                        <input type="text"
                            class="w-full p-2 md:p-[9px] mb-0.5 md:mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="family" placeholder="نام خانوادگی" required>
                        <input type="number"
                            class="w-full p-2 md:p-[9px] mb-0.5 md:mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="phoneNumber" placeholder="شماره تلفن" required id="phoneNumber">
                        <input type="password"
                            class="w-full p-2 md:p-[9px] mb-0.5 md:mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="password" placeholder="کلمه عبور" required>
                        <div class="w-full flex gap-2 items-center ">
                            <input type="checkbox" name="rules" value="1" class="size-5 max-md:my-1"
                                onchange="checkRule()" id="rule">
                            <label for="rules" class="max-md:text-sm text-[#4B5675] cursor-pointer">قوانین را قبول
                                میکنم
                                <span class="text-[#056EE9] cursor-pointer" onclick="rules('open')">قوانین</span>
                            </label>
                        </div>
                        <!-- rules -->
                        <div class="fixed w-full h-dvh bg-black/50 top-0 right-0 opacity-0 invisible transition-all duration-500 backdrop-blur-xs"
                            id="rules">
                            <div
                                class="w-2/3 h-5/6 lg:h-2/3 bg-white mx-auto mt-10 lg:mt-20 rounded-md transition-all duration-300 delay-200 opacity-0 scale-75 relative">
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
                                        class="inline-block float-left mb-5 px-5 py-1 border border-gray-300 rounded-md text-gray-600 cursor-pointer transition-all duration-300 hover:border-black hover:text-black text-xs lg:text-base"
                                        onclick="rules('close')">بستن</span>
                                </div>
                                <span
                                    class="absolute p-1 border border-gray-300 rounded-md text-gray-600 cursor-pointer top-2 right-2 transition-all duration-300 closeButtonXmark"
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
                            class="focus:bg-[#2c44cb] transition-all duration-400 text-center w-full bg-gray-400 py-2 md:p-3 rounded-[10px] text-white cursor-no-drop"
                            id="signupButton" disabled onclick="checkAuth(event)">ثبت نام</button>
                        <div class="w-full text-center my-1 md:my-4">
                            <span class="text-sm text-[#4B5675] mt-5">
                                از قبل اکانت داری؟
                                <a href="{{ route('login') }}" class="text-[#1B84FF]">
                                    ورود
                                </a>
                            </span>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <footer>
        <div
            class="w-full h-10 bg-[#056ee9] absolute bottom-0 flex flex-row gap-4 justify-center items-center md:hidden">
            <div class="">اکادمی <b class="text-xl">Faos</b></div>
            <a href="tell:"><b class="text-white">09147794595</b></a>
        </div>
    </footer>
    <script>
        let signupForm = document.getElementById('signupForm')

        function checkAuth(e) {
            e.preventDefault()
            let phoneNumber = document.getElementById('phoneNumber')
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
                    'phoneNumber': phoneNumber.value
                },
                success: function(user){
                    if (user.id) {
                        alert("شما قبلا با این شماره ثبت نام کرده اید")
                    } else {
                        signupForm.submit()
                    }
                },
                error: function(){
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }
    </script>
    <script src="{{ asset('assets/js/rules.js') }}"></script>
</body>

</html>
