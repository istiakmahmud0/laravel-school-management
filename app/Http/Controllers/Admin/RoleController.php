<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolePermissionRequest;
use App\Http\Requests\RoleRequest;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use Hamcrest\Core\IsInstanceOf;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;

class RoleController extends Controller
{
    /**
     * RoleController constructor
     */
    public function __construct(protected RoleRepositoryInterface $roleRepository, protected PermissionRepositoryInterface $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
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
        $role = $this->roleRepository->getRoleByID($id);
        $permissions = $this->permissionRepository->getAllPermission();
        return view('admin.roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $role = $this->roleRepository->getRoleByID($id);
        if ($role instanceof Role) {
            $this->roleRepository->updateRole($role, $request->validated());
        }
        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = $this->roleRepository->getRoleByID($id);
        if ($role instanceof Role) {
            $this->roleRepository->deleteRole($role);
        }
        return redirect(route('admin.roles.index'));
    }

    /**
     * Assign permission to role
     */

    public function givePermission(RolePermissionRequest $request, string $id)
    {
        $role = $this->roleRepository->getRoleByID($id);
        if ($role->hasPermissionTo($request->permissions)) {
            return back()->with('message', 'Permission is already exists');
        }
        if ($role instanceof Role) {
            $this->roleRepository->assignRole($role, $request->validated());
        }
        return back()->with('message', 'Permission is Added successfully');
    }
    public function revokePermission(string $role, string $permission)
    {

        $role = $this->roleRepository->getRoleByID($role);
        $permission = $this->permissionRepository->findPermissionById($permission);

        $success = $role->revokePermissionTo($permission);
        // dd("success");
        if ($success) {
            return redirect()->back()->with('message', 'Role revoked from permission successfully');
        }
    }
}
