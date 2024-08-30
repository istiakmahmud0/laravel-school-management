<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolClassRequest;
use App\Interfaces\SchoolClassRepositoryInterface;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{

    /**
     * School class controller constructor
     */

    public function __construct(protected SchoolClassRepositoryInterface $schoolClassRepository)
    {
        $this->schoolClassRepository = $schoolClassRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.school-class.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.school-class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolClassRequest $request)
    {
        $this->schoolClassRepository->createSchoolClass($request->validated());
        return redirect()->route('admin.schoolClass.index')->with('message', 'Class created successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
