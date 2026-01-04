@extends('client.document')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@section('title', 'همه دسته ها')
@section('content')
    <div class="w-full h-full pt-5 samim">
        <section>
            <div class="flex flex-row justify-between items-center">
                <h1 class="text-xl">همه دسته بندی ها </h1>
            </div>
            <div class="flex flex-row gap-6 my-4 overflow-x-auto overflow-y-clip" style="scrollbar-width: none;">
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
