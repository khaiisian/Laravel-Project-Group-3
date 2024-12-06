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
=======
class TransactionController extends Controller
{
    
}
>>>>>>> 34fed74c39f409fba637f1caf480e5faa4ec3411
