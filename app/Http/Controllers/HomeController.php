<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Service;



class HomeController extends Controller
{
    function index(){

        $homeSliders = Slider::where('active','1')->orderBy('id','desc')->take(4)->get();

        return view('home.index',compact('homeSliders'));
    }

public function services()
{
    $services = Service::where('active','1')->orderBy('id','desc')->paginate(12);
    return view('home.services',compact('services'));
}
}
