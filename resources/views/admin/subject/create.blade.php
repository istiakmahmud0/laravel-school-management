<x-admin-layout>
    <x-slot name="siteTitle">Create Subjects</x-slot>
    <div class="content-wrapper">
        <!-- ... (keep the existing header section) ... -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Subjects</h3>
                            </div>
                            <form action="{{ route('admin.subjects.store') }}" method="POST">
                                @csrf
                                <div class="card-body" id="subject-form-area">
                                    @foreach (old('subjects', [[]]) as $index => $oldSubject)
                                        <div class="subject-group">
                                            @if ($index > 0)
                                                <hr>
                                            @endif
                                            <div class="form-group">
                                                <label for="subject_name">Name</label>
                                                <input type="text" class="form-control"
                                                    name="subjects[{{ $index }}][subject_name]"
                                                    placeholder="Enter name"
                                                    value="{{ $oldSubject['subject_name'] ?? '' }}">
                                                <x-alert name="subjects.{{ $index }}.subject_name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="subject_type">Subject Type</label>
                                                <select class="form-control"
                                                    name="subjects[{{ $index }}][subject_type]">
                                                    <option value="Theory"
                                                        {{ ($oldSubject['subject_type'] ?? '') == 'Theory' ? 'selected' : '' }}>
                                                        Theory</option>
                                                    <option value="Practical"
                                                        {{ ($oldSubject['subject_type'] ?? '') == 'Practical' ? 'selected' : '' }}>
                                                        Practical</option>
                                                </select>
                                                <x-alert name="subjects.{{ $index }}.subject_type" />
                                            </div>
                                            <div class="form-group">
                                                <label for="subject_status">Status</label>
                                                <select class="form-control"
                                                    name="subjects[{{ $index }}][subject_status]">
                                                    <option value="1"
                                                        {{ ($oldSubject['subject_status'] ?? '') == '1' ? 'selected' : '' }}>
                                                        Active</option>
                                                    <option value="0"
                                                        {{ ($oldSubject['subject_status'] ?? '') == '0' ? 'selected' : '' }}>
                                                        Inactive</option>
                                                </select>
                                                <x-alert name="subjects.{{ $index }}.subject_status" />
                                            </div>
                                            @if ($index > 0)
                                                <button type="button"
                                                    class="btn btn-danger remove-subject">Remove</button>
                                            @endif
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-success mt-3" id="add-subject">Add Another
                                        Subject</button>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save All Subjects</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        let subjectIndex = {{ count(old('subjects', [1])) }};

        document.getElementById('add-subject').addEventListener('click', function() {
            const formArea = document.getElementById('subject-form-area');
            const newSubjectGroup = `
                <div class="subject-group">
                    <hr>
                    <div class="form-group">
                        <label for="subject_name">Name</label>
                        <input type="text" class="form-control" name="subjects[${subjectIndex}][subject_name]" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="subject_type">Subject Type</label>
                        <select class="form-control" name="subjects[${subjectIndex}][subject_type]">
                            <option value="Theory">Theory</option>
                            <option value="Practical">Practical</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject_status">Status</label>
                        <select class="form-control" name="subjects[${subjectIndex}][subject_status]">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-danger remove-subject">Remove</button>
                </div>
            `;
            formArea.insertAdjacentHTML('beforeend', newSubjectGroup);
            subjectIndex++;
        });

        document.getElementById('subject-form-area').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-subject')) {
                const subjectGroup = e.target.closest('.subject-group');
                const subjectGroups = document.querySelectorAll('.subject-group');
                if (subjectGroups.length > 1) {
                    subjectGroup.remove();
                } else {
                    alert('At least one subject must be present.');
                }
            }
        });
    </script>
</x-admin-layout>
