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
        return view('floor.index', compact('floors'));
    }

    public function create()
    {
        return view('floor.create');
    }

    public function store(StoreFloorRequest $request)
    {
        $floor = Floor::create($request->validated());
        return redirect()->route('floor.index');
    }

    public function show(Floor $floor)
    {
        $floor->load('rooms');
        return view('floor.show', compact('floor'));
    }

    public function edit(Floor $floor)
    {
        return view('floor.edit', compact('floor'));
    }

    public function update(UpdateFloorRequest $request, Floor $floor)
    {
        $floor->update($request->validated());
        return redirect()->route('floor.index');
    }

    public function destroy(Floor $floor)
    {
        $floor->delete();
        return redirect()->route('floor.index');
    }
}
