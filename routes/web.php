<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\Admin\ToolController as AdminToolController;
use App\Models\Tool;

Route::get('/tools/{slug}', [ToolController::class, 'show'])->name('tools.show');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('tools', AdminToolController::class)->except(['show']);
});

Route::get('/', function () {
    $query = request('q');

    $tools = Tool::where('is_active', true)
        ->when($query, fn($q) => $q->where('name', 'like', "%{$query}%"))
        ->latest()
        ->get();

    $categories = \App\Models\Category::all();

    return view('home', ['tools' => $tools, 'categories' => $categories]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';