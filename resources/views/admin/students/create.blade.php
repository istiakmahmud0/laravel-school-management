<x-admin-layout>
    <x-slot name="siteTitle">Create student</x-slot>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Student</h3>
                            </div>
                            <form action="" method="">
                                @csrf
                                <div class="card-body" id="subject-form-area">
                                    <div class="form-group">
                                        <label for="subject_name">Name</label>
                                        <input type="text" class="form-control" name=""
                                            placeholder="Enter name" value="">
                                        {{-- <x-alert name="subjects.{{ $index }}.subject_name" /> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="subject_type">Subject Type</label>
                                        <select class="form-control" name="">
                                            <option value="Theory">
                                                Theory</option>
                                            <option value="Practical">
                                                Practical</option>
                                        </select>
                                        {{-- <x-alert name="subjects.{{ $index }}.subject_type" /> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="subject_status">Status</label>
                                        <select class="form-control" name="">
                                            <option value="1">
                                                Active</option>
                                            <option value="0">
                                                Inactive</option>
                                        </select>
                                        {{-- <x-alert name="subjects.{{ $index }}.subject_status" /> --}}
                                    </div>
                                </div>
                        </div>
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
