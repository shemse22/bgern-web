<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\Admin\ToolController as AdminToolController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Models\Tool;
use App\Models\Category;
use App\Models\BlogPost;




Route::get('/sitemap.xml', function () {
    $tools = Tool::where('is_active', true)->get();
    $categories = Category::all();
    $posts = BlogPost::where('is_published', true)->get();

    $urls = collect();

    $urls->push(['loc' => url('/'), 'lastmod' => now()->toAtomString(), 'priority' => '1.0']);
    $urls->push(['loc' => route('tools.index'), 'lastmod' => now()->toAtomString(), 'priority' => '0.9']);
    $urls->push(['loc' => route('categories.index'), 'lastmod' => now()->toAtomString(), 'priority' => '0.7']);
    $urls->push(['loc' => route('blog.index'), 'lastmod' => now()->toAtomString(), 'priority' => '0.7']);

    foreach ($tools as $tool) {
        $urls->push([
            'loc' => route('tools.show', $tool->slug),
            'lastmod' => $tool->updated_at->toAtomString(),
            'priority' => '0.8',
        ]);
    }

    foreach ($categories as $category) {
        $urls->push([
            'loc' => route('categories.show', $category->slug),
            'lastmod' => $category->updated_at->toAtomString(),
            'priority' => '0.6',
        ]);
    }

    foreach ($posts as $post) {
        $urls->push([
            'loc' => route('blog.show', $post->slug),
            'lastmod' => $post->updated_at->toAtomString(),
            'priority' => '0.6',
        ]);
    }

    $xml = view('sitemap', ['urls' => $urls])->render();

    return response($xml, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');


Route::post('/blog/upload-image', function (\Illuminate\Http\Request $request) {
    $request->validate(['image' => ['required', 'image', 'max:2048']]);
    $path = $request->file('image')->store('blog-images', 'public');
    return response()->json(['url' => asset('storage/' . $path)]);
})->name('admin.blog.upload-image');

Route::get('/blog', function () {
    $posts = BlogPost::where('is_published', true)->latest('published_at')->get();
    return view('blog.index', ['posts' => $posts]);
})->name('blog.index');

Route::get('/blog/{slug}', function (string $slug) {
    $post = BlogPost::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('blog.show', ['post' => $post]);
})->name('blog.show');

Route::get('/tools', function () {
    $query = request('q');

    $tools = Tool::where('is_active', true)
        ->when($query, fn($q) => $q->where('name', 'like', "%{$query}%"))
        ->latest()
        ->get();

    return view('tools.index', ['tools' => $tools]);
})->name('tools.index');


Route::get('/categories', function () {
    $categories = Category::withCount('tools')->get();
    return view('categories.index', ['categories' => $categories]);
})->name('categories.index');

Route::get('/categories/{slug}', function (string $slug) {
    $category = Category::where('slug', $slug)->firstOrFail();
    $tools = $category->tools()->where('is_active', true)->get();
    return view('categories.show', ['category' => $category, 'tools' => $tools]);
})->name('categories.show');

Route::get('/tools/{slug}', [ToolController::class, 'show'])->name('tools.show');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('tools', AdminToolController::class)->except(['show']);
    Route::resource('blog', BlogPostController::class)->except(['show']);
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