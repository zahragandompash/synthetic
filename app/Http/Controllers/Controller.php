<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function makeEnglishNumber ($string) {
        $string = str_replace("۰", 0, $string);
        $string = str_replace("۱", 1, $string);
        $string = str_replace("۲", 2, $string);
        $string = str_replace("۳", 3, $string);
        $string = str_replace("۴", 4, $string);
        $string = str_replace("۵", 5, $string);
        $string = str_replace("۶", 6, $string);
        $string = str_replace("۷", 7, $string);
        $string = str_replace("۸", 8, $string);
        $string = str_replace("۹", 9, $string);
        return $string;
    }

    public function senEmail($email, $token){
        $headers = 'From:no-reply@Synthetic-Solutions';
        $to_email = $email;
        $subject = 'Synthetic Solutions';
        $message = 'Synthetic Solutions verify Code : ' . $token;
        Mail($to_email, $subject, $message, $headers);
    }
    public function uploadFile($file, $basePath){
        $basePath = $basePath."/";
        $filename =time().".".$file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($basePath,$file,$filename);
        return ['path' => 'storage/'.$basePath.$filename, 'name' => $filename];

    }
    public function senEmail2($message,$email){
        $headers = 'From:no-reply@synthetic-solutions';
        $to_email =$email;
        $subject = 'synthetic-solutions';
        Mail($to_email, $subject, $message, $headers);
    }
}
