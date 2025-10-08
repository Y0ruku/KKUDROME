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

  <!-- เนื้อหาหลัก -->
  <div class="flex-1">
    <!-- Navbar -->
    <header class="bg-indigo-900 text-white flex justify-between items-center px-8 py-6 shadow-lg rounded-b-2xl">
      <h1 class="text-lg font-semibold">The Great House</h1>
      <div class="flex items-center gap-6">
        <nav class="space-x-4 hidden sm:block ">
          <a href="/profile" class="hover:underline">Me</a>
          <a href="#" class="hover:underline">Home</a>
          <a href="/contact" class="hover:underline">About</a>
        </nav>
        <a href="/profile">
        <div class="bg-white p-2 rounded-full">
          <img src="https://images.rawpixel.com/image_png_800/
          czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvb
          HIvdjkzNy1hZXctMTM5LnBuZw.png" alt="User" class="w-6 h-6 rounded-full object-cover">
        </div>
        </a>
      </div>
    </header>

    <!-- Welcome -->
    <section class="ml-32 mt-8">
      <h2 class="text-5xl font-bold">Welcome</h2>
      <p class="text-3xl font-semibold text-gray-700">To The Great House...</p>
    </section>

    <!-- Main Card -->
    <section class="max-w-7xl mx-auto mt-8 bg-white shadow-lg rounded-3xl overflow-hidden ">
      <div class="relative">
        <img src="https://watermark.lovepik.com/photo/20211130/large/lovepik-hotel-design-picture_501259817.jpg"
          alt="house" class="w-full h-64 object-cover">
        <div class="absolute inset-0 bg-black/60  bg-opacity-50 flex flex-col justify-center items-center text-white ">
          <h3 class="text-2xl ">Good Life In The Great House</h3>
          <p class="text-4xl font-bold hover:shadow-lg transform transition duration-200 hover:scale-105">Room No : {{ Auth::user()->contracts->first()->room->roon_number ?? '' }}
  </p>
        </div>
      </div>

      <!-- Buttons -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-6">
        <div class="bg-white shadow-md rounded-lg text-center p-4 hover:shadow-lg transform transition duration-200 hover:scale-105">
          <p class="font-semibold mb-4">Announcement</p>
          <a href="/news" class="mt-2 bg-indigo-800 text-white px-4 py-2 rounded-lg font-bold ">NEWS</a>
        </div>

        <div class="bg-white shadow-md rounded-lg text-center p-4 hover:shadow-lg transform transition duration-200 hover:scale-105">
          <a href="/payment" class="font-semibold">Payment</a>
          <img src="/pic/payment.jpg"
            class="w-12 h-12 mx-auto mt-2" alt="payment icon">
        </div>

        <div class="bg-white shadow-md rounded-lg text-center p-4 hover:shadow-lg transform transition duration-200 hover:scale-105">
          <a href="/contact"><p class="font-semibold">Mantenance</p></a>
          <img src="/pic/mantenance.jpg"
            class="w-12 h-12 mx-auto mt-2" alt="repair icon">
        </div>
      </div>
    </section>
  </div>

  <!-- Footer ติดล่างเสมอ -->
  <footer class="bg-gray-900 text-gray-300 mt-8 py-6 text-center">
    <p>Email: thegreathouse@gmail.com</p>
    <div class="flex justify-center gap-6 mt-2">
      <a href="mailto:suphawat.sa@kkumail.com" class="hover:text-white">thegreathouse.com</a>
      <a href="https://www.facebook.com/computing.kku" class="hover:text-white">facebook.com/thegreathouse</a>
    </div>
    <p class="text-sm mt-2">www.thegreathousethegoodlifestyle.com</p>
  </footer>

</body>

</html>