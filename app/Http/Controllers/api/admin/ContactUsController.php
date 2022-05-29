<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckFormRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function delete(Request $request){
        $user=auth()->guard('api')->user();
        $item=ContactUs::find($request->id);
        $item->delete();
        return response(['status'=>true,'message'=>'Message deletion completed successfully']);
    }

    public function list()
    {
        $item=ContactUs::all();
        return response(['status'=>true,'data'=>$item]);

    }

    public function sendEmail(CheckFormRequest $request)
    {
        $user=auth()->guard('api')->user();
        $message=$request->message;
        $email=$request->email;
        $this->senEmail2($message,$email);
        return response(['status'=>true,'massage'=>'The result of checking the form was sent to the user\'s email']);
    }

}
