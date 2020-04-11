<?php

namespace App\Http\Controllers\Admin;


use App\News;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function deleteNews()
    {
        return view('admin.deleteNews');
    }
}

