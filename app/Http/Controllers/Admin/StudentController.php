<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\SchoolClassRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Student controller constructor
     */
    public function __construct(protected SchoolClassRepositoryInterface $schoolClassRepository)
    {
        $this->schoolClassRepository = $schoolClassRepository;
    }

    public function index()
    {
        return view('admin.students.index');
    }
    public function create()
    {
        $schoolClasses = $this->schoolClassRepository->getAllSchoolClass(['subjects']);
        return view('admin.students.create', ['schoolClasses' => $schoolClasses]);
    }
}
