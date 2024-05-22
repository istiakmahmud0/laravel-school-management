<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignPermissionToUserRequest;
use App\Http\Requests\AssignRoleToUserRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\PasswordUpdateThroughAdminRequest;
use App\Http\Requests\UserRequest;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
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
        // $roles = $this->roleRepository->getAllRoles();
        // $permissions = $this->permissionRepository->getAllPermission();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleRepository->getAllRoles();
        return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $userData = $request->validated();
        $user = $this->userRepository->createUser([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
        ]);

        if ($request->has('roles')) {
            if ($user instanceof User) {
                $this->userRepository->assignRoleToUser($user, [$userData['roles']]);
            }
        }
        return redirect(route('admin.users.index', ['message', 'User has been created successfully']));
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
    public function update(UserRequest $request, string $id)

    {
        $user = $this->userRepository->getUserByID($id);
        if ($user instanceof User) {
            $this->userRepository->updateUser($user, $request->validated());
        }
        return redirect()->back()->with('message', 'User info update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->userRepository->getUserByID($id);
        if ($user instanceof User) {
            $this->userRepository->deleteUser($user);
        }
        return redirect()->back()->with('message', 'User Removed successfully');
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
    /**
     * Assign new permission to user
     */

    public function addPermissionsToUser(AssignPermissionToUserRequest $request, string $id)
    {
        $user = $this->userRepository->getUserByID($id);
        // dd($user);
        if ($user->hasPermissionTo($request->permissions)) {
            return redirect()->back()->with('message', 'Permission is already exists');
        }
        if ($user instanceof User) {
            $this->userRepository->assignPermissionToUser($user, $request->validated());
        }
        return redirect()->back()->with('message', 'Permission added successfully');
    }


    public function removeRoleFromUser(string $user, string $role)
    {

        $user = $this->userRepository->getUserByID($user);
        // $permission = $this->permissionRepository->findPermissionById($permission);

        $success = $user->removeRole($role);
        // dd("success");
        if ($success) {
            return redirect()->back()->with('message', 'Role revoked from user successfully');
        }
    }

    public function removePermissionFromUser(string $user, string $permission)
    {

        $user = $this->userRepository->getUserByID($user);
        // $permission = $this->permissionRepository->findPermissionById($permission);

        $success = $user->revokePermissionTo($permission);
        // dd("success");
        if ($success) {
            return redirect()->back()->with('message', 'Permission revoked from user successfully');
        }
    }

    /**
     * Users update password
     */
    public function updateUserPassword(PasswordUpdateThroughAdminRequest $request, string $id)
    {

        $user = $this->userRepository->getUserByID($id);
        // Verify the old password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('message', 'Password Not matched');
        }

        if ($user instanceof User) {
            $this->userRepository->updateUserPassword($user, $request->validated());
            return redirect()->back()->with('message', 'Password updated successfully.');
        }
    }
}
