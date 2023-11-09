<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles\RoleRepository as Role;
use App\Http\Requests\RoleRequest;
use Str;

class RoleController extends Controller
{
    public function __construct(Role $roles) 
    {
        $this->routeIndex = route('role-list');
        $this->roles = $roles;
    }
    
    public function index()
    {
        $data = $this->roles->get();
        return view('pages.roles.index', compact('data'));
    }

    public function form($uuid = null)
    {
        $item = null;
        $havePermissions = [];
        if ($uuid) {
            $item = $this->roles->getByUuid($uuid);
            if (!$item) {
                return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
            }
            $havePermissions = json_decode($item->permissions);
        }
        $permissions = config('constant.PERMISSIONS');
        $numberOfApprover = config('constant.NUMBER_OF_APPROVER');
        return view('pages.roles.form', compact('item', 'permissions', 'havePermissions', 'numberOfApprover'));
    }

    public function create(RoleRequest $request)
    {
        $permissions = $this->generatePermissions($request);
        $name = $request->input('name');

        $input = [
            'uuid' => Str::uuid(),
            'name' => $name,
            'permissions' => json_encode($permissions),
        ];
        $this->roles->create($input);

        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil ditambahkan.']);
    }

    public function generatePermissions($request)
    {
        $permissions = array();
        foreach ($request->all() as $key => $value) {
            if (!in_array($key, ['name', '_token', 'id'])) {
                if (str_contains($key, '|')){
                    $arr = explode('|', $key);
                    for ($i=0; $i < count($arr) ; $i++ ) { 
                        array_push($permissions, $arr[$i]);
                    }
                }
                array_push($permissions, $key);
            }
        }
        return $permissions;
    }

    public function update(RoleRequest $request, $uuid)
    {
        $permissions = $this->generatePermissions($request);
        $name = $request->input('name');

        $input = [
            'name' => $name,
            'permissions' => json_encode($permissions),
        ];

        $item = $this->roles->getByUuid($uuid);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }

        $this->roles->update($item, $input);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil diubah.']);
    }

    public function delete($uuid)
    {
        $item = $this->roles->getByUuid($uuid);
        if (!$item) {
            return redirect($this->routeIndex)->with(['error'=> 'Data tidak dapat ditemukan']);
        }
        $this->roles->delete($item);
        return redirect($this->routeIndex)->with(['success'=> 'Data berhasil dihapus.']);
    }
}
