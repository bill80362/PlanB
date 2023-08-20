<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class IndexController extends \App\Http\Controllers\Controller
{
    public function indexHTML(){
        return view('admin/index', ['name' => 'Bill']);
    }
}
