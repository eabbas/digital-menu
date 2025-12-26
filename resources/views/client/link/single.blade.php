<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $cover->title }}</title>
</head>

<body>
    <div class="2xl:container w-11/12 mx-auto lg:max-w-xl">
        <div class="w-full my-5 p-5 bg-gray-100 flex flex-col relative">
            <div class="relative">
                <div>
                    <img class="w-full h-[130px] object-cover lg:h-[200px]" src="{{ asset('storage/' . $cover->cover_path) }}"
                        alt="">
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
            <div class="w-full mt-5 lg:mt-10 flex flex-col gap-5">
    
                <div class="w-full flex flex-col gap-3 lg:gap-5" id="socialLinks">
                    @if (count($cover->socialAddresses))
                        @foreach ($cover->socialAddresses as $item)
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
                    @if (count($cover->siteLinks))
                        @foreach ($cover->siteLinks as $siteLink)
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
    <footer class="2xl:container w-full mx-auto lg:max-w-xl bg-gray-800 py-3 lg:py-5">
        <p class="text-center text-xs lg:text-sm text-white">
            ساخته شده توسط
            <a href="{{ route('home') }}" class="px-2 font-bold">Famenu.ir</a>
        </p>
    </footer>
    <script src="{{ asset('assets/js/blocks.js') }}"></script>
</body>

</html>
