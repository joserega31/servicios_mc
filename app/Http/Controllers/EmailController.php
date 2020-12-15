<?php

namespace App\Http\Controllers;

use App\Models\comercio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function contact(Request $request, $id){
        $comercio = comercio::find($id);
        $subject = "Informacion del Comercio" + $comercio;
        $for = "joserega31@gmail.com";
        Mail::send('email',$request->all(), function($msj) use($subject,$for){
            $msj->from("joserega31@gmail.com","Comercio");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back();
    }
}
