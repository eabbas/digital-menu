@extends('client.document')
@section('title')
    {{ $page->title }}
@endsection
@section('content')
    <div class="2xl:container w-full lg:max-w-xl mb-10">
        <div class="w-full my-5 py-5 flex flex-col relative">
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
