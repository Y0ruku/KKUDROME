<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="flex bg-white rounded-xl shadow-lg overflow-hidden w-[800px]">
      <!-- Left Form -->
      <div class="w-1/2 p-10 flex flex-col justify-center">
          <h2 class="text-2xl font-bold text-center mb-6">Welcome</h2>

          @if ($errors->any())
              <div class="mb-4 text-red-600">
                  {{ $errors->first() }}
              </div>
          @endif

          <form action="{{ url('/login') }}" method="POST" class="space-y-4">
              @csrf
              <div>
                  <label for="username" class="block text-sm font-medium">Username / Room ID</label>
                  <input type="text" name="username" id="username"
                      class="w-full mt-1 px-3 py-2 border rounded-lg shadow-sm focus:ring focus:ring-indigo-200">
              </div>
              <div>
                  <label for="password" class="block text-sm font-medium">Password</label>
                  <input type="password" name="password" id="password"
                      class="w-full mt-1 px-3 py-2 border rounded-lg shadow-sm focus:ring focus:ring-indigo-200">
              </div>
              <button type="submit"
                  class="w-full bg-indigo-600 text-white py-2 rounded-lg shadow hover:bg-indigo-700 transition">
                  Log in
              </button>
          </form>
      </div>

      <!-- Right Image -->
      <div class="w-1/2">
          <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c"
               alt="House" class="h-full w-full object-cover">
      </div>
  </div>

</body>
</html>
