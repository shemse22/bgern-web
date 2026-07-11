<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::latest()->get();
        return view('admin.tools.index', ['tools' => $tools]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.tools.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:tools,slug'],
            'description' => ['nullable', 'string'],
            'how_to' => ['nullable', 'string'],
            'component' => ['required', 'string', 'max:255'],
            'is_active' => ['boolean'],
            'faq_raw' => ['nullable', 'string'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['faq'] = $this->parseFaq($request->input('faq_raw', ''));
        unset($validated['faq_raw']);

        $tool = Tool::create($validated);
        $tool->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.tools.index')->with('status', 'Tool created.');
    }

    public function edit(Tool $tool)
    {
        $categories = Category::all();
        return view('admin.tools.edit', ['tool' => $tool, 'categories' => $categories]);
    }

    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:tools,slug,' . $tool->id],
            'description' => ['nullable', 'string'],
            'how_to' => ['nullable', 'string'],
            'component' => ['required', 'string', 'max:255'],
            'is_active' => ['boolean'],
            'faq_raw' => ['nullable', 'string'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['faq'] = $this->parseFaq($request->input('faq_raw', ''));
        unset($validated['faq_raw']);

        $tool->update($validated);
        $tool->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.tools.index')->with('status', 'Tool updated.');
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();
        return redirect()->route('admin.tools.index')->with('status', 'Tool deleted.');
    }

   private function parseFaq(?string $raw): array
{
    $lines = array_filter(array_map('trim', explode("\n", $raw ?? '')));
        $faq = [];

        foreach ($lines as $line) {
            if (str_contains($line, '|')) {
                [$question, $answer] = array_map('trim', explode('|', $line, 2));
                $faq[] = ['question' => $question, 'answer' => $answer];
            }
        }

        return $faq;
    }
}