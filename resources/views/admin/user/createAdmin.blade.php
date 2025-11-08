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
    <div class="flex flex-row-reverse">
        <div class="flex justify-center  w-6/12 bg-[#056EE9] 2xl:h-full">
            <div class="flex flex-col my-12 items-center">
                <div>
                    <h1 class="text-3xl text-center font-bold text-white">
                        Faos
                    </h1>
                </div>
                <div class="my-9">
                    <img class="w-125 h-95"
                        src="file:///F:/Metronic%20v8.2.6/Html/demo1/demo1/assets/media/misc/auth-screens.png"
                        alt="img">
                </div>
                <div class="flex flex-col items-center w-full text-white">
                    <h1 class="text-3xl font-bold">سریع، کارآمد و محصولی</h1>

                    <p class="text-sm mt-5 text-center font-bold">در این نوع پست، <a href="#"
                            class="text-yellow-400">وبلاگر</a> فردی را که با او مصاحبه کرده اند معرفی می کند
                        و اطلاعات پس زمینه ای در مورد آن ارائه می دهد <a href="#" class="text-yellow-400">مصاحبه
                            شونده</a> and their
                        ویاک زیر این مصاحبه متنی است.</p>
                </div>
            </div>
        </div>
        <div class="w-full bg-white flex justify-center ">
            <div class="flex flex-col items-center w-full mt-8">
                <h1 class="text-2xl font-bold">ایجاد ادمین</h1>
                <div class="w-1/2 mx-auto flex flex-col">
                    <form action="{{ route('user.adminStore') }}" class="w-full flex flex-col items-center my-6 gap-3 " method="post">
                        @csrf
                        <input type="text"
                            class="w-full p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="name" placeholder="نام" required>
                        <input type="text"
                            class="w-full p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="family" placeholder="نام خانوادگی">
                        <input type="number"
                            class="w-full p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="phoneNumber" placeholder="شماره تلفن" required>
                        <input type="password" maxlength="8"
                            class="w-full p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="password" placeholder="کلمه عبور" required>
                        <div class="w-full flex gap-2  items-center ">
                            <input type="checkbox" name="Rules" class="size-5 my-4">
                            <label for="Rules" class="text-sm text-[#4B5675]">قوانین را قبول میکنم <a
                                href="#">قوانین</a></label>
                        </div>

                        <button class="text-center w-full bg-[#056EE9] p-3 rounded-[10px] text-white cursor-pointer">ثبت</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

</body>

</html>