<?php

namespace App\Http\Controllers;

use App\Http\Requests\Characteristic\DeleteCharacteristicRequest;
use App\Http\Requests\Characteristic\StoreCharacteristicRequest;
use App\Http\Resources\CharacteristicResource;
use App\Models\Characteristic;

class CharacteristicController extends Controller
{
    public function index()
    {
        $characteristics = Characteristic::all();
        return CharacteristicResource::collection($characteristics);
    }

    public function store(StoreCharacteristicRequest $request)
    {
        $request->validated();
        $characteristic = new Characteristic();
        $characteristic->name       = $request->name;
        $characteristic->value      = $request->value;
        $characteristic->product_id = $request->product_id;
        $characteristic->save();
        return $characteristic->id;
    }

    public function delete(DeleteCharacteristicRequest $request)
    {
        $request->validated();
        return Characteristic::destroy($request->id);
    }
}
