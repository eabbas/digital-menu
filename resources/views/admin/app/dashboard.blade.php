@extends('admin.app.panel')
@section('content')
    {{--  topol and miss.khodagholipour  --}}
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
    @if (!isset(Auth::user()->request) && !in_array(1, Auth::user()->role->pluck('id')->toArray()))
            <a href="{{ route('user.request', [Auth::user()]) }}" onclick="setRequest(event)"
            class="font-bold text-blue-500 text-xs lg:text-sm mb-4">درخواست نمایندگی</a>
            <script>
                let message = document.getElementById('message')
                let element = document.createElement('div')
                element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"
                function setRequest(ev){
                    ev.preventDefault()
                    showMessage('open')
                    element.innerHTML = `
                        <span class="text-green-500">!</span>
                        <span>ثبت شد</span>
                    `
                    message.children[0].appendChild(element)
                    setTimeout(() => {
                        showMessage('close')
                        location.assign("{{ route('user.request', [Auth::user()]) }}")
                    }, 1000)
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
            </script>
            
    @endif
    <div class=" lg:flex flex-row justify-between gap-8 bg-[#fff] rounded-xl pb-4 shadow-md mt-4">
        <div class="w-full flex flex-col gap-5 bg-white lg:py-5 rounded-xl px-5 py-2 ">
            <div class="w-full sm:w-full gap-4 flex flex-col sm:flex-row lg:py-5">
                <div class="w-full lg:10/12 flex flex-col gap-y-5">
                    <div class="w-full flex flex-col lg:flex-row gap-5 text-center items-center md:justify-start">
                    </div>
                    <div class="w-full md:w-2/3 lg:w-1/2 flex flex-col items-center sm:justify-end gap-3">

                        <div class="w-full pb-4 border-b-1 border-dashed border-zinc-300 flex justify-between items-center">
                            <div class="text-md flex flex-row items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                                    <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M475.3 27.3c5.8-5.8 6.3-15.1 1.1-21.5S462-1.9 455.1 2.7l-106.5 71C320.8 92.3 304 123.6 304 157.1c0 19.3 5.5 37.9 15.7 53.9L73.4 457.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L365 256.3c16 10.2 34.7 15.7 53.9 15.7c33.5 0 64.8-16.8 83.4-44.6l71-106.5c4.6-6.8 3.2-16-3.2-21.2s-15.6-4.8-21.5 1.1L457.4 192c-5.2 5.2-13.6 5.2-18.8 0c-4.9-4.9-5.2-12.8-.6-18.1l86.1-99.4c5.5-6.3 5.2-15.9-.8-21.8s-15.4-6.3-21.8-.8L402.1 138c-5.3 4.6-13.2 4.3-18.1-.6c-5.2-5.2-5.2-13.6 0-18.8l91.3-91.3zM52.5 7.3C47.9 2.6 41.5 0 34.9 0c-11.2 0-21 7.5-23.5 18.4C6.7 38.6 0 71.5 0 96c0 83.3 48.2 130.5 128.9 209.4c6.5 6.4 13.3 13 20.3 19.9c1.9 1.8 3.8 3.5 5.9 5.1L265.4 220.1 52.5 7.3zM457.4 502.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L355.9 310.6l-45.3 45.3L457.4 502.6z"/>
                                </svg>
                                <div>
                                    <div> رستوران های من</div>
                                </div>

                            </div>
                            <li class="flex justify-center">


                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                     viewBox="0 0 512 512">
                                    <path fill="white"
                                          d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                </svg>

                            </li>

                            <span class="ml-2">{{count(Auth::user()->careers)}}</span>
                        </div>
                        <div class="w-full pb-4 border-b-1 border-dashed border-zinc-300 flex justify-between items-center">
                            <div class="text-md flex flex-row items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                    <path d="M256 464c7.4 0 27-7.2 47.6-48.4c8.8-17.7 16.4-39.2 22-63.6H186.4c5.6 24.4 13.2 45.9 22 63.6C229 456.8 248.6 464 256 464zM178.5 304h155c1.6-15.3 2.5-31.4 2.5-48s-.9-32.7-2.5-48h-155c-1.6 15.3-2.5 31.4-2.5 48s.9 32.7 2.5 48zm7.9-144H325.6c-5.6-24.4-13.2-45.9-22-63.6C283 55.2 263.4 48 256 48s-27 7.2-47.6 48.4c-8.8 17.7-16.4 39.2-22 63.6zm195.3 48c1.5 15.5 2.2 31.6 2.2 48s-.8 32.5-2.2 48h76.7c3.6-15.4 5.6-31.5 5.6-48s-1.9-32.6-5.6-48H381.8zm58.8-48c-21.4-41.1-56.1-74.1-98.4-93.4c14.1 25.6 25.3 57.5 32.6 93.4h65.9zm-303.3 0c7.3-35.9 18.5-67.7 32.6-93.4c-42.3 19.3-77 52.3-98.4 93.4h65.9zM53.6 208c-3.6 15.4-5.6 31.5-5.6 48s1.9 32.6 5.6 48h76.7c-1.5-15.5-2.2-31.6-2.2-48s.8-32.5 2.2-48H53.6zM342.1 445.4c42.3-19.3 77-52.3 98.4-93.4H374.7c-7.3 35.9-18.5 67.7-32.6 93.4zm-172.2 0c-14.1-25.6-25.3-57.5-32.6-93.4H71.4c21.4 41.1 56.1 74.1 98.4 93.4zM256 512A256 256 0 1 1 256 0a256 256 0 1 1 0 512z"/>
                                </svg>
                                <div>
                                    <div> صفحه های من</div>
                                </div>

                            </div>
                            <span class="ml-2"> {{count(Auth::user()->pages)}}</span>
                        </div>

                        <div class="w-full  rounded-md flex justify-between items-center">
                            <div class="text-md flex flex-row items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                    <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z"/>
                                </svg>

                                <div>
                                    <div> اسکن های من</div>

                                </div>
                            </div>
                            <span class="ml-2">{{Auth::user()->qr_count==0}}</span>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>

    {{--  topol and miss.khodagholipour  --}}


    <div class=" lg:flex flex-row justify-between gap-8 bg-[#fff] rounded-xl pb-4 mt-5 shadow-md">
        <div class="w-full flex flex-col rounded-lg p-7 gap-5">
            <div class="">
                <div class="text-md md:text-lg text-zinc-400">ارتباطات من</div>
            </div>

            <div class="relative flex flex-row">
                @php
                    $i=5;
                    $x=0;
                @endphp
                @foreach($myContacts as $contact)
                    <div class="relative -right-{{$i*$x}} size-12 bg-blue-500 rounded-full hover:z-20 hover:cursor-pointer"
                         onclick="userShow('open', {{$contact->contact['id']}})">
                        <img src="{{ $contact->contact->main_image ? asset('storage/'.$contact->contact->main_image) : asset('assets/img/user.png') }}"
                             class="size-full rounded-full" alt="">
                    </div>
                    @php $x++; @endphp
                @endforeach
                <div class="relative -right-{{$i*$x}} size-12 bg-gray-200 rounded-full hover:z-20 flex justify-center items-center cursor-pointer opacity-80"
                     onclick="pap_up_all_customer('open')">
                    {{count($myContacts)}}
                </div>
                {{-- start popup all contacts --}}
                <div class="w-full h-[100vh] px-2 sm:px-0 bg-black/50 fixed top-0 right-0 z-9999999999 transition-all duration-300 invisible opacity-0"
                     id="pap_up_all_customer_items">
                    <div class="w-full lg:w-[calc(100%-265px)] float-end h-dvh flex justify-center items-center max-h-120 overflow-y-auto">
                        <div class="w-full lg:w-3/4 bg-white p-2 rounded-xl mt-20">
                            <button class="w-full flex justify-start cursor-pointer"
                                    onclick="pap_up_all_customer('close')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="#9aa2b8"
                                     class="w-6">
                                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                            </button>
                            <div class="w-full flex flex-col gap-3 items-center pb-6">
                                <h2 class="text-xl font-bold">ارتباطات من</h2>
                            </div>
                            <div class="w-full flex flex-col gap-3 h-6/12 px-5 overflow-y-auto">
                                @if($myContacts)
                                    @foreach($myContacts as $contact)
                                        <a href="{{route('pages.single', [$contact->pages[0]['id']])}}"
                                           class="w-full pb-3 border-b-1 border-[#dadee8] border-dashed flex justify-between  items-center pb-2">
                                            <div class="flex gap-2 items-center">
                                                <img src="{{ $contact->contact->main_image ? asset('storage/'.$contact->contact->main_image) : asset('assets/img/user.png') }}"
                                                     class="size-10 rounded-full" alt="">
                                                <div class="flex flex-col gap-1 ">
                                                    <div>
                                                        <span class="font-bold">{{$contact->contact->name ?? 'بدون نام'}} {{$contact->contact->family}}</span>
                                                    </div>
                                                    <span class="text-[#a0a8bd]">{{$contact->contact->email ?? 'بدون ایمیل'}}</span>
                                                </div>
                                            </div>
                                        </a>

                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    let pap_up_all_customer_items = document.getElementById('pap_up_all_customer_items')

                    function pap_up_all_customer(item) {
                        if (item == 'open') {
                            pap_up_all_customer_items.classList.remove('invisible')
                            pap_up_all_customer_items.classList.remove('opacity-0')
                        }
                        if (item == 'close') {
                            pap_up_all_customer_items.classList.add('invisible')
                            pap_up_all_customer_items.classList.add('opacity-0')
                        }
                    }
                </script>
                {{-- end popup all contacts --}}
                {{-- start popup user --}}
                <div id="showUserPopup"
                     class="w-full h-dvh px-2 sm:px-0 bg-black/50 fixed top-0 right-0 z-9999999999 transition-all duration-300 opacity-0 invisible">
                    <div class="w-full lg:w-[calc(100%-265px)] float-end h-dvh flex justify-center items-center">
                        <div class="w-full lg:w-3/4 bg-white p-2 rounded-xl max-h-120 overflow-y-auto"
                             id="userData">

                        </div>
                    </div>
                </div>
                {{-- end popup user --}}
                <script>
                    let showUserPopup = document.getElementById('showUserPopup')
                    let userDataEl = document.getElementById('userData')

                    function userShow(state, userId) {
                        if (state == 'open') {
                            showUserPopup.classList.remove('invisible')
                            showUserPopup.classList.remove('opacity-0')
                            userDataEl.innerHTML = `
                                <div class="size-20 mx-auto border-4 border-gray-200 border-t-gray-500 rounded-full animate-spin"></div>
                                `
                            userData(userId)
                        }
                        if (state == 'close') {
                            showUserPopup.classList.add('invisible')
                            showUserPopup.classList.add('opacity-0')
                        }
                    }

                    function userData(userId) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            }
                        })
                        $.ajax({
                            url: "{{ route('userData') }}",
                            type: "POST",
                            dataType: "json",
                            data: {
                                'id': userId
                            },
                            success: function (data) {
                                userDataEl.innerHTML = ''
                                let fullName = data.name ?? 'بدون نام'
                                fullName += data.family ?? ''
                                let phoneNum = data.phoneNumber
                                let email = data.email ?? 'بدون ایمیل'
                                let div = document.createElement('div')
                                let element = `
                                    <button class="w-full flex justify-start cursor-pointer"
                                    onclick="userShow('close', null)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="#9aa2b8"
                                     class="w-6">
                                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                                </svg>
                            </button>
                            <div class="w-full flex flex-col gap-3 h-6/12 px-5 overflow-y-auto">
                                <img class="size-30 mx-auto lg:m-0 rounded-full"
                                     src="${data.main_image ? '{{asset('storage/')}}/' + data.main_image : '{{asset('assets/img/user.png')}}'}" alt="user__picture">
                                <div class="w-full h-px bg-gray-200 my-5 "></div>
                                <div class="flex gap-7 sm:hidden">
                                    <div class="flex w-full flex-col">
                                        <label class="p-2.5 text-gray-400">نام و نام خانوادگی</label>
                                        <span class="p-2.5 text-gary-600"><strong>${fullName}</strong></span>
                                        <span class="p-2.5 text-gary-600">فائوس</span>
                                        <label class="p-2.5 text-gray-400">شماره تلفن</label>
                                        <span class="p-2.5 text-gary-600">${phoneNum}<mark class="mx-2 text-green-700 bg-green-300 px-1 rounded-md">تایید
                                    شده</mark></span>
                                        <label class="p-2.5 text-gray-400">ایمیل</label>
                                        <span class="p-2.5 text-gary-600">${email}</span>
                                        <label class="p-2.5 text-gray-400">نقش</label>
                                        <div class="p-2.5 text-gary-600">
                                        `
                                data.roles.forEach((role) => {
                                    element += `<span>${role}</span> <br>`
                                })
                                element += `
                                </div>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-2 sm:gap-2 hidden">
                            <div class="flex w-full flex-col">
                                <label class="p-2.5 text-gray-400">نام کامل</label>
                                <label class="p-2.5 text-gray-400">شماره تلفن</label>
                                <label class="p-2.5 text-gray-400">نقش</label>
                                <label class="p-2.5 text-gray-400">ایمیل</label>
                            </div>
                            <div class="flex w-full flex-col">
                            <span class="p-2.5 text-gary-600"><strong>${fullName}</strong></span>
                                        <span class="p-2.5 text-gary-600">${phoneNum}<mark
                                                    class="mx-2 text-green-700 bg-green-300 px-1 rounded-md">تایید
                                    شده</mark></span>
                                        <span class="p-2.5 text-gary-600">
                                        `
                                data.roles.forEach((role) => {
                                    element += `<span>${role}</span> <br>`
                                })
                                element += `
                                </span>
                                <span class="p-2.5 text-gary-600">${email}</span>
                                    </div>
                                </div>
                            </div>
                                `
                                div.innerHTML = element
                                userDataEl.append(div)
                            },
                            error: function () {
                                alert('error')
                            }
                        })
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
