<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Auth::user()->transaction;

        return view('transaction.view', [
            "transactions" => $transactions,
        ]);
    }
}
