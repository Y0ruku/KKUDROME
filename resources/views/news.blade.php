<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheGreatHouse</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Header with background image -->
    <header class="relative bg-cover bg-center h-48" style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        
        <!-- Navigation -->
        <nav class="relative z-10 flex items-center justify-between p-6">
            <div class="text-white text-xl font-bold">TheGreatHouse</div>
            <div class="flex space-x-6 text-white">
                <a href="#" class="hover:text-gray-300">maintenance</a>
                <a href="#" class="hover:text-gray-300">Me</a>
                <a href="#" class="hover:text-gray-300">Home</a>
                <a href="#" class="hover:text-gray-300">about</a>
                <a href="#" class="hover:text-gray-300">payment</a>
            </div>
        </nav>
        
        <!-- Hero Title -->
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1 class="text-white text-4xl font-bold -mt-16">Today's news</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex justify-center items-start py-12">
        <div class="bg-white rounded-lg shadow-lg p-8 w-80">
            <h2 class="text-xl font-bold text-center text-gray-800 mb-8">ประกาศ</h2>
            
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    <span class="text-gray-700">เตือนนิฟรีคำน้ำ</span>
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    <span class="text-gray-700">เตือนหน้าฟรีคำไฟ</span>
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    <span class="text-gray-700">ช่างสันติกนิข่าวฟรี</span>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="fixed bottom-6 right-6 flex items-center space-x-4">
        <div class="flex items-center space-x-2 text-sm text-gray-600">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
            </svg>
            <span>thegreathouse@gmail.com</span>
        </div>
        
        <div class="flex items-center space-x-2 text-sm text-gray-600">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
            </svg>
            <span>TheGreatHouse</span>
        </div>
    </footer>
</body>
</html>