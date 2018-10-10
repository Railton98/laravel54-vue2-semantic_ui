<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountriesController extends Controller
{
    private $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function index(Request $request)
    {
        $description = '';
        $column = 'description';
        $direction = 'asc';
        $per_page = 30;

        if($request->has('per_page')){
            $per_page = $request->input('per_page');
        }

        if($request->has('direction')){
            $direction = $request->input('direction');
        }

        if($request->has('column')){
            $column = $request->input('column');
        }

        $countries = $this->country->orderBy($column, $direction);

        if($request->has('description')) {
            $countries = $countries->where('description', 'LIKE', "%". $request->input('description') ."%");
            $description = $request->input('description');
        }

        $countries = $countries->paginate($per_page);

        $response = [
            'countries' => $countries,
            'params' => [
                'total' => $countries->total(),
                'per_page' => $countries->perPage(),
                'current_page' => $countries->currentPage(),
                'last_page' => $countries->lastPage(),
                'next_page_url' => $countries->nextPageUrl(),
                'prev_page_url' => $countries->previousPageUrl(),
                'direction' => $direction,
                'column' => $column
            ],
            'filters' => [
                'description' => $description
            ]
        ];

        return response()->json($response);
    }

    public function listing()
    {
        return response()->json([
            'list' => $this->country->listCountries()
        ]);
    }

}
