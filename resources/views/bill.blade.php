<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>สร้างบิล | TheGreatHouse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .nav-link.active-link {
            text-decoration: underline;
            font-weight: bold;
            color: white !important;
        }

        body {
            background-color: #343e4a;
            font-family: sans-serif;
        }

        .navbar {
            background-color: black;
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-white" href="/admin/dashboard">TheGreatHouse</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/dashboard') ? 'active-link' : '' }}" href="/admin/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/accountuser') ? 'active-link' : '' }}" href="/admin/accountuser">Account user</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/paymentstatus') ? 'active-link' : '' }}" href="/admin/paymentstatus">Payment Stations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/announcements') ? 'active-link' : '' }}" href="/admin/announcements">Edit announcement</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Header --}}
    <div class="container mt-5 pt-5">
        <div class="card p-4 shadow">
            <h2>สร้างบิลใหม่</h2>

            {{-- แสดงข้อความแจ้งเตือน --}}
            @if(session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger mt-2">{{ session('error') }}</div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('bills.store') }}" class="row g-3 mt-3">
                @csrf

                <div class="col-md-4">
                    <label class="form-label">เลือกห้อง</label>
                    <select name="contract_id" id="contractSelect" class="form-select" required>
                        @foreach($contracts as $contract)
                            <option value="{{ $contract->id }}" data-price="{{ $contract->room->price }}">
                                ห้อง {{ $contract->room->roon_number }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">จำนวนเงิน (บาท)</label>
                    <input type="number" step="0.01" name="amount" id="amountInput" class="form-control" required readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label">วันครบกำหนด</label>
                    <input type="date" name="due_date" class="form-control" required>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">✅ สร้างบิล</button>
                </div>
            </form>
        </div>

        {{-- ตารางรายการบิลเดือนปัจจุบัน --}}
        <div class="card p-4 mt-5 shadow">
            <h4>รายการบิลเดือน {{ \Carbon\Carbon::now()->locale('th')->isoFormat('MMMM YYYY') }}</h4>

            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ห้อง</th>
                        <th>จำนวนเงิน</th>
                        <th>วันครบกำหนด</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bills as $bill)
                        <tr>
                            <td>{{ $bill->id }}</td>
                            <td>{{ $bill->contract->room->roon_number }}</td>
                            <td>{{ number_format($bill->amount, 2) }}</td>
                            <td>{{ $bill->due_date }}</td>
                            <td>
                                @if ($bill->status === 'paid')
                                    <span class="text-success fw-bold">ชำระแล้ว</span>
                                @elseif ($bill->status === 'pending')
                                    <span class="text-secondary fw-bold">รอตรวจสอบ</span>
                                @else
                                    <span class="text-danger fw-bold">ยังไม่ชำระ</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">ยังไม่มีบิลในเดือนนี้</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- JS: autofill amount from room price --}}
    <script>
        const contractSelect = document.getElementById('contractSelect');
        const amountInput = document.getElementById('amountInput');

        function updateAmountFromRoomPrice() {
            const selectedOption = contractSelect.options[contractSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            amountInput.value = price;
        }

        contractSelect.addEventListener('change', updateAmountFromRoomPrice);
        window.addEventListener('DOMContentLoaded', updateAmountFromRoomPrice);
    </script>

</body>
</html>
