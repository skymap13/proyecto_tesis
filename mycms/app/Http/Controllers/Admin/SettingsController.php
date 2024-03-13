<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;

class SettingsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getHome(){
        return view('admin.settings.settings');
    } 

    public function postHome(Request $request){
        $rules = [
            'name' => 'required',
            'currency' => 'required',
            'company_phone' => 'required',
            'map' => 'required',
            'products_per_page' => 'required|integer|min:1',
            'products_per_page_random' => 'required|integer|min:1',
        ];

        $messages = [
            'name.required' => 'El nombre es requerido.',
            'currency.required' => 'La moneda es requerida.',
            'company_phone.required' => 'El teléfono de la empresa es requerido.',
            'map.required' => 'La ubicación en el mapa es requerida.',
            'maintenance_mode.required' => 'El modo de mantenimiento es requerido.',
            'products_per_page.required' => 'El número de productos por página es requerido.',
            'products_per_page.min' => 'El número de productos por página debe ser mayor o igual que 1.',
            'products_per_page_random.required' => 'El número de productos aleatorios por página es requerido.',
            'products_per_page_random.min' => 'El número de productos aleatorios por página debe ser mayor o igual que 1.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
            if(!file_exists(config_path().'//mycms.php')):
                fopen(config_path().'/mycms.php', 'w');
            endif;
            $file = fopen(config_path().'/mycms.php', 'w');
            fwrite($file, '<?php'.PHP_EOL);
            fwrite($file, 'return['.PHP_EOL);
            foreach($request->except(['_token']) as $key => $value):
                if(is_null($value)):
                    fwrite($file, '\''.$key.'\' => \'\',' .PHP_EOL);
                else:
                    fwrite($file, '\''.$key.'\' => \''.addslashes($value).'\',' .PHP_EOL);
                endif;
            endforeach;
            fwrite($file, ']'.PHP_EOL);
            fwrite($file, '?>'.PHP_EOL);
            fclose($file);
            return back()->with('message', 'Las configuraciones fueron guardadas con exito.')->with('typealert', 'success');

        endif;
    }
}
