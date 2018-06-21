<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

class mycontroller extends Controller
{
    public function Xinchao(){
    	echo "Hello world";
    }
    public function KhoaHoc($ten){
    	echo $ten;
    	return redirect()->route('route');
    }
    public function getURL(Request $request){
    	//return $request->url();
    	if($request->isMethod('get'))
    		echo "get";
    	else
    		echo "post";
    	
    }
    public function postFrom(Request $request){
    	echo $request->HoTen;
    }
// cookie

    public function setCookie(){
        $response = new Response();
        $response->withCookie('KhoaHoc','laravel',0.5);
        echo "hello";
        return $response;
    }
    public function getCookie(Request $request){
        echo "hello B";
        return $request->cookie('KhoaHoc');
    }

// upload file
    public function postFile(Request $request){
        if($request->hasFile('myFile')){
            $file = $request->file('myFile');
            if($file->getClientOriginalExtension('myFile') == 'jpg' ){
                $fileName = $file->getClientOriginalName('myFile');
                $file ->move('img','myfile.jpg');
                echo "da up file : ".$fileName;
            }
            else{
                echo "that bai roi";
            }
           
        }
        else{
            echo "that bai";
        }
    }

// json
    public function getJson(){
        $array = ['adsa'=>'adsadss','sdqywey'];
        return response()->json($array);
    }
}
