<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToolController extends Controller
{
    public function show(string $slug)
    {
        $tool = Tool::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $componentView = 'tools.partials.' . $tool->component;

        abort_unless(view()->exists($componentView), Response::HTTP_NOT_FOUND);

        return view('tools.show', [
            'tool' => $tool,
            'componentView' => $componentView,
        ]);
    }
}