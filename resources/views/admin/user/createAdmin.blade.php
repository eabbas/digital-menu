@extends('admin.app.panel')
@section('title', 'ایجاد ادمین')
@section('content')
            <div class="w-2/3 max-lg:w-full mx-auto flex flex-col items-center mt-8">
                <h1 class="text-2xl font-bold">ایجاد ادمین</h1>
                <div class="w-1/2 max-sm:w-full max-sm:mx-10 mx-auto flex flex-col">
                    <form action="{{ route('user.adminStore') }}" class="w-full flex flex-col items-center my-6 gap-3 " method="post">
                        @csrf
                        <fieldset class="w-full border border-[#DBDFE9] rounded-[8px]">
                            <legend class="px-4 font-bold text-gray-600">نام</legend>
                                <input type="text"
                                    class="w-full p-1 px-3 mb-1 rounded-[7px] outline-none"
                                    name="name" required>
                        </fieldset>
                         <fieldset class="w-full border border-[#DBDFE9] rounded-[8px]">
                            <legend class="px-4 font-bold text-gray-600">نام خانوادگی</legend>
                                <input type="text"
                                    class="w-full p-1 px-3 mb-1 rounded-[7px] outline-none"
                                    name="family" required>
                        </fieldset>
                         <fieldset class="w-full border border-[#DBDFE9] rounded-[8px] bg-[#e8f0fe]">
                            <legend class="px-4 font-bold text-blue-700">شماره تلفن</legend>
                                <input type="text"
                                    class="w-full p-1 px-3 mb-1 rounded-[7px] outline-none"
                                    name="phoneNumber" required>
                        </fieldset>
                         <fieldset class="w-full border border-[#DBDFE9] rounded-[8px] bg-[#e8f0fe]">
                            <legend class="px-4 font-bold text-blue-700">کلمه عبور</legend>
                                <input type="password"
                                    class="w-full p-1 px-3 mb-1 rounded-[7px] outline-none"
                                    name="password" required>
                        </fieldset>
            
                        <button class="text-center w-full bg-[#056EE9] p-3 rounded-[10px] text-white cursor-pointer">ثبت</button>
                    </form>

                </div>

            </div>
      
@endsection