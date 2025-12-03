@extends('admin.app.panel')
@section('title')
    ایجاد شبکه اجتماعی {{ $cover->title }}
@endsection
@section('content')
    <div class="w-2/3 mx-auto">
        <div class="w-full flex flex-row items-center gap-3">
            <div>
                <img class="size-12 rounded-lg" src="{{ asset('storage/'.$cover->logo_path) }}" alt="لوگو">
            </div>
            <h2 class="text-lg font-bold text-gray-800">
                {{ $cover->title }}
            </h2>
        </div>
        <div class="w-full mt-5 p-5 bg-gray-100 flex flex-col pb-40 relative">
            <div class="p-5 rounded-full bg-black bottom-10 -right-10 absolute cursor-pointer" onclick="addBlock('open')">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-10" viewBox="0 0 448 512">
                    <path fill="white" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                </svg>
            </div>
            <div class="relative">
                <div>
                    <img class="w-full h-[200px]" src="{{ asset('storage/'.$cover->cover_path) }}" alt="">
                </div>
                <div class="flex flex-col items-center justify-end w-full h-[100px]">
                    <h2 class="text-center text-lg font-bold text-gray-800">
                        {{ $cover->title }}
                    </h2>
                    <span class="block text-cetner text-md text-gray-500">
                        {{ $cover->subTitle }}
                    </span>
                </div>
                <img src="{{ asset('storage/'.$cover->logo_path) }}" class="size-30 rounded-full absolute inset-1/2 translate-x-1/2 -translate-y-1/5" alt="">
            </div>
            <div class="w-full mt-10 flex flex-col gap-5">
                <div class="py-2">
                    <h3 class="text-lg font-bold text-gray-800 text-center">
                        ورود به تلگرام
                    </h3>
                    <div class="mt-3">
                        <a href="#" class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-blue-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 496 512">
                                <path fill="blue" d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z"/>
                            </svg>
                            <span class="font-bold text-gray-800">تلگرام</span>
                        </a>
                    </div>
                </div>
                <div class="py-2">
                    <h3 class="text-lg font-bold text-gray-800 text-center">
                        ورود به اینستاگرام
                    </h3>
                    <div class="mt-3">
                        <a href="#" class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-orange-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                                <path fill="orange" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                            </svg>
                            <span class="font-bold text-gray-800">اینستاگرام</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>



        <div class="w-full h-dvh bg-black/50 fixed top-0 right-0 z-9999 transition-all duration-300 invisible opacity-0" id="block">
            <div class="lg:w-[calc(100%-265px)] float-left h-dvh flex justify-center items-center">
                <div class="w-2/3 px-3">
                    <div class="w-full bg-white py-5 rounded-lg transition-all duration-300 scale-95 opacity-0">
                        <div class="w-full flex flex-row items-center gap-5 py-2.5 border-b border-gray-300 px-5 cursor-pointer" onclick="addBlock('close')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                            </svg>
                            <span class="text-gray-700 font-bold">افزودن بلوک جدید</span>
                        </div>
                        <div class="w-full overflow-y-auto px-5 py-3 [&::-webkit-scrollbar]:w-0 flex flex-col gap-3">
                            <div class="w-full">
                                <a href="{{ route('socialAddress.create',[$cover]) }}" class="block w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                                        <path d="M448 128c0 53-43 96-96 96c-28.9 0-54.8-12.8-72.4-33l-89.7 44.9c1.4 6.5 2.1 13.2 2.1 20.1s-.7 13.6-2.1 20.1L279.6 321c17.6-20.2 43.5-33 72.4-33c53 0 96 43 96 96s-43 96-96 96s-96-43-96-96c0-6.9 .7-13.6 2.1-20.1L168.4 319c-17.6 20.2-43.5 33-72.4 33c-53 0-96-43-96-96s43-96 96-96c28.9 0 54.8 12.8 72.4 33l89.7-44.9c-1.4-6.5-2.1-13.2-2.1-20.1c0-53 43-96 96-96s96 43 96 96zM96 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM400 128a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM352 432a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                                    </svg>
                                    <span class="text-gray-700 font-bold">افزودن شبکه اجتماعی</span>
                                </a>
                            </div>
                            <div class="w-full">
                                <a href="{{ route('siteLink.create',[$cover]) }}" class="block w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                                        <path d="M0 256C0 167.6 71.6 96 160 96h72c13.3 0 24 10.7 24 24s-10.7 24-24 24H160C98.1 144 48 194.1 48 256s50.1 112 112 112h72c13.3 0 24 10.7 24 24s-10.7 24-24 24H160C71.6 416 0 344.4 0 256zm576 0c0 88.4-71.6 160-160 160H344c-13.3 0-24-10.7-24-24s10.7-24 24-24h72c61.9 0 112-50.1 112-112s-50.1-112-112-112H344c-13.3 0-24-10.7-24-24s10.7-24 24-24h72c88.4 0 160 71.6 160 160zM184 232H392c13.3 0 24 10.7 24 24s-10.7 24-24 24H184c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
                                    </svg>
                                    <span class="text-gray-700 font-bold">افزودن لینک</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/blocks.js') }}"></script>
@endsection