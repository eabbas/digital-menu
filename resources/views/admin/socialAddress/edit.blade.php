@extends('admin.app.panel')
@section('title', 'ویرایش شبکه اجتماعی')
@section('content')
            <div class="my-10">
                <h1 class="lg:text-3xl md:text-2xl text-md font-semibold text-center text-gray-700">ویرایش شبکه اجتماعی</h1>
            </div>
            <form action="{{ route('socialAddress.update') }}" method="post" enctype='multipart/form-data' class="w-11/12 lg:w-3/4 mx-auto p-5 rounded-lg border">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-5 lg:gap-10">
                    <div class="w-full flex flex-col">
                        <input type="hidden" name ="id" value ="{{$socialAddress -> id}}">
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm md:text-base" for="username">عنوان شبکه اجتماعی :</label>
                        <input type="text" name="username"  value="{{$socialAddress -> username}}" class="w-full px-2 py-1 lg:px-2 outline-none border-b" required>
                    </div>
                     <div>
            <label for="socialMedia_id">شبکه اجتماعی:</label>
            <select name="socialMedia_id">
                @foreach($socialMedias as $socialMedia)
                    <option value="{{$socialMedia->id}}" @if($socialMedia->id == $socialAddress->socialMedia_id) {{ 'selected' }} @endif>{{$socialMedia->title}}</option>
                @endforeach
            </select>
        </div>
                <div class="md:text-left text-center md:px-12 mt-5 lg:mt-10">
                    <button class="px-5 py-2 lg:px-10 lg:py-3 border rounded-md transition-all duration-150 hover:bg-gray-400 hover:border-gray-400 hover:text-white">ثبت</button>
                </div>
            </form>
@endsection