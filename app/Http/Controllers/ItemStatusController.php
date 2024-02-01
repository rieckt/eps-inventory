<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemStatus;
use App\Http\Requests\UpdateItemStatusRequest;
use App\Http\Requests\StoreItemStatusRequest;

use App\Models\Room;
use App\Models\Teacher;
use App\Models\Status;
use App\Models\Inventory;

class ItemStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ItemStatus $itemStatus)
    {
        $search = $request->get('search');
        $itemStatus = ItemStatus::with(['room', 'teacher', 'status', 'inventory'])
            ->when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%");
            })->paginate();

        return view('itemStatus.index', compact('itemStatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ItemStatus $itemStatus)
    {
        $rooms = $this->getRooms();
        $teachers = $this->getTeachers();
        $status = $this->getStatus();
        $inventory = $this->getInventory();
        return view('itemStatus.create', compact('itemStatus', 'rooms', 'teachers', 'status', 'inventory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemStatusRequest $request, ItemStatus $itemStatus)
    {
        $itemStatus = $itemStatus->create($request->validated());
        return redirect()->route('itemStatus.show', $itemStatus);
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemStatus $itemStatus)
    {
        return view('itemStatus.show', compact('itemStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemStatus $itemStatus)
    {
        $rooms = $this->getRooms();
        $teachers = $this->getTeachers();
        $status = $this->getStatus();
        $inventory = $this->getInventory();
        return view('itemStatus.edit', compact('itemStatus', 'rooms', 'teachers', 'status', 'inventory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemStatusRequest $request, ItemStatus $itemStatus)
    {
        $itemStatus->update($request->validated());
        return redirect()->route('itemStatus.show', $itemStatus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemStatus $itemStatus)
    {
        $itemStatus->delete();
        return redirect()->route('itemStatus.index');
    }

    private function getRooms()
    {
        return Room::select('id', 'name')
            ->get()
            ->map(function ($room) {
                return ['value' => $room->id, 'label' => $room->name];
            })
            ->toArray();
    }

    private function getTeachers()
    {
        return Teacher::select('id', 'name')
            ->get()
            ->map(function ($teacher) {
                return ['value' => $teacher->id, 'label' => $teacher->name];
            })
            ->toArray();
    }

    private function getStatus()
    {
        return Status::select('id', 'name')
            ->get()
            ->map(function ($status) {
                return ['value' => $status->id, 'label' => $status->name];
            })
            ->toArray();
    }

    private function getInventory()
    {
        return Inventory::select('id', 'name')
            ->get()
            ->map(function ($inventory) {
                return ['value' => $inventory->id, 'label' => $inventory->name];
            })
            ->toArray();
    }
}
