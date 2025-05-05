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
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter name" value="">
                                        <x-alert name="name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Name</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter email" value="">
                                        <x-alert name="email" />
                                    </div>
                                    <div class="form-group">
                                        <label for="roll_number">Roll Number</label>
                                        <input type="text" class="form-control" name="roll_number" id="roll_number"
                                            placeholder="Enter roll number" value="">
                                        <x-alert name="roll_number" />
                                    </div>
                                    <div class="form-group">
                                        <label for="admission_number">Admission Number</label>
                                        <input type="text" class="form-control" name="admission_number"
                                            id="admission_number" placeholder="Enter admission number" value="">
                                        <x-alert name="admission_number" />
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="Male">
                                                Male</option>
                                            <option value="Female">
                                                Female</option>
                                        </select>
                                        <x-alert name="gender" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select class="form-control" name="">
                                            <option value="Theory">
                                                Class One</option>
                                            <option value="Practical">
                                                Class Two</option>
                                        </select>
                                        {{-- <x-alert name="subjects.{{ $index }}.subject_type" /> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="admission_date">Data of bitrth</label>
                                        <input type="date" class="form-control" name="date_of_birth"
                                            placeholder="Enter date of birth" value="" id="date_of_birth">
                                        <x-alert name="date_of_birth" />
                                    </div>
                                    <div class="form-group">
                                        <label for="religion">Religion</label>
                                        <select class="form-control" name="religion" id="religion">
                                            <option value="Islam">
                                                Islam</option>
                                            <option value="Hindu">
                                                Hindu</option>
                                            <option value="Christianity"> Christianity</option>
                                            <option value="Buddhism">Buddhism</option>
                                        </select>
                                        <x-alert name="religion" />
                                    </div>
                                    <div class="form-group">
                                        <label for="admission_date">Admission data</label>
                                        <input type="date" class="form-control" name="admission_date"
                                            placeholder="Enter admission date" value="" id="admission_date">
                                        <x-alert name="admission_data" />
                                    </div>
                                    <div class="form-group">
                                        <label for="profile_pic">Profile pic</label>
                                        <input type="file" class="form-control" name="profile_pic" value=""
                                            id="profile_pic">
                                        <x-alert name="profile_pic" />
                                    </div>
                                    <div class="form-group">
                                        <label for="blood_group">Blood Group</label>
                                        <select class="form-control" name="blood_group" id="blood_group">
                                            <option value="Islam">A+</option>
                                            <option value="Hindu">B+</option>
                                            <option value="Christianity"> Ab+</option>
                                            <option value="Buddhism"> O+</option>
                                            <option value="Buddhism"> A-</option>
                                            <option value="Buddhism"> B-</option>
                                            <option value="Buddhism"> AB-</option>
                                            <option value="Buddhism"> O-</option>
                                        </select>
                                        <x-alert name="blood_group" />
                                    </div>
                                    <div class="form-group">
                                        <label for="height">Height</label>
                                        <input type="text" class="form-control" name="height" id="height"
                                            placeholder="Enter height" value="">
                                        <x-alert name="height" />
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Weight</label>
                                        <input type="text" class="form-control" name="weight" id="weight"
                                            placeholder="Enter weight" value="">
                                        <x-alert name="weight" />
                                    </div>
                                    <div class="form-group">
                                        <label for="subject_status">Status</label>
                                        <select class="form-control" name="subject_status">
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
