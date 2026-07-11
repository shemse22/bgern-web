<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;
use App\Models\Category;

$textCategory = Category::firstOrCreate(
    ['slug' => 'text-tools'],
    ['name' => 'Text Tools', 'description' => 'Tools for working with text.']
);
class ToolSeeder extends Seeder
{
    public function run(): void
    {
Tool::create([
    'name' => 'Case Converter',
    'slug' => 'case-converter',
    'description' => 'Convert text to uppercase, lowercase, title case, or sentence case instantly.',
    'how_to' => 'Type or paste your text, then click a button to convert it.',
    'faq' => [
        ['question' => 'Does this change my original text?', 'answer' => 'No, conversion happens in your browser only — nothing is uploaded or saved.'],
        ['question' => 'What is title case?', 'answer' => 'Title case capitalizes the first letter of each major word, like a headline.'],
    ],
    'component' => 'case-converter',
    'is_active' => true,
]);
    }
}