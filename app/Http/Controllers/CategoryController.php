<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller {

    public function index(Request $request) {
        $categories = Category::query();

        if ($request -> has('name')) {
            $categories -> where('name', 'like', '%'.$request -> input('name').'%');
        }
        
        if ($request -> has('description')) {
            $categories -> where('description', 'like', '%'.$request -> input('description').'%');
        }
        return response() -> json($categories -> get());
    }

    public function show($id) {
        $category = Category::findOrFail($id);
        return response() -> json($category);
    }

    public function store(Request $request) {
        $category = Category::create($request -> all());
        return response() -> json($category, 201);
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category -> update($request -> all());
        return response() -> json($category, 200);
    }

    public function destroy($id) {
        Category::findOrFail($id) -> delete();
        return response() -> json(null, 204);
    }
}
