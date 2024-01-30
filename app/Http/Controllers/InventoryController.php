<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Http\Requests\UpdateInventoryRequest;

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
    public function create()
    {
        return view('inventory.create');
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
        return view('inventory.edit', compact('inventory'));
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
