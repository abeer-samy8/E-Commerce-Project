<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    function index(){
        return view('admin.home.index');
    }
    function noPermission(){
        Alert::error('Sorry, you do not have validity on the requested link.', 'Error Message');
        session()->flash('msg','e:Sorry, you do not have validity on the requested link.');
        return view("admin.home.index");
    }
}
