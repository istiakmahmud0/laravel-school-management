<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Interfaces\SubjectRepositoryInterface;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Subject controller constructor
     */
    public function __construct(protected SubjectRepositoryInterface $subjectRepository)
    {

        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = $this->subjectRepository->getAllSubjects();
        return view('admin.subject.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequest $request)
    {
        $this->subjectRepository->createNewSubject($request->validated());
        return redirect()->route('admin.subjects.index')->with('message', 'Subject Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = $this->subjectRepository->getSubjectById($id);
        return view('admin.subject.edit', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectRequest $request, string $id)
    {
        $subject = $this->subjectRepository->getSubjectById($id);
        if ($subject instanceof Subject) {
            $this->subjectRepository->updateSubject($subject, $request->validated());
        }
        return redirect()->route('admin.subjects.index')->with('message', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = $this->subjectRepository->getSubjectById($id);
        if ($subject instanceof Subject) {
            $this->subjectRepository->deleteSubject($subject);
        }
        return redirect()->route('admin.subjects.index')->with('message', 'Subject Deleted successfully');
    }
}
