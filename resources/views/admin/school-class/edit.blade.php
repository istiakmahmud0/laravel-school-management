<x-admin-layout>
    <x-slot name='siteTitle'>Edit school class</x-slot>
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
                            <li class="breadcrumb-item active">Edit class</li>
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
                                <h3 class="card-title">Edit Class</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.schoolClass.update', $sc->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter name" value="{{ $sc->name }}">
                                        <x-alert name='name' />
                                    </div>
                                    {{-- Added subjects --}}
                                    <div class="form-group">
                                        <div>
                                            <label>Subjects</label>
                                        </div>
                                        @foreach ($subjects as $subject)
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="subject_{{ $subject->id }}"
                                                name="subjects[]" value="{{$subject->id}}" @if (in_array($subject->id,$selectedSubjectsIds))
                                                  checked
                                                @endif>
                                                <label for="subject_{{ $subject->id }}">{{ $subject->subject_name }}</label>
                                        </div>
                                        @endforeach
                                        <x-alert name='subjects' />
                                    {{-- Added status
                                     --}}
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1" {{ $sc->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            </option>
                                            <option value="0" {{ $sc->status == 0 ? 'selected' : '' }}>Inactive
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
