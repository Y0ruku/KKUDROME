<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages</title>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background-color: #39444e;
      margin: 0;
      padding: 0;
    }

    nav {
      background-color: #000;
      color: white;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      padding: 10px 20px;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin-right: 20px;
      font-size: 14px;
    }

    .container {
      background-color: white;
      border-radius: 10px;
      width: 80%;
      margin: 50px auto;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      font-size: 14px;
    }

    th {
      background-color: #1b3a73;
      color: white;
    }

    .btn-view {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 4px;
      cursor: pointer;
    }

    .message-box {
      display: none;
      background-color: rgba(0,0,0,0.6);
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      justify-content: center;
      align-items: center;
    }

    .message-content {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      width: 400px;
      text-align: left;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }

    .close-btn {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 8px 14px;
      border-radius: 5px;
      cursor: pointer;
      float: right;
    }
  </style>
</head>
<body>

  <nav>
    <span style="font-weight: bold; margin-right: 20px;">TheGreatHouse</span>
    <a href="/admin/dashboard">Home</a>
    <a href="/admin/accountuser">Account user</a>
    <a href="/admin/paymentstatus">Payment</a>
    <a href="#" style="border-bottom: 2px solid white;">Messages</a>
  </nav>

  <div class="container">
    <h2>Received Messages</h2>

    <table>
      <thead>
        <tr>
          <th>Sender</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($repairs as $repair)
        <tr>
          <td>{{ $repair->user->username ?? 'N/A' }}</td>
          <td>{{ $repair->user->email ?? '-' }}</td>
          <td>
            <button class="btn-view" onclick="viewMessage('{{ addslashes($repair->description) }}')">
              View
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="message-box" id="popup">
    <div class="message-content">
      <button class="close-btn" onclick="closePopup()">Close</button>
      <h3>Message Content</h3>
      <p id="messageText"></p>
    </div>
  </div>

  <script>
    function viewMessage(text) {
      document.getElementById('messageText').innerText = text;
      document.getElementById('popup').style.display = 'flex';
    }

    function closePopup() {
      document.getElementById('popup').style.display = 'none';
    }
  </script>

</body>
</html>
