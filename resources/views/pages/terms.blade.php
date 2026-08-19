<x-layouts.public :title="'Terms of Service - Bgern'" :description="'Terms and conditions for using Bgern.'">
    <div class="max-w-3xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold mb-2 text-gray-900">Terms of Service</h1>
        <p class="text-gray-500 text-sm mb-8">Last updated: {{ now()->format('F j, Y') }}</p>

        <div class="prose max-w-none text-gray-700 space-y-6">
            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Acceptance of Terms</h2>
                <p>By using Bgern, you agree to these Terms of Service. If you do not agree, please do not use this website.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Use of Tools</h2>
                <p>Bgern's tools are provided free of charge, as-is, without warranty of any kind. Most tools process data locally in your browser; we do not guarantee the accuracy, completeness, or reliability of any tool's output. Use tool results at your own discretion.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Acceptable Use</h2>
                <p>You agree not to use Bgern to:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Upload or process content that is illegal, infringing, or violates the rights of others</li>
                    <li>Attempt to disrupt, overload, or gain unauthorized access to our systems</li>
                    <li>Use automated tools to scrape or abuse the service beyond reasonable individual use</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Intellectual Property</h2>
                <p>The Bgern name, logo, and website design are the property of Bgern. Content you process using our tools remains your own property; we claim no ownership over files or data you process.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Limitation of Liability</h2>
                <p>Bgern is provided "as is" without warranties of any kind. We are not liable for any damages arising from use of this website or its tools, including data loss, though most tools process data client-side to minimize this risk.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Changes to These Terms</h2>
                <p>We may update these Terms from time to time. Continued use of Bgern after changes constitutes acceptance of the updated Terms.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Contact Us</h2>
                <p>Questions about these Terms? <a href="{{ route('contact') }}" class="text-indigo-600">Contact us</a>.</p>
            </section>
        </div>
    </div>
</x-layouts.public>