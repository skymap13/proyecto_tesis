<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getUsers($status){
        if($status == 'all'):
            $users = User::orderBy('id', 'Desc')->paginate(25);
        else:
            $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(25);
        endif;
        $data = ['users' => $users];
        return view('admin.users.home', $data);
    }

    public function getUsersEdit($id){
        $u = User::findOrFail($id);
        $data = ['u' => $u];
        return view('admin.users.user_edit', $data);
    }

    public function postUsersEdit(Request $request, $id){
        $u = User::findOrFail($id);
        $u->role = $request->input('user_type');
        if($request->input('user_type') == "1"):
            if(is_null($u->permissions)):
                $permissions = [ 
                    'dashboard' => true
                ];
                $permissions = json_encode($permissions);
                $u->permissions = $permissions;
            endif;
        else:
            $u->permissions = null;
        endif;
        if($u->save()):
            if($request->input('user_type') == '1'):
                return redirect('/admin/user/'.$u->id.'/permissions')->with('message', 'El rango del usuario, se actualizo con Exito.')->with('typealert', 'success');
            else:
                return back()->with('message', 'El rango del usuario, se actualizo con Exito.')->with('typealert', 'success');
            endif;
        endif;
    }


    public function getUsersBanned($id){
        $u = User::findOrFail($id);
        if($u->status == "100"):
            $u->status = "0";
            $msg = "Usuario Activo con Exito";
        else:
            $u->status = "100";
            $msg = "Usuario Suspendido con Exito";
        endif;

        if($u->save()):
            return back()->with('message', $msg)-> with('typealert', 'success');
        endif; 
    }

    public function getUsersPermissions($id){
        $u = User::findOrFail($id);
        $data = ['u' => $u];
        return view('admin.users.user_permissions', $data);
    }

    public function postUsersPermissions(Request $request, $id){
        $u = User::findOrFail($id);
        $u->permissions = $request->except(['_token']);
        if($u->save()):
            return back()->with('message', 'Los permisos de Usuario fueron acualizados  con exito')-> with('typealert', 'success');
        else:
            return back()->with('message', 'Hubo un problema al actualizar los permisos de usuario')->with('typealert', 'danger');
        endif;
    }


}
