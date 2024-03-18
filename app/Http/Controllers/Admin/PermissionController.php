<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\PermissionRoleRequest;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Permission repository constructor
     */
    public function __construct(protected PermissionRepositoryInterface $permissionRepository, protected RoleRepositoryInterface $roleRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
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
        $roles = $this->roleRepository->getAllRoles();
        return view('admin.permissions.edit', ['permission' => $permission, 'roles' => $roles]);
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

    /**
     * Add roles to permission
     */

    public function giveRoles(PermissionRoleRequest $request, string $id)
    {
        $permission = $this->permissionRepository->findPermissionById($id);
        if ($permission->hasRole($request->roles)) {
            return redirect()->back()->with('message', 'Permission has the role assigned to it');
        }
        // $permission->assignRole($request->roles);
        if ($permission instanceof Permission) {
            $this->permissionRepository->assignRole($permission, $request->validated());
        }
        return redirect()->back()->with('message', 'New role added to the permission');
    }

    public function revokeRole(string $permission, string $role)
    {
        $permission = $this->permissionRepository->findPermissionById($permission);
        $role = $this->roleRepository->getRoleByID($role);

        $success = $permission->removeRole($role);
        // dd("success");
        if ($success) {
            return redirect()->back()->with('message', 'Role revoked from permission successfully');
        }
    }
}
