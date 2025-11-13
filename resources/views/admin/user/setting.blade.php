    @extends('admin.user.panel')
    @section('title', 'پروفایل کاربری')
    @section('content')
   <div class="w-full">
            <div class="pb-5 w-full">
                <h1 class="text-xl text-center lg:text-start">اکانت من</h1>
                <div class="flex flex-row justify-center lg:justify-start items-center gap-2 text-[#99A1B7] text-[11px] lg:text-sm">
                    <a href="{{ route('home') }}" class="p-2">خانه</a>
                    <span>/</span>
                    <a href="{{ route('user.profile', [Auth::user()]) }}">اکانت من</a>
                </div>
            </div>
           
        <div class="flex flex-col border-none rounded-[7px]">
            <div class="block lg:flex flex-row justify-between gap-8">
                <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">
                    @if(!Auth::user()->main_image)
                    <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0" src="{{ asset('assets/img/user.png') }}" alt="user__avatar">
                    @else
                    <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0" src="{{ asset('storage/'.Auth::user()->main_image) }}" alt="user__picture">
                    @endif
                    <div class="flex flex-col justify-end">
                        <div class="div1 text-center lg:text-start">
                            <strong class="text-gray-700">{{ Auth::user()->name }} {{ Auth::user()?->family }}</strong>
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
                                <span class="font-bold text-blue-500">4,500</span>
                                <span class="text-[#4B5675]">تعداد اسکن ها</span>
                            </div>
                            <div class="p-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border rounded-[5px]">
                                <span class="font-bold text-blue-500">56</span>
                                <span class="text-[#4B5675]"> تعداد QR کد ها </span>
                            </div>
                            <div class="p-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border max-sm:border-[1.5px] rounded-[5px]">
                                <span class="font-bold text-blue-500">6</span>
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
        <form action="{{ route('user.update') }}" method="post" class="shadow__profaill__list_products rounded-lg pb-4" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ Auth::id() }}">
            <div class="w-full flex items-center">
                <div class="">
                    <h2 class="text-xl mr-5">جزییات پروفایل</h2>
                </div>
            </div>
            <div class="h-px bg-gray-200 mb-5"></div>
            <div class="p-5 px-6">
                <table class="w-full">
                    <tbody class="tsble">
                        <tr>
                            <td>تصویر</td>
                            <td>
                                <img class="size-30 rounded-[5px] border-3 shadow__fhoto__insetting__profaill border-white"
                                    src="{{ asset('storage/'.Auth::user()->main_image) }}" alt="user imag">
                                    <input type="file" name="main_image" class="cursor-pointer">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-sm py-4">نام کامل</td>
                            <td class="text-sm py-4 flex gap-4">
                                <input
                                    class="w-[50%] p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] "
                                    type="text" value="{{ Auth::user()->name }}" name="name" placeholder="نام">
                                <input
                                    class="w-[50%] p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] "
                                    type="text" value="{{ Auth::user()->family }}" name="family" placeholder="نام خانوادگی">
                            </td>
                        </tr>
                        <!-- <tr>
                            <td class="text-sm py-4">کمپانی</td>
                            <td class="text-sm py-4">
                                <input
                                    class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                    type="text" value="fous" placeholder="نام کمپانی">
                            </td>
                        </tr> -->
                        <tr>
                            <td class="text-sm">تماس تلفنی با ما </td>
                            <td class="text-sm">
                                <input
                                    class="w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                    type="number" name="phoneNumber" value="{{ Auth::user()->phoneNumber }}" placeholder="شماره تلفن">
                            </td>
                        </tr>
                     
                        <tr>
                            <td class="text-sm py-4">ایمیل</td>
                            <td class="text-sm py-4">
                                <input
                                    class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                    type="email" name="email" value="{{ Auth::user()->email }}" placeholder="ایمیل">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-sm py-4">رمز عبور</td>
                            <td class="text-sm py-4">
                                <input
                                    class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                    type="password" name="password" placeholder="رمز عبور">
                            </td>
                        </tr>
                        <!-- <tr>
                            <td class="text-sm py-4">زبان</td>
                            <td class="text-sm py-4">
                                <select
                                    class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] "
                                    name="language" id="">
                                    <option value>انتخاب زبان</option>
                                    <option>Bahasa Indonesia - Indonesian</option>
                                    <option>Bahasa Melayu - Malay</option>
                                    <option>Deutsch - آلمانی</option>
                                    <option>Čeština - Czech</option>
                                    <option>Tiếng Việt - Vietnamese</option>
                                    <option>עִבְרִית - Hebrew</option>
                                    <option>Suomi - Finnish</option>
                                </select>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <td class="text-sm py-4">زمان محلی</td>
                            <td
                                class="text-sm py-4 px-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7]">
                                <span class="">انتخاب منطقه زمانی</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-sm py-4">واحد پول*</td>
                            <td class="text-sm py-4">
                                <div
                                    class="p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7]">
                                    انتخاب واحد پول</div>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <td class="text-sm py-4">ارتباط</td>
                            <td class="text-sm py-4 flex items-center gap-4">
                                <div class="flex items-center gap-2">
                                    <input class="size-5" type="checkbox">
                                    <label for="">ایمیل</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input class="size-5" type="checkbox">
                                    <label for="">تلفن</label>
                                </div>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <td class="text-sm py-4">بازاریابی*</td>
                            <td class="text-sm py-4">
                                <label class="relative inline-flex" for=""></label>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="h-px bg-gray-200 my-4"></div>
            <div class="w-full h-10  flex justify-end pl-6 gap-2">
                <button class="px-4 py-2 bg-[#F1F1F4] rounded-[7px] cursor-pointer" type="reset">لغو</button>
                <button class="px-4 py-2 bg-[#1B84FF] rounded-[7px] text-white cursor-pointer" type="submit">ذخیره تغییرات</button>
            </div>
        </form>
    </div>
    </div>
    @endsection