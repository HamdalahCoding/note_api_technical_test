<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Checklist;
use App\Models\ChecklistItem;

class ChecklistItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checklists = Checklist::all();

        foreach ($checklists as $checklist) {
            ChecklistItem::create([
                'checklist_id' => $checklist->id,
                'item_name' => 'Task 1 for ' . $checklist->name,
                'is_done' => false
            ]);

            ChecklistItem::create([
                'checklist_id' => $checklist->id,
                'item_name' => 'Task 2 for ' . $checklist->name,
                'is_done' => false
            ]);
        }
    }
}
