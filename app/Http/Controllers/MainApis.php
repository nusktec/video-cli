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

    public function live($id, $cID)
    {
        //check user status
        $d = file_get_contents("https://superadmin.schooltry.one/lv/s/get/" . $id);
        $d = json_decode($d, true);
        if ($d && $d['status'] === true) {
            return view('vfx-stream', ['data' => $d, 'cid' => $cID]);
        } else {
            return redirect("404");
        }
    }

    public function live_teacher($id, $cID)
    {
        //check user status
        $d = file_get_contents("https://superadmin.schooltry.one/lv/t/get/" . $id);
        $d = json_decode($d, true);
        if ($d && $d['status'] === true) {
            return view('vfx-stream', ['data' => $d, 'cid' => $cID]);
        } else {
            return redirect("404");
        }
    }
}
