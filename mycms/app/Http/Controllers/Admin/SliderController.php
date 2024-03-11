<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Slider;

use Validator, Auth, Config, Str;

class SliderController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getHome(){
        $sliders = Slider::orderBy('sorder', 'Asc')->get();
        $data = ['sliders' => $sliders];
        return view('admin.slider.home', $data);

    }

    public function postSliderAdd(Request $request){
        $rules = [
            'name' => 'required',
            'img' => 'required',
            'content' => 'required',
            'sorder' => 'required',
        ];

        $messages = [
            'name.required' => 'El nombre del Slider es Requerido.',
            'img.required' => 'Seleccione una imagen para el Slider.',
            'content.required' => 'El contenido del Slider es Requerido.',
            'sorder.required' => 'Es necesario definir un orden de aparición.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')-> with('typealert', 'danger');
        else:

            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalname()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;

            $slider = new Slider;
            $slider->users_id = Auth::id();
            $slider->status = $request->input('visible');
            $slider->name = e($request->input('name'));
            $slider->file_path = date('Y-m-d');
            $slider->file_name = $filename;
            $slider->content = e($request->input('content'));
            $slider->sorder = e($request->input('sorder'));

            if($slider->save()):
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                endif;
                return back()->with('message', 'Guardado con Exito')-> with('typealert', 'success');
            endif;
        endif;
    }

    public function getSliderEdit($id){
        $slider = Slider::findOrFail($id);
        $data = ['slider' => $slider];
        return view('admin.slider.edit', $data);
    }

    public function postSliderEdit(Request $request, $id){
        $rules = [
            'name' => 'required',
            'content' => 'required',
            'sorder' => 'required',
        ];

        $messages = [
            'name.required' => 'El nombre del Slider es Requerido.',
            'content.required' => 'El contenido del Slider es Requerido.',
            'sorder.required' => 'Es necesario definir un orden de aparición.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')-> with('typealert', 'danger');
        else:
            $slider = Slider::findOrFail($id);
            $slider->status = $request->input('visible');
            $slider->name = e($request->input('name'));
            $slider->content = e($request->input('content'));
            $slider->sorder = e($request->input('sorder'));

            if($slider->save()):
                return back()->with('message', 'Guardado con Exito')-> with('typealert', 'success');
            endif;
        endif;
    }

    public function getSliderDelete($id){
        $slider = Slider::findOrFail($id);
        if($slider->delete()):
            return back()->with('message', 'El Slider fue eliminado con exito.')->with('typealert', 'success');
        endif;
    }
}
