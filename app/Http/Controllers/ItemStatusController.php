<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemStatus;
use App\Http\Requests\UpdateItemStatusRequest;
use App\Http\Requests\StoreItemStatusRequest;

use App\Models\Room;
use App\Models\User;
use App\Models\Status;
use App\Models\Item;

use App\Traits\Searchable;
use App\Traits\FetchesModels;

class ItemStatusController extends Controller
{
    use Searchable;
    use FetchesModels;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ItemStatus $itemStatus)
    {
        $itemStatus = ItemStatus::when($request->get('search'), function ($query, $search) {
            return $this->applySearch($query, $search, 'name');
        })->paginate();
        return view('itemStatus.index', compact('itemStatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ItemStatus $itemStatus)
    {
        $rooms = $this->getModels(Room::class);
        $teachers = $this->getModels(User::class);
        $statuses = $this->getModels(Status::class);
        $items = $this->getModels(Item::class);
        return view('itemStatus.create', compact('itemStatus', 'rooms', 'teachers', 'statuses', 'items'));
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
        $rooms = $this->getModels(Room::class);
        $teachers = $this->getModels(User::class);
        $statuses = $this->getModels(Status::class);
        $items = $this->getModels(Item::class);
        return view('itemStatus.edit', compact('itemStatus', 'rooms', 'teachers', 'statuses', 'items'));
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
}
