
<x-layouts.public
    :title="'About Bgern - Free Online Tools'"
    :description="'Learn about Bgern, a free online tools platform for PDF, image, text, and everyday digital tasks.'"
>

<div class="min-h-screen bg-white text-slate-900">

    {{-- =========================================================
        HERO
    ========================================================== --}}
    <section class="relative overflow-hidden border-b border-slate-100">

        {{-- Subtle grid --}}
        <div
            class="pointer-events-none absolute inset-0 opacity-[0.45]"
            style="background-image: linear-gradient(#e2e8f0 1px, transparent 1px), linear-gradient(90deg, #e2e8f0 1px, transparent 1px); background-size: 64px 64px; mask-image: linear-gradient(to bottom, black, transparent 85%); -webkit-mask-image: linear-gradient(to bottom, black, transparent 85%);"
        ></div>

        {{-- Soft glow --}}
        <div
            class="pointer-events-none absolute left-1/2 top-[-220px] h-[420px] w-[720px] -translate-x-1/2 rounded-full bg-blue-100/50 blur-3xl"
        ></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-4xl py-20 text-center sm:py-24 lg:py-28">

                {{-- Badge --}}
                <div
                    class="mb-7 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3.5 py-1.5 text-xs font-semibold text-slate-600 shadow-sm"
                >
                    <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>
                    Free tools for everyday work
                </div>


                {{-- Heading --}}
                <h1
                    class="text-4xl font-bold tracking-[-0.04em] text-slate-950 sm:text-5xl lg:text-6xl"
                >
                    Simple tools.
                    <span class="text-blue-600">
                        Less friction.
                    </span>
                </h1>


                {{-- Description --}}
                <p
                    class="mx-auto mt-6 max-w-2xl text-base leading-7 text-slate-600 sm:text-lg sm:leading-8"
                >
                    Bgern is a growing collection of free online tools
                    designed to make everyday digital tasks faster,
                    simpler, and more accessible.
                </p>


                {{-- Trust points --}}
                <div
                    class="mt-8 flex flex-wrap items-center justify-center gap-x-7 gap-y-3 text-sm text-slate-500"
                >

                    <div class="flex items-center gap-2">
                        <svg
                            class="h-4 w-4 text-emerald-500"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>
                        Free to use
                    </div>

                    <div class="flex items-center gap-2">
                        <svg
                            class="h-4 w-4 text-emerald-500"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>
                        Simple by design
                    </div>

                    <div class="flex items-center gap-2">
                        <svg
                            class="h-4 w-4 text-emerald-500"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>
                        Privacy focused
                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
        CORE VALUES
    ========================================================== --}}
    <section class="py-16 sm:py-20">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Section heading --}}
            <div class="mx-auto max-w-2xl text-center">

                <p class="text-sm font-semibold text-blue-600">
                    Why Bgern
                </p>

                <h2
                    class="mt-2 text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl"
                >
                    Built around the way people actually work.
                </h2>

                <p class="mt-3 text-sm leading-6 text-slate-500 sm:text-base">
                    Useful tools should feel straightforward, reliable,
                    and easy to access.
                </p>

            </div>


            {{-- Cards --}}
            <div class="mt-10 grid gap-5 md:grid-cols-3">


                {{-- Fast --}}
                <div
                    class="group rounded-2xl border border-slate-200 bg-white p-6 transition duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg hover:shadow-slate-200/60"
                >

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600 ring-1 ring-blue-100 transition group-hover:bg-blue-600 group-hover:text-white"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13 10V3L4 14h7v7l9-11h-7z"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-5 text-base font-semibold text-slate-950">
                        Fast & simple
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Clean interfaces and focused workflows help you
                        complete everyday tasks without unnecessary steps.
                    </p>

                </div>



                {{-- Privacy --}}
                <div
                    class="group rounded-2xl border border-slate-200 bg-white p-6 transition duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg hover:shadow-slate-200/60"
                >

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600 ring-1 ring-blue-100 transition group-hover:bg-blue-600 group-hover:text-white"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-5 text-base font-semibold text-slate-950">
                        Privacy focused
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Whenever possible, processing happens directly
                        in your browser to reduce unnecessary data transfers.
                    </p>

                </div>



                {{-- Growing --}}
                <div
                    class="group rounded-2xl border border-slate-200 bg-white p-6 transition duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg hover:shadow-slate-200/60"
                >

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600 ring-1 ring-blue-100 transition group-hover:bg-blue-600 group-hover:text-white"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 4v16m8-8H4"
                            />
                        </svg>

                    </div>

                    <h3 class="mt-5 text-base font-semibold text-slate-950">
                        Always improving
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        We keep adding practical tools based on real
                        problems and everyday user needs.
                    </p>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
        MISSION
    ========================================================== --}}
    <section class="border-y border-slate-200 bg-slate-50 py-16 sm:py-20">

        <div
            class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8"
        >

            {{-- Content --}}
            <div>

                <div
                    class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700 ring-1 ring-blue-100"
                >
                    Our mission
                </div>

                <h2
                    class="mt-5 max-w-xl text-3xl font-bold tracking-[-0.025em] text-slate-950 sm:text-4xl"
                >
                    Useful tools without
                    <span class="text-blue-600">
                        unnecessary friction.
                    </span>
                </h2>

                <div
                    class="mt-5 max-w-xl space-y-4 text-sm leading-7 text-slate-600 sm:text-base"
                >

                    <p>
                        Bgern was created around a simple idea:
                        everyday digital tasks shouldn't require complicated
                        software or expensive subscriptions.
                    </p>

                    <p>
                        Whether you need to work with a PDF, resize an image,
                        analyze text, calculate something, or complete another
                        small digital task, Bgern aims to put the right tool
                        within easy reach.
                    </p>

                    <p>
                        We're building Bgern into a practical digital toolbox
                        for students, creators, developers, professionals,
                        and anyone who needs to get things done online.
                    </p>

                </div>

            </div>



            {{-- Privacy card --}}
            <div
                class="rounded-2xl bg-slate-950 p-7 shadow-xl shadow-slate-300/30 sm:p-8"
            >

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-500/10 text-blue-400 ring-1 ring-blue-400/20"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.042-.133-2.052-.382-3.016z"
                            />
                        </svg>

                    </div>

                    <span class="text-sm font-semibold text-blue-400">
                        Privacy by design
                    </span>

                </div>


                <h3
                    class="mt-6 text-2xl font-bold tracking-tight text-white"
                >
                    Your files stay
                    <span class="text-blue-400">
                        yours.
                    </span>
                </h3>


                <p class="mt-3 text-sm leading-6 text-slate-400">
                    Whenever possible, Bgern processes files locally
                    in your browser instead of sending them to a server.
                </p>


                <div class="mt-7 divide-y divide-white/10">

                    <div class="flex items-center gap-3 py-3 first:pt-0">

                        <span
                            class="flex h-7 w-7 items-center justify-center rounded-lg bg-emerald-400/10 text-emerald-400"
                        >
                            ✓
                        </span>

                        <span class="text-sm text-slate-300">
                            No unnecessary account
                        </span>

                    </div>


                    <div class="flex items-center gap-3 py-3">

                        <span
                            class="flex h-7 w-7 items-center justify-center rounded-lg bg-emerald-400/10 text-emerald-400"
                        >
                            ✓
                        </span>

                        <span class="text-sm text-slate-300">
                            Browser-based processing
                        </span>

                    </div>


                    <div class="flex items-center gap-3 py-3 last:pb-0">

                        <span
                            class="flex h-7 w-7 items-center justify-center rounded-lg bg-emerald-400/10 text-emerald-400"
                        >
                            ✓
                        </span>

                        <span class="text-sm text-slate-300">
                            Simple and transparent
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
        TOOLBOX
    ========================================================== --}}
    <section class="py-16 sm:py-20">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">

                <div class="max-w-2xl">

                    <p class="text-sm font-semibold text-blue-600">
                        The Bgern toolbox
                    </p>

                    <h2
                        class="mt-2 text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl"
                    >
                        Tools for everyday digital tasks.
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-slate-500 sm:text-base">
                        A growing collection of practical utilities
                        designed to keep your workflow simple.
                    </p>

                </div>

            </div>


            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                @foreach([
                    [
                        'PDF Tools',
                        'Edit, convert, compress and manage PDF files.'
                    ],
                    [
                        'Image Tools',
                        'Resize, compress and optimize images.'
                    ],
                    [
                        'Text Tools',
                        'Analyze, format and transform text.'
                    ],
                    [
                        'Everyday Tools',
                        'Quick utilities for common digital tasks.'
                    ],
                ] as [$title, $description])

                    <div
                        class="group rounded-2xl border border-slate-200 bg-white p-5 transition duration-200 hover:-translate-y-0.5 hover:border-blue-200 hover:shadow-md"
                    >

                        <div class="flex items-center justify-between">

                            <div
                                class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-100 text-slate-600 transition group-hover:bg-blue-50 group-hover:text-blue-600"
                            >
                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"
                                    />
                                </svg>
                            </div>

                            <svg
                                class="h-4 w-4 text-slate-300 transition group-hover:translate-x-0.5 group-hover:text-blue-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>

                        </div>


                        <h3 class="mt-5 text-sm font-semibold text-slate-950">
                            {{ $title }}
                        </h3>

                        <p class="mt-2 text-xs leading-5 text-slate-500">
                            {{ $description }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </section>



    {{-- =========================================================
        CTA
    ========================================================== --}}
    <section class="pb-16 sm:pb-20">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div
                class="overflow-hidden rounded-2xl bg-blue-600 px-6 py-10 sm:px-10 sm:py-12"
            >

                <div
                    class="flex flex-col gap-7 lg:flex-row lg:items-center lg:justify-between"
                >

                    <div class="max-w-2xl">

                        <p class="text-sm font-semibold text-blue-100">
                            Help shape Bgern
                        </p>

                        <h2
                            class="mt-2 text-2xl font-bold tracking-tight text-white sm:text-3xl"
                        >
                            Have an idea for a new tool?
                        </h2>

                        <p
                            class="mt-3 max-w-xl text-sm leading-6 text-blue-100"
                        >
                            Tell us what you need. Your suggestion could
                            become the next useful tool added to Bgern.
                        </p>

                    </div>


                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-blue-700 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-blue-50 hover:shadow-md"
                    >

                        Suggest a tool

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"
                            />
                        </svg>

                    </a>

                </div>

            </div>

        </div>

    </section>

</div>

</x-layouts.public>
```
