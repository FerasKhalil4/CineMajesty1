<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Film;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function Rate(request $request){

        $email=auth()->user()->email;
        $customer=Customer::where('email',$email)->first();
     
           $value= $request->input('rate');
         if($customer){
           $customer->update(['rate'=>$value]);
           $customer->save();
           return redirect('/')->with('success','thank you');     
         }
         else{
            return redirect('/');
         }

    }
    public function RateFilm(Request $request,$F_id){
        $film=Film::find($F_id);
        $email=auth()->user()->email;
        $customer=Customer::where('email',$email)->first()->C_id;
        $checks=Customer::join('rating','customers.C_id','=','rating.C_id')
        ->join('films','films.F_id','=','rating.F_id')
        ->first();
        
     
        if($checks){
            if($film && $email){
            $checks->rates()->updateExistingpivot($F_id,['rate_val'=>$request->input('rate')]);
            $checks->save();
            return redirect('/');
            }
        }
        else{
        if($film && $email){
            $film->rates()->attach($customer,['rate_val'=>$request->input('rate')]);
            return redirect('/')->with('thank you for rating the film');    
        }
    }
    }
    
 
   
}
