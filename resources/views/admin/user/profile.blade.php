    @extends('admin.app.panel')
    @section('title', 'پروفایل کاربری')
    @section('content')
   <div class="w-full">
            <div class="pb-5 w-full">
                <h1 class="text-xl text-center lg:text-start">اکانت من</h1>
                <div class="flex flex-row justify-center lg:justify-start items-center gap-2 text-[#99A1B7] text-[11px] lg:text-sm">
                    <a href="{{ route('home') }}" class="p-2">خانه</a>
                    <span>/</span>
                    <a href="{{ route('user.profile', [$user]) }}">اکانت من</a>
                </div>
            </div>
           
        <div class="flex flex-col border-none rounded-[7px]">
            <div class="block lg:flex flex-row justify-between gap-8">
                <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">
                    @if(!$user->main_image)
                    <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0" src="{{ asset('assets/img/user.png') }}" alt="user__avatar">
                    @else
                    <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0" src="{{ asset('storage/'.$user->main_image) }}" alt="user__picture">
                    @endif
                    <div class="flex flex-col justify-end">
                        <div class="div1 text-center lg:text-start">
                            <strong class="text-gray-700">{{ $user->name }} {{ $user?->family }}</strong>
                        </div>
                        <div class="div2 hidden">
                            <ul class="flex flex-col lg:flex-row gap-3 text-[#99A1B7]">
                                <li>
                                    <a href="">توسعه دهنده</a>
                                </li>
                                <li>
                                    <a href="">منطقه زندگی</a>
                                </li>
                                <li>
                                    <a href="">max@kt.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-2 mt-8 mx-10 lg:mx-0">
                            <div class="p-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border rounded-[5px]">
                                <span class="font-bold text-blue-500">0</span>
                                <span class="text-[#4B5675]">تعداد اسکن ها</span>
                            </div>
                            <div class="p-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border rounded-[5px]">
                                <span class="font-bold text-blue-500">0</span>
                                <span class="text-[#4B5675]"> تعداد QR کد ها </span>
                            </div>
                            <div class="p-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border max-sm:border-[1.5px] rounded-[5px]">
                                <span class="font-bold text-blue-500">{{ count($user->careers) }}</span>
                                <span class="text-[#4B5675]">تعداد کسب و کارها</span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
    </div>
    <!-- <hr> -->
    <div class="pt-3 mt-4 lg:mt-8">
        <!-- <div class="my-6 ">
            <ul class="flex flex-row gap-2 overflow-x-auto scroll-snap-x snap-mandatory no-scrollbar" style="scrollbar-width: none;">
                <li>
                    <a class="bg-gray-100 focus:text-blue-600 rounded-[13px] text-center text-gray-600 py-2 hover:text-blue-700 block w-[110px]" href="">بررسی اجمالی</a>
                </li>
                <li>
                    <a class="bg-gray-100 focus:text-blue-600 rounded-[13px] text-center text-gray-600 py-2 hover:text-blue-700 block w-[110px]" href="">تنظیمات</a>
                </li>
                <li>
                    <a class="bg-gray-100 focus:text-blue-600 rounded-[13px] text-center text-gray-600 py-2 hover:text-blue-700 block w-[110px]" href="">امنیت</a>
                </li>
                <li>
                    <a class="bg-gray-100 focus:text-blue-600 rounded-[13px] text-center text-gray-600 py-2 hover:text-blue-700 block w-[110px]" href="">فعالیت</a>
                </li>
                <li>
                    <a class="bg-gray-100 focus:text-blue-600 rounded-[13px] text-center text-gray-600 py-2 hover:text-blue-700 block w-[110px]" href="">صورتحساب</a>
                </li>
                <li>
                    <a class="bg-gray-100 focus:text-blue-600 rounded-[13px] text-center text-gray-600 py-2 hover:text-blue-700 block w-[110px]" href="">بیانه ها</a>
                </li>
                <li>
                    <a class="bg-gray-100 focus:text-blue-600 rounded-[13px] text-center text-gray-600 py-2 hover:text-blue-700 block w-[110px]" href="">مراجعات</a>
                </li>
                <li>
                    <a class="bg-gray-100 focus:text-blue-600 rounded-[13px] text-center text-gray-600 py-2 hover:text-blue-700 block w-[110px]" href="">کلید ای پی ای</a>
                </li>
                <li>
                    <a class="bg-gray-100 focus:text-blue-600 rounded-[13px] text-center text-gray-600 py-2 hover:text-blue-700 block w-[110px]" href="">گزارش</a>
                </li>
            </ul>
        </div> -->
        <div class="shadow__profaill__karbary rounded-md lg:p-5 p-2 mb-3 lg:mb-5">
            <h1 class="lg:text-xl mt-5 font-bold mx-2">جزییات پروفایل </h1>
           
            <div class="w-full h-px bg-gray-200 my-5 "></div>
            <div class="flex gap-7 sm:hidden">
                <div class="flex w-full flex-col">
                    <label class="p-2.5 text-gray-400">نام کامل</label>
                    <span class="p-2.5 text-gary-600"><strong>{{ $user->name }} {{ $user?->family }}</strong></span>
                    <label class="p-2.5 text-gray-400">کمپانی</label>
                    <span class="p-2.5 text-gary-600">فائوس</span>
                    <label class="p-2.5 text-gray-400">تماس با ما تلفن </label>
                    <span class="p-2.5 text-gary-600">{{ $user->phoneNumber }}<mark class="mx-2 text-green-700 bg-green-300 px-1 rounded-md">تایید
                            شده</mark></span>
                    <label class="p-2.5 text-gray-400">سایت کمپانی</label>
                    <a href="#" class="p-2.5 text-gary-600">famenu.ie</a>
                    <label class="p-2.5 text-gray-400">کشور </label>
                    <span class="p-2.5 text-gary-600">ایران</span>
                    <label class="p-2.5 text-gray-400">ارتباط</label>
                    <span class="p-2.5 text-gary-600">ایمیل, تلفن</span>
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-2 sm:gap-2 hidden">
                <div class="flex w-full flex-col">
                    <label class="p-2.5 text-gray-400">نام کامل</label>
                    <label class="p-2.5 text-gray-400">کمپانی</label>
                    <label class="p-2.5 text-gray-400">تماس با ما تلفن </label>
                    <label class="p-2.5 text-gray-400">سایت کمپانی</label>
                    <label class="p-2.5 text-gray-400">کشور </label>
                    <label class="p-2.5 text-gray-400">ارتباط</label>
                </div>
                <div class="flex w-full flex-col">
                    <span class="p-2.5 text-gary-600"><strong>{{ $user->name }} {{ $user?->family }}</strong></span>
                    <span class="p-2.5 text-gary-600">فائوس</span>
                    <span class="p-2.5 text-gary-600">{{ $user->phoneNumber }}<mark class="mx-2 text-green-700 bg-green-300 px-1 rounded-md">تایید
                            شده</mark></span>
                    <a href="#" class="p-2.5 text-gary-600">famenu.ie</a>
                    <span class="p-2.5 text-gary-600">ایران</span>
                    <span class="p-2.5 text-gary-600">ایمیل, تلفن</span>
                </div>
            </div>

        </div>
    </div>
    </div>
    @endsection