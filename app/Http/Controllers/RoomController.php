<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('floor')->paginate();
        return view('room.index', compact('rooms'));
    }
    public function create(Room $room)
    {
        $floors = $this->getFloors();
        return view('room.create', compact('room', 'floors'));
    }

    public function store(StoreRoomRequest $request)
    {
        $room = Room::create($request->validated());
        return redirect()->route('room.show', $room);
    }

    public function show(Room $room)
    {
        return view('room.show', compact('room'));
    }

    public function edit(Room $room)
    {
        $floors = $this->getFloors();
        return view('room.edit', compact('room', 'floors'));
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room->update($request->validated());
        return redirect()->route('room.show', $room);
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('room.index');
    }

    private function getFloors()
    {
        return Floor::all()->map(function ($floor) {
            return ['value' => $floor->id, 'label' => $floor->name];
        })->toArray();
    }
}
