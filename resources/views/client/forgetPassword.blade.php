{{-- <!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>فراموشی رمز عبور</title>
    <style>
       
    </style>
</head>

<body> --}}
        @extends('client.menuMobile')
@section('title', 'ورود')
@section('content')
    <div class="w-full h-dvh flex flex-col justify-start items-center md:flex-row-reverse">
        <div class="flex justify-center max-sm:h-30 max-md:h-35 md:h-dvh md:w-4/12 lg:w-5/12 xl:w-6/12 bg-[#eb3254]">
            <div class="flex flex-col my-12 items-center justify-center">
                <a href="https://famenu.ir" class="w-full flex flex-row justify-center items-center">
                    <img class="max-md:w-4/12 w-8/12"
                        src="{{ asset('storage/images/Famenu1.png') }}" alt="">
                    <!-- <h2 class="text-center font-bold text-white text-3xl">Faos</h2> -->
                </a>
            </div>
        </div>

        <div
            class="w-10/12 md:w-8/12 bg-white h-full flex flex-col max-md:justify-start justify-center mt-5 items-center px-4">
            <div class="w-full flex flex-col items-center justify-center md:justify-center lg:w-115 md:w-10/12 px-4">
                <h1 class="text-base md:text-2xl font-bold">فراموشی رمز عبور</h1>
                <div class="flex flex-col w-full">
                    <form action="{{ route('set_password') }}" class="flex flex-col items-center my-6 gap-3 w-full"
                        method="post" id="checkCodeForm">
                        @csrf
                        <input type="number"
                            class="placeholder-[#eb3254] focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#DBDFE9] focus:outline-none w-full"
                            name="phoneNumber" placeholder="شماره تلفن" id="phoneNumber" required>
                        <div class="w-full flex flex-row items-center gap-3">
                            <input type="number"
                                class="w-3/4 p-2 placeholder-[#eb3254] focus:border-1 focus:border-[#eb3254] md:p-[9px] mb-0.5 md:mb-1 rounded-[7px] border-1 border-[#DBDFE9] outline-none"
                                name="code" placeholder="کد" required id="code">
                            <button type="button"
                                class="w-1/4 text-xs lg:text-base p-2 md:p-[9px] mb-0.5 md:mb-1 rounded-[7px] bg-[#eb3254] hover:bg-[#d52b4a] text-white cursor-pointer"
                                onclick="sendCode()">ارسال کد </button>
                        </div>
                        <button onclick="check(event)"
                            class="focus:bg-[#eb3254] hover:bg-[#d52b4a] transition-all duration-400 text-center w-full bg-[#eb3254] p-2 md:p-3 rounded-[10px] text-white cursor-pointer">بازیابی رمز عبور</button>
                             <div class="w-full text-center my-1 md:my-4">
                                <a href="{{ route('login') }}" class="text-[#eb3254]">
                                    ورود
                                </a>
                                <span> / </span>
                                <a href="{{ route('signup') }}" class="text-[#eb3254]">
                                    ثبت نام
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="w-full h-17 bg-[#eb3254] absolute bottom-0 flex flex-col justify-center items-center md:hidden">
            <div class="">اکادمی <b class="text-xl">Faos</b></div>
            <a href="tell:"><b class="text-white">09147794595</b></a>
        </div>
    </footer>
    <script>
        let code = document.getElementById('code')

        function sendCode() {
            let phoneNumber = document.getElementById('phoneNumber')
            if (phoneNumber.value == "") {
                alert('لطفا شماره تلفن را وارد نمایید')
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
                    },
                    error: function() {
                        alert('خطا در دریافت داده')
                    }
                })
            }
        }

        let checkCodeForm = document.getElementById('checkCodeForm')

        function check(e) {
            e.preventDefault()
            let phoneNumber = document.getElementById('phoneNumber')
            if (phoneNumber.value == "") {
                alert('لطفا شماره تلفن را وارد نمایید')
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
                        if (!user.validate) {
                        alert("قبلا ثبت نام نکرده اید")
                        location.assign("{{ route('signup') }}")
                        }else{
                            if (!user.checkCode) {
                                alert('کد وارد شده نامعتبر')
                            }
                            if (user.checkCode) {
                                checkCodeForm.submit()
                            }

                        }
                    },
                    error: function() {
                        alert('خطا در بارگیری اطلاعات')
                    }
                })
            }
        }
    </script>
    @endsection
{{-- </body>

</html> --}}
