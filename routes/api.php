<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistItemController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/checklist', [ChecklistController::class, 'index']);
Route::post('/checklist', [ChecklistController::class, 'store']);
Route::delete('/checklist/{id}', [ChecklistController::class, 'destroy']);

Route::get('/checklist/{id}/items', [ChecklistItemController::class, 'index']);
Route::post('/checklist/{id}/items', [ChecklistItemController::class, 'store']);
Route::put('/checklist/{checklistId}/items/{itemId}/status', [ChecklistItemController::class, 'updateStatus']);