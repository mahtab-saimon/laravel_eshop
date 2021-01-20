<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_Login');
    }
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $admin=DB::table('admins')
                ->where('admin_email', $admin_email)
                ->where('admin_password', $admin_password)
                ->first();
        //$admin=Admin::all()->where('admin_email',$admin_email)->where('admin_password',$admin_password);
          if ($admin){
              $request->session()->put('admin_name',$admin->admin_name);
              $request->session()->put('admin_id',$admin->id);
              return redirect('dashboard');
             // return redirect()->route('admin.dashboard');
          } else{
              $request->session()->put('messege','Email and password Invalid');
              return redirect('/admin');

          }


        //return view('admin.dashboard');
    }
}
