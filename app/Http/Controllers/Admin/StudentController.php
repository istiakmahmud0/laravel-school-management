<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Interfaces\SchoolClassRepositoryInterface;
use App\Interfaces\StudentRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Student controller constructor
     */
    public function __construct(protected SchoolClassRepositoryInterface $schoolClassRepository, protected StudentRepositoryInterface $studentRepository)

    {
        $this->schoolClassRepository = $schoolClassRepository;
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $students = $this->studentRepository->getAll(null, ['schoolClass', 'media']);

        return view('admin.students.index', ['students' => $students]);
    }
    public function create()
    {
        $schoolClasses = $this->schoolClassRepository->getAllSchoolClass(['subjects']);

        return view('admin.students.create', ['schoolClasses' => $schoolClasses]);
    }

    public function store(StudentRequest $request)
    {
        $student = $this->studentRepository->store($request->validated());
        if ($request->hasFile('profile_pic')) {
            $student->addMediaFromRequest('profile_pic')
                ->toMediaCollection('profile_pics');
        }
        return redirect()->route('admin.students.index')->with('message', 'Student created successfully');
    }

    public function edit(string $id)
    {
        $student = $this->studentRepository->findById($id, ['schoolClass', 'media']);
        $classList = $this->schoolClassRepository->getAllSchoolClass(['subjects']);
        return view('admin.students.edit', ['student' => $student, 'classList' => $classList]);
    }

    public function destroy(string $id)
    {
        $student = $this->studentRepository->findById($id, ['schoolClass', 'media']);
        if ($student instanceof User) {
            $this->studentRepository->delete($student);
        }

        return redirect()->route('admin.students.index')->with('message', 'Student deleted successfully');
    }
}
