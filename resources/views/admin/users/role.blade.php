<x-admin-layout>
    <x-slot name='siteTitle'>Assign roles to user</x-slot>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assigning Roles</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">user</a></li>
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
                                <h3 class="card-title">Profile Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name" value="{{ $user->name }}">
                                        <x-alert name='name' />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter email" value="{{ $user->email }}">
                                        <x-alert name='email' />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Password</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{-- <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" placeholder="">

                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="">
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="">
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form> --}}
                            <form action="{{ route('admin.updatePassword', $user->id) }}" method="POST">
                                @csrf
                                {{-- @method('put') --}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" placeholder="">

                                        <x-alert name='current_password' />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="">
                                        <x-alert name='password' />
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="">
                                        <x-alert name='password_confirmation' />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
                                        {{-- @php
                                            dd($role);
                                        @endphp --}}

                                        <div class="px-2">
                                            <form method="POST" {{-- action="{{ route('admin.user.remove.role', [$user->id, $role->id]) }}"> --}}
                                                action="{{ route('admin.user.remove.role', [$user->id, $role]) }}">
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

                            <form action="{{ route('admin.user.assign.roles', $user->id) }}" method="POST">
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
                                    @foreach ($user->getPermissionNames() as $permission)
                                        <div class="px-2">
                                            <form method="POST"
                                                action="{{ route('admin.user.remove.permission', [$user->id, $permission]) }}">
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

                            <form action="{{ route('admin.user.assign.permission', $user->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="permissions">Permissions</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            name="permissions">
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->name }}">{{ $permission->name }}
                                                </option>
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
