
    @extends('client.document')
    @section('title')
    {{ $page->title }}
    @endsection
    @section('content')
    <div class="2xl:container w-full lg:max-w-xl mb-10">
        <div class="w-full my-5 py-5 flex flex-col relative">
            <div class="relative">
                <div>
                    <img class="w-full h-[180px] object-cover lg:h-[200px] rounded-sm" src="{{ asset('storage/' . $page->cover_path) }}"
                        alt="">
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
    <script src="{{ asset('assets/js/blocks.js') }}"></script>
@endsection