<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolClassRequest;
use App\Interfaces\SchoolClassRepositoryInterface;
use App\Interfaces\SubjectRepositoryInterface;
use App\Models\SchoolClass;
use App\Repositories\SubjectRepository;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{

    /**
     * School class controller constructor
     */

    public function __construct(protected SchoolClassRepositoryInterface $schoolClassRepository, protected SubjectRepositoryInterface $subjectRepository)
    {
        $this->schoolClassRepository = $schoolClassRepository;
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolClass = $this->schoolClassRepository->getAllSchoolClass(['subjects']);
        return view('admin.school-class.index', ['schoolClass' => $schoolClass]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = $this->subjectRepository->getAllSubjects();
        return view('admin.school-class.create', ['subjects' => $subjects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolClassRequest $request)
    {
        $class = $this->schoolClassRepository->createSchoolClass($request->validated());
        if ($request->has('subjects')) {
            $class->subjects()->attach($request->subjects);
        }
        return redirect()->route('admin.schoolClass.index')->with('message', 'Class created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sc = $this->schoolClassRepository->getSchoolClassById($id);
        return view('admin.school-class.edit', ['sc' => $sc]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolClassRequest $request, string $id)
    {
        $sc = $this->schoolClassRepository->getSchoolClassById($id);
        if ($sc instanceof SchoolClass) {
            $this->schoolClassRepository->updatePost($sc, $request->validated());
        }
        return redirect(route('admin.schoolClass.index'))->with('message', 'School class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sc = $this->schoolClassRepository->getSchoolClassById($id);
        if ($sc instanceof SchoolClass) {
            $this->schoolClassRepository->deletePost($sc);
        }
        return redirect(route('admin.schoolClass.index'))->with('message', 'School class deleted successfully');
    }
}
