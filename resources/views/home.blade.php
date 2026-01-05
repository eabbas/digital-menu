@extends('client.document')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@section('title', 'خانه')
@section('content')
    <div class="w-full h-full pt-5 samim">
        <section>
            {{-- <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">پیشنهادات ویژه</h1>
                <a class="text-[13px] text-[#00a692]" href="#">مشاهده همه</a>
            </div> --}}
            {{-- <div class="w-full bg-green-300 h-40 overflow-hidden rounded-[15px] my-3">
                <img class="size-full rounded-inherit object-cover"
                    src="{{ asset('assets/img/b1ddaeba-d51c-4633-9813-5c71022038d1.png') }}" alt="">
            </div> --}}
            {{-- <div class="my-3 flex flex-row justify-center items-center gap-2">
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-[#00a692]"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
                <span class="size-2 rounded-full bg-gray-300"></span>
            </div> --}}
            <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">دسته بندی</h1>
                <a class="text-[13px] text-[#00a692]" href="{{ route('career.careersCategories') }}">مشاهده همه</a>
            </div>
            <div class="flex flex-row gap-3 my-4 overflow-x-auto overflow-y-clip" style="scrollbar-width: none;">
                @foreach ($careerCategories as $careerCategory)
                @if(count($careerCategory->careers))
                @if ($careerCategory->show_in_home==1)
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
                @endif
                @endif
                @endforeach
            </div>
            <div class="flex flex-row justify-between items-center mt-5 mb-3">
                <h1 class="text-xl" id="careerCatTitle">
                  کسب و کار ها
                </h1>
                <a class="text-[13px] text-[#00a692]" href="{{ route('career.careersList') }}">مشاهده همه</a>
            </div>
            <div class="grid grid-cols-2 gap-4">

                @foreach($careers as $career)
                <div class="relative careers" data-index="{{ $career->career_category_id }}">
                    <!-- آیکون قلب در گوشه بالا سمت چپ -->
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 absolute top-2 right-2 cursor-pointer" onclick="favoriteCareer({{$career->id}},this)">
                        <path fill="gray" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                    </svg> --}}
                    <a href="{{ route('client.menu', [$career]) }}"
                        class="px-5 w-full h-40 bg-[#f2f4f7] rounded-[11px] flex flex-col items-center justify-center gap-2">
                        <div class="w-full h-28 rounded-md overflow-hidden">
                            <img class="size-28 mx-auto roundede-md rounded-inherit object-cover"
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
 <script>
    //    function favoriteCareer(id,el){
    //     // event.preventDefault();
    //     el.children[0].setAttribute('fill', 'red');

    //     $.ajaxSetup({
    //         headers:{
    //             'X-CSRF-TOKEN':"{{csrf_token()}}"
    //         }
    //     });

    //     $.ajax({
    //         url:"{{route('favoriteCareer.create')}}",
    //         type:'POST',
    //         dataType:'json',
    //         data:{'id':id},
    //         success:function(response){
    //             console.log("success")
    //         }

    //     })
    //    }
    </script>
@endsection
