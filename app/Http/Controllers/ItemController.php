<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Requests\StoreItemRequest;
use App\Models\Room;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemStatus;

use App\Traits\Searchable;
use App\Traits\FetchesModels;

class ItemController extends Controller
{
    use Searchable;
    use FetchesModels;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = Item::with(['room', 'category'])
            ->when($request->get('search'), function ($query, $search) {
                return $this->applySearch($query, $search, 'name');
            })->paginate();
        return view('items.index', compact('items'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Item $item)
    {
        $rooms = $this->getModels(Room::class);
        $categories = $this->getModels(Category::class);
        return view('items.create', compact('rooms', 'categories', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->validated());
        return redirect()->route('items.show', $item);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $itemStatus = $this->getModels(ItemStatus::class);
        $item->load(['room', 'category', 'itemStatus']);
        return view('items.show', compact('item', 'itemStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $item->load(['room', 'category']);
        $rooms = $this->getModels(Room::class);
        $categories = $this->getModels(Category::class);
        return view('items.edit', compact('item', 'rooms', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());
        return redirect()->route('items.show', $item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
