<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tree\TreeCatalogResource;
use App\Models\Catalog;

class ShopTreeController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all();
        return TreeCatalogResource::collection($catalogs);
    }
}
