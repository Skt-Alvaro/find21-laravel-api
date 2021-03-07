<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::all();
        return response()->json($countries, 200);
    }

    public function store(Request $req)
    {
        return $req;
    }

    // public function store(Request $req)
    // {
    //     $country = new Country($req->input());

    //     if ($req->file('image') == null) {
    //         $req->image = "";
    //     } else {
    //         $country_file = $req->file('image')->store('public/images/countries');
    //         $url = Storage::url($country_file);
    //         $country->image = $url;
    //     }
    //     $country->save();

    //     return response()->json($country, 200);
    // }
}
