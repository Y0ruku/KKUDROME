<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- ให้รองรับการแสดงผลทุกขนาดหน้าจอ -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- ป้องกัน IE mode เก่า -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="theme-color" content="#1e3a8a">

  <title>The Great House</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

  <!-- Navbar -->
  <header class="bg-indigo-900 text-white flex justify-between items-center px-8 py-6 shadow-lg rounded-b-2xl">
    <h1 class="text-lg font-semibold">The Great House</h1>
    <div class="flex items-center gap-6">
      <nav class="space-x-4 hidden sm:block">
        <a href="/admin/profile" class="hover:underline">Me</a>
        <a href="/admin/announcements" class="hover:underline">Home</a>
      </nav>
      <a href="/admin/profile">
        <div class="bg-white p-2 rounded-full">
          <img src="https://images.rawpixel.com/image_png_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjkzNy1hZXctMTM5LnBuZw.png"
            alt="User" class="w-6 h-6 rounded-full object-cover">
        </div>
      </a>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow">

    <!-- Welcome -->
    <section class="text-center mt-12">
      <h2 class="text-5xl font-bold text-gray-900">Welcome</h2>
      <p class="text-2xl font-semibold text-gray-700 mt-2">To The Great House.</p>
    </section>

    <!-- Main Card -->
    <section class="max-w-7xl mx-auto mt-10 bg-white shadow-lg rounded-3xl overflow-hidden">
      <div class="relative">
        <img src="https://watermark.lovepik.com/photo/20211130/large/lovepik-hotel-design-picture_501259817.jpg"
          alt="house" class="w-full h-64 object-cover">
        <div class="absolute inset-0 bg-black/60 flex flex-col justify-center items-center text-white">
          <h3 class="text-2xl">Good Life In The Great House</h3>
          <p class="text-4xl font-bold hover:shadow-lg transform transition duration-200 hover:scale-105">Admin</p>
        </div>
      </div>

      <div class="max-w-7xl mx-auto mt-10 px-6 pb-10">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

          <!-- Card 1: Account user -->
          <a href="/admin/accountuser" aria-label="Account user"
            class="block bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transform transition duration-200 hover:-translate-y-1 p-8 flex items-center justify-center text-center group">
            <span class="text-xl sm:text-2xl font-semibold text-gray-800 group-hover:text-indigo-700">
              Account user
            </span>
          </a>

          <!-- Card 2: Edit announcement -->
          <a href="/admin/announcements" aria-label="Edit announcement"
            class="block bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transform transition duration-200 hover:-translate-y-1 p-8 flex items-center justify-center text-center group">
            <span class="text-xl sm:text-2xl font-semibold text-gray-800 group-hover:text-indigo-700">
              Edit announcement
            </span>
          </a>

          <!-- Card 3: Payment status -->
          <a href="/admin/paymentstatus" aria-label="Payment status"
            class="block bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transform transition duration-200 hover:-translate-y-1 p-8 flex items-center justify-center text-center group">
            <span class="text-xl sm:text-2xl font-semibold text-gray-800 group-hover:text-indigo-700">
              Payment status
            </span>
          </a>

        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-300 py-6 text-center">
    <p>Email: thegreathouse@gmail.com</p>
    <div class="flex justify-center gap-6 mt-2">
      <a href="#" class="hover:text-white">thegreathouse.com</a>
      <a href="#" class="hover:text-white">facebook.com/thegreathouse</a>
    </div>
    <p class="text-sm mt-2">www.thegreathousethegoodlifestyle.com</p>
  </footer>

</body>
</html>
