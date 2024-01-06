<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Film;

class CommentingController extends Controller
{
    public function store_comment(request $request,$F_id){
        if(auth()->user()){
        if ($request->input()){
            $email = auth()->user()->email;
           
            $C_id = Customer::where('email', $email)->first()->C_id;
            $comment=$request->input('comment');
            $film=Film::find($F_id);
            if($C_id && $film){
                $film->comments()->attach($C_id,['comment'=>$comment]);
                 return redirect('/');         
            }
        }
    }
        else{
            return redirect('login');
        }
    }

}
