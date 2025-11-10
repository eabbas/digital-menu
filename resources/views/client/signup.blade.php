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
    <div class="h-dvh flex flex-row-reverse">
        <div class="hidden md:flex justify-center w-4/12 bg-[#056EE9] 2xl:h-full">
            <div class="flex flex-col my-12 items-center justify-center">
                <div>
                    <h1 class="text-3xl text-center font-bold text-white">
                        Faos
                    </h1>
                </div>
            </div>
        </div>
        <div class="w-full md:w-8/12 bg-white flex justify-center ">
            <div class="flex flex-col items-center justify-center w-full">
                <h1 class="md:text-2xl font-bold text-base">ثبت نام</h1>
                <div class="w-2/3 md:w-1/2 mx-auto flex flex-col">
                    <form action="{{ route('user.store') }}" class="w-full flex flex-col items-center my-6 gap-1 md:gap-3" method="post">
                        @csrf
                        <input type="text"
                            class="w-full p-1.5 text-xs md:text-base md:p-[9px] mb-0.5 md:mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="name" placeholder="نام" required>
                        <input type="text"
                            class="w-full p-1.5 text-xs md:text-base md:p-[9px] mb-0.5 md:mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="family" placeholder="نام خانوادگی">
                        <input type="number"
                            class="w-full p-1.5 text-xs md:text-base md:p-[9px] mb-0.5 md:mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="phoneNumber" placeholder="شماره تلفن" required>
                        <input type="password" maxlength="8"
                            class="w-full p-1.5 text-xs md:text-base md:p-[9px] mb-0.5 md:mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="password" placeholder="کلمه عبور" required>
                        <div class="w-full flex gap-2  items-center ">
                            <input type="checkbox" name="Rules" class="size-3 md:size-5 my-4">
                            <label for="Rules" class="text-xs md:text-sm text-[#4B5675]">قوانین را قبول میکنم <a
                                href="#" class="text-[#056EE9]">قوانین</a></label>
                        </div>

                        <button class="focus:bg-[#2c44cb] hover:bg-[#2c44cb] transition-all duration-400 text-center w-1/3 md:w-full bg-[#056EE9] p-1 text-xs md:text-base md:p-3 rounded-[10px] text-white cursor-pointer">ثبت نام</button>
                        <div class="w-full text-center my-2 md:my-4 text-xs md:text-base">
                            <span class="text-[#4B5675] mt-5"> از قبل اکانت داری؟<a href="{{ route('login') }}"
                                class="text-[#1B84FF]">ورود</a></span>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

</body>

</html>