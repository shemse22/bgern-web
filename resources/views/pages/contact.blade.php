<x-layouts.public
    :title="'Contact - Bgern'"
    :description="'Get in touch with the Bgern team. Send us your questions, suggestions, feedback, or bug reports.'"
>

<style>
    .contact-page {
        --contact-primary: #4f46e5;
        --contact-primary-dark: #4338ca;
        --contact-text: #111827;
        --contact-muted: #6b7280;
        --contact-border: #e5e7eb;
    }

    /* ==============================
       HERO
    ============================== */

    .contact-hero {
        position: relative;
        overflow: hidden;
        padding: 75px 20px 55px;
        text-align: center;
        background:
            radial-gradient(
                circle at 15% 20%,
                rgba(99, 102, 241, .14),
                transparent 30%
            ),
            radial-gradient(
                circle at 85% 10%,
                rgba(139, 92, 246, .12),
                transparent 28%
            ),
            linear-gradient(
                180deg,
                #f8faff 0%,
                #ffffff 100%
            );
    }

    .contact-hero::before {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(79, 70, 229, .06);
        filter: blur(15px);
        top: -150px;
        left: -100px;
    }

    .contact-hero::after {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(124, 58, 237, .05);
        filter: blur(15px);
        right: -120px;
        bottom: -180px;
    }

    .contact-badge {
        position: relative;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(79, 70, 229, .08);
        border: 1px solid rgba(79, 70, 229, .12);
        color: #4f46e5;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .contact-badge svg {
        width: 16px;
        height: 16px;
    }

    .contact-title {
        position: relative;
        z-index: 1;
        max-width: 720px;
        margin: 0 auto;
        color: #111827;
        font-size: clamp(2.4rem, 6vw, 4rem);
        line-height: 1.05;
        font-weight: 800;
        letter-spacing: -0.045em;
    }

    .contact-title span {
        background: linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .contact-description {
        position: relative;
        z-index: 1;
        max-width: 620px;
        margin: 20px auto 0;
        color: #6b7280;
        font-size: 17px;
        line-height: 1.7;
    }

    /* ==============================
       MAIN CONTAINER
    ============================== */

    .contact-container {
        max-width: 1050px;
        margin: 0 auto;
        padding: 55px 20px 90px;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 340px 1fr;
        gap: 25px;
        align-items: start;
    }

    /* ==============================
       INFO CARD
    ============================== */

    .contact-info {
        position: relative;
        overflow: hidden;
        padding: 28px;
        border-radius: 22px;
        background:
            radial-gradient(
                circle at 90% 5%,
                rgba(255,255,255,.12),
                transparent 30%
            ),
            linear-gradient(
                145deg,
                #4f46e5,
                #6d28d9
            );
        box-shadow:
            0 20px 45px rgba(79, 70, 229, .18);
        color: white;
    }

    .contact-info::after {
        content: "";
        position: absolute;
        width: 170px;
        height: 170px;
        border-radius: 50%;
        border: 35px solid rgba(255,255,255,.05);
        right: -80px;
        bottom: -80px;
    }

    .contact-info-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: rgba(255,255,255,.14);
        margin-bottom: 22px;
    }

    .contact-info-icon svg {
        width: 24px;
        height: 24px;
    }

    .contact-info h2 {
        margin: 0;
        font-size: 25px;
        font-weight: 750;
    }

    .contact-info > p {
        margin-top: 10px;
        color: rgba(255,255,255,.75);
        font-size: 14px;
        line-height: 1.65;
    }

    .contact-benefits {
        margin-top: 28px;
        display: grid;
        gap: 18px;
    }

    .contact-benefit {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .contact-benefit-icon {
        flex-shrink: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: rgba(255,255,255,.12);
    }

    .contact-benefit-icon svg {
        width: 16px;
        height: 16px;
    }

    .contact-benefit strong {
        display: block;
        font-size: 14px;
        font-weight: 650;
    }

    .contact-benefit span {
        display: block;
        margin-top: 2px;
        color: rgba(255,255,255,.65);
        font-size: 12px;
        line-height: 1.5;
    }

    /* ==============================
       FORM CARD
    ============================== */

    .contact-form-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 22px;
        padding: 30px;
        box-shadow:
            0 12px 35px rgba(15, 23, 42, .06);
    }

    .contact-form-header {
        margin-bottom: 25px;
    }

    .contact-form-header h2 {
        margin: 0;
        color: #111827;
        font-size: 22px;
        font-weight: 750;
    }

    .contact-form-header p {
        margin-top: 6px;
        color: #6b7280;
        font-size: 14px;
    }

    .contact-form {
        display: grid;
        gap: 19px;
    }

    .contact-field {
        position: relative;
    }

    .contact-field label {
        display: block;
        margin-bottom: 7px;
        color: #374151;
        font-size: 13px;
        font-weight: 650;
    }

    .contact-input-wrapper {
        position: relative;
    }

    .contact-input-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        pointer-events: none;
    }

    .contact-input-icon svg {
        width: 18px;
        height: 18px;
    }

    .contact-input,
    .contact-textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d1d5db;
        border-radius: 12px;
        background: #fff;
        color: #111827;
        font-size: 14px;
        outline: none;
        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .contact-input {
        height: 48px;
        padding: 0 15px 0 44px;
    }

    .contact-textarea {
        min-height: 145px;
        resize: vertical;
        padding: 14px 15px;
        line-height: 1.6;
    }

    .contact-input::placeholder,
    .contact-textarea::placeholder {
        color: #9ca3af;
    }

    .contact-input:hover,
    .contact-textarea:hover {
        border-color: #a5b4fc;
    }

    .contact-input:focus,
    .contact-textarea:focus {
        border-color: #6366f1;
        box-shadow:
            0 0 0 4px rgba(99,102,241,.10);
    }

    .contact-textarea-wrapper {
        position: relative;
    }

    .contact-message-count {
        position: absolute;
        right: 12px;
        bottom: 10px;
        color: #9ca3af;
        font-size: 11px;
        background: white;
        padding-left: 5px;
    }

    .contact-error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
    }

    /* ==============================
       SUCCESS MESSAGE
    ============================== */

    .contact-success {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 22px;
        padding: 14px 16px;
        border: 1px solid #bbf7d0;
        border-radius: 13px;
        background: #f0fdf4;
        color: #166534;
    }

    .contact-success-icon {
        flex-shrink: 0;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #dcfce7;
    }

    .contact-success-icon svg {
        width: 14px;
        height: 14px;
    }

    .contact-success strong {
        display: block;
        font-size: 13px;
        font-weight: 700;
    }

    .contact-success span {
        display: block;
        margin-top: 2px;
        font-size: 12px;
        color: #15803d;
    }

    /* ==============================
       SUBMIT BUTTON
    ============================== */

    .contact-submit {
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        border: 0;
        border-radius: 12px;
        background: linear-gradient(
            135deg,
            #4f46e5,
            #6366f1
        );
        color: white;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        box-shadow:
            0 8px 20px rgba(79,70,229,.20);
        transition:
            transform .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .contact-submit:hover {
        background: linear-gradient(
            135deg,
            #4338ca,
            #4f46e5
        );
        transform: translateY(-1px);
        box-shadow:
            0 12px 25px rgba(79,70,229,.28);
    }

    .contact-submit:active {
        transform: translateY(0);
    }

    .contact-submit svg {
        width: 17px;
        height: 17px;
    }

    .contact-privacy {
        text-align: center;
        margin-top: 13px;
        color: #9ca3af;
        font-size: 11px;
        line-height: 1.5;
    }

    /* ==============================
       BOTTOM CTA
    ============================== */

    .contact-bottom {
        margin-top: 50px;
        padding: 28px;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        background: #f9fafb;
        text-align: center;
    }

    .contact-bottom h3 {
        margin: 0;
        color: #111827;
        font-size: 18px;
        font-weight: 700;
    }

    .contact-bottom p {
        margin: 7px auto 0;
        max-width: 520px;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.6;
    }

    /* ==============================
       MOBILE
    ============================== */

    @media (max-width: 800px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .contact-info {
            order: 2;
        }

        .contact-form-card {
            order: 1;
        }
    }

    @media (max-width: 640px) {
        .contact-hero {
            padding: 60px 18px 45px;
        }

        .contact-container {
            padding: 40px 15px 65px;
        }

        .contact-form-card {
            padding: 22px;
            border-radius: 18px;
        }

        .contact-info {
            padding: 24px;
            border-radius: 18px;
        }

        .contact-title {
            font-size: 2.5rem;
        }
    }
</style>


<div class="contact-page">

    {{-- =========================
         HERO
    ========================== --}}

    <section class="contact-hero">

        <div class="contact-badge">

            <svg viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2">
                <path d="M21 11.5a8.38 8.38 0 0 1-9 8.5
                         8.5 8.5 0 1 1 8.5-9"/>
                <path d="M21 3 12 12"/>
                <path d="M16 3h5v5"/>
            </svg>

            Get in touch

        </div>

        <h1 class="contact-title">
            We'd Love to
            <span>Hear From You</span>
        </h1>

        <p class="contact-description">
            Have a question, suggestion, feature request, or found a bug?
            Send us a message and we'll get back to you.
        </p>

    </section>


    {{-- =========================
         CONTENT
    ========================== --}}

    <main class="contact-container">

        <div class="contact-grid">

            {{-- =========================
                 INFO
            ========================== --}}

            <aside class="contact-info">

                <div class="contact-info-icon">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">
                        <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7
                                 a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
                    </svg>

                </div>

                <h2>Let's talk</h2>

                <p>
                    We're always interested in hearing from our users.
                    Your feedback helps us make Bgern better.
                </p>


                <div class="contact-benefits">

                    <div class="contact-benefit">

                        <div class="contact-benefit-icon">
                            <svg viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path d="M12 2v20"/>
                                <path d="M2 12h20"/>
                            </svg>
                        </div>

                        <div>
                            <strong>Feature suggestions</strong>
                            <span>
                                Tell us what tool you'd like to see next.
                            </span>
                        </div>

                    </div>


                    <div class="contact-benefit">

                        <div class="contact-benefit-icon">
                            <svg viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path d="M12 9v4"/>
                                <path d="M12 17h.01"/>
                                <path d="M10.3 3.3 2.5 17a2 2 0 0 0
                                         1.7 3h15.6a2 2 0 0 0
                                         1.7-3L13.7 3.3a2 2 0 0 0
                                         -3.4 0z"/>
                            </svg>
                        </div>

                        <div>
                            <strong>Report a problem</strong>
                            <span>
                                Found something that isn't working?
                            </span>
                        </div>

                    </div>


                    <div class="contact-benefit">

                        <div class="contact-benefit-icon">
                            <svg viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path d="M4 4h16v16H4z"/>
                                <path d="m4 7 8 5 8-5"/>
                            </svg>
                        </div>

                        <div>
                            <strong>General questions</strong>
                            <span>
                                Ask us anything about Bgern.
                            </span>
                        </div>

                    </div>

                </div>

            </aside>


            {{-- =========================
                 FORM
            ========================== --}}

            <section class="contact-form-card">

                <div class="contact-form-header">
                    <h2>Send us a message</h2>

                    <p>
                        Fill out the form below and we'll receive your message.
                    </p>
                </div>


                @if(session('status'))

                    <div class="contact-success">

                        <div class="contact-success-icon">

                            <svg viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="3">
                                <path d="m5 12 4 4L19 6"/>
                            </svg>

                        </div>

                        <div>
                            <strong>Message sent successfully!</strong>

                            <span>
                                {{ session('status') }}
                            </span>
                        </div>

                    </div>

                @endif


                <form
                    action="{{ route('contact.submit') }}"
                    method="POST"
                    class="contact-form"
                >

                    @csrf


                    {{-- NAME --}}

                    <div class="contact-field">

                        <label for="contact-name">
                            Your name
                        </label>

                        <div class="contact-input-wrapper">

                            <span class="contact-input-icon">
                                <svg viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2">
                                    <circle cx="12" cy="7" r="4"/>
                                    <path d="M5.5 21a6.5 6.5 0 0 1 13 0"/>
                                </svg>
                            </span>

                            <input
                                id="contact-name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="contact-input"
                                placeholder="Enter your name"
                                autocomplete="name"
                                required
                            >

                        </div>

                        @error('name')
                            <p class="contact-error">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- EMAIL --}}

                    <div class="contact-field">

                        <label for="contact-email">
                            Email address
                        </label>

                        <div class="contact-input-wrapper">

                            <span class="contact-input-icon">
                                <svg viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2">
                                    <rect x="3" y="5" width="18" height="14"
                                          rx="2"/>
                                    <path d="m3 7 9 6 9-6"/>
                                </svg>
                            </span>

                            <input
                                id="contact-email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="contact-input"
                                placeholder="you@example.com"
                                autocomplete="email"
                                required
                            >

                        </div>

                        @error('email')
                            <p class="contact-error">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- MESSAGE --}}

                    <div class="contact-field">

                        <label for="contact-message">
                            Your message
                        </label>

                        <div class="contact-textarea-wrapper">

                            <textarea
                                id="contact-message"
                                name="message"
                                rows="6"
                                maxlength="2000"
                                class="contact-textarea"
                                placeholder="Tell us how we can help..."
                                required
                            >{{ old('message') }}</textarea>

                            <span
                                id="message-count"
                                class="contact-message-count"
                            >
                                0 / 2000
                            </span>

                        </div>

                        @error('message')
                            <p class="contact-error">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- SUBMIT --}}

                    <button
                        type="submit"
                        class="contact-submit"
                    >

                        <span>Send Message</span>

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">
                            <path d="M22 2 11 13"/>
                            <path d="m22 2-7 20-4-9-9-4z"/>
                        </svg>

                    </button>

                </form>


                <p class="contact-privacy">
                    Your information is only used to respond to your message.
                </p>

            </section>

        </div>


        {{-- =========================
             BOTTOM MESSAGE
        ========================== --}}

        <div class="contact-bottom">

            <h3>Looking for quick answers?</h3>

            <p>
                You may find what you're looking for in our FAQ.
                Check the most common questions before sending us a message.
            </p>

            <div style="margin-top: 16px;">

                <a
                    href="{{ route('faq') }}"
                    style="
                        display:inline-flex;
                        align-items:center;
                        gap:7px;
                        color:#4f46e5;
                        font-size:13px;
                        font-weight:700;
                        text-decoration:none;
                    "
                >
                    Visit FAQ

                    <svg
                        width="15"
                        height="15"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M5 12h14"/>
                        <path d="m13 6 6 6-6 6"/>
                    </svg>

                </a>

            </div>

        </div>

    </main>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const message = document.getElementById('contact-message');
        const counter = document.getElementById('message-count');

        if (message && counter) {

            function updateCounter() {

                const length = message.value.length;

                counter.textContent = `${length} / 2000`;

            }

            message.addEventListener('input', updateCounter);

            updateCounter();
        }

    });
</script>

</x-layouts.public>