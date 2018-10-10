<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StatesController extends Controller
{
    private $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function index(Request $request)
    {
        $description = $initials = '';
        $column = 'description';
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

        $states = $this->state->orderBy($column, $direction);

        if($request->has('description')) {
            $states = $states->where('description', 'LIKE', "%". $request->input('description') ."%");
            $description = $request->input('description');
        }

        if($request->has('initials')) {
            $states = $states->where('initials', 'LIKE', "%". $request->input('initials') ."%");
            $initials = $request->input('initials');
        }

        $states = $states->paginate($per_page);

        $response = [
            'states' => $states,
            'params' => [
                'total' => $states->total(),
                'per_page' => $states->perPage(),
                'current_page' => $states->currentPage(),
                'last_page' => $states->lastPage(),
                'next_page_url' => $states->nextPageUrl(),
                'prev_page_url' => $states->previousPageUrl(),
                'direction' => $direction,
                'column' => $column
            ],
            'filters' => [
                'description' => $description,
                'initials' => $initials
            ]
        ];

        return response()->json($response);
    }

    public function listing()
    {
        return response()->json([
            'list' => $this->state->listStates()
        ]);
    }
}
