<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view ('admin.index');
    }
    public function addNews(){
        return view ('admin.addNews');
    }
    public function deleteNews(){
        return view ('admin.deleteNews');
    }
}
