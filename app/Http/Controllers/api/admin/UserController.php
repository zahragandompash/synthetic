<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsereditRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(UserRequest $request){
        $item=new User();
        $item->name=$request->name;
        $item->email=$request->email;
        $item->type=$request->type;
        $item->save();
        return \Response(['status' => true, "message" => "User registration completed successfully"]);
    }

    public function edit(UsereditRequest $request)
    {
        $item=User::find($request->user_id);
        $item->name=$request->name;
        $item->email=$request->email;
        $item->type=$request->type;
        $item->save();
        return \Response(['status' => true, "message" => "User editing completed successfully"]);
    }

    public function delete(Request $request)
    {
        $item=User::find($request->user_id);
        $item->delete();
        return \Response(['status' => true, "message" => "User deleting completed successfully"]);
    }

    public function list()
    {
        $item=User::all();
        return \Response(['status' => true, "data" =>$item]);
    }

    public function getToken(Request $request)
    {
        $token = rand(1000, 9999);
        if ($request->email) {
            $user = User::where("email", $request->email)->first();
            if (!$user) {
                return \Response([
                    "email_found" =>"No user found with this email"],422);
            }
            $this->senEmail($request->email, $token);
        }
        $user->password = $token;
        $user->save();
        return \Response(['status' => true,'type'=>$user->type ,"message" => "The Verification Code Was Succsecfully Sent To Your Email Address.If you do not receive an email, please check your Junk & Spam. "]);

    }
}
