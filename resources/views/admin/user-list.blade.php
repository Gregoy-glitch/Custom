@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Users</h3>
                    <div class="card-tools">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addUserModal">
                            <i class="fas fa-plus mr-1"></i> Add User
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#editUserModal-{{ $user->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>

                                        <!-- Delete Button -->
                                        <button class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#deleteUserModal-{{ $user->id }}">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>

                                        <!-- Edit Modal (per user) -->
                                        <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><i class="fas fa-user-edit mr-2"></i>Edit User</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <form action="{{ route('edit_user', $user->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    value="{{ $user->name }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" name="email" class="form-control"
                                                                    value="{{ $user->email }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>New Password <small class="text-muted">(leave blank to keep current)</small></label>
                                                                <input type="password" name="password" class="form-control"
                                                                    placeholder="Enter new password">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-warning">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal (per user) -->
                                        <div class="modal fade" id="deleteUserModal-{{ $user->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><i class="fas fa-trash mr-2"></i>Delete User</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete <strong>{{ $user->name }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('delete_user', $user->id) }}" method="POST">
                                                            @csrf
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-user-plus mr-2"></i>Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="{{ route('add_new_user') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection