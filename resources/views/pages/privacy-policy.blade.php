<x-layouts.public :title="'Privacy Policy - Bgern'" :description="'How Bgern collects, uses, and protects your data.'">
    <div class="max-w-3xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold mb-2 text-gray-900">Privacy Policy</h1>
        <p class="text-gray-500 text-sm mb-8">Last updated: {{ now()->format('F j, Y') }}</p>

        <div class="prose max-w-none text-gray-700 space-y-6">
            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Overview</h2>
                <p>Bgern ("we," "our," or "us") provides free online tools at bgern.com. This Privacy Policy explains what information we collect, how we use it, and your rights regarding that information.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Tool Usage</h2>
                <p>Most tools on Bgern (including PDF, image, and text tools) process your files and data entirely within your own browser. Files you upload to these tools are not transmitted to or stored on our servers unless explicitly stated on the tool's page.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Information We Collect</h2>
                <p>We may collect the following information:</p>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Account information if you register (name, email address)</li>
                    <li>Contact form submissions (name, email, message content)</li>
                    <li>Usage data such as pages visited, browser type, and general analytics, which may be collected via cookies or similar technologies</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Cookies and Advertising</h2>
                <p>Bgern may use cookies to improve site functionality and, where applicable, to serve relevant advertising through third-party ad networks such as Google AdSense. These networks may use cookies to serve ads based on your prior visits to this or other websites. You can opt out of personalized advertising by visiting Google's Ads Settings.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Data Security</h2>
                <p>We take reasonable measures to protect any information you provide to us. However, no method of transmission over the internet is 100% secure, and we cannot guarantee absolute security.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Third-Party Links</h2>
                <p>Bgern may contain links to third-party websites. We are not responsible for the privacy practices or content of those sites.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Changes to This Policy</h2>
                <p>We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated revision date.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Contact Us</h2>
                <p>If you have questions about this Privacy Policy, please <a href="{{ route('contact') }}" class="text-indigo-600">contact us</a>.</p>
            </section>
        </div>
    </div>
</x-layouts.public>