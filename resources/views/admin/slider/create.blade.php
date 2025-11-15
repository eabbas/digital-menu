    @extends('admin.app.panel')
    @section('title', 'ایجاد اسلایدر')
    @section('content')
    <form action="{{ route('slider.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                <div class="md:flex md:flex-col md:w-full">
                        <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3">
                            <legend class="kelass p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">عکس اسلایدر</legend>
                            <input type="file" name='slider_img' class="w-full px-2 py-1 md:px-5 outline-none text-gray-500">
                        </fieldset>
                         <fieldset class="mt-2 text-sm md:text-base border border-gray-400 rounded-[15px] py-1 pr-3">
                            <legend class="p-1 w-30 bg-[#1cb7fd] text-white rounded-full flex flex-row justify-center text-sm">نام اسلایدر</legend>
                            <input type="text" name='title' class="w-full px-2 py-1 md:px-5 outline-none text-gray-500">
                        </fieldset>
                </div>
                <button type="submit"
                    class="active:bg-[#0080e5] mt-2 w-full bg-[#03A9F4] text-white py-3 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                     ایجاد
                </button>
            </div>
        </div>
         </fieldset>

    </form>
    @endsection
