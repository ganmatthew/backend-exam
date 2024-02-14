<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller {

    public function index(Request $request) {
        $categories = Item::query();

        if ($request -> has('name')) {
            $categories -> where('name', 'like', '%'.$request -> input('name').'%');
        }

        if ($request -> has('description')) {
            $categories -> where('description', 'like', '%'.$request -> input('description').'%');
        }

        if ($request -> has('price')) {
            $categories -> where('price', 'like', '%'.$request -> input('price').'%');
        }

        if ($request -> has('quantity')) {
            $categories -> where('quantity', 'like', '%'.$request -> input('quantity').'%');
        }

        if ($request -> has('category_id')) {
            $categories -> where('category_id', 'like', '%'.$request -> input('category_id').'%');
        }
        
        return response() -> json($categories -> get());
    }

    public function show($id) {
        $item = Item::findOrFail($id);
        return response() -> json($item);
    }

    public function store(Request $request) {
        $item = Item::create($request -> all());
        return response() -> json($item, 201);
    }

    public function update(Request $request, $id) {
        $item = Item::findOrFail($id);
        $item -> update($request -> all());
        return response() -> json($item, 200);
    }

    public function destroy($id) {
        Item::findOrFail($id) -> delete();
        return response() -> json(null, 204);
    }
}
