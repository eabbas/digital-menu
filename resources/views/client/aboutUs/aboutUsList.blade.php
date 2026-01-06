@extends('client.document')
@section('title', 'درباره ما')
@section('content')
    @foreach ($aboutUs as $about)
        <div class="w-11/12 mx-auto mt-15 flex flex-col items-center gap-10">
            <div class="text-center text-xl font-bold"> {{ $about->title }} </div>
            <div class="text-center text-md"> {{ $about->description }} </div>

        </div>
    
    @endforeach
@endsection