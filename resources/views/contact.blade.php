<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - TheGreatHouse</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">
    <!-- Header Section -->
    <header class="bg-[url('/pic/bgcontact.jpg')] text-white relative overflow-hidden">
        <!-- Background Pattern -->


        <div class="relative z-10">
            <!-- Navigation -->
            <nav class="container mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold ml-6 mt-2">TheGreatHouse</h1>
                    <ul class="flex space-x-8 text-sm">
                        <li><a href="#" class="hover:text-blue-300 underline">maintenance</a></li>
                        <li><a href="profile" class="hover:text-blue-300 underline">Me</a></li>
                        <li><a href="mainuser" class="hover:text-blue-300 underline">Home</a></li>
                        <li><a href="#" class="hover:text-blue-300 underline">about</a></li>
                        <li><a href="payment" class="hover:text-blue-300 underline">payment</a></li>
                    </ul>
                </div>
            </nav>

            <!--Page name-->
            <div class="text-center py-20  ">
                <h2 class="text-5xl font-bold mb-8 pt-17 ">Contact Us</h2>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-16">
        <div class="text-center mb-16">
            <p class="text-xl text-gray-700 max-w-2xl mx-auto leading-relaxed">
                We're here to help, just get in touch anytime you need support...
            </p>
        </div>

        <div class="max-w-2xl mx-auto text-gray-700 space-y-4">
            <p class="text-lg">Let us know if you have any questions or concerns.</p>
            <p class="text-lg ">Contact us anytime:</p>

            <div class="space-y-2">
                <p class="text-lg">
                    Our Face book Page:
                    <a href="https://www.facebook.com/computing.kku" target="_blank" class="text-blue-600 hover:underline">www.facebook.com</a>
                </p>
                <p class="text-lg">
                    Our Email:
                    <a href="mailto:suphawat.sa@kkumail.com" class="text-blue-600 hover:underline">thegreathouse@gmail.com</a>
                </p>
            </div>
        </div>
        <!-- Contact Form -->
        <div class="max-w-lg mx-auto pt-12 transition duration-200 transform hover:scale-105 mt-16">
            <div class="bg-white rounded-lg shadow-lg p-5 border border-gray-200">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Send us a message</h3>


                <form action="{{ route('contact.send') }}" method="POST" class="space-y-3">
                    @csrf
                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea id="message" name="message" rows="3" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-vertical"
                            placeholder="Please write your message here..."></textarea>
                    </div>

                    <!-- Button -->
                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-2 rounded-lg transition duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            Send Message
                        </button>
                    </div>
                </form>

            </div>
        </div>


    </main>

    <!-- Footer -->
    <footer class="bg-[url('https://accessnsite.com/wp-content/uploads/2020/05/page-heading-background-contact-us.jpg')] text-white py-8 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <nav class="text-center">
                <ul class="flex justify-center space-x-8 text-sm">
                    <li><a href="#" class="hover:text-blue-300 underline">maintenance</a></li>
                    <li><a href="#" class="hover:text-blue-300 underline">Me</a></li>
                    <li><a href="#" class="hover:text-blue-300 underline">Home</a></li>
                    <li><a href="#" class="hover:text-blue-300 underline">about</a></li>
                    <li><a href="#" class="hover:text-blue-300 underline">payment</a></li>
                </ul>
            </nav>
        </div>
    </footer>


    @if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ!',
            text: "คำขอแจ้งซ่อมของคุณถูกส่งเรียบร้อยแล้ว 😊 ทีมงานจะดำเนินการให้เร็วที่สุด",
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'ตกลง'
        })
    </script>
    @endif

</body>

</html>