<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class superAdminController extends Controller
{
    public function index(){
        $this->adminAuth();
        return view('admin.dashboard');
    }
    public function logout(){
        Session::flush();
        return redirect('/admin');
    }
    public function adminAuth(){
        $admin_id=Session::get('id');
        if ($admin_id){
            return;
        }else{
            return redirect('/admin');
        }
    }
}

