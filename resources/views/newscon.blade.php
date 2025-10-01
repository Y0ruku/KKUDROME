<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Announcements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #3b454f; padding-top: 70px; }
        .content-box {
            background-color: white; border-radius: 15px; padding: 30px;
            max-width: 900px; margin: auto; box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }
        .table th { background-color: #1e3a8a; color: white; }
        .navbar-dark { background-color: black; }
        .navbar-nav .nav-link.active { border-bottom: 2px solid white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/admin/dashboard">TheGreatHouse</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/admin/dashboard">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/accountuser">Account user</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Payment Stations</a></li>
        <li class="nav-item"><a class="nav-link active" href="/admin/announcements">Edit announcement</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="content-box">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Manage Announcements</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add</button>
    </div>

    <table class="table table-bordered table-hover text-center align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>News</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($an as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->news }}</td>
                    <td>{{ $a->created_at }}</td>
                    <td>{{ $a->updated_at }}</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" 
                                onclick="openEditModal({{ $a->id }}, '{{ $a->news }}')">Edit</button>
                        <button class="btn btn-sm btn-danger" 
                                onclick="openDeleteModal({{ $a->id }})">Delete</button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No announcements found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('announcements.store') }}" class="modal-content">
      @csrf
      <div class="modal-header"><h5 class="modal-title">Add Announcement</h5></div>
      <div class="modal-body">
        <textarea name="news" class="form-control" rows="3" placeholder="Enter announcement..." required></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="editForm" method="POST" class="modal-content">
      @csrf @method('PUT')
      <div class="modal-header"><h5 class="modal-title">Edit Announcement</h5></div>
      <div class="modal-body">
        <textarea id="editNews" name="news" class="form-control" rows="3" required></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="deleteForm" method="POST" class="modal-content">
      @csrf @method('DELETE')
      <div class="modal-header"><h5 class="modal-title">Delete Confirmation</h5></div>
      <div class="modal-body">
        <p class="text-danger">Are you sure you want to delete this announcement?</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ใช้ route ของ Laravel + replace id
function openEditModal(id, news) {
    document.getElementById('editNews').value = news;
    let url = "{{ route('announcements.update', ':id') }}";
    url = url.replace(':id', id);
    document.getElementById('editForm').action = url;
    new bootstrap.Modal(document.getElementById('editModal')).show();
}

function openDeleteModal(id) {
    let url = "{{ route('announcements.destroy', ':id') }}";
    url = url.replace(':id', id);
    document.getElementById('deleteForm').action = url;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>

</body>
</html>
