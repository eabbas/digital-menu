@extends('client.document')
@section('title', 'خانه')
@section('content')
    <div class="w-full h-full pt-5 samim">
        <section>
            <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">پیشنهادات ویژه</h1>
                <a class="text-[13px] text-[#00897b]" href="#">مشاهده همه</a>
            </div>
            <div class="w-full bg-green-300 h-40 overflow-hidden rounded-[15px] my-3">
                {{-- slider --}}
                <img class="size-full rounded-inherit object-cover"
                    src="{{ asset('assets/img/b1ddaeba-d51c-4633-9813-5c71022038d1.png') }}" alt="">
                {{-- slider end --}}
            </div>
            {{-- <div class="my-3 flex flex-row justify-center items-center gap-2">
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-[#00897b]"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
            </div> --}}
            <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">دسته بندی</h1>
                <a class="text-[13px] text-[#00897b]" href="#">مشاهده همه</a>
            </div>
            <div class="flex flex-row gap-3 my-4 overflow-x-auto overflow-y-clip" style="scrollbar-width: none;">
                @foreach ($careerCategories as $careerCategory)
                <div class="flex flex-col gap-3 justify-center items-center cursor-pointer" onclick='showCareer({{ $careerCategory->id }}, this)'>
                    <div class="size-20 rounded-md border border-gray-300 p-2 overflow-hidden careerCat">
                        @if ($careerCategory->main_image)
                        <img class="h-full w-full rounded-lg object-cover" 
                            src="{{ asset('storage/'.$careerCategory->main_image) }}" alt="career category avatar">
                        @else
                        <img class="h-full w-full rounded-lg object-cover"
                            src="{{ asset('assets/img/cash-machine.png') }}" alt="career category icon">
                        @endif
                    </div>
                    <span class="text-xs font-medium text-center">{{ $careerCategory->title }}</span>
                </div>
                @endforeach

            </div>
            <div class="flex flex-row justify-between items-center mt-5 mb-3">
                <h1 class="text-xl" id="careerCatTitle">
                  کسب و کار ها
                </h1>
                <a class="text-[13px] text-[#00897b]" href="#">مشاهده همه</a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach($careers as $career)
                <a href="{{ route('show_career', [$career]) }}" data-index="{{ $career->career_category_id }}"
                    class="px-5 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2 careers">
                    <div class="w-full h-28 rounded-md overflow-hidden">
                        <img class="size-28 mx-auto roundede-md rounded-inherit object-cover"
                            src="{{ asset('storage/'.$career->logo) }}" alt="career logo">
                    </div>
                    <span class="text-gray-500 text-sm font-medium">
                        {{ $career->title }}
                    </span>
                </a>
                @endforeach
            </div>
        </section>
    </div>

@endsection
