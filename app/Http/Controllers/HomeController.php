<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tiket;
use App\Models\Wisata;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = auth()->user();
        if ($auth->hasRole('admin')) {
        $data = Wisata::all();
            return view('admin.wisata.index',compact('data'));
        } elseif ($auth->hasRole('user')) {
        $data = Wisata::all();
        $name = Auth::user()->name;
        $data1 = Tiket::where('nama_pemesan','=',$name)->get();
            return view('welcome',compact('data','data1'));
        }
    }
}
