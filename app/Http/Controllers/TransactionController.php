<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller {
    public function show() {
        $transactions = Transaction::all();
        return view('admin.transactions', compact('transactions'));
    }
}