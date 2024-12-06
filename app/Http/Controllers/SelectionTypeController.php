<?php

namespace App\Http\Controllers;

use App\Models\SelectionType;
use App\Http\Requests\StoreSelectionTypeRequest;
use App\Http\Requests\UpdateSelectionTypeRequest;

class SelectionTypeController extends Controller
{
    public function show(){
        $selectionTypes = SelectionType::all();
        return view('admin.selection', compact('selectionTypes'));
    }
}
