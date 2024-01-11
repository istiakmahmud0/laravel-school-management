<x-admin-layout>
    <x-slot name='siteTitle'>Roles</x-slot>
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.roles.create') }}">
                                <h3 class="btn btn-primary">create</h3>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Roles</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $role->name }}
                                                </td>
                                                <td class="d-flex">
                                                    <span class="mr-2">
                                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                    </span>
                                                    <span>
                                                        <form method="POST"
                                                            action="{{ route('admin.roles.destroy', $role->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger" type="submit"
                                                                onclick="return confirm('Are you sure ?')">Delete</button>
                                                        </form>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</x-admin-layout>
