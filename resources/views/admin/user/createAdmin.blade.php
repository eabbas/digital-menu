@extends('admin.user.panel')
@section('title', 'ایجاد ادمین')
@section('content')
            <div class="w-2/3 mx-auto flex flex-col items-center mt-8">
                <h1 class="text-2xl font-bold">ایجاد ادمین</h1>
                <div class="w-1/2 mx-auto flex flex-col">
                    <form action="{{ route('user.adminStore') }}" class="w-full flex flex-col items-center my-6 gap-3 " method="post">
                        @csrf
                        <input type="text"
                            class="w-full p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="name" placeholder="نام" required>
                        <input type="text"
                            class="w-full p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="family" placeholder="نام خانوادگی">
                        <input type="number"
                            class="w-full p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="phoneNumber" placeholder="شماره تلفن" required>
                        <input type="password" maxlength="8"
                            class="w-full p-[9px] mb-1 rounded-[7px] border border-[#DBDFE9] outline-none"
                            name="password" placeholder="کلمه عبور" required>
                        <button class="text-center w-full bg-[#056EE9] p-3 rounded-[10px] text-white cursor-pointer">ثبت</button>
                    </form>

                </div>

            </div>
      
@endsection