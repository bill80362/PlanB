<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
{

    public function list()
    {
        return view("operate/pages/template/list");
    }

    public function detail()
    {
        return view("operate/pages/template/detail");
    }
}
