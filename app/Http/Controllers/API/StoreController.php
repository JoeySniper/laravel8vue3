<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    //
    public function index(){
        $store = Store::orderBy('created_at','desc')->get();

        return $store;
    }

    public function add(Request $request){

        try {

            // if($request->file(`file`)){
            //     $upload_path = `assets/images`;
            //     $generated_new_name = time() . '.' . $request->file->getClientOriginalExtension();
            //     $image = $request->file('file');
            //     $img = Image::make($image->getRealPath());
            //     $img->resize(800, null, function ($constraint){
            //         $constraint->aspectRatio();
            //     });
            //     $img->save($upload_path.'/'.$generated_new_name);
            // }else{$generated_new_name='';}


            $store = new Store();
            $store->name = $request->name;
            // $store->images = $generated_new_name;
            $store->amount = $request->amount;
            $store->price_buy = $request->price_buy;
            $store->price_sell = $request->price_sell;
            $store->save();

            $success = true;
            $message = 'add success';
        } catch (\Throwable $th) {
            $success = false;
            $message = $th->getMessage();
            //throw $th;
        }

        //response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
}
