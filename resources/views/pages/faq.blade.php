<x-layouts.public
    :title="'FAQ - Bgern'"
    :description="'Frequently asked questions about Bgern and our free online tools.'"
>

<style>
    .faq-page {
        --faq-primary: #4f46e5;
        --faq-primary-dark: #4338ca;
        --faq-text: #111827;
        --faq-muted: #6b7280;
        --faq-border: #e5e7eb;
    }

    .faq-hero {
        position: relative;
        overflow: hidden;
        padding: 80px 20px 60px;
        text-align: center;
        background:
            radial-gradient(circle at 20% 20%, rgba(99, 102, 241, .14), transparent 30%),
            radial-gradient(circle at 80% 10%, rgba(139, 92, 246, .12), transparent 28%),
            linear-gradient(180deg, #f8faff 0%, #ffffff 100%);
    }

    .faq-hero::before {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 999px;
        background: rgba(79, 70, 229, .06);
        filter: blur(10px);
        top: -140px;
        left: -100px;
    }

    .faq-hero::after {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 999px;
        background: rgba(124, 58, 237, .05);
        filter: blur(10px);
        right: -120px;
        bottom: -180px;
    }

    .faq-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(79, 70, 229, .08);
        color: #4f46e5;
        font-size: 14px;
        font-weight: 600;
        border: 1px solid rgba(79, 70, 229, .12);
        margin-bottom: 22px;
    }

    .faq-title {
        position: relative;
        z-index: 1;
        margin: 0 auto;
        max-width: 760px;
        font-size: clamp(2.4rem, 6vw, 4rem);
        line-height: 1.05;
        font-weight: 800;
        letter-spacing: -0.04em;
        color: #111827;
    }

    .faq-title span {
        background: linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .faq-description {
        position: relative;
        z-index: 1;
        max-width: 620px;
        margin: 22px auto 0;
        color: #6b7280;
        font-size: 17px;
        line-height: 1.7;
    }

    .faq-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 60px 20px 90px;
    }

    .faq-section-label {
        text-align: center;
        margin-bottom: 28px;
    }

    .faq-section-label h2 {
        margin: 0;
        color: #111827;
        font-size: 24px;
        font-weight: 750;
    }

    .faq-section-label p {
        margin-top: 7px;
        color: #6b7280;
        font-size: 14px;
    }

    .faq-list {
        display: grid;
        gap: 14px;
    }

    .faq-item {
        background: rgba(255, 255, 255, .92);
        border: 1px solid var(--faq-border);
        border-radius: 18px;
        overflow: hidden;
        transition:
            border-color .25s ease,
            box-shadow .25s ease,
            transform .25s ease;
    }

    .faq-item:hover {
        border-color: rgba(79, 70, 229, .25);
        box-shadow: 0 14px 40px rgba(15, 23, 42, .07);
        transform: translateY(-2px);
    }

    .faq-question {
        width: 100%;
        border: 0;
        background: transparent;
        padding: 22px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        cursor: pointer;
        text-align: left;
        color: #111827;
        font-size: 16px;
        font-weight: 650;
    }

    .faq-question:hover {
        color: #4f46e5;
    }

    .faq-icon {
        flex-shrink: 0;
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f3f4f6;
        color: #6b7280;
        transition: all .25s ease;
    }

    .faq-icon svg {
        width: 18px;
        height: 18px;
        transition: transform .25s ease;
    }

    .faq-item.active .faq-icon {
        background: #eef2ff;
        color: #4f46e5;
    }

    .faq-item.active .faq-icon svg {
        transform: rotate(180deg);
    }

    .faq-answer {
        display: grid;
        grid-template-rows: 0fr;
        transition: grid-template-rows .3s ease;
    }

    .faq-answer-inner {
        overflow: hidden;
    }

    .faq-answer-content {
        padding: 0 24px 22px;
        color: #6b7280;
        font-size: 15px;
        line-height: 1.75;
    }

    .faq-item.active .faq-answer {
        grid-template-rows: 1fr;
    }

    .faq-answer-content a {
        color: #4f46e5;
        font-weight: 600;
        text-decoration: none;
    }

    .faq-answer-content a:hover {
        text-decoration: underline;
    }

    .faq-cta {
        margin-top: 55px;
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        padding: 42px 30px;
        text-align: center;
        background:
            radial-gradient(circle at 15% 20%, rgba(255,255,255,.18), transparent 25%),
            radial-gradient(circle at 85% 80%, rgba(255,255,255,.12), transparent 25%),
            linear-gradient(135deg, #4f46e5, #6d28d9);
        box-shadow: 0 20px 50px rgba(79, 70, 229, .2);
    }

    .faq-cta h3 {
        color: white;
        font-size: 25px;
        font-weight: 750;
        margin: 0;
    }

    .faq-cta p {
        max-width: 500px;
        margin: 10px auto 24px;
        color: rgba(255,255,255,.78);
        font-size: 15px;
        line-height: 1.6;
    }

    .faq-cta-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 12px 20px;
        border-radius: 12px;
        background: white;
        color: #4338ca;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: all .2s ease;
    }

    .faq-cta-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,.15);
    }

    @media (max-width: 640px) {
        .faq-hero {
            padding: 60px 18px 45px;
        }

        .faq-container {
            padding: 45px 15px 65px;
        }

        .faq-question {
            padding: 18px;
            font-size: 15px;
        }

        .faq-answer-content {
            padding: 0 18px 20px;
        }

        .faq-cta {
            padding: 35px 20px;
            border-radius: 20px;
        }
    }
