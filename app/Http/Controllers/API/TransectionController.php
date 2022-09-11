<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Store;
use App\Models\Transection;

class TransectionController extends Controller
{
    //

    public function index(){
        
    }

    public function add(Request $request){
        try {
            foreach($request->listorder as $item){
                $number = 1;

                $tran = Transection::all()->sortByDesc('id')->take(1)->toArray();
                foreach($tran as $new)
                {
                    $number = $new['tran_id'];
                }

                /// ທຳການ ນັບ id ຂອງ Transection
                if($number!=''){
                    $number1 = str_replace("INC","",$number);
                    $number2 = str_replace("EXP","",$number1);
                    $number = (int)$number2+1;
                    $length = 5; 
                    $number = substr(str_repeat(0, $length).$number, - $length);
                }

                // ກວດຊອບ ປະເພດທຸລະກຳ income = ລາຍຮັບ, expense = ລາຍຈ່າຍ
                if($request->acc_type=='income'){ $tnum = 'INC'; }
                elseif($request->acc_type=='expense'){ $tnum = 'EXP'; }

                $store = new Transection();
                $store->tran_id = $tnum.$number; /// INC00001  EXP00001
                $store->product_id = $item['id'];
                $store->tran_type = $request->acc_type;
                $store->tran_detail = $item['name'];
                $store->amount = $item['order_amount'];
                $store->price = $item['order_amount']*$item['price_sell'];
                $store->save();

                //ອັບເດດ ຕັດສະຕ໋ອກ
                $store = Store::find($item['id']);

                $store_update = Store::where('id',$item['id']);
                $store_update->update([
                    'amount' => $store->amount - $item['order_amount']
                ]);

            }

            $success = true;
            $message = 'add success!';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
}
