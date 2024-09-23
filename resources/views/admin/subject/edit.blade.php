<x-admin-layout>
    <x-slot name='siteTitle'>Edit subject</x-slot>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subject</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Subject</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Subject</li>
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
                                <h3 class="card-title">Edit subject</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter name" value="">
                                        <x-alert name='name' />
                                    </div>
                                    <div class="form-group">
                                        <label for="subject_type">Subject Type</label>
                                        <select class="form-control" id="subject_type" name="subject_type">
                                            <option value="Theory">Theory
                                            </option>
                                            <option value="Practical">Practical
                                            </option>
                                        </select>
                                        <x-alert name='status' />
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1">Active
                                            </option>
                                            </option>
                                            <option value="0">Inactive
                                            </option>
                                        </select>
                                        <x-alert name='status' />
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
