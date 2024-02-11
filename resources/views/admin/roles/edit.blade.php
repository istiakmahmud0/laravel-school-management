<x-admin-layout>
    <x-slot name='siteTitle'>Create roles</x-slot>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Roles</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">roles</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create roles</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Email address</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter roles" value="{{ $role->name }}">
                                        <x-alert name='name' />
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Roles Permission</h3>
                            </div>
                            <div class="d-flex mx-2 py-4">
                                @if (count($role->permissions) > 0)
                                    @foreach ($role->permissions as $rolePermission)
                                        <div class="">
                                            <form method="POST"
                                                action="{{ route('admin.roles.permissions.revoke', [$role->id, $rolePermission->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Are you sure ?')">{{ $rolePermission->name }}</button>
                                            </form>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="d-flex align-items-center">
                                        <p class="pl-3">No permission is assign yet</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    {{-- Added roles dropdown --}}
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add permission To role</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.roles.permissions', $role->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Permissions</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="permissions">
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-alert name='permissions' />
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Assign</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</x-admin-layout>
