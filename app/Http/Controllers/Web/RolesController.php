<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ManageRole;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function ViewRoles()
    {
        $role = ManageRole::all();
        return view('Roles.roles', compact('role'));
    }

    function activeRoles($id)
    {
        $roles = ManageRole::find($id);
        if ($roles) {
            if ($roles->status == 'active') {
                $roles->status = 'inactive';
                if ($roles->save()) {
                    return redirect('roles');
                } else {
                    return "Operation Failed!.";
                }
            } else {
                $roles->status = 'active';
                if ($roles->save()) {
                    return redirect('roles');
                } else {
                    return "Operation failed";
                }
            }
        } else {
            return "Opertaion Failed!.";
        }
    }

    public function viewAddRoles()
    {

        return view('Roles.addroles');
    }

    function storeroles(Request $req)
    {
        $role = new ManageRole();
 
        $role->role_name = $req->input('role_name');
        $role->status = $req->input('status');

        if ($role->save()) {
            return redirect('/roles');
        } else {
            return "Operation Failed!";
        }
    }

    public function deleteroles($id)
    {
        try {
            ManageRole::where('id', $id)->delete();
            return redirect('/roles')->with('success', 'Role Deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/roles')->with('fail', $e->getMessage());
        }
    }

    public function ViewEditRoles($id)
    {
        $role = ManageRole::find($id);
        return view('Roles.vieweditroles', compact('role'));
    }

    function EditRoles(Request $req, $id)
    {
        $role = ManageRole::find($id);

        $role->role_name = $req->input('role_name');
        $role->status = $req->input('status');

        if ($role->save()) {
            return redirect('/roles');
        } else {
            return "Operation Failed";
        }
    }
}
