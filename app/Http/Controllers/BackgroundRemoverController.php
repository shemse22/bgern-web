<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Str;

class BackgroundRemoverController extends Controller
{
    public function remove(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:10240'],
        ]);

        $uploadedFile = $request->file('image');
        $uniqueId = Str::uuid();

        if (!is_dir(storage_path('app/tmp'))) {
            mkdir(storage_path('app/tmp'), 0755, true);
        }

        $extension = $uploadedFile->getClientOriginalExtension();
        $inputPath = storage_path("app/tmp/{$uniqueId}.{$extension}");
        $outputPath = storage_path("app/tmp/{$uniqueId}_output.png");

        $uploadedFile->move(storage_path('app/tmp'), "{$uniqueId}.{$extension}");

        $pythonBin = '/home/bgerncxv/virtualenv/bg-remover/3.9/bin/python3.9';
        $scriptPath = '/home/bgerncxv/bg-remover/remove_bg.py';

        $result = Process::timeout(120)->run([
            $pythonBin,
            $scriptPath,
            $inputPath,
            $outputPath,
        ]);

        if (!$result->successful() || !file_exists($outputPath)) {
            @unlink($inputPath);
            return back()->withErrors(['image' => 'Background removal failed. Please try a different image.']);
        }

        $originalName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);

        register_shutdown_function(function () use ($inputPath) {
            @unlink($inputPath);
        });

        return response()->download($outputPath, "{$originalName}-no-bg.png")->deleteFileAfterSend(true);
    }
}