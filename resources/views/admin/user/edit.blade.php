@extends('admin.app.panel')
@section('title', 'ویرایش کاربر')
@section('content')
    <div class="w-full">
        <div class="pb-5 w-full">
            <h1 class="text-xl text-center lg:text-start">کاربر {{ $user->name }}{{ $user->family }}</h1>
            <div
                class="flex flex-row justify-center lg:justify-start items-center gap-2 text-[#99A1B7] text-[11px] lg:text-sm">
                {{-- <a href="{{ route('home') }}" class="p-2">خانه</a>
                    <span>/</span> --}}
                <a href="{{ route('user.profile', [Auth::user()]) }}">داشبورد</a>
            </div>
        </div>

        <div class="flex flex-col border-none rounded-[7px]">
            <div class="block lg:flex flex-row justify-between gap-8">
                <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">
                    @if (!$user->main_image)
                        <img class="size-27 lg:size-41 rounded-full mx-auto lg:m-0" src="{{ asset('assets/img/user.png') }}"
                            alt="user__avatar">
                    @else
                        <img class="size-27 lg:size-41 rounded-full mx-auto lg:m-0"
                            src="{{ asset('storage/' . $user->main_image) }}" alt="user__picture">
                    @endif
                    <div class="flex flex-col justify-end">
                        <div class="div1 text-center lg:text-start">
                            <sdivong class="text-gray-700">{{ $user->name }} {{ $user?->family }}</sdivong>
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
                            <div
                                class="p-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border rounded-[5px]">
                                <span class="font-bold text-blue-500">0</span>
                                <span class="text-[#4B5675]">تعداد اسکن ها</span>
                            </div>
                            <div
                                class="p-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border rounded-[5px]">
                                <span class="font-bold text-blue-500">{{ count($user->qr_codes) }}</span>
                                <span class="text-[#4B5675]"> تعداد QR کد ها </span>
                            </div>
                            <div
                                class="p-3 border-[#d6dbe8] flex flex-row-reverse px-2 justify-between lg:flex-col border max-sm:border-[1.5px] rounded-[5px]">
                                <span class="font-bold text-blue-500">{{ count($user->careers) }}</span>
                                <span class="text-[#4B5675]">تعداد کسب و کارها</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="pt-3 mt-4 lg:mt-8">

            <form action="{{ route('user.update') }}" method="post"
                class="shadow__profaill__list_products rounded-lg pb-4 bg-white" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="border-b border-gray-300">
                    <h2 class="text-xl mr-5 text-center lg:text-right py-4">جزییات پروفایل</h2>
                </div>
                <div class="p-5 px-6">
                    <div class="w-full">
                        <div class="tsble">
                            <div class="flex flex-col lg:flex-row">
                                <div>تصویر</div>
                                <div>
                                    @if ($user->main_image)
                                        <img class="size-30 rounded-full border-3 shadow__fhoto__insetting__profaill border-white"
                                            src="{{ asset('storage/' . $user->main_image) }}" alt="user imag">
                                    @else
                                        <img class="size-30 rounded-full border-3 shadow__fhoto__insetting__profaill border-white"
                                            src="{{ asset('assets/img/user.png') }}" alt="user imag">
                                    @endif
                                    <input type="file" name="main_image" class="cursor-pointer">
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">نام کامل</div>
                                <div class="w-full lg:w-10/12 text-sm py-4 flex flex-col lg:flex-row gap-4">
                                    <input
                                        class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] "
                                        type="text" value="{{ $user->name }}" name="name" placeholder="نام"
                                        required>
                                    <input
                                        class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] "
                                        type="text" value="{{ $user->family }}" name="family"
                                        placeholder="نام خانوادگی" required>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">شماره تلفن</div>
                                <div class="w-full lg:w-10/12 text-sm">
                                    <input
                                        class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                        type="number" name="phoneNumber" value="{{ $user->phoneNumber }}"
                                        placeholder="شماره تلفن" required>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">ایمیل</div>
                                <div class="w-full lg:w-10/12 text-sm py-4">
                                    <input
                                        class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                        type="email" name="email" value="{{ $user->email }}" placeholder="ایمیل">
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">رمز عبور</div>
                                <div class="w-full lg:w-10/12 text-sm py-4">
                                    <input
                                        class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                        type="password" name="password" placeholder="رمز عبور">
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row">
                                <div class="w-full lg:w-2/12 text-sm py-4">نقش</div>
                                <div class="w-full lg:w-10/12 text-sm py-4">
                                    <select
                                        class="w-full p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                        name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @if ($role->id == $user->role[0]->id) {{ 'selected' }} @endif>
                                                {{ $role->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full h-10  flex justify-end pl-6 gap-2">
                    <button class="px-4 py-2 bg-[#F1F1F4] rounded-[7px] cursor-pointer" type="reset">لغو</button>
                    <button class="px-4 py-2 bg-[#1B84FF] rounded-[7px] text-white cursor-pointer" type="submit">ذخیره
                        تغییرات</button>
                </div>
            </form>
        </div>
    </div>
@endsection