</style>

<div class="faq-page">

    {{-- Hero --}}
    <section class="faq-hero">

        <div class="faq-badge">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="M9.5 9a2.5 2.5 0 1 1 4.5 1.5c-.8.9-2 1.2-2 2.5"/>
                <path d="M12 17h.01"/>
            </svg>
            Help Center
        </div>

        <h1 class="faq-title">
            Frequently Asked
            <span>Questions</span>
        </h1>

        <p class="faq-description">
            Everything you need to know about Bgern, our tools,
            privacy, and how the platform works.
        </p>

    </section>


    {{-- FAQ --}}
    <main class="faq-container">

        <div class="faq-section-label">
            <h2>Common questions</h2>
            <p>Quick answers to the questions our users ask most.</p>
        </div>

        <div class="faq-list">

            {{-- FAQ 1 --}}
            <div class="faq-item active">
                <button type="button" class="faq-question">
                    <span>Is Bgern really free?</span>

                    <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </span>
                </button>

                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <div class="faq-answer-content">
                            Yes. All tools currently available on Bgern are
                            completely free to use, with no sign-up required.
                        </div>
                    </div>
                </div>
            </div>


            {{-- FAQ 2 --}}
            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>Do you store my files?</span>

                    <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </span>
                </button>

                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <div class="faq-answer-content">
                            Most Bgern tools process your files directly
                            inside your browser. This means your files do
                            not need to be uploaded to our servers.
                            Check the individual tool page for specific
                            processing information.
                        </div>
                    </div>
                </div>
            </div>


            {{-- FAQ 3 --}}
            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>Do I need to create an account?</span>

                    <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </span>
                </button>

                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <div class="faq-answer-content">
                            No. You can use Bgern's tools without creating
                            an account. Accounts are only used for
                            administrative purposes.
                        </div>
                    </div>
                </div>
            </div>


            {{-- FAQ 4 --}}
            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>How often do you add new tools?</span>

                    <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </span>
                </button>

                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <div class="faq-answer-content">
                            We regularly add new tools based on user
                            demand and useful everyday problems.
                            Have an idea for a tool?
                            <a href="{{ route('contact') }}">Send us a suggestion</a>.
                        </div>
                    </div>
                </div>
            </div>


            {{-- FAQ 5 --}}
            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>Can I use Bgern on my phone?</span>

                    <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </span>
                </button>

                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <div class="faq-answer-content">
                            Yes. Bgern is designed to work across desktop,
                            tablet, and mobile browsers. Most tools can be
                            used directly from your phone without installing
                            an application.
                        </div>
                    </div>
                </div>
            </div>


            {{-- FAQ 6 --}}
            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>What kind of tools does Bgern provide?</span>

                    <span class="faq-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </span>
                </button>

                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <div class="faq-answer-content">
                            Bgern provides simple online utilities for
                            common tasks such as image processing, PDF
                            tools, text utilities, calculators, and other
                            productivity tasks.
                        </div>
                    </div>
                </div>
            </div>

        </div>


        {{-- CTA --}}
        <div class="faq-cta">

            <h3>Still have a question?</h3>

            <p>
                Can't find the answer you're looking for?
                Get in touch with us and we'll be happy to help.
            </p>

            <a href="{{ route('contact') }}" class="faq-cta-button">
                Contact Us

                <svg width="16" height="16" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </a>

        </div>

    </main>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(function (item) {

            const button = item.querySelector('.faq-question');

            button.addEventListener('click', function () {

                const isActive = item.classList.contains('active');

                // Close all FAQ items
                faqItems.forEach(function (otherItem) {
                    otherItem.classList.remove('active');

                    const otherButton =
                        otherItem.querySelector('.faq-question');

                    otherButton.setAttribute('aria-expanded', 'false');
                });

                // Open clicked item
                if (!isActive) {
                    item.classList.add('active');
                    button.setAttribute('aria-expanded', 'true');
                }

            });

        });

        // Accessibility
        faqItems.forEach(function (item) {
            item.querySelector('.faq-question')
                .setAttribute(
                    'aria-expanded',
                    item.classList.contains('active') ? 'true' : 'false'
                );
        });

    });
</script>

</x-layouts.public>