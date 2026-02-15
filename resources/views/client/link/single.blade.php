@extends('client.document')
@section('title')
    فامنو | {{ $page->title }}
@endsection
@section('content')
    <div class="2xl:container w-full lg:max-w-xl lg:mx-auto mb-10">
        <div class="w-full my-5 py-5 flex flex-col relative">
            <div class="relative">
                <div class="flex flex-row justify-end mb-3">
                    <div class="inline-block p-2 rounded-md bg-gray-200 cursor-pointer" onclick="qrCard('open')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 576 512">
                            <path
                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                        </svg>
                    </div>
                </div>
                <div class="w-full h-dvh fixed top-0 right-0 z-999 bg-black/50 invisible opacity-0 transition-all duration-300"
                    id="qrcode_card">
                    <div class="relative w-full lg:w-full h-full float-end flex items-center justify-center">
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
            </div>
        </div>
    </div>
    <script>
        function copyText(pageId, slug) {
            let url = "{{ url('qrcodes/links/') }}/" + pageId + "/" + slug
            navigator.clipboard.writeText(url)
            alert(url)
        }
    </script>
    <script src="{{ asset('assets/js/blocks.js') }}"></script>
@endsection
