@extends('admin.app.panel')
@section('title', 'لیست سفارشات')
@section('content')

    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">

            <h2 class="text-lg font-bold text-gray-800 p-4 text-center">لیست سفارشات {{ $career->title }}</h2>

            <div class="flex flex-col gap-5">


                <div
                        class="w-10/12 mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden lg:overflow-visible">
                    <div
                            class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] sticky -top-5">

                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-10 lg:w-full text-center">ردیف</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-20 lg:w-full">شماره میز</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-4">
                            <span class="block w-[120px] lg:w-full"> آدرس</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="block w-[120px] lg:w-full">آیتم ها</span>
                        </div>
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-3">
                            <span class="block w-[150px] lg:w-full">عملیات</span>
                        </div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @php
                            $i = 1;

                        @endphp
                        @if (isset($career->orders))
                            @foreach ($career->orders as $order)
                                {{--                                @if ($cart->status)--}}
                                <div
                                        class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4]">

                                    <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                        <span class="block w-10 lg:w-full">{{ $i }}</span>
                                    </div>

                                    <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                        <span class="block w-20 lg:w-full">{{ $order->qr_code ? ($order->qr_code->description ? $order->qr_code->description : $order->qr_code->slug) : "-" }}</span>
                                    </div>
                                    <div
                                            class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-4"
                                            title="{{ $order->address ? $order->address->address : "-" }}">
                                            <span
                                                    class="block w-[120px] lg:w-full">{{ $order->address ? $order->address->address : "-" }}</span>
                                    </div>
                                    <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-2 cursor-pointer" onclick='showItems("{{ $order->id }}")'>
                                            <span class="block w-[120px] lg:w-full text-blue-500">مشاهده آیتم ها</span>
                                    </div>

                                    <div class="col-span-3">

                                        <ul class="lg:w-full w-[150px] text-sm mt-1 rounded-sm p-1 grid grid-cols-2">
                                            <li class="flex justify-center">
                                                @if($order->status == 1)
                                                    <div onclick='accept("{{ $order->id }}", this, "accept")'
                                                         class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm text-white cursor-pointer"
                                                         title="تایید">
                                                        تایید
                                                    </div>
                                                @endif
                                                @if($order->status == 2)
                                                    <div onclick='accept("{{ $order->id }}", this, "send")'
                                                         class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm text-white cursor-pointer"
                                                         title="ارسال">
                                                        ارسال
                                                    </div>
                                                @endif
                                                @if($order->status == 3)
                                                    <div
                                                            class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm text-white cursor-pointer"
                                                            title="تمام شد">
                                                        تمام شد
                                                    </div>
                                                @endif
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

                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="itemList"
         class="w-full fixed lg:hidden top-16 right-0 transition-all duration-300 z-5 max-h-0 overflow-hidden bg-white">
        <div class="flex flex-row items-center pt-3 px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 cursor-pointer"
                 onclick="hideItems()" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>

        </div>
        <div class="w-full transition-all duration-300 [&::-webkit-scrollbar]:hidden flex flex-col items-center gap-3 p-5 overflow-y-auto">
            <div class="w-full mx-auto shadow-md rounded mb-5 overflow-x-auto [&::-webkit-scrollbar]:hidden lg:overflow-visible">
                <div
                        class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] sticky -top-5">
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                        <span class="block w-10 lg:w-full text-center">ردیف</span>
                    </div>
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                        <span class="block w-30 lg:w-full">عنوان</span>
                    </div>
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                        <span class="block w-[180px] lg:w-full">تعداد</span>
                    </div>
                    <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                        <span class="block w-[130px] lg:w-full">مبلغ</span>
                    </div>
                </div>
                <div class="bg-white divide-y divide-[#f1f1f4]"></div>

            </div>
        </div>
    </div>


    <div class="absolute top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-3/4 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500 z-99999999"
         id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer"
                 onclick="showMessage('close')" viewBox="0 0 384 512">
                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>
        </div>
    </div>


    <script>

        let itemList = document.getElementById('itemList')
        let message = document.getElementById('message')

        function showItems(orderId) {

                let counter = 1;
            itemList.children[1].children[0].children[1].innerHTML = ""
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('order.showItems') }}",
                    type: "POST",
                    dataType: "json",
                    data:{
                        'order_id': orderId
                    },
                    success: function (data) {
                        console.log(data)
                        itemList.classList.remove('max-h-0')
                        itemList.classList.add('min-h-[calc(100vh-57px)]')
                        itemList.children[1].classList.add('h-[calc(100vh-89px)]')

                        data.forEach((item) => {

                            let parentDiv = document.createElement('div')
                            parentDiv.classList = "bg-white divide-y divide-[#f1f1f4]"
                            parentDiv.innerHTML = `
                            <div
                                class="w-full flex flex-row lg:grid lg:grid-cols-12 items-center divide-x divide-[#f1f1f4] py-2">
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <span class="block w-10 lg:w-full">${counter}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                    <span class="block w-30 lg:w-full">${item.menu_item.title}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-4">
                                    <span
                                        class="block w-[180px] lg:w-full">${item.quantity}</span>
                                </div>
                                <div
                                    class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 lg:w-full text-center col-span-4">
                                    <span
                                        class="block w-[130px] lg:w-full">${item.quantity * item.menu_item.price}</span>
                                </div>
                            </div>
`
                            itemList.children[1].children[0].children[1].appendChild(parentDiv)
                            counter++
                        })
                    },
                    error: function () {
                        showMessage('open')
                        element.innerHTML = `
                        <span>خطا در دریافت اطلاعات</span>
                        <span class="text-red-500">!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2000)
                    }
                })
        }

        function hideItems(){
            itemList.children[1].classList.remove('h-[calc(100vh-89px)]')
            itemList.classList.remove('min-h-[calc(100vh-57px)]')
            itemList.classList.add('max-h-0')
        }

        function showMessage(state) {
            if (state == 'open') {
                message.classList.remove('top-0')
                message.classList.remove('opacity-0')
                message.classList.remove('invisible')
                message.classList.add('top-1/10')
            }
            if (state == 'close') {
                message.classList.remove('top-1/10')
                message.classList.add('top-0')
                message.classList.add('opacity-0')
                message.classList.add('invisible')
            }
        }

        function accept(orderId, element, state) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('career.acceptOrder') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'state': state,
                    'order_id': orderId
                },
                success: function (data) {
                    if (data.status == 2) {
                        element.innerText = "ارسال"
                    }
                    if (data.status == 3) {
                        element.innerText = "تمام شد"
                    }
                },
                error: function () {
                    alert('error')
                }
            })
            console.log(orderId, element)
        }
    </script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection