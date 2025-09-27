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
        <img src="{{ asset('pic/login.jpg') }}" 
             alt="Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    </div>

    <!-- กล่องหลัก -->
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl flex overflow-hidden">
        
        <!-- ฝั่งซ้าย: ฟอร์ม -->
        <div class="w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-8">เข้าสู่ระบบ</h2>
            
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
                <div>
                    <label for="username" class="block text-gray-700 text-base font-semibold mb-2">
                        ชื่อผู้ใช้
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.364 4.56a9 9 0 01-13.243 13.243z" />
                            </svg>
                        </span>
                        <input type="text" 
                               id="username" 
                               name="username" 
                               class="w-full pl-10 pr-4 py-2.5 text-base border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               value="{{ old('username') }}" 
                               required>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-700 text-base font-semibold mb-2">
                        รหัสผ่าน
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.364 4.56a9 9 0 01-13.243 13.243z" />
                            </svg>
                        </span>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="w-full pl-10 pr-4 py-2.5 text-base border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               required>
                    </div>
                </div>


                <!-- tel -->
                <div>
                    <label for="tel" class="block text-gray-700 text-base font-semibold mb-2">
                        เบอร์โทรศัพท์
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.364 4.56a9 9 0 01-13.243 13.243z" />
                            </svg>
                        </span>
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
                    เข้าสู่ระบบ
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
