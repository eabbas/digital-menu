    @extends('user.panel')
    @section('title', 'پروفایل کاربری')
    @section('content')
    <div class="2xl:container mx-auto w-9/12 p-5">
        <div class="flex justify-between py-5">
            <div>
                <h1 class="text-xl">اکانت من </h1>
                <div class="text-[#99A1B7] text-sm flex flex-row items-center mt-2">
                    <a href="{{ route('home') }}">خانه</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('user.panel', [$user]) }}">پنل من</a>
                </div>
            </div>
            <!-- <div class="flex flex-row gap-2">
                <div class="bg-[#F1F1F4] w-17 h-10 flex justify-center items-center rounded-[10px]">
                    <a class="" href="">فیلتر</a>
                </div>
                <div class="bg-[rgb(53,149,246)] w-17 h-10 flex justify-center items-center rounded-[10px]">
                    <a class=" text-white" href="">ساختن</a>
                </div>
            </div> -->
        </div>
        <!-- <hr> -->
        <div class="flex flex-col shadow__profaill__karbary p-5 rounded-[7px]">
            <div class="flex flex-row gap-8 ">
                <div class="div1">
                    <img class="size-41 rounded-lg" src="{{ asset('assets/img/user.png') }}" alt="">
                </div>
                <div class="flex flex-col gap-2">
                    <div class="div1">
                        <strong>{{ $user->name }}</strong>
                    </div>
                    <div class="div2">
                        <ul class="flex flex-row gap-3">
                            <li>
                                <a href="">توسعه دهنده</a>
                            </li>
                            <li>
                                <a href="">منطقه زندگی</a>
                            </li>
                            <li>
                                <a href="">{{ $user->email }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex gap-3 mt-8">
                        <div class="flex flex-col border border-black rounded-[5px] w-25 h-15 p-1 ">
                            <span>4,500</span>
                            <span>تعداد اسکن</span>
                        </div>
                        <div class="flex flex-col border border-black rounded-[5px] w-25 h-15 p-1 ">
                            <span>80</span>
                            <span>تعداد QR کد ها</span>
                        </div>
                        <div class="flex flex-col border border-black rounded-[5px] w-25 h-15 p-1 ">
                            <span>60</span>
                            <span>تعداد کسب و کار</span>
                        </div>
                    </div>
                </div>
                <!-- <div class="flex flex-col justify-between h-35">
                    <div class="">
                        <ul class="flex flex-row gap-3">
                            <li>
                                <div class="p-2 rounded-lg bg-gray-200">
                                    <a href="">دنبال کردن</a>
                                </div>
                            </li>
                            <li>
                                <div class="p-2 rounded-lg bg-blue-500 text-white">
                                    <a href="">من را استخدام کن</a>
                                </div>
                            </li>
                            <li>
                                <div class="size-10 rounded-lg bg-gray-200 text-white">
                                    <a href=""></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="">
                        <div class="flex justify-between">
                            <span>تکمیل پرفایل</span>
                            <strong>50%</strong>
                        </div>
                        <div class="w-90 bg-gray-300 h-1 rounded-[5px]">
                            <div class="w-[50%] bg-blue-500 rounded-[5px] h-1"></div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="mt-6">
                <ul class="flex flex-row gap-5">
                    <li>
                        <a class="hover:text-blue-700" href="">بررسی اجمالی</a>
                    </li>
                    <li>
                        <a class="hover:text-blue-700" href="{{route('user.edit', [$user]) }}">تنظیمات کاربری</a>
                    </li>
                    <li>
                        <a class="hover:text-blue-700" href="">امنیت</a>
                    </li>
                    <li>
                        <a class="hover:text-blue-700" href="">فعالیت</a>
                    </li>
                    <li>
                        <a class="hover:text-blue-700" href="">صورتحساب</a>
                    </li>
                    <li>
                        <a class="hover:text-blue-700" href="">بیانه ها</a>
                    </li>
                    <li>
                        <a class="hover:text-blue-700" href="">مراجعات</a>
                    </li>
                    <li>
                        <a class="hover:text-blue-700" href="">کلید ای پی ای</a>
                    </li>
                    <li>
                        <a class="hover:text-blue-700" href="">گزارش</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <hr> -->
        <div class="p-5 shadow__profaill__karbary rounded-md my-8">
            <!-- <div class="flex justify-between items-center">
                <h1 class="text-xl">جزییات پروفایل </h1>
                <div class="p-2 bg-blue-500 rounded-lg px-3 text-white">
                    <a href="">پروفایل</a>
                </div>
            </div> -->
            <div class="w-full h-px bg-gray-200 my-5 "></div>
            <div class="flex gap-70 ">
                <div class="flex flex-col">
                    <span class="p-2.5 text-gray-400">نام کامل</span>
                    <span class="p-2.5 text-gray-400">کمپانی</span>
                    <span class="p-2.5 text-gray-400">تماس با ما تلفن </span>
                    <span class="p-2.5 text-gray-400">سایت کمپانی</span>
                    <span class="p-2.5 text-gray-400">کشور </span>
                    <span class="p-2.5 text-gray-400">ارتباط</span>
                    <span class="p-2.5 text-gray-400">همه</span>
                </div>
                <div class="flex flex-col">
                    <span class="p-2.5"><strong>{{ $user->name }}</strong></span>
                    <span class="p-2.5">ساتراس وب</span>
                    <span class="p-2.5">{{ $user->phoneNumber }}<mark class="bg-green-400 px-1 rounded-md mr-2">تایید شده</mark></span>
                    <a href="#" class="p-2.5">keenthemes.com</a>
                    <span class="p-2.5">المان</span>
                    <span class="p-2.5">ایمیل, تلفن</span>
                    <span class="p-2.5">بله</span>
                </div>
            </div>
        </div>
    </div>
    @endsection