<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
    public function forms()
    {
       $forms = Form::with('users')->get();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        $forms = Form::with('user')->get();

        if(Auth::user()->role == 'user') {


            return view('user', ['forms'=>$forms]);
        }
        elseif (Auth::user()->role == 'admin'){
            return view('admin', [
                "forms" =>$forms,

            ]);
        }
        else return abort(404);
    }

}
