<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignRoleToUserRequest;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * User controller constructor
     */

    public function __construct(public UserRepositoryInterface $userRepository, public RoleRepositoryInterface $roleRepository, public PermissionRepositoryInterface $permissionRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userRepository->getAllUser();
        $roles = $this->roleRepository->getAllRoles();
        $permissions = $this->permissionRepository->getAllPermission();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $roles = $this->roleRepository->getAllRoles();
        $permissions = $this->permissionRepository->getAllPermission();
        $user = $this->userRepository->getUserByID($id);
        return view('admin.users.role', ['user' => $user, 'roles' => $roles, 'permissions' => $permissions]);
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

    /**
     * Assign new role to user
     */

    public function addRolesToUser(AssignRoleToUserRequest $request, string $id)
    {
        $user = $this->userRepository->getUserByID($id);
        // dd($user);
        if ($user->hasRole($request->roles)) {
            return redirect()->back()->with('message', 'Role is already exists');
        }
        if ($user instanceof User) {
            $this->userRepository->assignRoleToUser($user, $request->validated());
        }
        return redirect()->back()->with('message', 'Role added successfully');
    }


    public function removeRoleFromUser(string $user, string $role)
    {

        $user = $this->userRepository->getUserByID($user);
        // $permission = $this->permissionRepository->findPermissionById($permission);

        $success = $user->removeRole($role);
        // dd("success");
        if ($success) {
            return redirect()->back()->with('message', 'Role revoked from permission successfully');
        }
    }
}
