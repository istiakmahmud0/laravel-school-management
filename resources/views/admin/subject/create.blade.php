<x-admin-layout>
    <x-slot name="siteTitle">Create Subject</x-slot>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Class</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.subjects.index') }}">Subject</a>
                            </li>
                            <li class="breadcrumb-item active">create Subject</li>
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
                                <h3 class="card-title">Create Subject</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form action="{{ route('admin.subjects.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="subject_name">Name</label>
                                        <input type="text" class="form-control" id="subject_name" name="subject_name"
                                            placeholder="Enter name" value="{{ old('subject_name') }}">
                                        <x-alert name='subject_name' />
                                    </div>
                                    <div class="form-group">
                                        <label for="subject_type">Subject Type</label>
                                        <select class="form-control" id="subject_type" name="subject_type">
                                            <option value="Theory"
                                                {{ old('subject_type') == 'Theory' ? 'selected' : '' }}>Theory</option>
                                            <option value="Practical"
                                                {{ old('subject_type') == 'Practical' ? 'selected' : '' }}>Practical
                                            </option>

                                        </select>
                                        <x-alert name='subject_type' />
                                    </div>
                                    <div class="form-group">
                                        <label for="subject_status">Status</label>
                                        <select class="form-control" id="subject_status" name="subject_status">
                                            <option value="1" {{ old('subject_status') == 1 ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="0" {{ old('subject_status') == 0 ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                        <x-alert name='subject_status' />
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
