<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

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
  <section class="text-center mt-8">
    <h2 class="text-3xl font-bold">Welcome</h2>
    <p class="text-xl font-semibold text-gray-700">To The Great House.</p>
  </section>

  <!-- Main Card -->
  <section class="max-w-4xl mx-auto mt-8 bg-white shadow-lg rounded-3xl overflow-hidden ">
    <div class="relative">
      <img src="https://watermark.lovepik.com/photo/20211130/large/lovepik-hotel-design-picture_501259817.jpg"
        alt="house" class="w-full h-64 object-cover">
      <div class="absolute inset-0 bg-black/70  bg-opacity-50 flex flex-col justify-center items-center text-white">
        <h3 class="text-lg">Good Life In The Great House</h3>
        <p class="text-2xl font-bold">Room No : 607</p>
      </div>
    </div>

    <!-- Buttons -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-6">
      <div class="bg-white shadow-md rounded-lg text-center p-4 hover:shadow-lg transform transition duration-200 hover:scale-105">
        <p class="font-semibold mb-4">Announcement</p>
        <a href="/news" class="mt-2 bg-indigo-800 text-white px-4 py-2 rounded-lg font-bold ">NEWS</a>
      </div>

      <div class="bg-white shadow-md rounded-lg text-center p-4 hover:shadow-lg transform transition duration-200 hover:scale-105">
        <a href="/payment" class="">Payment</a>
        <img src="https://cdn-icons-png.flaticon.com/512/2331/2331947.png"
          class="w-12 h-12 mx-auto mt-2" alt="payment icon">
      </div>

      <div class="bg-white shadow-md rounded-lg text-center p-4 hover:shadow-lg transform transition duration-200 hover:scale-105">
        <a href="/contact"><p class="font-semibold">แจ้งซ่อมบำรุง</p></a>
        <img src="https://cdn-icons-png.flaticon.com/512/3068/3068847.png"
          class="w-12 h-12 mx-auto mt-2" alt="repair icon">
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-300 mt-8 py-6 text-center">
    <p>Email: thegreathouse@gmail.com</p>
    <div class="flex justify-center gap-6 mt-2">
      <a href="#" class="hover:text-white">thegreathouse.com</a>
      <a href="#" class="hover:text-white">facebook.com/thegreathouse</a>
    </div>
    <p class="text-sm mt-2">www.thegreathousethegoodlifestyle.com</p>
  </footer>

</body>

</html>