@extends('client.document')
@section('title', 'جست و جو')
@section('content')
    <div class="py-2 flex flex-row items-center overflow-x-auto [&::-webkit-scrollbar]:hidden lg:hidden mt-4">
        <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300">
            <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px] w-[74px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 576 512">
                    <path fill="var(--color-fill)"
                        d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z" />
                </svg>
                <span class="text-xs">
                    مرتب سازی:
                </span>
            </div>
        </div>
        <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300">
            <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 512 512">
                    <path fill="var(--color-fill)"
                        d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z" />
                </svg>
                <span class="text-xs">
                    فیلتر
                </span>
            </div>
        </div>
        <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300">
            <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                    <path fill="var(--color-fill)"
                        d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                </svg>
                <span class="text-xs">
                    برند
                </span>
            </div>
        </div>
        <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300">
            <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                    <path fill="var(--color-fill)"
                        d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                </svg>
                <span class="text-xs">
                    رنگ
                </span>
            </div>
        </div>
        <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300">
            <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px] w-[55px]">
                <span class="text-xs">
                    ارسال سریع
                </span>
            </div>
        </div>
        <div class="px-3 py-1 ml-2 rounded-full border-1 border-gray-300">
            <div class=" flex flex-row items-center gap-1 cursor-pointer max-w-[100px] w-[88px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 448 512">
                    <path fill="var(--color-fill)"
                        d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                </svg>
                <span class="text-xs">
                    محدوده قیمت
                </span>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4 mt-10">
        @if ($careerTitles && $careerTitles->count() > 0)
            @foreach ($careerTitles as $careerTitle)
                <a href="{{ route('show_career', [$careerTitle]) }}" data-index="{{ $careerTitle->career_category_id }}"
                    class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2 careers">
                    <div class="w-full h-28 rounded-md overflow-hidden">
                        <img class="size-28 mx-auto roundede-md rounded-inherit object-cover"
                            src="{{ asset('storage/' . $careerTitle->logo) }}" alt="career logo">
                    </div>
                    <span class="text-gray-500 text-sm font-medium">
                        {{ $careerTitle->title }}
                    </span>
                </a>
            @endforeach
    </div>
@else
    <div class="px-6 py-12 text-center">
        <div class="text-gray-400 text-4xl mb-3">📊</div>
        <div class="text-gray-500 text-lg">هیچ اطلاعاتی یافت نشد</div>
        <p class="text-gray-400 text-sm mt-2">لطفاً بعداً مراجعه کنید</p>
    </div>
    @endif

@endsection












{{--    
</html>
</body> --}}
