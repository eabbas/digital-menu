<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <title>metronic</title>
    <style>

    </style>
</head>

<body class="">
    <div class="w-full flex flex-col justify-center items-center md:flex-row-reverse">
        <div class="hidden md:flex justify-center md:w-4/12 bg-[#056EE9] h-dvh">
            <div class="flex flex-col my-12 items-center justify-center">
                <div>
                    <h2 class="text-center font-bold text-white text-3xl">Faos</h2>
                </div>
            </div>
        </div>

        <div class="w-10/12 md:w-8/12 bg-white h-full flex flex-col justify-center items-center">
            <div
                class="flex flex-col items-center justify-center md:justify-center h-dvh lg:w-115 md:w-10/12 px-4">
                <h1 class="text-base md:text-2xl font-bold">ورود</h1>
                <div class="flex flex-col w-full">
                    <form action="{{ route('user.check') }}" class="flex flex-col items-center my-6 gap-3 w-full"
                        method="post">
                        @csrf
                        <input type="number"
                            class="focus:border focus:border-blue-400 p-1 md:p-[9px] text-xs md:text-base mb-1 rounded-[7px] border border-[#DBDFE9] outline-none w-full"
                            name="phoneNumber" placeholder="شماره تلفن">
                        <input type="password"
                            class="focus:border focus:border-blue-400 p-1 md:p-[9px] text-xs md:text-base mb-1 rounded-[7px] border border-[#DBDFE9] outline-none w-full"
                            name="password" placeholder="کلمه عبور">
                        <div class="w-full text-center">
                            <a href="#" class="text-[#1B84FF] mb-4 text-xs md:text-base">فراموشی رمز عبور</a>
                        </div>
                        <button
                            class="focus:bg-[#2c44cb] hover:bg-[#2c44cb] transition-all duration-400 text-center w-1/2 md:w-full bg-[#056EE9] p-1 text-xs md:text-base md:p-3 rounded-[10px] text-white cursor-pointer">ورود</button>
                        <div class="w-full text-center">
                            <span class="text-[#4B5675] mt-3 md:mt-5 text-xs md:text-base"> هنوز عضو نشدی؟<a href="{{ route('signup') }}"
                                    class="text-[#1B84FF] mr-2">ثبت
                                    نام!</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>