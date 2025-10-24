<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام رستوران - دیجیتال منو</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <form action="{{url('/profileStore')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <!-- <input type="hidden" name="id" value=""> -->
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
            <!-- هدر -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">   تکمیل اطلاعات رستوران</h1>
                <p class="text-gray-600 mt-2">اطلاعات رستوران خود را وارد کنید</p>
            </div>

           
                <!--  لوگو   -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"> لوگو رستوران</label>
                    <input 
                        type="file" 
                        name='logo'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder=" لوگو رستوران خود را وارد کنید"
                    >
                </div>
                <!-- نام رستوران -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">نام رستوران</label>
                    <input 
                        type="text"
                        name='name' 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="نام رستوران خود را وارد کنید"
                    >
                </div>
                <!--استان   -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">استان</label>
                    <input 
                        type="text"
                        name='province' 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="   استان خود را وارد کنید"
                    >
                </div>
                <!--    شهر -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"> شهر</label>
                    <input 
                        type="text" 
                        name='city'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder=" شهرخود را وارد کنید"
                    >
                </div>
                <!--  ادرس رستوران -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"> ادرس رستوران</label>
                    <input 
                        type="text" 
                        name='address'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder=" ادرس رستوران خود را وارد کنید"
                    >
                </div>

                <!--  qrcode -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"> qrCode</label>
                    <input 
                        type="file" 
                        name='qrCode'
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="09xxxxxxxxx"
                    >
                </div>
               
                <!-- ایمیل -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">ایمیل</label>
                    <input 
                        type="email"
                        name='email' 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="email@example.com"
                    >
                </div>

               <div class="">
                      <label class="block text-sm font-medium text-gray-700 mb-2">شبکه های اجتماعی</label>
                <ul class="w-full px-4 py-3 border border-gray-300 rounded-lg mt-2">
                    <li>
                    <label class="block text-sm font-medium text-gray-700 mb-2"> اینستاگرام:</label>
                         <input 
                        type="text"
                        name='social_medias[instagram]' 
                        class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-2"
                     placeholder="آدرس شبکه های اجتماعی"></li>
                    <li>
                  <label class="block text-sm font-medium text-gray-700 mb-2">  تلگرام:</label>
                 
                         <input 
                        type="text"
                        name='social_medias[telegram]' 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-2"
                     placeholder="آدرس شبکه های اجتماعی"></li>
                    <li>
               <label class="block text-sm font-medium text-gray-700 mb-2">  واتساپ:</label>
                         <input 
                        type="text"
                        name='social_medias[whatsapp]' 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-2"
                     placeholder="آدرس شبکه های اجتماعی"></li>
                </ul>
                
               </div>
               <button 
                 type="submit" 
                 class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-medium" >
                     ارسال اطلاعات
                 </button>    
              </div>
            </div>
    </form>
</body>
</html>