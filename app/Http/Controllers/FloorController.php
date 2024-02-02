<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Http\Requests\UpdateFloorRequest;
use App\Http\Requests\StoreFloorRequest;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Traits\FetchesModels;

class FloorController extends Controller
{
    use Searchable;
    use FetchesModels;

    public function index(Request $request)
    {
        $floors = Floor::when($request->get('search'), function ($query, $search) {
            return $this->applySearch($query, $search, 'name');
        })->paginate();

        return view('floor.index', ['floors' => $floors]);
    }

    public function create(Floor $floor)
    {
        return view('floor.create', ['floor' => $floor]);
    }

    public function store(StoreFloorRequest $request)
    {
        Floor::create($request->validated());

        return redirect()->route('floor.index')->with('success', 'Floor created successfully.');
    }
    public function show(Floor $floor)
    {
        $floor->load('rooms');

        return view('floor.show', ['floor' => $floor]);
    }

    public function edit(Floor $floor)
    {
        return view('floor.edit', ['floor' => $floor]);
    }

    public function update(UpdateFloorRequest $request, Floor $floor)
    {
        $floor->update($request->validated());

        return redirect()->route('floor.index')->with('success', 'Floor updated successfully.');
    }

    public function destroy(Floor $floor)
    {
        $floor->delete();

        return redirect()->route('floor.index')->with('success', 'Floor deleted successfully.');
    }
}
