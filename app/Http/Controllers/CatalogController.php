<?php

namespace App\Http\Controllers;

use App\Http\Requests\Catalog\DeleteCatalogRequest;
use App\Http\Requests\Catalog\StoreCatalogRequest;
use App\Models\Catalog;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
    public function store(StoreCatalogRequest $request)
    {
        $request->validated();
        $catalog = new Catalog();
        $catalog->name = $request->name;
        $catalog->slug = Str::slug($request->name);
        $catalog->save();
        return $catalog->id;
    }

    public function delete(DeleteCatalogRequest $request)
    {
        $request->validated();
        return Catalog::destroy($request->id);
    }
}
