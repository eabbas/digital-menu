<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>ورود</title>
    <style>
        .kt-card{
            border-radius: 12px;
            border: 1px solid white;
            box-shadow: 0 1px  2px 0 #0000000d;
        }
        .kt-btn{
            height: calc(.25rem * 8.5);
            gap: calc(.25rem * 1.5);
            border-radius: calc(.5rem - 2px);
            padding-inline: calc(.25rem * 3);
            font-size: .8125rem;
            line-height: calc(1.25/.875);
        }
        .kt-btn-outline{
            border: 1px solid #e7e3e4;
            color: #1b1718;
            box-shadow: 0 0 #0000;
        }
        .kt-btn-outline:hover{
            background-color: #f5f4f4;
            color: #1b1718;
        }
        .kt-form-label{
            align-items: center;
            gap: calc(.25rem * 2);
            width: 100%;
            font-size: .875rem;
            line-height: 1;
            font-weight: 500;
            display: flex;
        }
        .kt-input{
            width: 100%;
            height: calc(.25rem * 8.5);
            border-radius: calc(.5rem - 2px);
            padding-inline: calc(.25rem * 3);
            font-size: .8125rem;
            line-height: calc(1.25/.875);
            outline: none;
            border: 1px solid #e7e3e4;
            color: #0b0809;
            box-shadow: 0 0 #0000;
            transition: all .15s;
        }
        .kt-input:focus-visible{
            border: 1px solid #9f9fa9;
            box-shadow: 0px 0px 3px 2px #b2b2ca;
        }
        .kt-input:not(input) {
            align-items: center;
            gap: calc(.25rem * 1.5);
            display: flex;
        }
        .kt-input:not(input) input{
            border-style: solid;
            width: 100%;
            height: auto;
            padding: calc(.25rem * 0);
            color: #0b0809;
            box-shadow: 0 0 #0000, 0 0 #0000, 0 0 #0000, 0 0 #0000, 0 0 #0000;
            transition: all .15s;
            background-color: #0000;
            border-width: 0;
            outline-style: none;
            display: flex;
        }
    </style>
</head>
<body>
    <main class="w-full h-svh bg-[url('https://keenthemes.com/static/metronic/tailwind/dist/assets/media/images/2600x1200/bg-10.png')] bg-cover bg-no-repeat flex flex-row justify-center items-center">
        <div class="kt-card max-w-[370px] w-full">
            <form action="{{url('user/check')}}" method="post" class="flex flex-col gap-5 p-10 bg-white">
                @csrf
                <div class="text-center mb-2.5">
                    <h3 class="text-lg font-medium text-mono leading-none mb-2.5">
                        ورود
                    </h3>
                    <div class="flex items-center justify-center">
                        <span class="text-sm text-secondary-foreground me-1.5">
                            اکانت ندارید؟
                        </span>
                        <a href="{{route('user_signUp')}}" class="text-sm">ثبت نام</a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2.5">
                    <a href="#" class="kt-btn kt-btn-outline flex items-center justify-center">
                        <img src="https://keenthemes.com/static/metronic/tailwind/dist/assets/media/brand-logos/google.svg" class="size-3.5 shrink-0" alt="google logo">
                        استفاده از گوگل
                    </a>
                    <a href="#" class="kt-btn kt-btn-outline flex items-center justify-center">
                        <img src="https://keenthemes.com/static/metronic/tailwind/dist/assets/media/brand-logos/apple-black.svg" class="size-3.5 shrink-0" alt="google logo">
                        استفاده از اپل
                    </a>
                </div>
                <div class="flex items-center gap-2">
                    <span class="border-t border-[#eeeaeb] w-full"></span>
                    <span class="text-xs text-[#1b1718] uppercase">یا</span>
                    <span class="border-t border-[#eeeaeb] w-full"></span>
                </div>
              
                <div class="flex flex-col gap-1">
                    <label for="email" class="kt-form-label text-[#0b0809]">ایمیل</label>
                    <input type="email" name="email" id="email" class="kt-input" placeholder="test@example.com">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password" class="kt-form-label text-[#0b0809]">گذرواژه</label>
                    <div class="kt-input">
                        <input type="password" name="password" id="password" class="outline-none">
                    </div>
                </div>
                <div class="flex flex-row justify-start items-center">
                    <span for="accept" class="text-sm text-[#0b0809] mr-2 flex flex-row justify-start items-center">
                        گذرواژه خود را
                        <a href="#" class="text-blue-500 mr-1"> فراموش کردم </a>
                    </span>
                </div>
                <button class="py-1.5 rounded-md text-white text-sm font-bold bg-[#2b7fff] cursor-pointer hover:bg-[#2b7fff]/90"> ورود</button>
            </form>
        </div>
    </main>
</body>
</html>