<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #3b454f; padding-top: 70px; }
        .content-box {
            background-color: white; border-radius: 15px; padding: 30px;
            max-width: 1000px; margin: auto; box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }
        .recycle-icon {
            position: fixed; bottom: 30px; right: 30px;
            font-size: 32px; cursor: pointer;
        }
        .table th { background-color: #1e3a8a; color: white; }
        .navbar-dark { background-color: black; }
        .navbar-nav .nav-link.active { border-bottom: 2px solid white; }
    </style>
</head>
<body>

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
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('admin/bills') ? 'active-link' : '' }}" href="/admin/bills">Bill</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="content-box">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">List of Tenants</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTenantModal">+ Add</button>
    </div>

    <table class="table table-bordered table-hover text-center align-middle">
        <thead>
            <tr>
                <th>Room</th>
                <th>Name</th>
                <th>End Date</th>
                <th>Room Type</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tenants as $tenant)
                <tr>
                    <td>{{ $tenant->room_number }}</td>
                    <td>{{ $tenant->firstname }} {{ $tenant->lastname }}</td>
                    <td>{{ $tenant->end_date }}</td>
                    <td>{{ $tenant->room_type }}</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="openEditModal({{ $tenant->id }})">Edit</button>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="openDeleteModal({{ $tenant->id }})">Delete</button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No tenants found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>




<!-- Add Tenant Modal -->
<div class="modal fade" id="addTenantModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('tenant.store') }}" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Add Tenant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-2">
          <label>First Name</label>
          <input name="firstname" class="form-control" required>
        </div>
        <div class="mb-2">
          <label>Last Name</label>
          <input name="lastname" class="form-control" required>
        </div>
        <div class="mb-2">
          <label>Username</label>
          <input name="username" class="form-control" required>
        </div>
        <div class="mb-2">
          <label>Email</label>
          <input name="email" type="email" class="form-control">
        </div>
        <div class="mb-2">
          <label>Telephone</label>
          <input name="tel" type="text" class="form-control">
        </div>
        <div class="mb-2">
          <label>Password</label>
          <input name="password" type="password" class="form-control" required>
        </div>
        <div class="mb-2">
          <label>Room</label>
          <select name="room_id" class="form-control" required>
            @foreach(App\Models\Room::where('status', 'available')->get() as $room)
              <option value="{{ $room->id }}">{{ $room->roon_number }} ({{ $room->room_type }})</option>
            @endforeach
          </select>
        </div>
        <div class="mb-2">
          <label>End Date</label>
          <input name="end_date" type="date" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Edit Tenant Modal -->
<div class="modal fade" id="editTenantModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="editTenantForm" method="POST" class="modal-content">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h5 class="modal-title">Edit Tenant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="user_id" id="edit_user_id">
        <div class="mb-2"><label>First Name</label><input name="firstname" id="edit_firstname" class="form-control" required></div>
        <div class="mb-2"><label>Last Name</label><input name="lastname" id="edit_lastname" class="form-control" required></div>
        <div class="mb-2"><label>Username</label><input name="username" id="edit_username" class="form-control" required></div>
        <div class="mb-2"><label>Email</label><input name="email" id="edit_email" type="email" class="form-control"></div>
        <div class="mb-2"><label>Telephone</label><input name="tel" id="edit_tel" class="form-control"></div>
        <div class="mb-2"><label>End Date</label><input type="date" name="end_date" id="edit_end_date" class="form-control" required></div>
        <div class="mb-2"><label>Change Password (optional)</label><input name="password" type="password" class="form-control"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>


<!-- Delete Confirm Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="deleteForm" method="POST" class="modal-content">
      @csrf
      @method('DELETE')
      <div class="modal-header">
        <h5 class="modal-title">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">Are you sure you want to delete this tenant?</p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Delete</button> <!-- ใส่ type="submit" -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function openEditModal(id) {
    fetch(`/tenant/fetch/${id}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('edit_firstname').value = data.firstname;
            document.getElementById('edit_lastname').value = data.lastname;
            document.getElementById('edit_username').value = data.username;
            document.getElementById('edit_email').value = data.email;
            document.getElementById('edit_tel').value = data.tel;
            document.getElementById('edit_end_date').value = data.end_date;

            // ถ้าอยากโชว์ห้องปัจจุบันด้วย
            if (document.getElementById('edit_room')) {
                document.getElementById('edit_room').value = data.room_id;
            }

            // set action form
            document.getElementById('editTenantForm').action = `/tenant/update/${data.contract_id}`;
            new bootstrap.Modal(document.getElementById('editTenantModal')).show();
        });
}


function openDeleteModal(id) {
    document.getElementById('deleteForm').action = `/tenant/delete/${id}`;
    new bootstrap.Modal(document.getElementById('deleteConfirmModal')).show();
}

</script>
</body>
</html>
