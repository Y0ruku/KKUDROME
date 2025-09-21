<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tenant Dashboard</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen">
  <!-- Navigation Bar -->
  <nav class="bg-green-600 text-white p-4">
    <div class="flex justify-between items-center">
      <h2 class="text-xl font-bold">ระบบผู้เช่า</h2>
      <div class="flex items-center space-x-4">
        <span>สวัสดี: <b>{{ auth()->user()->username }}</b></span>
        <form method="POST" action="{{ route('logout') }}" class="inline">
          @csrf
          <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded">
            ออกจากระบบ
          </button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="flex items-center justify-center min-h-screen">
    <div class="p-10 bg-white shadow-xl rounded-xl text-center max-w-md">
      <h1 class="text-3xl font-bold text-green-600 mb-4">Tenant Dashboard</h1>
      <p class="text-gray-700 mb-6">สวัสดีคุณคือ <b>ผู้เช่า</b> 🏠</p>
      
      <!-- Tenant Menu -->
      <div class="grid grid-cols-1 gap-4 mt-8">
        <button class="bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-lg">
          ข้อมูลห้องพัก
        </button>
        <button class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-lg">
          ชำระเงิน
        </button>
        <button class="bg-purple-500 hover:bg-purple-600 text-white py-3 px-6 rounded-lg">
          แจ้งปัญหา
        </button>
      </div>
    </div>
  </div>
  
</body>
</html>