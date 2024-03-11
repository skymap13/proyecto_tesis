<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Category, App\Http\Models\Slider;

class ContentController extends Controller
{
    public function getHome(){
        $categories = Category::all();
        $categories = Category::where('module', '0')->orderBy('name', 'Asc')->get();
        $sliders = Slider::where('status', 1)->orderBy('sorder', 'Asc')->get();
        $data = ['categories' => $categories, 'slider' => $sliders];
        return view('home', $data);
    
    }
}
