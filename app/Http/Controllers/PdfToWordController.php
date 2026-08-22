<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Str;

class PdfToWordController extends Controller
{
    public function convert(Request $request)
    {
        $request->validate([
            'pdf' => ['required', 'file', 'mimes:pdf', 'max:10240'],
        ]);

        $uploadedFile = $request->file('pdf');
        $uniqueId = Str::uuid();

        $inputPath = storage_path("app/tmp/{$uniqueId}.pdf");
        $outputPath = storage_path("app/tmp/{$uniqueId}.docx");

        if (!is_dir(storage_path('app/tmp'))) {
            mkdir(storage_path('app/tmp'), 0755, true);
        }

        $uploadedFile->move(storage_path('app/tmp'), "{$uniqueId}.pdf");

        $pythonBin = '/home/bgerncxv/virtualenv/pdf-word-converter/3.9/bin/python3.9';
        $scriptPath = '/home/bgerncxv/pdf-word-converter/convert.py';

        $result = Process::timeout(120)->run([
            $pythonBin,
            $scriptPath,
            $inputPath,
            $outputPath,
        ]);

        if (!$result->successful() || !file_exists($outputPath)) {
            @unlink($inputPath);
            return back()->withErrors(['pdf' => 'Conversion failed. Please try a different file.']);
        }

        $originalName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);

        return response()->download($outputPath, "{$originalName}.docx")
            ->deleteFileAfterSend(true)
            ->deleteFileAfterSend(function () use ($inputPath) {
                @unlink($inputPath);
            });
    }
}
        $originalName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);

        $response = response()->download($outputPath, "{$originalName}.docx")->deleteFileAfterSend(true);

        register_shutdown_function(function () use ($inputPath) {
            @unlink($inputPath);
        });

        return $response;