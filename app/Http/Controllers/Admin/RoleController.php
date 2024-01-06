<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class RoleController extends Controller
{
    /**
     * RoleController constructor
     */
    public function __construct(protected RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleRepository->getAllRoles();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $this->roleRepository->createNewRoles($request->validated());
        return redirect(route('admin.roles.index'))->with('message', 'Roles has been created successfully');
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
