<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen">
  <!-- Navigation Bar -->
  <nav class="bg-indigo-600 text-white p-4">
    <div class="flex justify-between items-center">
      <h2 class="text-xl font-bold">Admin Panel</h2>
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
      <h1 class="text-3xl font-bold text-indigo-600 mb-4">Admin Dashboard</h1>
      <p class="text-gray-700 mb-6">สวัสดีคุณคือ <b>Admin</b> 🎉</p>
      
      <!-- Admin Menu -->
      <div class="grid grid-cols-1 gap-4 mt-8">
        <button class="bg-indigo-500 hover:bg-indigo-600 text-white py-3 px-6 rounded-lg">
          ผู้เช่าหอพัก
        </button>
        <button class="bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-lg">
          จัดการห้องพัก
        </button>
        <button class="bg-yellow-500 hover:bg-yellow-600 text-white py-3 px-6 rounded-lg">
          รายงาน
        </button>
      </div>
    </div>
  </div>
</body>
</html>