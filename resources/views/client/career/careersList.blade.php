@extends('client.document')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@section('title', 'همه کسب کار ها')
@section('content')
    <div class="w-full h-full pt-5 samim">
        <section>
            
           
            
            <div class="flex flex-row justify-between items-center mt-5 mb-3">
                <h1 class="lg:text-xl text-sm font-bold" id="careerCatTitle">
                 همه کسب و کار ها 
                </h1>
            </div>
            <div class="grid grid-cols-3 lg:grid-cols-8 gap-3 lg:gap-4">
               
                @foreach($careers as $career)
                <div class="relative careers" data-index="{{ $career->career_category_id }}">
                    <!-- آیکون قلب در گوشه بالا سمت چپ -->
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 absolute top-2 right-2 cursor-pointer" onclick="favoriteCareer({{$career->id}},this)">
                        <path fill="gray" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                    </svg> --}}
                    <a href="{{ route('client.menu', [$career]) }}"
                        class="w-full h-40 rounded-[11px] flex flex-col items-center justify-center gap-2">
                        <div class="w-full rounded-md overflow-hidden">
                            <img class="size-26 mx-auto rounded-[7px] object-cover"
                                src="{{ asset('storage/'.$career->logo) }}" alt="career logo">
                        </div>
                        <span class="text-gray-500 text-sm font-medium">
                            {{ $career->title }}
                        </span>
                    </a>
                </div>
                @endforeach
               
            </div>
        </section>
    </div>
@endsection
