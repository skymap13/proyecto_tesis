<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Image, Auth, Config, Str, Hash;
use App\User;

class UserController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
    }
    public function getAccountEdit(){
        $birthday = (is_null(Auth::user()->birthday)) ? [null,null,null] : explode('-', Auth::user()->birthday);
        $data = ['birthday' => $birthday];
        return view('user.account_edit', $data);
    }
    public function postAccountAvatar(Request $request){
        $rules = [
            'avatar' => 'required'
        ];

        $masseges = [
            'avatar.required' => 'Seleccione una Imagen',
        ];

        $validator = Validator::make($request->all(), $rules, $masseges);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')-> with('typealert', 'danger')->withInput();
        else:
            if($request->hasFile('avatar')):
                $path = '/'.Auth::id();
                $fileExt = trim($request->file('avatar')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads_user.root');
                $name = Str::slug(str_replace($fileExt, '', $request->file('avatar')->getClientOriginalname()));

                $filename = rand(1,999).'_'.$name.'.'.$fileExt;
                $file_file = $upload_path.'/'.$path.'/'.$filename;

                $u = User::find(Auth::id());
                $aa = $u->avatar;
                $u->avatar = $filename;

                if($u->save()):
                    if($request->hasFile('avatar')):
                        $fl = $request->avatar->storeAs($path, $filename, 'uploads_user');
                        $img = Image::make($file_file);
                        $img->fit(256, 256, function($constraint){
                            $constraint->upsize();
                        });
                        $img->save($upload_path.'/'.$path.'/av_'.$filename);
                    endif;
                    unlink($upload_path.'/'.$path.'/'.$aa);
                    unlink($upload_path.'/'.$path.'/av_'.$aa);                    
                    return back()->with('message', 'Avatar actualizado con Exito')-> with('typealert', 'success');
                endif;
            endif;
        endif;
    }

    public function postAccountPassword(Request $request){
        //dd($request->all()); //revisar cosas varias formulario

        $rules = [
            'apassword' => 'required|min:8',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password'
        ];

        $messages = [
            'apassword.required' => 'Escriba su contraseña actual',
            'apassword.min' => 'La contraseña actual debe tener al menos 8 caracteres',
            'password.required' => 'Escriba su nueva contraseña',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres',
            'cpassword.required' => 'Confirmar la nueva contraseña',
            'cpassword.min' => 'La nueva contraseña debe tener al menos 8 caracteres',
            'cpassword.same' => 'Las contraseñas no coinciden'
        ];

        $validator = Validator::make($request->all(), $rules, $messages );
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')-> with('typealert', 'danger')->withInput();
        else:
            $u = User::findOrFail(Auth::id());
            if(Hash::check($request->input('apassword'), $u->password)):
                $u->password = Hash::make($request->input('password'));
                if($u->save()):
                    return back()->with('message', 'La contraseña fue cambiada con exito.')-> with('typealert', 'success');
                endif;
            else:
                return back()->with('message', 'Su contraseña actual es erronea.')-> with('typealert', 'danger');
            endif;
        endif;
    }
    public function postAccountInfo(Request $request){
        //dd($request->all()); //revisar cosas varias formulario

        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|min:10',
            'year' => 'required',
            'day' => 'required'
        ];

        $messages = [
            'name.required' => 'Su Nombre es requerido',
            'lastname.required' => 'Su Apelllido es requerido',
            'phone.required' => 'Su numero de telefono es requerido',
            'phone.min' => 'El numero de telefono es requerido',
            'year.required' => 'Su año de nacimeinto es requerido',
            'day.required' => 'Su dia de nacimeinto es requerido'
        ];

        $validator = Validator::make($request->all(), $rules, $messages );
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')-> with('typealert', 'danger')->withInput();
        else:
            $date = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
            $u = User::findOrFail(Auth::id());
            $u->name = e($request->input('name'));
            $u->lastname = e($request->input('lastname'));
            $u->phone = e($request->input('phone'));
            $u->birthday = date("Y-m-d", strtotime($date));
            $u->gender = e($request->input('gender'));
            if($u->save()):
                return back()->with('message', 'Su informacion se actualizo con Exito.')-> with('typealert', 'success');
            endif;
        endif;
    }
} 
