@extends('client.document')
@section('title', 'فامنو | همه صفحات')
@section('content')

    <div class="mt-5">
        <h2 class="mb-5 font-bold text-sm lg:text-base">شبکه های اجتماعی</h2>
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-3 lg:gap-4">
            @foreach ($pages as $page)
                <a href="{{ route('client.loadLink', [$page]) }}"
                    class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers border-1 border-gray-300"
                    title="{{ $page->title }}">
                    <div class="w-full rounded-md overflow-hidden">
                        <img class="size-26 mx-auto rounded-[7px] object-cover"
                            src="{{ asset('storage/' . $page->logo_path) }}" alt="social address image">
                    </div>
                    <span class="text-gray-500 text-sm font-medium truncate max-w-[100px]">
                        {{ $page->title }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>

@endsection
