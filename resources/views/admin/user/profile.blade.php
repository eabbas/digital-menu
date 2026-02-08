    @extends('admin.app.panel')
    @section('title', 'پروفایل کاربری')
    @section('content')
        <div class="w-full">
            <div class="flex flex-col border-none rounded-[7px]">
                <div class="block lg:flex flex-row justify-between gap-8">
                    <div class="flex flex-col xm:flex-row lg:flex-row gap-5 lg:py-3 rounded-full">
                        @if (!Auth::user()->main_image)
                            <img class="hidden lg:block size-30 mx-auto lg:m-0 rounded-full"
                                src="{{ asset('assets/img/user.png') }}" alt="user__avatar">
                        @else
                            <img class="hidden lg:block size-30 mx-auto lg:m-0 rounded-full"
                                src="{{ asset('storage/' . Auth::user()->main_image) }}" alt="user__picture">
                        @endif
                        <div class="flex flex-col justify-end">
                            <div class="div1 hidden lg:block text-center lg:text-start">
                                <strong class="text-gray-700">{{ Auth::user()->name }} {{ Auth::user()?->family }}</strong>
                            </div>

                            <div class="flex flex-col lg:flex-row gap-2 mt-4 mx-10 lg:mx-0">
                                <div
                                    class="py-1.5 lg:py-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border rounded-[5px]">
                                    <span class="font-bold text-blue-500">{{ Auth::user()->scan_count }}</span>
                                    <span class="text-[#4B5675]">تعداد اسکن ها</span>
                                </div>
                                <div
                                    class="py-1.5 lg:py-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border rounded-[5px]">
                                    <span class="font-bold text-blue-500">{{ count(Auth::user()->qr_codes) }}</span>
                                    <span class="text-[#4B5675]"> تعداد QR کد ها </span>
                                </div>
                                <div
                                    class="py-1.5 lg:py-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border max-sm:border-[1.5px] rounded-[5px]">
                                    <span class="font-bold text-blue-500">{{ count(Auth::user()->careers) }}</span>
                                    <span class="text-[#4B5675]">تعداد کسب و کارها</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3 mt-4 lg:mt-8">
                <div class="shadow__profaill__karbary rounded-md lg:p-5 p-2 mb-3 lg:mb-5 bg-white">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="text-sm text-center lg:text-start lg:text-xl mt-3 lg:mt-5 font-bold mx-2">جزییات پروفایل
                        </h1>
                        @if (!isset(Auth::user()->request))
                            <a href="{{ route('user.request', [Auth::user()]) }}"
                                class="font-bold text-blue-500 text-xs lg:text-sm">درخواست نمایندگی</a>
                        @endif
                    </div>

                    <div class="w-full h-px bg-gray-200 my-3 lg:my-5 "></div>
                    <div class="flex gap-7 sm:hidden">
                        <div class="flex w-full flex-col">
                            <span class="p-1.5 text-xs lg:p-2.5 text-gray-400">نام کامل</span>
                            <span class="p-1.5 lg:p-2.5 text-gary-600 text-sm">
                                <strong>{{ Auth::user()->name }}
                                    {{ Auth::user()?->family }}
                                </strong>
                            </span>
                            <span class="p-1.5 text-xs lg:p-2.5 text-gray-400">شماره تلفن</span>
                            <span class="p-1.5 lg:p-2.5 text-gary-600">{{ Auth::user()->phoneNumber }}</span>
                            <span class="p-1.5 text-xs lg:p-2.5 text-gray-400">ایمیل</span>
                            <span class="p-1.5 lg:p-2.5 text-gary-600">{{ Auth::user()->email }}</span>
                            <span class="p-1.5 text-xs lg:p-2.5 text-gray-400">نقش</span>
                            <span class="p-1.5 lg:p-2.5 text-gary-600">
                                @foreach (Auth::user()->roles as $role)
                                    {{ $role }} </br>
                                @endforeach
                            </span>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:gap-2 hidden">
                        <div class="flex w-full flex-col">
                            <span class="p-2.5 text-gray-400">نام کامل</span>
                            <span class="p-2.5 text-gray-400">شماره تلفن</span>
                            <span class="p-2.5 text-gray-400">نقش</span>
                            <span class="p-2.5 text-gray-400">ایمیل</span>
                        </div>
                        <div class="flex w-full flex-col">
                            <span class="p-2.5 text-gary-600"><strong>{{ Auth::user()->name }}
                                    {{ Auth::user()?->family }}</strong></span>
                            <span class="p-2.5 text-gary-600">{{ Auth::user()->phoneNumber }}</span>
                            <span class="p-2.5 text-gary-600">
                                @foreach (Auth::user()->roles as $role)
                                    {{ $role }} </br>
                                @endforeach
                            </span>
                            <span class="p-2.5 text-gary-600">{{ Auth::user()->email }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
