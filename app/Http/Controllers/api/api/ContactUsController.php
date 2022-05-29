<?php

namespace App\Http\Controllers\api\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function add(ContactUsRequest $request){
        $item=new ContactUs();
        $item->name=$request->name;
        $item->email=$request->email;
        $item->message=$request->message;
        $item->save();
        return response(['status'=>true,'message'=>'Your message has been successfully sent. The admin will then review your answer']);
    }

}
