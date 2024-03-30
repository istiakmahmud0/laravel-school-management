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

        <!-- Roles-->
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
                            <form action="" method="POST">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name" value="{{ $user->name }}">
                                        <x-alert name='name' />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Assign Roles</h3>
                            </div>
                            <div class="d-flex mx-2 py-4">
                                @if (count($user->getRoleNames()) > 0)
                                    @foreach ($user->getRoleNames() as $role)
                                        <div class="px-2">
                                            <form method="POST" action="">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Are you sure ?')">{{ $role }}</button>
                                            </form>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="d-flex align-items-center">
                                        <p class="pl-3">No roles is assign yet</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    {{-- Added roles dropdown --}}
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Roles to user</h3>
                            </div>

                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Roles</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="roles">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-alert name='roles' />
                                    </div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Assign</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Permissions --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Assigned Permissions</h3>
                            </div>
                            <div class="d-flex mx-2 py-4">
                                @if (count($user->getPermissionNames()) > 0)
                                    @foreach ($user->getPermissionNames()() as $permission)
                                        <div class="px-2">
                                            <form method="POST" action="">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Are you sure ?')">{{ $permission }}</button>
                                            </form>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="d-flex align-items-center">
                                        <p class="pl-3">No permissions is assign yet</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    {{-- Added permissions dropdown --}}
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add permissions to user</h3>
                            </div>

                            <form action="" method="POST">
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


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Assign</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-admin-layout>
