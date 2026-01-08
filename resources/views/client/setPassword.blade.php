{{-- <!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>ذخیره رمز جدید</title>
   
</head>

<body> --}}
            @extends('client.menuMobile')
@section('title', 'ورود')
@section('content')
    <div class="w-full h-dvh flex flex-col justify-start items-center md:flex-row-reverse">
        <div class="flex justify-center max-sm:h-30 max-md:h-35 md:h-dvh md:w-4/12 lg:w-5/12 xl:w-6/12 bg-[#eb3254]">
            <div class="flex flex-col my-12 items-center justify-center">
                <a href="https://famenu.ir" class="w-full flex flex-row justify-center items-center">
                    <img class="max-md:w-4/12 w-8/12"
                        src="{{ asset('storage/images/Famenu1.png') }}" alt="">
                    <!-- <h2 class="text-center font-bold text-white text-3xl">Faos</h2> -->
                </a>
            </div>
        </div>

        <div
            class="w-10/12 md:w-8/12 bg-white h-full flex flex-col max-md:justify-start justify-center mt-5 items-center px-4">
            <div class="w-full flex flex-col items-center justify-center md:justify-center lg:w-115 md:w-10/12 px-4">
                <h1 class="text-base md:text-2xl font-bold">ذخیره رمز جدید</h1>
                <div class="flex flex-col w-full">
                    <form action="{{ route('save_password') }}" class="flex flex-col items-center my-6 gap-3 w-full"
                        method="post" id="checkCodeForm">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="password"
                            class="placeholder-[#eb3254] focus:border-1 focus:border-[#eb3254] p-2 md:p-[9px] mb-1 rounded-[7px] border-1 border-[#eb3254] focus:outline-none w-full"
                            name="password" placeholder="رمز عبور" required>
                        <button
                            class="focus:bg-[#eb3254] hover:bg-[#d52b4a] transition-all duration-400 text-center w-full bg-[#eb3254] p-2 md:p-3 rounded-[10px] text-white cursor-pointer">ثبت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="w-full h-17 bg-[#eb3254] absolute bottom-0 flex flex-col justify-center items-center md:hidden">
            <div class="">اکادمی <b class="text-xl">Faos</b></div>
            <a href="tell:"><b class="text-white">09147794595</b></a>
        </div>
    </footer>
    @endsection
{{-- </body>

</html> --}}
