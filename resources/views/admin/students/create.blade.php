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
                            <form action="{{ route('admin.students.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body" id="subject-form-area">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter name" value="{{ old('name') }}">
                                        <x-alert name="name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter email" value="{{ old('email') }}">
                                        <x-alert name="email" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Enter password" value="{{ old('password') }}">
                                        <x-alert name="password" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Confirm password"
                                            value="{{ old('password_confirmation') }}">
                                        <x-alert name="password_confirmation" />
                                    </div>
                                    <div class="form-group">
                                        <label for="roll_number">Roll Number</label>
                                        <input type="text" class="form-control" name="roll_number" id="roll_number"
                                            placeholder="Enter roll number" value="{{ old('roll_number') }}">
                                        <x-alert name="roll_number" />
                                    </div>
                                    <div class="form-group">
                                        <label for="admission_number">Admission Number</label>
                                        <input type="text" class="form-control" name="admission_number"
                                            id="admission_number" placeholder="Enter admission number"
                                            value="{{ old('admission_number') }}">
                                        <x-alert name="admission_number" />
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        <x-alert name="gender" />
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile_number">Mobile number</label>
                                        <input type="text" class="form-control" name="mobile_number"
                                            id="mobile_number" placeholder="Enter mobile number"
                                            value="{{ old('mobile_number') }}">
                                        <x-alert name="mobile_number" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select class="form-control" name="school_class_id">
                                            @foreach ($schoolClasses as $class)
                                                <option value="{{ $class->id }}"
                                                    {{ old('school_class_id') == $class->id ? 'selected' : '' }}>
                                                    {{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-alert name="school_class_id" />
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_birth">Date of birth</label>
                                        <input type="date" class="form-control" name="date_of_birth"
                                            placeholder="Enter date of birth" value="{{ old('date_of_birth') }}"
                                            id="date_of_birth">
                                        <x-alert name="date_of_birth" />
                                    </div>
                                    <div class="form-group">
                                        <label for="religion">Religion</label>
                                        <select class="form-control" name="religion" id="religion">
                                            <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>
                                                Islam</option>
                                            <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>
                                                Hindu</option>
                                            <option value="Christianity"
                                                {{ old('religion') == 'Christianity' ? 'selected' : '' }}> Christianity
                                            </option>
                                            <option value="Buddhism"
                                                {{ old('religion') == 'Buddhism' ? 'selected' : '' }}>Buddhism</option>
                                        </select>
                                        <x-alert name="religion" />
                                    </div>
                                    <div class="form-group">
                                        <label for="admission_date">Admission date</label>
                                        <input type="date" class="form-control" name="admission_date"
                                            placeholder="Enter admission date" value="{{ old('admission_date') }}"
                                            id="admission_date">
                                        <x-alert name="admission_date" />
                                    </div>
                                    <div class="form-group">
                                        <label for="profile_pic">Profile pic</label>
                                        <input type="file" class="form-control" name="profile_pic"
                                            value="{{ old('profile_pic') }}" id="profile_pic">
                                        <x-alert name="profile_pic" />
                                    </div>
                                    <div class="form-group">
                                        <label for="blood_group">Blood Group</label>
                                        <select class="form-control" name="blood_group" id="blood_group">
                                            <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>
                                                A+</option>
                                            <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>
                                                B+</option>
                                            <option value="AB+"
                                                {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                            <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>
                                                O+</option>
                                            <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>
                                                A-</option>
                                            <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>
                                                B-</option>
                                            <option value="AB-"
                                                {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                            <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>
                                                O-</option>
                                        </select>
                                        <x-alert name="blood_group" />
                                    </div>
                                    <div class="form-group">
                                        <label for="height">Height</label>
                                        <input type="text" class="form-control" name="height" id="height"
                                            placeholder="Enter height" value="{{ old('height') }}">
                                        <x-alert name="height" />
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Weight</label>
                                        <input type="text" class="form-control" name="weight" id="weight"
                                            placeholder="Enter weight" value="{{ old('weight') }}">
                                        <x-alert name="weight" />
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        <x-alert name='status' />
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
    </div>
    </section>
    </div>
</x-admin-layout>
