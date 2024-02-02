<?php

namespace App\Http\Controllers;

use App\Models\{
    Room,
    Item,
    Category,
    Floor,
    Teacher,
    ItemStatus,
    Status
};

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
            'Teacher' => Teacher::class,
            'ItemStatus' => ItemStatus::class,
            'Status' => Status::class,
        ];

        $data = Cache::remember('dashboard_data', 60, function () use ($models) {
            $data = [];
            foreach ($models as $name => $class) {
                $data[strtolower($name) . 'Count'] = $class::count();
                $data[strtolower($name) . 'LastUpdated'] = $class::latest()->first()->updated_at ?? now();
            }
            return $data;
        });

        return view('dashboard', $data);
    }
}
