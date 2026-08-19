<x-layouts.public
    :title="'About Bgern - Free Online Tools'"
    :description="'Learn about Bgern, a free online tools platform for PDF, image, text, and everyday digital tasks.'"
>

<div class="relative isolate overflow-hidden bg-white text-slate-900">

    {{-- ============================================
        SUBTLE BACKGROUND
    ============================================= --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">

        <div class="absolute left-1/2 top-[-260px]
                    h-[520px] w-[760px]
                    -translate-x-1/2 rounded-full
                    bg-blue-50/80 blur-3xl">
        </div>

        <div class="absolute right-[-200px] top-[650px]
                    h-[360px] w-[360px]
                    rounded-full bg-slate-100/80 blur-3xl">
        </div>

    </div>


    {{-- ============================================
        HERO
    ============================================= --}}
    <section class="px-4 pt-16 pb-14 sm:pt-20 sm:pb-16">

        <div class="mx-auto max-w-6xl text-center">

            {{-- Badge --}}
            <div class="mb-6 inline-flex items-center gap-2
                        rounded-full border border-blue-100
                        bg-blue-50 px-3.5 py-1.5
                        text-xs font-semibold text-blue-700">

                <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>

                Free tools for everyday work

            </div>


            {{-- Heading --}}
            <h1 class="mx-auto max-w-4xl text-4xl font-bold
                       tracking-[-0.03em] text-slate-950
                       sm:text-5xl lg:text-6xl">

                Simple tools for

                <span class="text-blue-600">
                    getting things done.
                </span>

            </h1>


            <p class="mx-auto mt-5 max-w-2xl text-base
                      leading-7 text-slate-500 sm:text-lg">

                Bgern brings useful online tools together in one simple
                place — helping you work with PDFs, images, text,
                and everyday digital tasks faster.

            </p>


            {{-- Mini highlights --}}
            <div class="mt-7 flex flex-wrap justify-center
                        gap-x-6 gap-y-3 text-xs font-medium text-slate-500">

                <div class="flex items-center gap-2">
                    <span class="text-blue-600">✓</span>
                    Free to use
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-blue-600">✓</span>
                    No complicated setup
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-blue-600">✓</span>
                    Privacy focused
                </div>

            </div>

        </div>

    </section>



    {{-- ============================================
        FEATURE CARDS
    ============================================= --}}
    <section class="px-4 pb-20">

        <div class="mx-auto max-w-6xl">

            <div class="grid gap-4 md:grid-cols-3">


                {{-- Card --}}
                <div class="group rounded-2xl border border-slate-200
                            bg-white p-6
                            transition-all duration-200
                            hover:-translate-y-1
                            hover:border-blue-200
                            hover:shadow-[0_12px_35px_rgba(15,23,42,0.07)]">

                    <div class="flex h-11 w-11 items-center justify-center
                                rounded-xl bg-blue-50 text-blue-600
                                transition-colors
                                group-hover:bg-blue-600
                                group-hover:text-white">

                        <svg class="h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M13 10V3L4 14h7v7l9-11h-7z"/>

                        </svg>

                    </div>

                    <h2 class="mt-5 text-base font-semibold text-slate-950">
                        Fast & simple
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Straightforward tools with clean interfaces
                        that help you finish tasks without unnecessary steps.
                    </p>

                </div>



                {{-- Card --}}
                <div class="group rounded-2xl border border-slate-200
                            bg-white p-6
                            transition-all duration-200
                            hover:-translate-y-1
                            hover:border-blue-200
                            hover:shadow-[0_12px_35px_rgba(15,23,42,0.07)]">

                    <div class="flex h-11 w-11 items-center justify-center
                                rounded-xl bg-blue-50 text-blue-600
                                transition-colors
                                group-hover:bg-blue-600
                                group-hover:text-white">

                        <svg class="h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>

                        </svg>

                    </div>

                    <h2 class="mt-5 text-base font-semibold text-slate-950">
                        Privacy focused
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Whenever possible, tools process your files
                        directly in your browser to minimize unnecessary
                        data transfers.
                    </p>

                </div>



                {{-- Card --}}
                <div class="group rounded-2xl border border-slate-200
                            bg-white p-6
                            transition-all duration-200
                            hover:-translate-y-1
                            hover:border-blue-200
                            hover:shadow-[0_12px_35px_rgba(15,23,42,0.07)]">

                    <div class="flex h-11 w-11 items-center justify-center
                                rounded-xl bg-blue-50 text-blue-600
                                transition-colors
                                group-hover:bg-blue-600
                                group-hover:text-white">

                        <svg class="h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 4v16m8-8H4"/>

                        </svg>

                    </div>

                    <h2 class="mt-5 text-base font-semibold text-slate-950">
                        Always improving
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        We continuously add useful tools based on
                        real problems and everyday user needs.
                    </p>

                </div>

            </div>

        </div>

    </section>



    {{-- ============================================
        MISSION
    ============================================= --}}
    <section class="border-y border-slate-200
                    bg-slate-50 px-4 py-16 sm:py-20">

        <div class="mx-auto grid max-w-6xl items-center
                    gap-12 lg:grid-cols-[1.1fr_0.9fr]">


            {{-- Text --}}
            <div>

                <span class="text-xs font-bold uppercase
                             tracking-[0.15em] text-blue-600">

                    Our mission

                </span>

                <h2 class="mt-3 max-w-xl text-3xl font-bold
                           tracking-[-0.02em] text-slate-950
                           sm:text-4xl">

                    Make useful digital tools
                    <span class="text-blue-600">
                        accessible to everyone.
                    </span>

                </h2>

                <div class="mt-5 max-w-xl space-y-4
                            text-sm leading-7 text-slate-600">

                    <p>
                        Bgern started with a simple belief:
                        everyday digital tasks shouldn't require
                        complicated software or expensive subscriptions.
                    </p>

                    <p>
                        Whether you're working with a PDF, optimizing
                        an image, analyzing text, or solving a quick
                        calculation, Bgern aims to make the process
                        faster and easier.
                    </p>

                    <p>
                        Our goal is to build a practical online toolbox
                        for students, creators, developers, professionals,
                        and everyday users.
                    </p>

                </div>

            </div>



            {{-- Privacy panel --}}
            <div class="rounded-2xl border border-slate-800
                        bg-slate-950 p-7 shadow-xl
                        shadow-slate-200/50">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center
                                rounded-xl bg-blue-500/10
                                text-blue-400 ring-1 ring-blue-500/20">

                        <svg class="h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.042-.133-2.052-.382-3.016z"/>

                        </svg>

                    </div>

                    <span class="text-sm font-semibold text-blue-400">
                        Privacy by design
                    </span>

                </div>


                <h3 class="mt-6 text-2xl font-bold
                           tracking-tight text-white">

                    Your files stay
                    <span class="text-blue-400">
                        yours.
                    </span>

                </h3>


                <p class="mt-3 text-sm leading-6 text-slate-400">

                    Whenever possible, Bgern processes files locally
                    in your browser instead of sending them to a server.

                </p>


                <div class="mt-6 space-y-3">

                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <span class="text-emerald-400">✓</span>
                        No unnecessary account
                    </div>

                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <span class="text-emerald-400">✓</span>
                        Browser-based processing
                    </div>

                    <div class="flex items-center gap-3 text-sm text-slate-300">
                        <span class="text-emerald-400">✓</span>
                        Simple and transparent
                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ============================================
        TOOL CATEGORIES
    ============================================= --}}
    <section class="px-4 py-16 sm:py-20">

        <div class="mx-auto max-w-6xl">

            <div class="max-w-xl">

                <span class="text-xs font-bold uppercase
                             tracking-[0.15em] text-blue-600">
                    The Bgern toolbox
                </span>

                <h2 class="mt-3 text-3xl font-bold
                           tracking-[-0.02em] text-slate-950">

                    Tools for the tasks
                    you do every day.

                </h2>

                <p class="mt-3 text-sm leading-6 text-slate-500">
                    One growing collection of practical tools,
                    designed to keep your workflow simple.
                </p>

            </div>


            <div class="mt-8 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">

                @foreach([
                    ['PDF Tools', 'Edit, convert, compress and manage PDF files.'],
                    ['Image Tools', 'Resize, compress and optimize images.'],
                    ['Text Tools', 'Analyze, format and transform text.'],
                    ['Everyday Tools', 'Quick utilities for common digital tasks.'],
                ] as [$title, $description])

                    <div class="group rounded-xl border border-slate-200
                                bg-white p-5
                                transition-all duration-200
                                hover:border-blue-200
                                hover:shadow-md">

                        <div class="mb-4 flex h-8 w-8 items-center
                                    justify-center rounded-lg
                                    bg-blue-50 text-xs font-bold
                                    text-blue-600">

                            →

                        </div>

                        <h3 class="text-sm font-semibold text-slate-950">
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



    {{-- ============================================
        CTA
    ============================================= --}}
    <section class="px-4 pb-16 sm:pb-20">

        <div class="mx-auto max-w-6xl">

            <div class="relative overflow-hidden
                        rounded-2xl bg-blue-600
                        px-6 py-10 sm:px-10 sm:py-12">

                {{-- Background pattern --}}
                <div class="pointer-events-none absolute inset-0 opacity-10">

                    <div class="absolute -right-20 -top-20
                                h-64 w-64 rounded-full
                                border-[40px] border-white">
                    </div>

                    <div class="absolute -bottom-32 -left-20
                                h-72 w-72 rounded-full
                                border-[40px] border-white">
                    </div>

                </div>


                <div class="relative flex flex-col gap-7
                            lg:flex-row lg:items-center
                            lg:justify-between">

                    <div class="max-w-xl">

                        <span class="text-xs font-bold uppercase
                                     tracking-[0.15em] text-blue-100">
                            Help us improve
                        </span>

                        <h2 class="mt-2 text-2xl font-bold
                                   tracking-tight text-white
                                   sm:text-3xl">

                            Have an idea for a new tool?

                        </h2>

                        <p class="mt-2 text-sm leading-6 text-blue-100">

                            Tell us what you need. Your suggestion
                            could become the next tool on Bgern.

                        </p>

                    </div>


                    <div class="shrink-0">

                        <a
                            href="{{ route('contact') }}"
                            class="inline-flex items-center justify-center
                                   gap-2 rounded-xl bg-white
                                   px-5 py-3 text-sm font-semibold
                                   text-blue-700
                                   shadow-sm
                                   transition-all duration-200
                                   hover:-translate-y-0.5
                                   hover:bg-blue-50
                                   hover:shadow-lg"
                        >

                            Suggest a tool

                            <svg class="h-4 w-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M13 7l5 5m0 0l-5 5m5-5H6"/>

                            </svg>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

</x-layouts.public>
```
