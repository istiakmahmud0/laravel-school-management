<x-admin-layout>
    <x-slot name="siteTitle">Create Class</x-slot>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Class</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.schoolClass.index') }}">School class</a>
                            </li>
                            <li class="breadcrumb-item active">create class</li>
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
                                <h3 class="card-title">Create Class</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.schoolClass.create') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter name" value="">
                                        <x-alert name='name' />
                                    </div>
                                    {{-- Added roles --}}
                                    <div class="form-group">
                                        <label for="role">Status</label>
                                        <select class="form-control" id="role" name="roles">
                                            <option value="">Active</option>
                                            <option value="">Inactive</option>
                                        </select>
                                        <x-alert name='role' />
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
