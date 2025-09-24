<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheGreatHouse - Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <!-- Header -->
    <header class="absolute top-0 w-full z-20 flex justify-between items-center p-6">
        <div class="text-white text-4xl font-bold">
            TheGreatHouse
        </div>
        <nav class="flex space-x-4 underline">
            <a href="/contact" class="text-gray-700 hover:text-gray-900 v> px-3 py-1 rounded text-sm">maintenance</a>
            <a href="#" class="text-gray-700 hover:text-gray-900 v> px-3 py-1 rounded text-sm">Me</a>
            <a href="/mainuser" class="text-gray-700 hover:text-gray-900 v> px-3 py-1 rounded text-sm">Home</a>
            <a href="/contact" class="text-gray-700 hover:text-gray-900 v> px-3 py-1 rounded text-sm">about</a>
            <a href="/payment" class="text-gray-700 hover:text-gray-900 v> px-3 py-1 rounded text-sm">payment</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="flex-1 flex">
        <!-- Left Side - Background Image -->
        <div class="w-1/2 bg-cover bg-center relative bg-[url('/pic/login.jpg')] bg-black/30 bg-blend-overlay">
        </div>

        <!-- Right Side - White Background -->
        <div class="w-1/2 bg-white relative">
        </div>

        <!-- Center Profile Card -->
        <div class="absolute inset-0 flex items-center justify-center z-10 ">
            <div class="bg-white bg-opacity-95 rounded-3xl shadow-lg overflow-hidden max-w-4xl w-full mx-4 h-[500px] border-2 border-black">
                <div class="flex h-full">
                    <!-- Left Side - Profile Section -->
                    <div class="bg-gray-200 p-8 flex flex-col items-center justify-center w-1/2  h-full">
                        <!-- Profile Avatar -->
                        <div class="w-40 h-40 bg-white rounded-full flex items-center justify-center mb-6 shadow-lg">
                            <div class="w-32 h-32 bg-black rounded-full flex items-center justify-center">
                                <svg class="w-24 h-24 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Room Info -->
                        <div class="text-center">
                            <div class="text-2xl font-semibold text-gray-800 mb-1">ห้อง 607</div>
                            <div class="text-lg text-gray-600 mb-6">นายวงศกร ประยุทย์</div>
                            <div class="text-lg text-gray-600">
                                หมดสัญญา : 08/05/2526
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Details Section -->
                    <div class="p-8 w-1/2 flex flex-col justify-between h-full">
                        <div class="flex-1">
                            <h2 class="text-4xl font-bold text-gray-800 mb-2">Hello</h2>
                            <h3 class="text-2xl text-gray-700 mb-6">Room 607</h3>

                            <div class="space-y-4 mb-8">
                                <div class="flex items-center text-lg text-gray-600">
                                    <span class="font-medium">ชื่อ :</span>
                                    <span class="ml-2">นายวงศกร</span>
                                </div>

                                <div class="flex items-center text-lg text-gray-600">
                                    <span class="font-medium">สกุล :</span>
                                    <span class="ml-2">ประยุทย์</span>
                                </div>

                                <div class="flex items-center text-lg text-gray-600">
                                    <span class="font-medium">Email :</span>
                                    <span class="ml-2 text-blue-600">wongsathorn@gmail.com</span>
                                    <svg class="w-4 h-4 ml-2 text-gray-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </div>

                                <div class="flex items-center text-lg text-gray-600">
                                    <span class="font-medium">Phone Number :</span>
                                    <span class="ml-2">0666666666</span>
                                    <svg class="w-4 h-4 ml-2 text-gray-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-between items-center">
                            <button class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition duration-200">
                                บันทึก
                            </button>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button class="text-gray-600 hover:text-gray-800 transition duration-200 underline">
                                    Log out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4">
        <div class="flex justify-between items-center">
            <div class="text-sm">
                Email: thegreathouse@gmail.com
            </div>
            <div class="flex items-center space-x-6">
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center mr-2">
                        <span class="text-xs text-gray-800 font-bold">©</span>
                    </div>
                    <span class="text-sm">thegreathouse</span>
                </div>
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-blue-600 rounded flex items-center justify-center mr-2">
                        <span class="text-xs text-white font-bold">f</span>
                    </div>
                    <span class="text-sm">thegreathouse</span>
                </div>
            </div>
        </div>
    </footer>
</body>
