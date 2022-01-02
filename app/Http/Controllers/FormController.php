<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\RateLimiter;

use Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\App\Models\User;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function store(Request $request){
        $data = $request->only('title', 'body', 'file', 'user_id');
        $form = Form::create([
            "title" => $data["title"],
            "body" => $data["body"],
            //"file" => $data["file"],

            "user_id" => Auth::user()->id,
        ]);
        if($request->file('file')){
            $file = $request->file('file')->store('uploads', 'public');
        }




        if($form){
            return view('success');
        }

    }

    public function status(Request $request){

        $form = Form::find($request->id);
        if($form->status == 1){
            $form->status = 0;
        }
        else if($form->status == 0){
            $form->status = 1;
        }

        $form->update();

        return redirect()->back();

    }


}
