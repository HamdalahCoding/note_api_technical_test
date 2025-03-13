<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        return response()->json(Checklist::all());
    }

    public function store(Request $request)
    {
        $checklist = Checklist::create(['name' => $request->name]);
        return response()->json($checklist, 201);
    }

    public function destroy($id)
    {
        Checklist::findOrFail($id)->delete();
        return response()->json(['message' => 'Checklist deleted']);
    }
}