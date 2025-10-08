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
            <a href="/contact" class="text-gray-700 hover:text-gray-900 px-3 py-1 rounded text-sm">maintenance</a>
            <a href="#" class="text-gray-700 hover:text-gray-900 px-3 py-1 rounded text-sm">Me</a>
            <a href="/mainuser" class="text-gray-700 hover:text-gray-900 px-3 py-1 rounded text-sm">Home</a>
            <a href="/contact" class="text-gray-700 hover:text-gray-900 px-3 py-1 rounded text-sm">about</a>
            <a href="/payment" class="text-gray-700 hover:text-gray-900 px-3 py-1 rounded text-sm">payment</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="flex-1 flex">
        <!-- Left Side - Background Image -->
        <div class="w-1/2 relative bg-[url('/pic/login.jpg')] bg-cover bg-center bg-black/30  bg-blend-overlay"></div>

        <!-- Right Side - White Background -->
        <div class="w-1/2 bg-white relative"></div>

        <!-- Center Profile Card -->
        <div class="absolute inset-0 flex items-center justify-center z-10 ">
            <div class="bg-white bg-opacity-95 rounded-3xl shadow-lg overflow-hidden max-w-4xl w-full mx-4 h-[500px] border border-black">

                <div class="flex h-full">
                    <!-- Left Side - Profile Section -->
                    <div class="bg-gray-200 p-8 flex flex-col items-center justify-center w-1/2 h-full relative">
                        <a href="/mainuser" class="absolute top-4 left-4 hover:opacity-70 transition duration-200">
                            <img src="/pic/closeicon.jpg" alt="Close" class="w-6 h-6">
                        </a>
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
                            <div class="text-2xl font-semibold text-gray-800 mb-1">
                                ห้อง {{ Auth::user()->contracts->first()->room->roon_number ?? '' }}
                            </div>
                            <div class="text-lg text-gray-600 mb-6">
                                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                            </div>
                            <div class="text-lg text-gray-600">
                                เบอร์โทรศัพท์ : {{ Auth::user()->tel }}
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Details Section -->
                    <div class="p-8 w-1/2 flex flex-col justify-between h-full">
                        <form id="profileForm" method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            <div class="flex-1">
                                <h2 class="text-6xl font-bold text-gray-800 mb-2">Hello</h2>
                                <h3 class="text-4xl text-gray-700 mb-6">
                                    Room {{ Auth::user()->contracts->first()->room->roon_number ?? '' }}
                                </h3>

                                <div class="space-y-4 mb-8">
                                    <div class="flex items-center text-lg text-gray-600">
                                        <span class="font-medium">ชื่อ :</span>
                                        <span class="ml-2">{{ Auth::user()->firstname }}</span>
                                    </div>

                                    <div class="flex items-center text-lg text-gray-600">
                                        <span class="font-medium">สกุล :</span>
                                        <span class="ml-2">{{ Auth::user()->lastname }}</span>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="flex items-center text-lg text-gray-600">
                                        <span class="font-medium">Email :</span>
                                        <span id="email_display" class="ml-2 text-blue-600">{{ Auth::user()->email }}</span>
                                        <input type="email" id="email_input" name="email" value="{{ Auth::user()->email }}"
                                            class="ml-2 text-blue-600 border border-gray-300 rounded px-2 py-1"
                                            style="display: none;">
                                        <button type="button" id="email_edit" onclick="toggleEdit('email')"
                                            class="ml-2 text-gray-500 hover:text-gray-700">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Phone Number Field -->
                                    <div class="flex items-center text-lg text-gray-600">
                                        <span class="font-medium">เบอร์โทรศัพท์ :</span>
                                        <span id="tel_display" class="ml-2">{{ Auth::user()->tel }}</span>
                                        <input type="text" id="tel_input" name="tel" value="{{ Auth::user()->tel }}"
                                            class="ml-2 border border-gray-300 rounded px-2 py-1"
                                            style="display: none;">
                                        <button type="button" id="tel_edit" onclick="toggleEdit('tel')"
                                            class="ml-2 text-gray-500 hover:text-gray-700">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex justify-between items-center">
                                <button type="button" id="saveBtn" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition duration-200">
                                    บันทึก
                                </button>
                            </div>
                        </form>

                        <!-- ย้าย logout form ออกมาข้างนอก -->
                        <div class="px-8 pb-8">
                            <form method="POST" action="{{ route('logout') }}" class="inline float-right">
                                @csrf
                                <button type="submit" class="text-gray-600 hover:text-gray-800 transition duration-200 underline">
                                    Log out
                                </button>
                            </form>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[url('/pic/footer1.jpg')] bg-cover bg-[center_40%] bg-black/70 bg-blend-overlay text-white p-4">
        <div class="flex justify-between items-center ">
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

    <script>
        function toggleEdit(field) {
            const displayElement = document.getElementById(field + '_display');
            const inputElement = document.getElementById(field + '_input');
            const editIcon = document.getElementById(field + '_edit');

            if (inputElement.style.display === 'none' || inputElement.style.display === '') {
                // แสดง input, ซ่อน display
                displayElement.style.display = 'none';
                inputElement.style.display = 'block';
                inputElement.focus();
                editIcon.innerHTML = '✓'; // เปลี่ยนเป็นเครื่องหมายถูก
            }
        }

        // ฟังก์ชันบันทึกข้อมูล
        document.getElementById('saveBtn').addEventListener('click', function() {
            document.getElementById('profileForm').submit();
        });
    </script>
</body>

</html>