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
        //check user status
        $d = file_get_contents("http://192.168.43.161/lv.php?t=s&cmd=get&id=" . $id);
        $d = json_decode($d, true);
        if ($d && $d['status'] === true) {
            return view('vfx-stream', ['data' => $d]);
        } else {
            return redirect("404");
        }
    }
}
