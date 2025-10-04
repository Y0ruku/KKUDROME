{{-- resources/views/payments/index.blade.php --}}
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Status</title>
  <style>
    body { font-family: Arial, sans-serif; margin:0; background: #003366; }
    .navbar { background: #000; padding: 15px 40px; display:flex; justify-content:space-between; color:white; }
    .navbar .logo { font-weight:bold; font-size:18px; }
    .navbar .links a { color:white; text-decoration:none; margin-left:20px; font-size:14px; }
    .navbar .links a:hover { text-decoration:underline; }
    .outer { background:#003366; margin:40px auto; width:90%; max-width:1000px; border-radius:25px; padding:20px; }
    .inner { background:#fff; border-radius:15px; padding:30px; text-align:center; }
    h1 { margin-bottom:25px; }
    table { width:100%; border-collapse:collapse; }
    th, td { text-align:center; padding:12px; border-bottom:1px solid #ddd; }
    th { font-size:16px; color:#333; }
    td { font-size:15px; }
    .switch { position:relative; display:inline-block; width:40px; height:20px; }
    .switch input { opacity:0; width:0; height:0; }
    .slider { position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background-color:#ccc; transition:.4s; border-radius:20px; }
    .slider:before { position:absolute; content:""; height:14px; width:14px; left:3px; bottom:3px; background-color:red; transition:.4s; border-radius:50%; }
    input:checked + .slider:before { background-color:limegreen; transform:translateX(20px); }
    img.slip { max-width:100px; border-radius:8px; }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="logo">TheGreatHouse</div>
    <div class="links">
      <a href="/admin/dashboard">Home</a>
      <a href="/admin/profile">Account user</a>
      <a href="#">Payment Status</a>
      <a href="/admin/announcements">Edit announcement</a>
    </div>
  </div>

  <div class="outer">
    <div class="inner">
      <h1>Payment Status</h1>

      <table>
        <thead>
          <tr>
            <th>Rooms</th>
            <th>Pictures</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($payments as $payment)
          <tr>
            <td>{{ $payment->bill && $payment->bill->contract ? $payment->bill->contract->room->roon_number : 'N/A' }}</td>
           <td>
    @if(!empty($payment->slip_image))
       <a href="{{ $payment->slip_image }}" target="_blank" style="padding:5px 10px; background:#003366; color:white; border-radius:5px; text-decoration:none;">
    Slip
</a>
    @else
        No Slip
    @endif
</td>

          <td>
    <form action="{{ route('payments.updateStatus', $payment->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('PUT')
        @if($payment->status == 'approved')
           
             <button type="submit" name="status" value="rejected" style="padding:5px 10px; background:green; color:white; border:none; border-radius:5px;">
                Approve
            </button>
        @else
            <button type="submit" name="status" value="approved" style="padding:5px 10px; background:red; color:white; border:none; border-radius:5px;">
                Rejected
            </button>
        @endif
    </form>
</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</body>
</html>
