<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use App\Http\Requests\UpdateFloorRequest;

class FloorController extends Controller
{

    public function index(Floor $floor)
    {
        $floors = Floor::paginate();
        return view('floor.index', compact('floors'));
    }

    public function create(Floor $floor)
    {
        return view('floor.create', compact('floor'));
    }

    public function store(UpdateFloorRequest $request)
    {
        $floor = Floor::create($request->validated());
        return redirect()->route('floor.show', $floor);
    }

    public function show(Floor $floor, Room $room)
    {
        $roomsOnSameFloor = Room::where('floor_id', $floor->id)->get();
        return view('floor.show', compact('floor', 'roomsOnSameFloor'));
    }

    public function edit(Floor $floor)
    {
        return view('floor.edit', compact('floor'));
    }

    function update(UpdateFloorRequest $request, Floor $floor)
    {
        $floor->update($request->validated());
        return redirect()->route('floor.show', $floor);
    }

    function destroy(Floor $floor)
    {
        $floor->delete();
        return redirect()->route('floor.index');
    }
}
