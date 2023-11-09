<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users\UserRepository as User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\ChangePasswordRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Roles\RoleRepository as Role;
use Str;
use App\Helper\Helper;

class UserController extends Controller
{
    public function __construct(User $users, Role $roles)
    {
        $this->routeIndex = route('user-list');
        $this->users = $users;
        $this->roles = $roles;
    }

    public function index()
    {
        $data = $this->users->get();
        return view('pages.users.index', compact('data'));
    }
    
    public function form($uuid = null)
    {
        $item = null;
        if ($uuid) {
            $item = $this->users->getByUuid($uuid);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
            }
        }
        $roles = $this->roles->get();
        return view('pages.users.form', compact('item', 'roles'));
    }

    public function passwordForm($uuid = null)
    {
        $item = null;
        if ($uuid) {
            $item = $this->users->getByUuid($uuid);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
            }
        }
        return view('pages.users.password-form', compact('item'));
    }

    public function create(UserRequest $request)
    {
        $name = $request->input('name');
        $jobPosition = $request->input('job_position');
        $email = $request->input('email');
        $password = $request->input('password');
        $roleId = $request->input('role_id');
        $is_active = (int) $request->input('is_active');

        $input = [
            'uuid' => Str::uuid(),
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role_id' => $roleId,
            'job_position' => $jobPosition,
            'email_verified_at' => Carbon::now()->format('Y-m-d h:i:s'),
            'is_active' => $is_active,
        ];
        $this->users->create($input);

        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil ditambahkan.']);
    }

    public function update(EditUserRequest $request, $uuid)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $roleId = $request->input('role_id');
        $is_active = (int) $request->input('is_active');

        $item = $this->users->getByUuid($uuid);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $input = [
            'name' => $name,
            'email' => $email,
            'role_id' => $roleId,
            'is_active' => $is_active,
        ];
        $this->users->update($item, $input);

        if (!Helper::isSuperAdmin()) {
            return redirect()->back()->with(['success'=> 'Data berhasil diubah.']);
        }
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil diubah.']);
    }

    public function updatePassword(ChangePasswordRequest $request, $uuid)
    {
        $oldPassword = $request->input('old_password');
        $password = $request->input('password');

        $item = $this->users->getByUuid($uuid);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        
        $isMatch = $this->checkPassword($item, $oldPassword);
        if (!$isMatch) {
            return redirect(route('edit-password-user', ['uuid'=> $item->uuid]))->with(['error'=> 'Password lama yang Anda masukkan salah']);
        }

        $input = [
            'password' => bcrypt($password)
        ];
        $this->users->update($item, $input);
        if (!Helper::isSuperAdmin()) {
            return redirect()->back()->with(['success'=> 'Data berhasil diubah.']);
        }
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil diubah.']);
    }

    public function delete($uuid)
    {
        $item = $this->users->getByUuid($uuid);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $this->users->delete($item);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil dihapus.']);
    }

    public function checkPassword($item, $oldPassword)
    {
        return (Hash::check($oldPassword, $item->password))? true : false;
    }
}
