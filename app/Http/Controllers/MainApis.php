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
        $d = file_get_contents("https://superadmin.schooltry.xyz/lv/s/get/" . $id);
        $d = json_decode($d, true);
        if ($d && $d['status'] === true) {
            $d = $d['data'];
            return view('vfx-stream', ['data' => $d, 'cid' => $cID, 'isAdmin' => false, 'user'=>array('name'=>$d['name'], 'isAdmin'=>false, 'classID'=>$cID)]);
        } else {
            return redirect("404");
        }
    }

    public function live_teacher($id, $cID)
    {
        //check user status
        $d = file_get_contents("https://superadmin.schooltry.xyz/lv/t/get/" . $id);
        $d = json_decode($d, true);
        if ($d && $d['status'] === true) {
            $d = $d['data'];
            return view('vfx-stream', ['data' => $d, 'cid' => $cID, 'isAdmin' => true, 'user'=>array('name'=>$d['name'], 'isAdmin'=>true, 'classID'=>$cID)]);
        } else {
            return redirect("404");
        }
    }
}
