<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    <style>
        body {
            background-color: #f5e6dc;
        }

        /* Remove focus outline from inputs */
        input:focus {
            outline: none !important;
            box-shadow: none !important;
        }

        /* Make input text black */
        input {
            color: #000000 !important;
        }

        input::placeholder {
            color: #9ca3af;
        }

        /* Keep eye icon visible on hover */
        button[aria-label*="password"]:hover,
        button[type="button"]:hover {
            opacity: 1 !important;
        }

        button[aria-label*="password"] svg,
        button[type="button"] svg {
            opacity: 1 !important;
        }

        /* Make submit buttons rounded full */
        button[type="submit"] {
            border-radius: 9999px !important;
        }
    </style>
</head>

<body class="min-h-screen antialiased">
    <div class="flex min-h-screen items-center justify-center p-4 sm:p-6 lg:p-8">
        <!-- Card Container -->
        <div class="w-full max-w-xl bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="flex items-center justify-center p-6 sm:p-8 lg:p-12">
                <div class="w-full">
                    <div class="mb-8 text-center">
                        <h2 class="font-bold text-amber-700 text-2xl lg:text-3xl">CARITA</h2>
                    </div>

                    <div class="space-y-6">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @fluxScripts
</body>

</html>
