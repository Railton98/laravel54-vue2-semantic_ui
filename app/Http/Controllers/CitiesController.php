<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CitiesController extends Controller
{
    private $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function index(Request $request)
    {
        $name = $uf = '';
        $column = 'name';
        $direction = 'asc';
        $per_page = 30;

        if($request->has('per_page')) {
            $per_page = $request->input('per_page');
        }

        if($request->has('direction')) {
            $direction = $request->input('direction');
        }

        if($request->has('column')) {
            $column = $request->input('column');
        }

        $cities = $this->city->orderBy($column, $direction);

        if($request->has('name')) {
            $cities = $cities->where('name', 'LIKE', "%". $request->input('name') ."%");
            $name = $request->input('name');
        }

        if($request->has('uf')) {
            $cities = $cities->where('uf', 'LIKE', "%". $request->input('uf') ."%");
            $uf = $request->input('uf');
        }

        $cities = $cities->paginate($per_page);

        $response = [
            'cities' => $cities,
            'params' => [
                'total' => $cities->total(),
                'per_page' => $cities->perPage(),
                'current_page' => $cities->currentPage(),
                'last_page' => $cities->lastPage(),
                'next_page_url' => $cities->nextPageUrl(),
                'prev_page_url' => $cities->previousPageUrl(),
                'direction' => $direction,
                'column' => $column
            ],
            'filters' => [
                'name' => $name,
                'uf' => $uf
            ]
        ];

        return response()->json($response);
    }

    public function listing($state_id)
    {
        return response()->json([
            'list' => $this->city->listCities($state_id)
        ]);
    }
}
