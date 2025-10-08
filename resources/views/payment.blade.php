<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Station - TheGreatHouse</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class=" bg-white/30 bg-[url('/pic/bgcontact.jpg')] bg-cover bg-center bg-blend-overlay min-h-screen">

  <!-- Header Navigation -->
  <header class="bg-black/60 text-white px-6 py-6">
    <nav class="relative flex items-center">
      <!-- Logo อยู่ซ้าย -->
      <div class="text-white text-lg font-semibold">TheGreatHouse</div>

      <!-- Menu อยู่ตรงกลาง -->
      <div class="absolute left-1/2 transform -translate-x-1/2 flex space-x-6 text-sm">
        <a href="/contact" class="hover:text-gray-300 underline">maintenance</a>
        <a href="/profile" class="hover:text-gray-300 underline">Me</a>
        <a href="/mainuser" class="hover:text-gray-300 underline">Home</a>
        <a href="/contact" class="hover:text-gray-300 underline">about</a>
        <a href="#" class="hover:text-gray-300 underline">payment</a>
      </div>
    </nav>
  </header>

  @php
  // ดึงสัญญาเช่าที่ active ของผู้เช่า
  $contract = Auth::user()->contracts()->where('status', 'active')->first();

  // ดึงบิลทั้งหมดของสัญญานี้ที่ยังไม่ได้จ่าย
  $bills = $contract ? $contract->bills()->where('status', '!=', 'paid')->orderBy('due_date', 'asc')->get() : collect();

  // รวมยอดทั้งหมด
  $totalAmount = $bills->sum('amount');
  @endphp

  <!-- Main Content -->
  <main class="flex justify-center items-center py-8 mx-auto">

    @if($bills->count() > 0)
    <!-- มีบิลค้างชำระ - แสดงหน้า Payment Station ปกติ -->
    <div class="bg-white rounded-2xl shadow-xl p-12 w-full max-w-5xl mx-4 h-[600px]">
      <!-- Back Button -->
      <div class="flex items-center ">
        <button id="cancelButton" class="p-2 hover:bg-gray-100 rounded-full">
          <a href="/mainuser"><svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
          </a>
        </button>
      </div>

      <!-- Title -->
      <h1 class="text-3xl font-bold text-center text-gray-800 mb-14 ">Payment Station</h1>

      <!-- Payment Details -->
      <div class="space-y-12">
        <!-- Left Side - Months -->
        <div class="grid grid-cols-2 gap-8">
          <div class="space-y-4">
            <h3 class="font-semibold text-gray-800 text-xl">ประจำเดือน</h3>
            <div class="space-y-2 text-gray-700 text-lg">
              @foreach($bills as $bill)
              <div>{{ \Carbon\Carbon::parse($bill->due_date)->translatedFormat('d F Y') }}</div>
              @endforeach
            </div>
          </div>

          <!-- Right Side - Amounts -->
          <div class="space-y-4 text-right">
            <h3 class="font-semibold text-gray-800 text-xl">ยอดค้างชำระ</h3>
            <div class="space-y-2 text-gray-700 text-lg">
              @foreach($bills as $bill)
              <div>{{ number_format($bill->amount,2) }} <span>บาท</span></div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-300 my-8 "></div>

        <!-- Total and Pay Button -->
        <div class="flex justify-between items-center text-lg  ">
          <div class="text-lg font-semibold text-gray-800">
            รวม {{ number_format($totalAmount,2) }} บาท
          </div>

          <button id="payButton" class="bg-purple-500 hover:bg-purple-600 text-white px-8 py-2 rounded-lg font-medium transition duration-200">
            ชำระเงิน
          </button>
        </div>
      </div>
    </div>
    @else
    <!-- ไม่มีบิลค้างชำระ - แสดงกล่องข้อความ -->
    <div class="bg-white rounded-2xl shadow-4xl p-12 w-full max-w-4xl mx-4 min-h-[550px] flex flex-col">
      <!-- Back Button -->
      <div class="flex items-center mb-6">
        <button class="p-2 hover:bg-gray-100 rounded-full">
          <a href="/mainuser">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
          </a>
        </button>
      </div>

      <!-- Title -->
      <h1 class="text-3xl font-bold text-center text-gray-800 mb-16">Payment Station</h1>

      <!-- Success Message Container -->
      <div class="flex-1 flex items-center justify-center">
        <div class="text-center">
          <!-- Success img -->
          <div class="mb-8">
            <div class="w-24 h-24 mx-auto bg-green-100 rounded-full flex items-center justify-center">
              <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <img src="/pic/done.jpg" alt="">
              </svg>
            </div>
          </div>

          <!-- Message -->
          <div class="text-2xl text-black-800 font-medium">
            ท่านไม่มียอดค้างชำระ...
          </div>
        </div>
      </div>
    </div>
    @endif
  </main>

  <!-- Payment Modal (แสดงเฉพาะเมื่อมีบิลค้างชำระ) -->
  @if($bills->count() > 0)
  <div id="paymentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl mx-4 h-[650px] relative mt-10">
      <!-- Close Button -->
      <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 z-10">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>

      <!-- Modal Header -->
      <div class="p-6 border-b">
        <h2 class="text-xl font-bold text-gray-800">Payment Station</h2>
      </div>

      <!-- Modal Content -->
      <div class="p-8 flex h-[calc(100%-100px)]">
        <!-- Left Side - QR Code -->
        <div class="flex-1 flex flex-col items-center justify-center pr-12">
          <!-- QR Code Image -->
          <div class="mb-6 b-1">
            <img src="/pic/qrcode.jpg"
              alt="QR Code"
              class="w-65 h-72 object-contain border border-gray-200 border-2 rounded-lg shadow-sm">
          </div>

          <!-- Payment Details -->
          <div class="text-center">
            <div class="text-2xl font-bold text-gray-800 mb-2">
              ห้อง {{ $contract->room->roon_number ?? '-' }}
            </div>
            <div class="text-lg text-gray-600 mb-1">
              ยอดชำระ: <span class="font-semibold text-gray-800">{{ number_format($totalAmount,2) }} บาท</span>
            </div>

            <div class="text-sm text-gray-500">สแกน QR Code เพื่อชำระเงิน</div>
          </div>
        </div>

        <!-- Divider Line -->
        <div class="w-px bg-gray-300 mx-8"></div>

        <!-- Right Side - Upload Slip -->
        <div class="flex-1 flex flex-col">
          <div class="flex-1">
            <h3 class="text-xl font-semibold text-gray-800 mb-8 text-center">กรุณาอัปโหลดสลิปเพื่อยืนยันการชำระเงิน</h3>

            <!-- Upload Area -->
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-12 text-center mb-8 hover:border-gray-400 transition-colors">
              <div class="mb-6">
                <svg class="mx-auto h-16 w-16 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="mb-4">
                <p class="text-lg text-gray-600 mb-2">วางไฟล์ที่นี่ หรือคลิกเพื่อเลือกไฟล์</p>
                <p class="text-sm text-gray-500">รองรับไฟล์ JPG, PNG, PDF (ขนาดไม่เกิน 10MB)</p>
              </div>

              <form action="{{ route('payments.upload') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                @csrf
                <input type="hidden" name="bill_id" value="{{ $bills->first()->id }}"> <!-- สมมุติเลือกบิลแรก -->

                <input type="file" name="slip_image" id="fileUpload" class="hidden" accept="image/*,.pdf">
                <label for="fileUpload" class="bg-blue-500 text-white px-6 py-3 rounded-lg cursor-pointer hover:bg-blue-600 transition duration-200 font-medium mb-4">
                  เลือกไฟล์
                </label>

                <!-- File Preview Area -->
                <div id="filePreview" class="hidden mb-4 w-full max-w-xs mx-auto">
                  <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                    <div class="flex items-center">
                      <svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                      <span id="fileName" class="text-gray-700 font-medium"></span>
                    </div>
                    <button type="button" id="removeFile" class="text-red-500 hover:text-red-700">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                    </button>
                  </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="submitButton" class="bg-green-500 text-white px-8 py-3 rounded-lg hover:bg-green-600 transition duration-200 font-medium disabled:bg-gray-300 disabled:cursor-not-allowed" disabled>
                  ส่งข้อมูล
                </button>
                  <!-- <button id="cancelButton" class="">
                  </button> -->
              </form>
            </div>


            <!-- File Preview Area -->
            <div id="filePreview" class="hidden mb-6">
              <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                <div class="flex items-center">
                  <svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <span id="fileName" class="text-gray-700 font-medium"></span>
                </div>
                <button id="removeFile" class="text-red-500 hover:text-red-700">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <!-- Submit Button -->

        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- JavaScript (แสดงเฉพาะเมื่อมีบิลค้างชำระ) -->
  @if($bills->count() > 0)
  <script>
    const payButton = document.getElementById('payButton');
    const paymentModal = document.getElementById('paymentModal');
    const closeModal = document.getElementById('closeModal');
    const cancelButton = document.getElementById('cancelButton');
    const fileUpload = document.getElementById('fileUpload');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const removeFile = document.getElementById('removeFile');
    const submitButton = document.getElementById('submitButton');

    // Open Modal
    payButton.addEventListener('click', () => {
      paymentModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    });

    // Close Modal
    closeModal.addEventListener('click', () => {
      paymentModal.classList.add('hidden');
      document.body.style.overflow = 'auto';
    });

    cancelButton.addEventListener('click', () => {
      paymentModal.classList.add('hidden');
      document.body.style.overflow = 'auto';
    });

    // Close modal when clicking outside
    paymentModal.addEventListener('click', (e) => {
      if (e.target === paymentModal) {
        paymentModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
      }
    });

    // File Upload Handler
    fileUpload.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (file) {
        fileName.textContent = file.name;
        filePreview.classList.remove('hidden');
        submitButton.disabled = false;
      }
    });

    // Remove File Handler
    removeFile.addEventListener('click', () => {
      fileUpload.value = '';
      filePreview.classList.add('hidden');
      submitButton.disabled = true;
    });
  </script>
  @endif

  @if(session('success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Swal.fire({
      title: 'สำเร็จ!',
      text: "อัปโหลดสลิปสำเร็จแล้ว! ระบบจะตรวจสอบโดยเจ้าหน้าที่เร็วๆนี้",
      imageUrl: '/pic/done.jpg',
      imageWidth: 80,
      imageHeight: 80,
      imageAlt: 'สำเร็จ',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'ตกลง'
    });
  </script>
  @endif


</body>

</html>