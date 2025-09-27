<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Welcome"</title>
    @vite('resources/css/app.css')
</head>
<body class="relative bg-gray-100 min-h-screen flex items-center justify-center overflow-hidden">

    <!-- พื้นหลังรูปภาพ + เบลอ -->
    <div class="absolute inset-0 -z-10">
        <img src="{{ asset('pic/bglogin2.jpg') }}" 
             alt="Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-white/80 "></div>
    </div>

    <!-- กล่องหลัก -->
   <div class="bg-white rounded-2xl w-full max-w-4xl flex overflow-hidden" style="box-shadow: 4px 4px 10px rgba(0,0,0,0.5);">
        <!-- ฝั่งซ้าย: ฟอร์ม -->
        <div class="w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-8">Welcome</h2>
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="/login" class="space-y-6">
                @csrf
                <!-- Username -->
                <div class="">
                    <label for="username" class="block text-gray-700 text-base font-semibold mb-2">
                        Username
                    </label>
                    <div class="relative">
                        <input type="text" 
                               id="username" 
                               name="username" 
                               class="w-full  pl-10 pr-4 py-2.5 text-base border  border-gray-300 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               value="{{ old('username') }}" 
                               required>
                    </div>
                </div>

                <!-- Password -->
                <div class= shadow-lg>
                    <label for="password" class="block text-gray-700 text-base font-semibold mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="w-full pl-10 pr-4 py-2.5 text-base border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               required>
                    </div>
                </div>


                <!-- tel -->
                <div class= shadow-lg>
                    <label for="tel" class="block text-gray-700 text-base font-semibold mb-2">
                        Tel.
                    </label>
                    <div class="relative">
                        <input type="tel" 
                               id="tel" 
                               name="tel" 
                               class="w-full pl-10 pr-4 py-2.5 text-base border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               required>
                    </div>
                </div>

                <!-- ปุ่ม -->
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold py-2.5 px-6 rounded-lg text-base shadow-md transition duration-300">
                    Login
                </button>
            </form>
        </div>

        <!-- ฝั่งขวา: แสดงรูปภาพ -->
        <div class="w-1/2">
            <img src="{{ asset('pic/login.jpg') }}" alt="Login Image" class="h-full w-full object-cover">
        </div>
    </div>
</body>
</html>
