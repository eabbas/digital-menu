@extends('admin.app.panel')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@section('title')
    ایجاد شبکه اجتماعی {{ $cover->title }}
@endsection
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

                @foreach ($cover->socialAddresses as $item)
                <div class="py-2"> 
                    <h3 class="text-lg font-bold text-gray-800 text-center">
                        ورود به {{ $item->socialMedia->title }}
                    </h3>
                    <div class="mt-3">
                        <div  class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-blue-100 rounded-full cursor-pointer"  onclick='editSocial("{{ $item->id }}", "{{ $item->socialMedia->id }}")'>
                            <img src="{{ asset('storage/'.$item->socialMedia->icon_path) }}" class="size-5 rounded-md" alt="">
                            <span class="font-bold text-gray-800">{{ $item->socialMedia->title }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                @if ($cover->siteLink)
                <div class="py-2">
                    <h3 class="text-lg font-bold text-gray-800 text-center">
                        ورود به {{ $cover->siteLink->title }}
                    </h3>
                    <div class="mt-3">
                        <div class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-blue-100 rounded-full cursor-pointer" onclick='editLink("{{ $cover->siteLink->id }}")'>
                            <img src="{{ asset('storage/'.$cover->siteLink->icon_path) }}" class="size-5 rounded-md" alt="">
                            <span class="font-bold text-gray-800">{{ $cover->siteLink->title }}</span>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>



        <div class="w-full h-dvh bg-black/50 fixed top-0 right-0 z-9999 transition-all duration-300 invisible opacity-0" id="block">
            <div class="lg:w-[calc(100%-265px)] float-left h-dvh flex justify-center items-center">
                <div class="w-2/3 px-3 relative">

                    <div class="w-full bg-white py-5 rounded-lg transition-all duration-300 scale-95 opacity-0" id="group">
                        <div class="w-full flex flex-row items-center gap-5 py-2.5 border-b border-gray-300 px-5 cursor-pointer" onclick="addBlock('close')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                            </svg>
                            <span class="text-gray-700 font-bold">افزودن بلوک جدید</span>
                        </div>
                        <div class="w-full overflow-y-auto px-5 py-3 [&::-webkit-scrollbar]:w-0 flex flex-col gap-3">
                            <div class="w-full">
                                <div onclick="addSocialMedia()" class="block w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 448 512">
                                        <path d="M448 128c0 53-43 96-96 96c-28.9 0-54.8-12.8-72.4-33l-89.7 44.9c1.4 6.5 2.1 13.2 2.1 20.1s-.7 13.6-2.1 20.1L279.6 321c17.6-20.2 43.5-33 72.4-33c53 0 96 43 96 96s-43 96-96 96s-96-43-96-96c0-6.9 .7-13.6 2.1-20.1L168.4 319c-17.6 20.2-43.5 33-72.4 33c-53 0-96-43-96-96s43-96 96-96c28.9 0 54.8 12.8 72.4 33l89.7-44.9c-1.4-6.5-2.1-13.2-2.1-20.1c0-53 43-96 96-96s96 43 96 96zM96 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM400 128a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM352 432a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                                    </svg>
                                    <span class="text-gray-700 font-bold">افزودن شبکه اجتماعی</span>
                                </div>
                            </div>
                            @if (!isset($cover->siteLink))
                            <div class="w-full">
                                <div onclick="addLink()" class="block w-full p-5 border-1 border-gray-400 flex flex-row items-center gap-5 hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:bg-sky-200 rounded-lg transition-all duration-150 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 576 512">
                                        <path d="M0 256C0 167.6 71.6 96 160 96h72c13.3 0 24 10.7 24 24s-10.7 24-24 24H160C98.1 144 48 194.1 48 256s50.1 112 112 112h72c13.3 0 24 10.7 24 24s-10.7 24-24 24H160C71.6 416 0 344.4 0 256zm576 0c0 88.4-71.6 160-160 160H344c-13.3 0-24-10.7-24-24s10.7-24 24-24h72c61.9 0 112-50.1 112-112s-50.1-112-112-112H344c-13.3 0-24-10.7-24-24s10.7-24 24-24h72c88.4 0 160 71.6 160 160zM184 232H392c13.3 0 24 10.7 24 24s-10.7 24-24 24H184c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
                                    </svg>
                                    <span class="text-gray-700 font-bold">افزودن لینک</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>


                    {{-- create social media --}}
                    <form action="{{ route('socialAddress.store') }}" method="post" class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-full form px-5" id="socialMediaForm">
                        @csrf
                        <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()" class="size-5 mr-5 cursor-pointer" viewBox="0 0 384 512">
                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                        </svg>
                        <input type="hidden" name="covers_id" value="{{ $cover->id }}">
                        <div class="flex items-start justify-center">
                            <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                                <!-- هدر -->
                                <div class="text-center mb-8">
                                    <h1 class="text-lg font-bold text-gray-800">  شبکه اجتماعی</h1>
                                </div class="w-full ">
                            <div class="md:flex md:flex-col md:w-full md:items-center md:gap-5">
                                <div class="md:flex md:flex-col md:w-full">
                                        <div class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3 pb-8">
                                            <lable class="p-1 w-40 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">  نام کاربری </lable>
                                            <input type="text" name='username' placeholder="نام کاربری"  class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                                        </div>
                                </div>
                            </div>
                        <label for="socialMedia_id">شبکه اجتماعی:</label>
                        <select name="socialMedia_id">
                            @foreach($socialMedias as $socialMedia)
                                <option value="{{$socialMedia->id}}">{{$socialMedia->title}}</option>
                            @endforeach
                        </select>
                                <button type="submit"
                                    class="active:bg-[#0080e5] mt-2 w-full bg-[#03A9F4] text-white py-3 rounded-md hover:bg-blue-700 transition duration-200 font-medium" >
                                    ارسال اطلاعات
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- create social media end --}}


                    {{-- create link --}}
                    <form action="{{ route('siteLink.store') }}" method="post" enctype='multipart/form-data' class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-full form px-5" id="siteLinkForm">
                    @csrf
                        <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()" class="size-5 mr-5 cursor-pointer" viewBox="0 0 384 512">
                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                        </svg>
                        <input type="hidden" name="covers_id" value="{{ $cover->id }}">
                        <div class="flex items-start justify-center">
                            <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                                <!-- هدر -->
                                <div class="text-center mb-4">
                                    <h1 class="text-lg font-bold text-gray-800">ایجاد لینک شبکه اجتماعی</h1>
                                </div class="w-full">
                                <div class="md:flex md:flex-col md:w-full md:items-center md:gap-5">
                                    <div class="md:flex md:flex-col md:w-full">
                                            <div class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3">
                                                <lable class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">  عنوان لینک </lable>
                                                <input type="text" name='title' placeholder=" عنوان لینک" class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                                            </div>
                                    </div>
                                    <div class="md:flex md:flex-col md:w-full">
                                            <div class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3">
                                                <lable class="p-1 w-40 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm"> آدرس  لینک</lable>
                                                <input type="text" name='address' placeholder="آدرس"  class="w-full px-2 py-1 md:px-2 outline-none text-gray-500">
                                            </div>
                                    </div>
                                    <div class="md:flex md:flex-col md:w-full">
                                            <div class="flex flex-row items-center mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3">
                                                <lable class="p-1 w-40 text-gray-600 rounded-full flex flex-row justify-center text-sm"> آیکون  لینک</lable>
                                                <input type="file" name='icon_path'>
                                            </div>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="active:bg-[#0080e5] mt-2 w-full bg-[#03A9F4] text-white py-3 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                                    ارسال اطلاعات
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- create link end --}}


                    {{-- edit social media --}}

                    <div class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-full form px-5" id="editsocialMediaForm">
                        <div class="w-full absolute h-full top-0 right-0 bg-white flex items-center justify-center"></div>
                        <div onclick="closeForm()" class="p-3 cursor-pointer absolute -top-5 -right-5 rounded-full bg-rose-100 hover:bg-rose-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                            </svg>
                        </div>
                        <div class="flex flex-row justify-between items-center p-5">
                            <div class="flex flex-row items-center gap-5 w-10/12 cursor-pointer" onclick="openDropdown('media')">
                                <div class="text-sm text-gray-800 font-bold socialTitle"></div>
                                <div class="text-xs text-gray-600 socialLink"></div>
                            </div>
                            <div class="flex flex-row items-center gap-5">

                                <div class="p-1.5 rounded-md bg-green-500 hover:bg-green-600 cursor-pointer" onclick="openDropdown('media')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                        <path fill="white" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                    </svg>
                                </div>
                                <div class="p-1.5 rounded-md bg-red-500 hover:bg-red-600 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                        <path fill="white" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                                    </svg>
                                </div>
                            </div>

                        </div>
                        <form action="{{ route('socialAddress.update') }}" method="post" enctype='multipart/form-data' id="editSMF" class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                            @csrf
                            <input type="hidden" name="id" id="socialAddressId">
                            <input type="hidden" name="cover_id" value="{{ $cover->id }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10" id="socialDiv">
                                <!-- عنوان شبکه اجتماعی -->
                                @if (isset($item))
                                <div class="w-full flex flex-col">
                                    <label class="text-sm md:text-base mb-2" for="username">آدرس شبکه اجتماعی:</label>
                                    <input type="text" name="username" id="userName" class="w-full px-3 py-2 outline-none border rounded-lg" required>
                                </div>
                                <!-- انتخاب شبکه اجتماعی -->
                                <div class="w-full flex flex-col">
                                    <label class="text-sm md:text-base mb-2" for="socialMedia_id">شبکه اجتماعی:</label>
                                    <select name="socialMedia_id" class="w-full px-3 py-2 outline-none border rounded-lg" id="socialMedia_id">
                                        {{-- @foreach($socialMedias as $socialMedia)
                                        
                                        <option value="{{ $socialMedia->id }}" @if($socialMedia->id == $item->socialMedia_id) selected @endif>
                                            {{ $socialMedia->title }}
                                        </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                @endif
                            </div>
                            
                            <!-- دکمه ثبت -->
                            <div class="text-center mt-8">
                                <button type="submit" class="px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-150">
                                    ثبت تغییرات
                                </button>
                            </div>
                        </form>
                    </div>
                        
                    

                    {{-- edit social media end --}}


                    {{-- edit site link  --}}
                       
                    <form action="{{ route('siteLink.update') }}" method="post" enctype='multipart/form-data' class="w-full bg-white py-5 rounded-lg transition-all duration-300 invisible opacity-0 absolute top-full form" id="editSiteLinkForm">
                        @csrf
                        <svg xmlns="http://www.w3.org/2000/svg" onclick="closeForm()" class="size-5 mr-5 cursor-pointer" viewBox="0 0 384 512">
                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                        </svg>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10">
                            <div class="w-full flex flex-col">
                                <fieldset class="text-sm md:text-base border border-gray-400 rounded-[20px] py-1 pr-3">
                                    <legend class="p-1 w-20 bg-gray-200 rounded-full flex flex-row justify-center text-sm">آیکون لینک
                                    </legend>
                                    <input type="file" name="icon_path" class="w-full px-2 py-1 lg:px-2 outline-none text-gray-500">
                                </fieldset>
                            </div>
                            <div class="w-full flex flex-col">
                                <label class="text-sm md:text-base" for="title">عنوان  لینک :</label>
                            </div>
                            <div class="w-full flex flex-col">
                                <label class="text-sm md:text-base" for="address">آدرس  لینک  :</label>
                            </div>
                        <div class="md:text-left text-center md:px-12 mt-5 lg:mt-10">
                            <button class="px-5 py-2 lg:px-10 lg:py-3 border rounded-md transition-all duration-150 hover:bg-gray-400 hover:border-gray-400 hover:text-white">ثبت</button>
                        </div>
                    </form>

                    {{-- edit site link end --}}

                </div>
            </div>
        </div>
    </div>
    <script>
        let socialMedia_id = document.getElementById('socialMedia_id')
        let userName = document.getElementById('userName')
        let editsocialMediaForm = document.getElementById('editsocialMediaForm')
        let socialAddressId = document.getElementById('socialAddressId')
        let socialTitle = document.querySelector('.socialTitle')
        let socialLink = document.querySelector('.socialLink')
        function editSocial(id, socialId) {
            socialMedia_id.innerHTML = "";
            let bool = true
            if (bool) {
                editsocialMediaForm.children[0].classList.remove('hidden')
                editsocialMediaForm.children[0].innerHTML = `
                <div class="loading-wave">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
                `
            } 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: `{{ url('socialAddress/edit/${id}') }}`,
                type: "POST",
                dataType: "json",
                data:{'social_id': id},
                success: function(datas){
                    bool = false
                    if (!bool) {
                        editsocialMediaForm.children[0].classList.add('hidden')
                    }
                    datas.socialMedias.forEach((socialMedia)=>{
                        let option = document.createElement('option')
                        option.value = socialMedia.id
                        option.innerText = socialMedia.title
                        if (socialId == socialMedia.id) {
                            option.setAttribute('selected', true)
                            socialTitle.innerText = socialMedia.title
                        }
                        socialMedia_id.appendChild(option)
                        userName.value = datas.data.username
                        socialAddressId.value = datas.data.id
                        socialLink.innerText = datas.data.username
                    })
                },
                error: function(){
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

        function editLink(id) {
            block.classList.remove('invisible')
            block.classList.remove('opacity-0')
            group.classList.add('scale-95')
            group.classList.add('opacity-0')
            group.classList.add('invisible')
            linkForm.classList.remove('invisible')
            linkForm.classList.remove('opacity-0')
            linkForm.classList.remove('top-full')
            linkForm.classList.add('top-0')
            linkForm.classList.add('-translate-y-1/7')
        }

    </script>
    <script src="{{ asset('assets/js/blocks.js') }}"></script>
@endsection