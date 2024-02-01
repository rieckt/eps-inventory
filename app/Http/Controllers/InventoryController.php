<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\UpdateInventoryRequest;
use App\Http\Requests\StoreInventoryRequest;
use App\Models\Room;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Traits\Searchable;
use App\Traits\FetchesModels;

class InventoryController extends Controller
{
    use Searchable;
    use FetchesModels;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $inventory = Inventory::with(['room', 'category'])
            ->when($request->get('search'), function ($query, $search) {
                return $this->applySearch($query, $search, 'name');
            })->paginate();
        return view('inventory.index', compact('inventory'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Inventory $inventory)
    {
        $rooms = $this->getModels(Room::class);
        $categories = $this->getModels(Category::class);
        return view('inventory.create', compact('rooms', 'categories', 'inventory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventoryRequest $request)
    {
        $inventory = Inventory::create($request->validated());
        return redirect()->route('inventory.show', $inventory);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        $inventory->load(['room', 'category']);
        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        $inventory->load(['room', 'category']);
        $rooms = $this->getModels(Room::class);
        $categories = $this->getModels(Category::class);
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
}
