@extends('admin.app.panel')

@section('title', 'لیست سفارشات')

@section('content')

    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">

            <h2 class="text-lg font-bold text-gray-800 p-4 text-center">لیست سفارشات {{ $career->title }}</h2>

            <form class="flex flex-col gap-5" action="{{ route('career.deleteAll') }}" method="post">
                @csrf

                <div class="w-10/12 mx-auto flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-3">
                        <input type="checkbox" id="all" onchange="checkAll()">
                        <label for="all" class="text-gray-700 text-xs">انتخاب همه</label>
                    </div>
                    <div class="flex flex-row items-center justify-end gap-3 lg:gap-5">
                        <select class="px-4 py-2 w-40 focus:outline-none text-sm font-bold mr-2 cursor-pointer text-sm font-bold border-1 border-gray-300 rounded-sm"
                                name='event'>

                                <option value="accept">تایید</option>
                                <option value="remove">حذف</option>

                        </select>
                        <div class="flex justify-center">
                            <button
                                    class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 text-white px-4 py-2 text-sm font-bold rounded-sm cursor-pointer">
                                ثبت
                            </button>
                        </div>

                    </div>
                </div>
                <div
                        class="w-10/12 mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden lg:overflow-visible">
                    <div
                            class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                        <div class="text-center text-xs font-medium text-gray-600 bg-gray-100 h-full">
                            <div class="w-10 lg:w-full h-10 text-gray-100"></div>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-10 lg:w-full text-center">ردیف</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-20 lg:w-full">نام آیتم</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-20 lg:w-full">تعداد</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-4">
                            <span class="block w-[120px] lg:w-full">شماره میز | آدرس</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-3">
                            <span class="block w-[150px] lg:w-full">عملیات</span>
                        </div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @php
                            $i = 1;
                        @endphp
                        @if (isset($career->carts))
                            @foreach ($career->carts as $cart)
                                @if ($cart->status)
                                    <div
                                            class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4]">
                                        <div
                                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <div class="w-10 lg:w-full">
                                                <input type="checkbox" class="check" name="careers[]"
                                                       value="{{ $cart->id }}">
                                            </div>
                                        </div>
                                        <div
                                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span class="block w-10 lg:w-full">{{ $i }}</span>
                                        </div>

                                        <div
                                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                            <span class="block w-20 lg:w-full">{{ $cart->menu_item->title }}</span>
                                        </div>
                                        <div
                                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                            <span class="block w-20 lg:w-full">{{ $cart->quantity }}</span>
                                        </div>
                                        <div
                                                class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-4"
                                                title="{{ $cart->qr_code->description ?? $cart->address }}">
                                            <span
                                                    class="block w-[120px] lg:w-full">{{ $cart->qr_code->description ?? $cart->address }}</span>
                                        </div>

                                        <div class="col-span-3">

                                            <ul class="lg:w-full w-[150px] text-sm mt-1 rounded-sm p-1 grid grid-cols-2">
                                                <li class="flex justify-center">
                                                    <div
                                                       class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm text-white cursor-pointer"
                                                       title="تایید">
                                                        تایید
                                                    </div>
                                                </li>
                                                <li class="flex justify-center">
                                                    <div
                                                       class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm text-white cursor-pointer"
                                                       title="حذف">
                                                        حذف
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection