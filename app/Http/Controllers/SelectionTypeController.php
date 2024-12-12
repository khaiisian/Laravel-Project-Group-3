<?php

namespace App\Http\Controllers;

use App\Models\SelectionType;
use App\Http\Requests\StoreSelectionTypeRequest;
use App\Http\Requests\UpdateSelectionTypeRequest;
use Illuminate\Http\Request;

class SelectionTypeController extends Controller
{
    public function show(){
        $types= SelectionType::all();
        return view('admin.selection-type', compact('types'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        SelectionType::updateOrCreate(
            ['id' => $request->id],
            ['name' => $request->name]
        );

        return redirect()->back()->with('success', 'Selection Types saved successfully.');
    }
    public function destroy($id)
    {
        $types = SelectionType::findOrFail($id);
        $types->delete();

        return redirect()->back()->with('success', 'Selection Types deleted successfully.');
    }
}
