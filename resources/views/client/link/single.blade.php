@extends('client.document')
@section('title')
    {{ $page->title }}
@endsection
@section('content')
    <div class="2xl:container w-11/12 lg:max-w-xl mb-10 mx-auto">
        <div class="w-full my-5 flex flex-col relative">
            <div class="flex flex-row justify-end items-center gap-3 lg:gap-5">

                @if ((Auth::check()) && Auth::user()->id == $page->user->id)
                
                    <div>
                        {{-- page qr code end --}}
                        <a href="{{ route('pages.single', [$page]) }}" class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                <path
                                    d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z" />
                            </svg>
                        </a>
                    </div>
                    
                @endif

                <div>
                    {{-- page qr code --}}
                    <div class="w-full h-dvh fixed top-0 right-0 z-999 bg-black/50 invisible opacity-0 transition-all duration-300"
                        id="qrcode_card">
                        <div class="relative w-full h-full float-end flex items-center justify-center">
                            <div class="absolute top-10 right-10 bg-white rounded-full p-2 cursor-pointer"
                                onclick="qrCard('close')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 384 512">
                                    <path
                                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                                </svg>
                            </div>
                            @if (isset($page->social_qr_codes->qr_path))
                                <div class="w-2/3 lg:w-1/4 mx-auto bg-white rounded-lg p-5">
                                    <img src="{{ asset('storage/' . $page->social_qr_codes->qr_path) }}" class="w-full"
                                        alt="">
                                    <div class="lg:w-full mx-auto bg-gray-300 rounded-lg p-2 mt-2 flex items-center justify-center cursor-pointer"
                                        onclick='copyText({{ $page->id }} , "{{ $page->social_qr_codes->slug }}")'>
                                        کپی لینک
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- page qr code end --}}
                    <div class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer" onclick="qrCard('open')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                            <path
                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                        </svg>
                    </div>
                </div>
                
            </div>
            <div class="relative">
                <div>
                    <img class="w-full h-[180px] object-cover lg:h-[200px] rounded-sm"
                        src="{{ asset('storage/' . $page->cover_path) }}" alt="">
                </div>
                <div class="flex flex-col items-center justify-end w-full h-[100px]">
                    <h2 class="text-center text-base lg:text-lg font-bold text-gray-800">
                        {{ $page->title }}
                    </h2>
                    <span class="block text-cetner text-sm lg:text-md text-gray-500">
                        {{ $page->subTitle }}
                    </span>
                </div>
                <img src="{{ asset('storage/' . $page->logo_path) }}"
                    class="size-26 lg:size-30 rounded-full absolute inset-1/2 translate-x-1/2 -translate-y-1/5 border-4 border-white object-cover"
                    alt="">
            </div>
            <div class="w-full mt-5 lg:mt-10 flex flex-col gap-5">

                <div class="w-full flex flex-col gap-3 lg:gap-5" id="socialLinks">
                    @if (count($page->socialAddresses))
                        @foreach ($page->socialAddresses as $item)
                            <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center">
                                    ورود به {{ $item->socialMedia->title }}
                                </h3>
                                <div class="mt-3">
                                    <a href="{{ $item->socialMedia->link . $item->username }}"
                                        class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-[{{ $item->socialMedia->color }}] rounded-full cursor-pointer ">
                                        <img src="{{ asset('storage/' . $item->socialMedia->icon_path) }}"
                                            class="size-5 rounded-md" alt="">
                                        <span class="font-bold text-gray-800">{{ $item->socialMedia->title }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="w-full flex flex-col gap-3 lg:gap-5" id="siteLinks">
                    @if (count($page->siteLinks))
                        @foreach ($page->siteLinks as $siteLink)
                            <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center viewLinkTitle"
                                    data-view-link-id="{{ $siteLink->id }}">
                                    ورود به {{ $siteLink->title }}
                                </h3>
                                <div class="mt-3">
                                    <a href="{{ $siteLink->address }}"
                                        class="w-full flex flex-row justify-center items-center gap-3 py-3 border-1 border-gray-400 bg-gray-200 rounded-full cursor-pointer ">
                                        @if ($siteLink->icon_path)
                                            <img src="{{ asset('storage/' . $siteLink->icon_path) }}"
                                                class="size-5 rounded-md" alt="">
                                        @else
                                            <img src="{{ asset('assets/img/link-simple.svg') }}" class="size-5 rounded-md"
                                                alt="">
                                        @endif
                                        <span class="font-bold text-gray-800 viewLinkTitle"
                                            data-view-link-id="{{ $siteLink->id }}">{{ $siteLink->title }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{-- Faq start --}}
                <div class="w-full flex flex-col gap-3" id="faq">
                    @if (count($page->FAQs))
                        @foreach ($page->page_blocks as $page_block)
                            <div class="lg:py-2">
                                <h3 class="hidden lg:block text-lg font-bold text-gray-800 text-center  viewFAQ"
                                    onclick='editTitle("{{ $page_block->id }}")' data-block-id="{{ $page_block->id }}">
                                    {{ $page_block->title }}
                                </h3>
                                @foreach ($page_block->FAQs as $FAQ)
                                    <div class="mt-3 relative flex flex-col lg:flex-row ">
                                        <div class="w-full faqBox">
                                            <div
                                                class="flex flex-row justify-between items-center py-3 px-4 border-1 border-gray-400 bg-fuchsia-100 rounded-full relative transition-all duration-300">
                                                <div class="flex flex-row items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                        class="size-5 rounded-md">
                                                        <path
                                                            d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                                    </svg>
                                                    <span class="font-bold text-gray-800 viewFAQ"
                                                        data-view-FAQ-id="{{ $FAQ->id }}">{{ $FAQ->question }}</span>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4 transition-all duration-200 cursor-pointer"
                                                    viewBox="0 0 448 512">
                                                    <path fill="black"
                                                        d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                                </svg>
                                            </div>
                                            <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                                <div class="p-3 bg-fuchsia-100 border-1 border-gray-400 rounded-full mt-2">
                                                    <p class="text-gray-700 font-bold">{{ $FAQ->answer }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                        @endforeach
                    @endforeach
                    @endif
                </div>
                {{-- Faq end --}}
            </div>
        </div>
    </div>
    </div>





    </div>
    </div>
    </div>
    <!--<footer class="w-full fixed bottom-0 flex flex-row justify-center items-center right-0">-->
    <!--    <div class="2xl:container w-full mx-auto lg:max-w-xl bg-gray-800 py-3 lg:py-5">-->
    <!--        <p class="text-center text-xs lg:text-sm text-white">-->
    <!--            ساخته شده توسط-->
    <!--            <a href="{{ route('home') }}" class="px-2 font-bold">Famenu.ir</a>-->
    <!--        </p>-->
    <!--    </div>-->
    <!--</footer>-->
    <script>
        let faqBox = document.querySelectorAll(".faqBox")
        faqBox.forEach(faq => {
            faq.children[0].addEventListener('click', () => {
                if (faq.children[1].classList.contains('max-h-0')) {
                    faqBox.forEach((item) => {
                        item.children[1].classList.remove('max-h-[500px]')
                        item.children[1].classList.add('max-h-0')
                        item.children[0].children[1].classList.remove('rotate-180')
                        item.children[0].children[1].classList.add('rotate-0')
                    })
                    faq.children[1].classList.remove('max-h-0')
                    faq.children[1].classList.add('max-h-[500px]')
                    faq.children[0].children[1].classList.remove('rotate-0')
                    faq.children[0].children[1].classList.add('rotate-180')
                } else {
                    faq.children[1].classList.remove('max-h-[500px]')
                    faq.children[1].classList.add('max-h-0')
                    faq.children[0].children[1].classList.remove('rotate-180')
                    faq.children[0].children[1].classList.add('rotate-0')
                }
            })
        })
    </script>
    <script src="{{ asset('assets/js/blocks.js') }}"></script>
@endsection
