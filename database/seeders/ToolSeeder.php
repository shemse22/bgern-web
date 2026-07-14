cat > database/seeders/ToolSeeder.php << 'EOF'
<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        $textCategory = Category::firstOrCreate(
            ['slug' => 'text-tools'],
            ['name' => 'Text Tools', 'description' => 'Tools for working with text.']
        );

        $wordCounter = Tool::firstOrCreate(
            ['slug' => 'word-counter'],
            [
                'name' => 'Word Counter',
                'description' => 'Count words, characters, and sentences in your text instantly.',
                'how_to' => 'Paste or type your text into the box below. Counts update as you type.',
                'faq' => [
                    ['question' => 'Is this tool free?', 'answer' => 'Yes, completely free with no sign-up required.'],
                    ['question' => 'Does it count spaces as characters?', 'answer' => 'Yes, the character count includes spaces and punctuation.'],
                ],
                'component' => 'word-counter',
                'is_active' => true,
            ]
        );
        $wordCounter->categories()->syncWithoutDetaching([$textCategory->id]);

        $caseConverter = Tool::firstOrCreate(
            ['slug' => 'case-converter'],
            [
                'name' => 'Case Converter',
                'description' => 'Convert text to uppercase, lowercase, title case, or sentence case instantly.',
                'how_to' => 'Type or paste your text, then click a button to convert it.',
                'faq' => [
                    ['question' => 'Does this change my original text?', 'answer' => 'No, conversion happens in your browser only — nothing is uploaded or saved.'],
                    ['question' => 'What is title case?', 'answer' => 'Title case capitalizes the first letter of each major word, like a headline.'],
                ],
                'component' => 'case-converter',
                'is_active' => true,
            ]
        );
        $caseConverter->categories()->syncWithoutDetaching([$textCategory->id]);

        Tool::firstOrCreate(
            ['slug' => 'age-calculator'],
            [
                'name' => 'Age Calculator',
                'description' => 'Calculate your exact age in years, months, and days.',
                'how_to' => 'Enter your date of birth and click Calculate Age.',
                'faq' => [],
                'component' => 'age-calculator',
                'is_active' => true,
            ]
        );
    }
}
EOF