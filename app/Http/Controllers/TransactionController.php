<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller {
    public function show() {
        $transactions = Transaction::all();
        return view('admin.transactions', compact('transactions'));
    }
}


