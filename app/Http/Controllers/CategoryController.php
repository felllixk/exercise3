<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function store(StoreCategoryRequest $request)
    {
        $request->validated();
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->subcatalog_id = $request->subcatalog_id;
        $category->save();
        return $category->id;
    }

    public function delete(DeleteCategoryRequest $request)
    {
        $request->validated();
        return Category::destroy($request->id);
    }
}
