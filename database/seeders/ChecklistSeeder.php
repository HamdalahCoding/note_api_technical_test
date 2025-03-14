<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Checklist;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checklists = [
            ['name' => 'Daily Tasks'],
            ['name' => 'Work Projects'],
            ['name' => 'Weekend Plans']
        ];

        foreach ($checklists as $checklistData) {
            Checklist::create($checklistData);
        }
    }
}
