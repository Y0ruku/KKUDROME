<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheGreatHouse - My Profile</title>
    <!-- Tailwind CSS CDN (for quick setup, replace with your build if using PostCSS) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN for icons (User, Edit, Globe, Facebook) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom styles for the background image and overlay */
        .bg-house {
            background-image: url('https://i.imgur.com/gK2g0M5.jpeg'); /* Replace with your actual image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        .bg-house::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to right, rgba(0,0,0,0.4) 50%, transparent 50%);
            /* Using a gradient to darken the left half - adjust as needed */
            /* If you want uniform darkening, use background-color: rgba(0,0,0,0.4); */
        }
    </style>
</head>
<body class="font-sans min-h-screen flex flex-col bg-gray-100">

    <!-- Header -->
    <header class="bg-blue-400 text-white p-4 flex justify-between items-center fixed w-full z-10">
        <div class="text-2xl font-bold">TheGreatHouse</div>
        <nav>
            <ul class="flex space-x-6 text-lg">
                <li><a href="#" class="hover:underline">maintenance</a></li>
                <li><a href="#" class="hover:underline">Me</a></li>
                <li><a href="#" class="hover:underline">Home</a></li>
                <li><a href="#" class="hover:underline">about</a></li>
                <li><a href="#" class="hover:underline">payment</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow bg-house flex items-center justify-center p-4 relative z-0 mt-16"> <!-- mt-16 to clear fixed header -->
        <div class="relative w-full max-w-5xl bg-white bg-opacity-90 rounded-lg shadow-xl flex overflow-hidden">
            <!-- Left Panel (Darker section) -->
            <div class="w-1/2 bg-gray-100 p-8 flex flex-col items-center justify-center text-center">
                <div class="bg-white rounded-full w-40 h-40 flex items-center justify-center mb-6 shadow-md">
                    <i class="fas fa-user text-gray-800 text-7xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">ห้อง 607</h2>
                <p class="text-xl text-gray-700 pb-2 border-b-2 border-blue-600 mb-6 font-semibold">นายวงศธร ประตูชัย</p>
                <p class="text-lg text-gray-600">หมดสัญญา : <span class="font-semibold text-gray-800">08/05/2526</span></p>
            </div>

            <!-- Right Panel (Profile details) -->
            <div class="w-1/2 p-8 flex flex-col justify-between">
                <div>
                    <h1 class="text-5xl font-bold text-gray-800 mb-4">Hello</h1>
                    <h2 class="text-3xl font-bold text-blue-700 mb-8">Room 607</h2>

                    <div class="mb-4">
                        <p class="text-gray-600">ชื่อ : <span class="text-gray-800 font-semibold">นายวงศธร</span></p>
                    </div>
                    <div class="mb-6">
                        <p class="text-gray-600">สกุล : <span class="text-gray-800 font-semibold">ประตูชัย</span></p>
                    </div>

                    <div class="mb-4 flex items-center">
                        <p class="text-gray-600">Email : <span class="text-gray-800 font-semibold">wongsathorn@gmail.com</span></p>
                        <button class="ml-3 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-edit text-lg"></i>
                        </button>
                    </div>
                    <div class="mb-8 flex items-center">
                        <p class="text-gray-600">Phone Number : <span class="text-gray-800 font-semibold">0666666666</span></p>
                        <button class="ml-3 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-edit text-lg"></i>
                        </button>
                    </div>
                </div>

                <div class="flex justify-between items-center mt-auto">
                    <button class="bg-indigo-700 hover:bg-indigo-800 text-white font-bold py-3 px-8 rounded-lg shadow-md transition duration-300">
                        บันทึก
                    </button>
                    <a href="#" class="text-gray-600 hover:text-gray-800 font-semibold text-lg">Log out</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4 flex justify-between items-center text-sm">
        <div class="flex items-center space-x-2">
            <i class="fas fa-envelope"></i>
            <span>Email : thegreathouse@gmail.com</span>
        </div>
        <div class="flex space-x-6">
            <a href="#" class="flex items-center space-x-2 hover:underline">
                <i class="fas fa-globe"></i>
                <span>thegreathouse</span>
            </a>
            <a href="#" class="flex items-center space-x-2 hover:underline">
                <i class="fab fa-facebook"></i>
                <span>thegreathouse</span>
            </a>
        </div>
    </footer>

</body>
</html>