<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index($local)
    {
        session(['local' => $local]);
        return redirect()->back();
    }
}
