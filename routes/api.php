<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistItemController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/checklist', [ChecklistController::class, 'index']);
Route::post('/checklist', [ChecklistController::class, 'store']);
Route::delete('/checklist/{id}', [ChecklistController::class, 'destroy']);

Route::get('/checklist/{id}/items', [ChecklistItemController::class, 'index']);
Route::post('/checklist/{id}/items', [ChecklistItemController::class, 'store']);
Route::put('/checklist/{checklistId}/items/{itemId}/status', [ChecklistItemController::class, 'updateStatus']);
Route::delete('/checklist/{checklistId}/items/{itemId}', [ChecklistItemController::class, 'destroy']);
Route::put('/checklist/{checklistId}/items/rename/{itemId}', [ChecklistItemController::class, 'rename']);

