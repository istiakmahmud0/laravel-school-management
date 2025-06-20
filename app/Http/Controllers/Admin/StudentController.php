<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Interfaces\SchoolClassRepositoryInterface;
use App\Interfaces\StudentRepositoryInterface;
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
        dd($students);

        return view('admin.students.index');
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
        return redirect()->route('admin.students.index')->with('success', 'Student created successfully');
    }
}
