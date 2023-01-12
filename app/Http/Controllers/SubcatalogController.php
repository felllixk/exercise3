<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subcatalog\DeleteSubcatalogRequest;
use App\Http\Requests\Subcatalog\StoreSubcatalogRequest;
use App\Models\Subcatalog;
use Illuminate\Support\Str;

class SubcatalogController extends Controller
{
    public function store(StoreSubcatalogRequest $request)
    {
        $request->validated();
        $subcatalog = new Subcatalog();
        $subcatalog->name = $request->name;
        $subcatalog->slug = Str::slug($request->name);
        $subcatalog->catalog_id = $request->catalog_id;
        $subcatalog->save();
        return $subcatalog->id;
    }

    public function delete(DeleteSubcatalogRequest $request)
    {
        $request->validated();
        return Subcatalog::destroy($request->id);
    }
}
