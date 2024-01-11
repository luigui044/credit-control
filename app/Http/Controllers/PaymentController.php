<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function payCredit(){
        return view('transactions.payment');
    }

}
