<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Interfaces\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Permission repository constructor
     */
    public function __construct(protected PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permissionRepository->getAllPermission();
        return view('admin.permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $this->permissionRepository->createNewPermission($request->validated());
        return redirect(route('admin.permissions.index'))->with('message', 'Permission has been created successfully');
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
        $permission = $this->permissionRepository->findPermissionById($id);
        return view('admin.permissions.edit', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        $permission = $this->permissionRepository->findPermissionById($id);
        if ($permission instanceof Permission) {
            $this->permissionRepository->updatePermission($permission, $request->validated());
        }

        return redirect(route('admin.permissions.index'))->with('message', 'Permission has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = $this->permissionRepository->findPermissionById($id);
        if ($permission instanceof Permission) {
            $this->permissionRepository->deletePermission($permission);
        }

        return redirect(route('admin.permissions.index'))->with('message', 'Permission has been deleted');
    }
}
