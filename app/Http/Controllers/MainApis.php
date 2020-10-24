<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class MainApis extends Controller
{
    public function show($id)
    {
        return view('vfx', ['user' => $id]);
    }

    public function live($id)
    {
        return view('vfx-stream', ['user' => $id]);
    }
}
