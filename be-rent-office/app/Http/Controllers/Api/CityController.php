<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::withCount('officeSpaces')->get();

        return CityResource::collection($cities);    
    }

    public function show(City $city) // konsep model Binding, model city akan mengecek variable $city (misal medan) apakah ada pada database, jika tidak maka not found (404)
    {
        $city->load(['officeSpaces.city', 'officeSpaces.photos']);
        $city->loadCount('officeSpaces');

        return new CityResource($city);
    }
}
