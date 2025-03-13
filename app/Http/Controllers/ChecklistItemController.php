<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\ChecklistItem;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    public function index($checklistId)
    {
        return response()->json(Checklist::findOrFail($checklistId)->items);
    }

    public function store(Request $request, $checklistId)
    {
        $item = ChecklistItem::create([
            'checklist_id' => $checklistId,
            'itemName' => $request->itemName
        ]);
        return response()->json($item, 201);
    }

    public function updateStatus($checklistId, $itemId)
    {
        $item = ChecklistItem::where('checklist_id', $checklistId)->findOrFail($itemId);
        $item->update(['is_done' => !$item->is_done]);
        return response()->json($item);
    }
}
