<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\UpdateInventoryRequest;
use App\Http\Requests\StoreInventoryRequest;
use App\Models\Room;
use App\Models\Category;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Inventory $inventory)
    {
        $inventory = Inventory::all();
        return view('inventory.index', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Inventory $inventory)
    {
        $rooms = $this->getRooms();
        $categories = $this->getCategories();
        return view('inventory.create', compact('rooms', 'categories', 'inventory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateInventoryRequest $request)
    {
        $inventory = Inventory::create($request->validated());
        return redirect()->route('inventory.show', $inventory);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        $rooms = $this->getRooms();
        $categories = $this->getCategories();
        return view('inventory.edit', compact('inventory', 'rooms', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    function update(UpdateInventoryRequest $request, Inventory $inventory)
    {
        $inventory->update($request->validated());
        return redirect()->route('inventory.show', $inventory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index');
    }

    private function getRooms()
    {
        return Room::all()->map(function ($room) {
            return ['value' => $room->id, 'label' => $room->name];
        })->toArray();
    }

    private function getCategories()
    {
        return Category::all()->map(function ($category) {
            return ['value' => $category->id, 'label' => $category->name];
        })->toArray();
    }
}
