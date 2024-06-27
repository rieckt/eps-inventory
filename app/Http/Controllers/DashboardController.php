<?php

namespace App\Http\Controllers;

use App\Models\{
    Room,
    Item,
    Category,
    Floor,
    ItemStatus,
    Status,
    User,
};

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $models = [
            'Room' => Room::class,
            'Item' => Item::class,
            'Category' => Category::class,
            'Floor' => Floor::class,
            'ItemStatus' => ItemStatus::class,
            'User' => User::class,
            'Status' => Status::class,
        ];

        $data = Cache::remember('dashboard_data', 60, function () use ($models) {
            $data = [];
            foreach ($models as $name => $class) {
                $data[strtolower($name) . 'Count'] = $class::count();
                $data[strtolower($name) . 'LastUpdated'] = $class::latest()->first()->updated_at ?? now();
                $data[strtolower($name) . 'Data'] = $class::all();
                $data['userItemStatusData'] = Auth::user()->itemStatus;
                $data['items'] = Item::all();
                $data['rooms'] = Room::all();
                $data['floors'] = Floor::all();
                $data['status'] = Status::all();
                $data['itemStatus'] = ItemStatus::all();
                $data['teachers'] = User::all();
            }
            return $data;
        });

        return view('dashboard', $data);
    }
}
