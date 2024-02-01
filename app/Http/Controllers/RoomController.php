<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Traits\FetchesModels;

class RoomController extends Controller
{
    use Searchable;
    use FetchesModels;

    public function index(Room $room, Request $request)
    {
        $room = Room::when($request->get('search'), function ($query, $search) {
            return $this->applySearch($query, $search, 'name');
        })->paginate();

        return view('room.index', compact('room'));
    }
    public function create(Room $room)
    {
        $floors = $this->getModels(Floor::class, [
            'labelField' => 'name',
        ]);
        return view('room.create', compact('room', 'floors'));
    }

    public function store(StoreRoomRequest $request, Room $room)
    {
        $room = $room->create($request->validated());
        return redirect()->route('room.show', $room);
    }

    public function show(Room $room)
    {
        return view('room.show', compact('room'));
    }

    public function edit(Room $room)
    {
        $floors = $this->getModels(Floor::class, [
            'labelField' => 'name',
        ]);
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
}
