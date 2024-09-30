<x-admin-layout>
    <x-slot name='siteTitle'>All subjects</x-slot>
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">School class</li>
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
                            <a href="{{ route('admin.subjects.create') }}">
                                <h3 class="btn btn-primary">create</h3>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">School class</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Subject Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $subject->subject_name }}
                                                </td>
                                                <td>
                                                    {{ $subject->subject_type }}
                                                </td>
                                                <td> {{ $subject->subject_status == 1 ? 'Active' : 'Inactive' }}
                                                </td>
                                                <td class="d-flex">
                                                    <span class="mr-2">
                                                        <a href="" class="btn btn-primary">Edit</a>
                                                    </span>
                                                    <span>
                                                        <form method="POST" action="">
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
