<x-admin-layout>
    <x-slot name="siteTitle">
        Create Users
    </x-slot>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">User</a></li>
                            <li class="breadcrumb-item active">create user</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.users.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter name" value="{{ old('name') }}">
                                        <x-alert name='name' />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email" value="{{ old('email') }}">
                                        <x-alert name='email' />
                                    </div>
                                    {{-- Added roles --}}
                                    <div class="form-group">
                                        <label for="role">Role</label>

                                        <select class="form-control" id="role" name="roles">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ old('roles') == $role->name ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <x-alert name='role' />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter pasword" value="{{ old('password') }}">
                                        <x-alert name='password' />
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Re-Enter your password</label>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            name="password_confirmation" placeholder="Re-enter your password"
                                            value="{{ old('confirm_password') }}">
                                        <x-alert name='password_confirmation' />
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-admin-layout>
