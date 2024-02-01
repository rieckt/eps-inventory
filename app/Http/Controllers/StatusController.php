<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Requests\StoreStatusRequest;

use App\Traits\Searchable;
use App\Models\ItemStatus;

class StatusController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = Status::when($request->get('search'), function ($query, $search) {
            return $this->applySearch($query, $search, 'name');
        })->paginate();

        return view('status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Status $status)
    {
        return view('status.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request)
    {
        $status = Status::create($request->validated());
        return redirect()->route('status.show', $status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        $itemsWithSameStatus = ItemStatus::where('status_id', $status->id)
            ->with('inventory')
            ->paginate(10);

        return view('status.show', compact('status', 'itemsWithSameStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->update($request->validated());
        return redirect()->route('status.show', $status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('status.index');
    }
}
