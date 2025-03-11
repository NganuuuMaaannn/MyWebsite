<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Item::create(['name' => $request->name]);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $item = Item::findOrFail($id);
        $item->update(['name' => $request->name]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Item::destroy($id);
        return redirect()->back();
    }
}
