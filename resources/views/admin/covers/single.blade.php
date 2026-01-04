@extends('admin.app.panel')

@section('title')
    {{ $cover->title }}
@endsection
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @csrf
    <div class="w-full lg:w-2/3 mx-auto">
        <div class="w-full mt-5 p-5 bg-white flex flex-col pb-40 relative rounded-lg">
            <div class="w-full flex flex-row justify-between items-center gap-3 pb-5">
                <div class="w-full flex flex-row  items-center gap-3">
                    <div>
                        <img class="size-12 rounded-lg" src="{{ asset('storage/' . $cover->logo_path) }}" alt="لوگو">
                    </div>
                    <h2 class="text-sm lg:text-lg font-bold text-gray-800">
                        {{ $cover->title }}
                    </h2>
                </div>
                <div>
                    {{-- cover qr code --}}
                    <div class="w-full h-dvh fixed top-0 right-0 z-999 bg-black/50 invisible opacity-0 transition-all duration-300"
                        id="qrcode_card">
                        <div
                            class="relative w-full lg:w-[calc(100%-265px)] h-full float-end flex items-center justify-center">
                            <div class="absolute top-10 right-10 bg-white rounded-full p-2 cursor-pointer"
                                onclick="qrCard('close')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                    <path
                                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                                </svg>
                            </div>
                            @if (isset($cover->social_qr_codes->qr_path))
                                <div class="w-11/12 lg:w-1/4 mx-auto bg-white rounded-lg p-5">
                                    <img src="{{ asset('storage/' . $cover->social_qr_codes->qr_path) }}" class="w-full"
                                        alt="">
                                    <div class="lg:w-full mx-auto bg-gray-300 rounded-lg p-2 mt-2 flex items-center justify-center cursor-pointer"
                                        onclick='copyText({{ $cover->id }} , "{{ $cover->social_qr_codes->slug }}")'>
                                        کپی لینک
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- cover qr code end --}}
                    <div class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer" onclick="qrCard('open')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                            <path
                                d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z" />
                        </svg>
                    </div>
                </div>
                <div>
                    <a href="{{ route('client.loadLink', [$cover]) }}"
                        class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                            <path
                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="p-3 lg:p-5 rounded-full bg-black bottom-10 right-3 lg:-right-10 fixed lg:absolute cursor-pointer"
                onclick="addBlock('open')">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 lg:size-10" viewBox="0 0 448 512">
                    <path fill="white"
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg>
            </div>
            <div class="relative">
                <div>
                    <img class="w-full h-[130px] object-cover lg:h-[200px] rounded-md"
                        src="{{ asset('storage/' . $cover->cover_path) }}" alt="">
                </div>
                <div class="flex flex-col items-center justify-end w-full h-[100px]">
                    <h2 class="text-center text-base lg:text-lg font-bold text-gray-800">
                        {{ $cover->title }}
                    </h2>
                    <span class="block text-cetner text-sm lg:text-md text-gray-500">
                        {{ $cover->subTitle }}
                    </span>
                </div>
                <img src="{{ asset('storage/' . $cover->logo_path) }}"
                    class="size-20 lg:size-30 rounded-full absolute inset-1/2 translate-x-1/2 -translate-y-1/5"
                    alt="">
            </div>
            <div class="w-full mt-5 lg:mt-10 flex flex-col gap-3">

                <div class="w-full flex flex-col gap-3" id="socialLinks">
                    @if (count($cover->socialAddresses))
                        @foreach ($cover->socialAddresses as $item)
                            <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center">
                                    ورود به {{ $item->socialMedia->title }}
                                </h3>
                                <div class="mt-3 relative parentSocial">
                                    <div class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-[{{ $item->socialMedia->color }}] rounded-full cursor-pointer editSocial relative z-555 transition-all duration-300"
                                        data-social-id="{{ $item->id }}"
                                        onclick='editSocial("{{ $item->id }}", "{{ $item->socialMedia->id }}")'>
                                        <img src="{{ asset('storage/' . $item->socialMedia->icon_path) }}"
                                            class="size-5 rounded-md" alt="">
                                        <span class="font-bold text-gray-800">{{ $item->socialMedia->title }}</span>
                                    </div>
                                    <div class="absolute hidden left-3 top-[22%] z-444 lg:flex flex-row items-center gap-3">
                                        <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                            onclick='editSocial("{{ $item->id }}", "{{ $item->socialMedia->id }}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                                <path fill="white"
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                            </svg>
                                        </div>
                                        <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                            onclick='deleteMediaList(this, "{{ $item->id }}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                                <path fill="white"
                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="w-full flex flex-col gap-3" id="siteLinks">
                    @if (count($cover->siteLinks))
                        @foreach ($cover->siteLinks as $siteLink)
                            <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center viewLinkTitle"
                                    data-view-link-id="{{ $siteLink->id }}">
                                    ورود به {{ $siteLink->title }}
                                </h3>
                                <div class="mt-3 relative parentLink">
                                    <div class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-gray-200 rounded-full cursor-pointer editLink relative z-555 transition-all duration-300"
                                        onclick='editLink("{{ $siteLink->id }}")' data-site-id="{{ $siteLink->id }}">
                                        <img src="{{ asset('assets/img/link-simple.svg') }}" class="size-5 rounded-md"
                                            alt="">
                                        <span class="font-bold text-gray-800 viewLinkTitle"
                                            data-view-link-id="{{ $siteLink->id }}">{{ $siteLink->title }}</span>
                                    </div>
                                    <div class="absolute hidden left-3 top-[22%] z-444 lg:flex flex-row items-center gap-3">
                                        <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                            onclick='editLink("{{ $siteLink->id }}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                                <path fill="white"
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                            </svg>
                                        </div>
                                        <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                            onclick='deleteLinkList(this, "{{ $siteLink->id }}")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                                <path fill="white"
                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>



        <div class="w-full h-dvh bg-black/50 fixed top-0 right-0 z-9999 transition-all duration-300 invisible opacity-0"
            id="block">
            <div class="w-full lg:w-[calc(100%-265px)] float-left h-dvh flex justify-center items-center">
                <div class="w-11/12 lg:w-2/3 px-3 relative">

                    <div class="w-full bg-white py-5 rounded-lg transition-all duration-300 scale-95 opacity-0"
                        id="group">
                        <div class="w-full flex flex-row items-center gap-5 py-2.5 border-b border-gray-300 px-5 cursor-pointer"
                            onclick="addBlock('close')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                <path
                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                            </svg>
                            <span class="text-gray-700 font-bold">افزودن بلوک جدید</span>
                        </div>
                        <div class="w-full overflow-y-auto px-5 py-3 [&::-webkit-scrollbar]:w-0 flex flex-col gap-3">
                            <div class="w-full">
                                <div onclick="addSocialMedia()"
                                    class="w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                                        <path
                                            d="M448 128c0 53-43 96-96 96c-28.9 0-54.8-12.8-72.4-33l-89.7 44.9c1.4 6.5 2.1 13.2 2.1 20.1s-.7 13.6-2.1 20.1L279.6 321c17.6-20.2 43.5-33 72.4-33c53 0 96 43 96 96s-43 96-96 96s-96-43-96-96c0-6.9 .7-13.6 2.1-20.1L168.4 319c-17.6 20.2-43.5 33-72.4 33c-53 0-96-43-96-96s43-96 96-96c28.9 0 54.8 12.8 72.4 33l89.7-44.9c-1.4-6.5-2.1-13.2-2.1-20.1c0-53 43-96 96-96s96 43 96 96zM96 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM400 128a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM352 432a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                                    </svg>
                                    <span class="text-gray-700 font-bold">افزودن شبکه اجتماعی</span>
                                </div>
                            </div>

                            <div class="w-full">
                                <div onclick="addLink()"
                                    class="w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                                        <path
                                            d="M0 256C0 167.6 71.6 96 160 96h72c13.3 0 24 10.7 24 24s-10.7 24-24 24H160C98.1 144 48 194.1 48 256s50.1 112 112 112h72c13.3 0 24 10.7 24 24s-10.7 24-24 24H160C71.6 416 0 344.4 0 256zm576 0c0 88.4-71.6 160-160 160H344c-13.3 0-24-10.7-24-24s10.7-24 24-24h72c61.9 0 112-50.1 112-112s-50.1-112-112-112H344c-13.3 0-24-10.7-24-24s10.7-24 24-24h72c88.4 0 160 71.6 160 160zM184 232H392c13.3 0 24 10.7 24 24s-10.7 24-24 24H184c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                                    </svg>
                                    <span class="text-gray-700 font-bold">افزودن لینک</span>
                                </div>
                            </div>

                        </div>
                    </div>


                    {{-- create social media --}}

                    <form action="{{ route('socialAddress.store') }}" method="post" enctype='multipart/form-data'
                        class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute right-0 top-full form px-5"
                        id="socialMediaForm">
                        <div
                            class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg">
                        </div>
                        @csrf
                        <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()" class="size-5 cursor-pointer"
                            viewBox="0 0 384 512">
                            <path
                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                        </svg>
                        <div class="flex items-start justify-center">
                            <div class="bg-white rounded-2xl p-3 w-full lg:w-3/4">
                                <div class="text-center mb-8">
                                    <h3 class="lg:text-lg font-bold text-gray-800"> شبکه اجتماعی</h3>
                                </div class="w-full">
                                <div class="text-center mb-4">
                                    <div class="w-full flex flex-col gap-3 my-4">
                                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                            <label class="w-30 text-sm mb-1 mt-2.5 flex">شبکه اجتماعی</label>
                                            <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                                <select name="socialMedia_id" id="socialMedia_id"
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 createSocialRequire">
                                                    @foreach ($socialMedias as $socialMedia)
                                                        <option value="{{ $socialMedia->id }}">{{ $socialMedia->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                            <label class="w-30 text-sm mb-1 mt-2.5 flex">نام کاربری</label>
                                            <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                <span
                                                    class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                    است!</span>
                                                <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 createSocialRequire rounded-md"
                                                    type="text" name='username' id="username"
                                                    placeholder="نام کاربری">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full text-left">
                                        <button type="submit" onclick="storeSocialmedia(event)"
                                            class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                            ثبت
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    {{-- create social media end --}}


                    {{-- create link --}}


                    <form action="{{ route('siteLink.store') }}" method="post" enctype='multipart/form-data'
                        class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 right-0 absolute top-full form px-5 createSiteLink"
                        id="siteLinkForm">
                        <div
                            class="w-full absolute h-full top-0 right-0 bg-white items-center justify-center hidden rounded-lg createSiteLink z-50">
                        </div>
                        @csrf
                        <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()" class="size-5 cursor-pointer"
                            viewBox="0 0 384 512">
                            <path
                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                        </svg>
                        <div class="flex items-start justify-center">
                            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                                <div class="text-center mb-8">
                                    <h3 class="lg:text-lg font-bold text-gray-800">ایجاد لینک</h3>
                                </div class="w-full ">
                                <div class="text-center mb-4">
                                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">

                                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                            <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان لینک</label>
                                            <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                <span
                                                    class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                    است!</span>
                                                <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 createLinkRequire rounded-md"
                                                    type="text" name='title' id="link_title_create"
                                                    placeholder="عنوان لینک">
                                            </div>
                                        </div>
                                        <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                            <label class="w-30 text-sm mb-1 mt-2.5 flex">آدرس لینک</label>
                                            <div
                                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex relative">
                                                <span
                                                    class="absolute -bottom-5 right-3 opacity-0 text-xs text-red-500">الزامی
                                                    است!</span>
                                                <input
                                                    class="p-4 w-full focus:outline-none text-sm font-bold mr-2 createLinkRequire rounded-md"
                                                    type="text" dir="ltr" name='address'
                                                    id="link_address_create" placeholder="آدرس لینک">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full text-left">
                                        <button type="submit" onclick="storeLink(event)"
                                            class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                                            ثبت
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>



                    {{-- create link end --}}


                    {{-- edit social media --}}
                    <div
                        class="w-full bg-white p-1.5 lg:p-5 rounded-lg transition-all duration-300 invisible right-0 opacity-0 absolute top-full form editsocialMediaForm">
                        <div
                            class="w-full absolute h-full top-0 right-0 bg-white flex items-center justify-center rounded-lg">
                        </div>
                        <div onclick="closeForm()"
                            class="p-3 cursor-pointer absolute -top-14 right-0 lg:-top-5 lg:-right-5 rounded-full bg-rose-100 hover:bg-rose-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                <path
                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                            </svg>
                        </div>
                        <div class="flex flex-row justify-between items-center p-5">
                            <div class="flex flex-row items-center gap-3 lg:gap-5 w-10/12 cursor-pointer"
                                onclick="openDropdown('media')">
                                <div class="size-5 socialMediaIcon"></div>
                                <div class="text-xs text-gray-600 socialLink"></div>
                            </div>
                            <div class="flex flex-row items-center gap-5">

                                <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                    onclick="openDropdown('media')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white"
                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                    </svg>
                                </div>
                                <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                    onclick="deleteMedia()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white"
                                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                    </svg>
                                </div>
                            </div>

                        </div>
                        <form action="{{ route('socialAddress.update') }}" method="post" enctype='multipart/form-data'
                            class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out editSMF">
                            @csrf
                            <input type="hidden" name="id" class="socialAddressId">
                            <div class="w-full socialDiv">
                                <!-- عنوان شبکه اجتماعی -->
                                @if (isset($item))
                                    <div class="w-full flex flex-col">
                                        <label class="text-sm md:text-base mb-2" for="username">آدرس شبکه اجتماعی:</label>
                                        <input type="text" name="username" id="userNameUpdate"
                                            class="w-full px-3 py-2 outline-none border-1 border-sky-400 rounded-lg userName"
                                            required>
                                    </div>
                                @endif
                            </div>

                            <!-- دکمه ثبت -->
                            <div class="text-center mt-8">
                                <button type="submit" onclick="updateSocial(event)"
                                    class="px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-150 cursor-pointer">
                                    ثبت
                                </button>
                            </div>
                        </form>
                    </div>
                    {{-- edit social media end --}}


                    {{-- edit site link  --}}
                    <div
                        class="w-full bg-white p-1.5 right-0 lg:p-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-full form editSiteLinkForm">
                        <div
                            class="w-full absolute h-full top-0 right-0 bg-white hidden items-center justify-center rounded-lg">
                        </div>
                        <div onclick="closeForm()"
                            class="p-3 cursor-pointer absolute -top-14 right-0 lg:-top-5 lg:-right-5 rounded-full bg-rose-100 hover:bg-rose-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                <path
                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                            </svg>
                        </div>
                        <div class="flex flex-row justify-between items-center p-5">
                            <div class="flex flex-row items-center gap-5 w-10/12 cursor-pointer"
                                onclick="openDropdown('link')">
                                <div class="text-sm text-gray-800 font-bold linkTitle"></div>
                                {{-- <div class="text-xs text-gray-600 linkAddress"></div> --}}
                            </div>
                            <div class="flex flex-row items-center gap-5">

                                <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                    onclick="openDropdown('link')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white"
                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                    </svg>
                                </div>
                                <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                    onclick="deleteLink()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white"
                                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                    </svg>
                                </div>
                            </div>

                        </div>
                        <form action="{{ route('siteLink.update') }}" method="post" enctype='multipart/form-data'
                            class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out editSLF"
                            id="editSiteLinkForm">
                            @csrf
                            <input type="hidden" name="siteLinkId" id="siteLinkId">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10">
                                {{-- <div class="w-full flex flex-col">
                                    <div class="text-sm md:text-base border border-gray-400 rounded-[20px] py-1">
                                        <label
                                            class="p-1 w-20 flex flex-row justify-center text-sm">
                                            آیکون لینک
                                        </label>
                                        <input type="file" name="icon_path" id="icon_path"
                                            class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500 border-1 border-blue-300 rounded-md">
                                    </div>
                                </div> --}}
                                <div class="w-full flex flex-col">
                                    <label class="text-sm md:text-base" for="title">عنوان لینک :</label>
                                    <input type="text" name="title" id="title"
                                        class="py-1 px-3 rounded-md border-1 border-blue-300 outline-none" required>
                                </div>
                                <div class="w-full flex flex-col">
                                    <label class="text-sm md:text-base" for="address">آدرس لینک :</label>
                                    <input type="text" name="address" dir="ltr" id="address"
                                        class="py-1 px-3 rounded-md border-1 border-blue-300 outline-none" required>
                                </div>
                                <div class="md:text-left text-center md:px-12 mt-5 lg:mt-10">
                                    <button onclick="updateLink(event)"
                                        class="px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-150 cursor-pointer">ثبت</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- edit site link end --}}


                </div>
            </div>
        </div>
    </div>
    <script>
        let socialMedia_id = document.querySelector('#socialMedia_id')
        let userName = document.querySelector('.userName')
        let editsocialMediaForm = document.querySelector('.editsocialMediaForm')
        let editSiteLinkForm = document.querySelector('.editSiteLinkForm')
        let socialAddressId = document.querySelector('.socialAddressId')
        let socialLink = document.querySelector('.socialLink')
        let socialMediaIcon = document.querySelector('.socialMediaIcon')
        let editSocialSection = document.querySelectorAll('.editSocial')
        let userNameUpdate = document.getElementById('userNameUpdate')

        let userNameCreate = document.getElementById('username')
        let socialMedia_id_create = document.getElementById('socialMedia_id')
        let storeSocialForm = document.getElementById('socialMediaForm')
        let socialLinks = document.getElementById('socialLinks') // append what sociala media create


        // deleteLink() method deficient
        let linkSection = document.getElementById('linkSection')
        let linkTitle = document.querySelector('.linkTitle')
        // let linkAddress = document.querySelector('.linkAddress')
        let link_title_input = document.getElementById('title')
        let link_address_input = document.getElementById('address')
        let siteLinkId = document.getElementById('siteLinkId')
        // let icon_path = document.getElementById('icon_path')

        let link_title_create = document.getElementById('link_title_create')
        let link_address_create = document.getElementById('link_address_create')
        // let link_icon_path_create = document.getElementById('link_icon_path_create')
        let siteLinks = document.getElementById('siteLinks')
        let createSiteLink = document.querySelector('.createSiteLink')

        function deleteLink() {
            let viewLink = document.querySelectorAll('.editLink')
            editSiteLinkForm.children[0].classList.remove('hidden')
            editSiteLinkForm.children[0].classList.add('flex')
            editSiteLinkForm.children[0].innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('siteLink.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': siteLinkId.value
                },
                success: function(data) {
                    editSiteLinkForm.children[0].classList.remove('flex')
                    editSiteLinkForm.children[0].classList.add('hidden')
                    viewLink.forEach((item) => {
                        if (item.getAttribute('data-site-id') == siteLinkId.value) {
                            item.parentElement.parentElement.remove()
                        }
                    })
                    closeForm()
                },
                error: function() {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }
        function deleteLinkList(el, id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('siteLink.delete') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id
                },
                success: function(data) {
                    el.parentElement.parentElement.parentElement.remove()
                },
                error: function() {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }

        function storeLink(e) {
            let errorText = ""
            e.preventDefault()
            let createLinkRequire = document.querySelectorAll('.createLinkRequire')
            let flag = true
            createLinkRequire.forEach((item) => {
                if (item.value == "") {
                    item.classList.add('border-1')
                    item.classList.add('border-red-500')
                    item.parentElement.children[0].classList.remove('opacity-0')
                    flag = false
                }
            })
            if (flag) {
                createSiteLink.children[0].classList.remove('hidden')
                createSiteLink.children[0].classList.add('flex')
                createSiteLink.children[0].innerHTML = `
                <div class="loading-wave">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
                `
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('siteLink.store') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'address': link_address_create.value,
                        'title': link_title_create.value,
                        'cover_id': "{{ $cover->id }}",
                        // 'icon_path': link_icon_path_create.value
                    },
                    success: function(data) {
                        createSiteLink.children[0].classList.remove('flex')
                        createSiteLink.children[0].classList.add('hidden')
                        link_address_create.value = ""
                        link_title_create.value = ""
                        let div = document.createElement('div')
                        let element = `

                        <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center viewLinkTitle"
                                    data-view-link-id="${ data.id }">
                                    ورود به ${ data.title }
                                </h3>
                                <div class="mt-3 relative parentLink">
                                    <div class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-gray-200 rounded-full cursor-pointer editLink relative z-555 transition-all duration-300"
                                       onclick='editLink(${data.id})' data-site-id="${data.id}"
                                        @if (isset($siteLink->icon_path))
                                                <img src="{{ asset('storage/' . $siteLink->icon_path) }}"
                                                    class="size-5 rounded-md" alt="">
                                            @else
                                                <img src="{{ asset('assets/img/link-simple.svg') }}" class="size-5 rounded-md"
                                                    alt="">
                                            @endif
                                        <span class="font-bold text-gray-800 viewLinkTitle"
                                            data-view-link-id=${data.id}">${data.title}</span>
                                    </div>
                                    <div class="absolute hidden left-3 top-[22%] z-444 lg:flex flex-row items-center gap-3">
                                        <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                            onclick='editLink("${ data.id }")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                                <path fill="white"
                                                    d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                            </svg>
                                        </div>
                                        <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                            onclick='deleteLinkList(this, "${ data.id }")'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                                <path fill="white"
                                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `
                        div.innerHTML = element
                        siteLinks.appendChild(div)
                        closeForm()
                    },
                    error: function() {
                        alert('خطا در ارسال داده ها')
                    }
                })
            }
        }

        function updateLink(e) {
            let viewLinkTitle = document.querySelectorAll('.viewLinkTitle')
            e.preventDefault();
            editSiteLinkForm.children[0].classList.remove('hidden')
            editSiteLinkForm.children[0].classList.add('flex')
            editSiteLinkForm.children[0].innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('siteLink.update') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': siteLinkId.value,
                    'title': link_title_input.value,
                    'address': link_address_input.value,
                    // 'icon_path': icon_path.value,
                    'cover_id': "{{ $cover->id }}"
                },
                success: function(data) {
                    linkTitle.innerText = data.title
                    // linkAddress.innerText = data.address
                    link_title_input.value = data.title
                    link_address_input.value = data.address
                    editSiteLinkForm.children[0].classList.remove('flex')
                    editSiteLinkForm.children[0].classList.add('hidden')
                    closeForm()
                    viewLinkTitle.forEach((element) => {
                        if (element.getAttribute('data-view-link-id') == data.id) {
                            element.innerText = '  ورود به  ' + data.title
                        }
                    })
                },
                error: function() {
                    alert('خطا در ارسال داده')
                }
            })
        }

        function editLink(id) {

            editSiteLinkForm.children[0].classList.remove('hidden')
            editSiteLinkForm.children[0].classList.add('flex')
            editSiteLinkForm.children[0].innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('siteLink.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id
                },
                success: function(data) {
                    editSiteLinkForm.children[0].classList.remove('flex')
                    editSiteLinkForm.children[0].classList.add('hidden')
                    linkTitle.innerText = data.title
                    // linkAddress.innerText = data.address
                    link_title_input.value = data.title
                    link_address_input.value = data.address
                    siteLinkId.value = data.id
                },
                error: function() {
                    alert('خطا در بارگذاری اطلاعات')
                }
            })


            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            group.classList.add('scale-95')
            group.classList.add('opacity-0')
            group.classList.add('invisible')
            editSiteLinkForm.classList.remove('invisible')
            editSiteLinkForm.classList.remove('opacity-0')
            editSiteLinkForm.classList.remove('top-full')
            editSiteLinkForm.classList.add('top-0')
            editSiteLinkForm.classList.add('-translate-y-1/7')
        }

        function updateSocial(e) {
            e.preventDefault()
            editsocialMediaForm.children[0].classList.remove('hidden')
            editsocialMediaForm.children[0].classList.add('flex')
            editsocialMediaForm.children[0].innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('socialAddress.update') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': socialAddressId.value,
                    'username': userNameUpdate.value,
                    'cover_id': "{{ $cover->id }}"
                },
                success: function(data) {
                    editsocialMediaForm.children[0].classList.remove('flex')
                    editsocialMediaForm.children[0].classList.add('hidden')
                    closeForm()
                },
                error: function() {
                    alert('خطا در بارگیری داده ها')
                }
            })
        }

        function storeSocialmedia(ev) {
            ev.preventDefault();
            if (userNameCreate.value == "") {
                userNameCreate.classList.add('border-1')
                userNameCreate.classList.add('border-red-500')
                userNameCreate.parentElement.children[0].classList.remove('opacity-0')
            } else {
                storeSocialForm.children[0].classList.remove('hidden')
                storeSocialForm.children[0].classList.add('flex')
                storeSocialForm.children[0].innerHTML = `
                <div class="loading-wave">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
                `
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })

                $.ajax({
                    url: "{{ route('socialAddress.store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'socialMedia_id': socialMedia_id_create.value,
                        'cover_id': "{{ $cover->id }}",
                        'userName': userNameCreate.value
                    },
                    success: function(datas) {
                        storeSocialForm.children[0].classList.remove('flex')
                        storeSocialForm.children[0].classList.add('hidden')
                        socialMedia_id_create.value = 1
                        userNameCreate.value = ""
                        closeForm()
                        let link = "<?php echo asset('storage/'); ?>"
                        link += "/"
                        link += datas.socialMedia.icon_path
                        let div = document.createElement('div')
                        div.classList = "py-2"
                        let element = `
                        <div class="lg:py-2">
                            <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center">
                            ورود به ${datas.socialMedia.title}
                            </h3>
                            <div class="mt-3 relative parentSocial">
                                <div class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-[${datas.socialMedia.color}] rounded-full cursor-pointer editSocial relative z-555 transition-all duration-300"
                                    data-social-id="${datas.address.id}"
                                    onclick='editSocial(${datas.address.id}, ${datas.socialMedia.id})'>
                                    <img src="${link}"
                                        class="size-5 rounded-md" alt="">
                                    <span class="font-bold text-gray-800">${datas.socialMedia.title}</span>
                                </div>
                                <div class="absolute hidden left-3 top-[22%] z-444 lg:flex flex-row items-center gap-3">
                                    <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer"
                                        onclick='editSocial(${datas.address.id}, ${datas.socialMedia.id})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                            <path fill="white"
                                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                        </svg>
                                    </div>
                                    <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer"
                                        onclick='deleteMediaList(this, ${datas.address.id})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                            <path fill="white"
                                                d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `
                        div.innerHTML = element
                        socialLinks.appendChild(div)
                    },
                    error: function() {
                        alert('خطا در ارسال داده ها')
                    }
                })
            }



        }

        function editSocial(id, socialId) {
            editsocialMediaForm.children[0].classList.remove('hidden')
            editsocialMediaForm.children[0].classList.add('flex')
            editsocialMediaForm.children[0].innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: `{{ url('socialAddress/edit/${id}') }}`,
                type: "POST",
                dataType: "json",
                data: {
                    'social_id': id
                },
                success: function(datas) {
                    console.log(datas, socialMediaIcon)
                    editsocialMediaForm.children[0].classList.add('hidden')
                    editsocialMediaForm.children[0].classList.remove('flex')
                    userName.value = datas.data.username
                    socialAddressId.value = datas.data.id
                    socialLink.innerText = datas.data.username
                    datas.socialMedias.forEach((socialMedia)=>{
                        if (socialId == socialMedia.id) {
                            // console.log(socialMedia)
                            socialMediaIcon.innerHTML = `
                            <img src="{{ asset('storage/${socialMedia.icon_path}') }}" class="size-full object-cover">
                            `
                        }
                    })
                },
                error: function() {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            group.classList.add('scale-95')
            group.classList.add('opacity-0')
            group.classList.add('invisible')
            editSocialM.classList.remove('invisible')
            editSocialM.classList.remove('opacity-0')
            editSocialM.classList.remove('top-full')
            editSocialM.classList.add('top-0')
            editSocialM.classList.add('-translate-y-1/7')
        }

        function deleteMedia() {
            let editSocialSection = document.querySelectorAll('.editSocial')
            editsocialMediaForm.children[0].classList.remove('hidden')
            editsocialMediaForm.children[0].classList.add('flex')
            editsocialMediaForm.children[0].innerHTML = `
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>
            `
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: `{{ route('socialAddress.delete') }}`,
                type: 'POST',
                dataType: 'json',
                data: {
                    'social_address_id': socialAddressId.value
                },
                success: function(datas) {
                    editsocialMediaForm.children[0].classList.remove('flex')
                    editsocialMediaForm.children[0].classList.add('hidden')
                    editSocialSection.forEach((media) => {
                        if (media.getAttribute('data-social-id') == socialAddressId.value) {
                            media.parentElement.parentElement.remove()
                        }
                    })
                    closeForm()
                },
                error: function() {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }

        function deleteMediaList(el, id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: `{{ route('socialAddress.delete') }}`,
                type: 'POST',
                dataType: 'json',
                data: {
                    'social_address_id': id
                },
                success: function(datas) {
                    el.parentElement.parentElement.parentElement.remove()
                },
                error: function() {
                    alert('خطا در بارگیری اطلاعات')
                }
            })
        }
    </script>
    @isset($cover)
        <script>
            function copyText(coverId, slug) {
                let url = "{{ url('qrcodes/links/') }}/" + coverId + "/" + slug
                navigator.clipboard.writeText(url)
                alert("لینک کپی شد")
            }
        </script>
    @endisset
    <script src="{{ asset('assets/js/blocks.js') }}"></script>
@endsection
