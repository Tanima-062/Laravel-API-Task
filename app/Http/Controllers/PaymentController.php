<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function save(Request $request)
    {
        $status = $this->getMockResponse($request);

        $transaction_id = time().uniqid(mt_rand(),true);

        $payment = new Payment();
        $payment->user_id = 1;
        $payment->transaction_id = $transaction_id;
        $payment->amount = $request->amount;
        $payment->status = $status;
        $payment->save();

        return response(['message' => 'Data has been stored successfully'])->header('Cache-Control', 'nocache, no-store');
        

    }

    public function getMockResponse(Request $request){
        $request->headers->set('X-Mock-Status', true);
        if($request->header('X-Mock-Status')){
            return $request->header('X-Mock-Status') == true ? 'accepted' : 'failed';
        }
    }

    public function update(Request $request){
        Payment::where(['transaction_id' => $request->transaction_id, 'user_id' => 1])->update(['status'=>$request->status]);
         return response(['message' => 'Data has been updated successfully']);
    }
}
