<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function blog()
    {
        return view('admin/blog');
    }

    public function general()
    {
        return view('admin/general');
    }

    public function drop(Request $request) {
        $ip = '';
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
            $ip=$_SERVER['REMOTE_ADDR'];
        }

        $data = ['username' => Auth::user()->name, 'ip' => $ip];

        Mail::send('emails/intruder', $data, function($message)
        {
            $message->to('support@lastalliance.eu')->subject('Кандидат за багажник');
        });
        return redirect('http://www.multi.bg/image/cache/data/products/myjka_zona/organiser%20za%20avtomobilen%20bagazhnik/organiser-za-avtomobilen-bagazhnik-1-700x700.gif');
    }
}
