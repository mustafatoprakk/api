<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\CountryModel;
use Validator;

class CountryController extends Controller
{
    public function country()
    {
        return response()->json(CountryModel::get(), 200);    // eğer veri varsa çekiyorum
    }

    public function countryByID($id)     // id göre çekiyorum
    {
        $country = CountryModel::find($id);

        if (is_null($country)) {     // 'is_null' değişken atanmamış ise
            return response()->json(["message" => "Record not found"], 404);   // error
        }

        return response()->json($country, 200);
    }


    public function countrySave(Request $request)
    {

        $rules = [
            'name' => 'required|min:3',
            'iso' => 'required|min:2|max:2',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) { // eğer hata var ise

            return response()->json($validator->errors(), 400);
        }

        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }

    public function countryUpdate(Request $request, $id)
    {
        $country = CountryModel::find($id);

        if (is_null($country)) {
            return response()->json(["message" => "Record not found"], 404);
        }

        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function countryDelete(Request $request, $id)
    {
        $country = CountryModel::find($id);

        if (is_null($country)) {
            return response()->json(["message" => "Record not found"], 404);
        }

        $country->delete();
        return response()->json(null, 204);
    }
}
