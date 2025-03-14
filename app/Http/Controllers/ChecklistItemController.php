<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\ChecklistItem;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    public function index($checklistId)
    {
        return response()->json(Checklist::findOrFail($checklistId)->checklistItems);
    }

    public function store(Request $request, $checklistId)
    {
        $item = ChecklistItem::create([
            'checklist_id' => $checklistId,
            'item_name' => $request->item_name
        ]);
        return response()->json($item, 201);
    }

    public function updateStatus($checklistId, $itemId)
    {
        $item = ChecklistItem::where('checklist_id', $checklistId)->findOrFail($itemId);
        $item->update(['is_done' => !$item->is_done]);
        return response()->json($item);
    }

    public function rename(Request $request, $checklistId, $itemId)
    {
        $request->validate([
            'item_name' => 'required|string|max:255'
        ]);

        $item = ChecklistItem::where('checklist_id', $checklistId)->findOrFail($itemId);
        $item->update(['item_name' => $request->item_name]);

        return response()->json(['message' => 'Checklist item renamed successfully', 'item' => $item]);
    }


    public function destroy($checklistId, $itemId)
    {
        $item = ChecklistItem::where('checklist_id', $checklistId)->findOrFail($itemId);
        $item->delete();
        return response()->json(['message' => 'Checklist item deleted successfully']);
    }
}
