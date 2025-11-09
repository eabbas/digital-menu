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
    <div class="flex flex-col justify-center items-center sm:flex sm:flex-row-reverse lg:flex lg:flex-row-reverse">
        <div class="hidden lg:flex justify-center w-6/12 bg-[#056EE9] 2xl:h-full">
            <div class="flex flex-col my-12 items-center">
                <div>
                   <h2 class="text-center font-bold text-white text-3xl">Faos</h2>
                </div>
                <div class="my-9">
                    <img class="w-full h-95"
                        src="file:///F:/Metronic%20v8.2.6/Html/demo1/demo1/assets/media/misc/auth-screens.png"
                        alt="img">
                </div>
                <div class="flex flex-col items-center w-90 text-white">
                    <h1 class="text-3xl font-bold">سریع، کارآمد و محصولی</h1>

                    <p class="text-sm mt-5 text-center font-bold">در این نوع پست، <a href="#"
                            class="text-yellow-400">وبلاگر</a> فردی را که با او مصاحبه کرده اند معرفی می کند
                        و اطلاعات پس زمینه ای در مورد آن ارائه می دهد <a href="#" class="text-yellow-400">مصاحبه
                            شونده</a> and their
                        ویاک زیر این مصاحبه متنی است.</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col sm:justify-center sm:items-center sm:h-[100vh] sm:w-6/12 hidden sm:block lg:hidden bg-blue-500">
          <strong class="mt-20 text-white text-2xl">FAUS</strong>
        </div>
        <div class="flex flex-col justify-start items-center h-30 w-full block sm:hidden lg:hidden bg-blue-500">
          <strong class="mt-20 text-white text-2xl">FAUS</strong>
        </div>
        <div class="w-10/12 sm:w-9/12 lg:w-6/12 bg-white h-full flex flex-col justify-start sm:justify-center sm:items-center lg:justify-center lg:items-center ">
            <div class="flex flex-col items-center justify-start sm:justify-center sm:items-center lg:justify-center lg:items-center lg:h-150 sm:h-150 lg:w-115 sm:w-10/12 mt-[30px] px-4">
                <h1 class="text-2xl font-bold">ورود</h1>
                <!-- <a href="#" class="mt-2 text-[#99A1B7] text-sm font-bold"> توسط سوشیال کمپین ها</a> -->
                <!-- <div class="flex flex-col w-full p-[60px] lg:flex-row-reverse gap-3 m-0">
                    <div
                        class="flex flex-row-reverse items-center gap-1 border py-3 px-7 border-solid rounded-[7px] border-[#DBDFE9] text-[#4B5675] hover:text-[#1B84FF] cursor-pointer">
                        با اپلیکیشن وارد شوید
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="2036" height="2500"
                            viewBox="0 0 456.008 560.035">
                            <path
                                d="M380.844 297.529c.787 84.752 74.349 112.955 75.164 113.314-.622 1.988-11.754 40.191-38.756 79.652-23.343 34.117-47.568 68.107-85.731 68.811-37.499.691-49.557-22.236-92.429-22.236-42.859 0-56.256 21.533-91.753 22.928-36.837 1.395-64.889-36.891-88.424-70.883-48.093-69.53-84.846-196.475-35.496-282.165 24.516-42.554 68.328-69.501 115.882-70.192 36.173-.69 70.315 24.336 92.429 24.336 22.1 0 63.59-30.096 107.208-25.676 18.26.76 69.517 7.376 102.429 55.552-2.652 1.644-61.159 35.704-60.523 106.559M310.369 89.418C329.926 65.745 343.089 32.79 339.498 0 311.308 1.133 277.22 18.785 257 42.445c-18.121 20.952-33.991 54.487-29.709 86.628 31.421 2.431 63.52-15.967 83.078-39.655" />
                        </svg>
                    </div>
                    <a href="#"
                        class="flex flex-row-reverse items-center gap-1 border py-3 px-7 border-solid rounded-[7px] border-[#DBDFE9] text-[#4B5675] hover:text-[#1B84FF]">ورود
                        از طریق گوگل
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                            viewBox="0 0 28 28" fill="none">
                            <path
                                d="M27.9851 14.2618C27.9851 13.1146 27.8899 12.2775 27.6837 11.4094H14.2788V16.5871H22.1472C21.9886 17.8738 21.132 19.8116 19.2283 21.1137L19.2016 21.287L23.44 24.4956L23.7336 24.5242C26.4304 22.0904 27.9851 18.5093 27.9851 14.2618Z"
                                fill="#4285F4" />
                            <path
                                d="M14.279 27.904C18.1338 27.904 21.37 26.6637 23.7338 24.5245L19.2285 21.114C18.0228 21.9356 16.4047 22.5092 14.279 22.5092C10.5034 22.5092 7.29894 20.0754 6.15663 16.7114L5.9892 16.7253L1.58205 20.0583L1.52441 20.2149C3.87224 24.7725 8.69486 27.904 14.279 27.904Z"
                                fill="#34A853" />
                            <path
                                d="M6.15656 16.7113C5.85516 15.8432 5.68072 14.913 5.68072 13.9519C5.68072 12.9907 5.85516 12.0606 6.14071 11.1925L6.13272 11.0076L1.67035 7.62109L1.52435 7.68896C0.556704 9.58024 0.00146484 11.7041 0.00146484 13.9519C0.00146484 16.1997 0.556704 18.3234 1.52435 20.2147L6.15656 16.7113Z"
                                fill="#FBBC05" />
                            <path
                                d="M14.279 5.3947C16.9599 5.3947 18.7683 6.52635 19.7995 7.47204L23.8289 3.6275C21.3542 1.37969 18.1338 0 14.279 0C8.69485 0 3.87223 3.1314 1.52441 7.68899L6.14077 11.1925C7.29893 7.82856 10.5034 5.3947 14.279 5.3947Z"
                                fill="#EB4335" />
                        </svg>
                    </a>
                </div> -->
                <!-- <div class="flex flex-row-reverse items-center gap-6">
                    <div class="w-37 h-px bg-[#F1F1F4] "></div>
                    <div class="text-[#4B5675] text-sm ">توسط ایمیل !</div>
                    <div class="w-37 h-px bg-[#F1F1F4] "></div>
                </div> -->
                <div class="flex flex-col w-full">
                    <form action="{{ route('user.check') }}" class="flex flex-col items-center my-6 gap-3 w-full" method="post">
                        @csrf
                        <input type="number"
                            class="focus:border-1 focus:border-blue-400 p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none w-full"
                            name="phoneNumber" placeholder="شماره تلفن">
                        <input type="password"
                            class="focus:border-1 focus:border-blue-400 p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none w-full"
                            name="password" placeholder="کلمه عبور">
                        <div class="w-full text-center">
                            <a href="#" class="text-[#1B84FF] mb-4">فراموشی رمز عبور</a>
                        </div>
                        <button class="focus:bg-[#2c44cb] hover:bg-[#2c44cb] transition-all duration-400 text-center w-full bg-[#056EE9] p-3 rounded-[10px] text-white cursor-pointer">ورود</button>
                        <div class="w-full text-center">
                            <span class="text-[#4B5675] mt-5"> هنوز عضو نشدی؟<a href="{{ route('signup') }}" class="text-[#1B84FF] mr-2">ثبت
                                    نام!</a></span>
                        </div>
                    </form>
                  
            </div>
            
        </div> 
    </div>
    </div>

</body>

</html>
