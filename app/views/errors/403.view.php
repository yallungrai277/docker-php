<?php require base_path('views/partials/head.view.php'); ?>

<body class="h-full">
    <div class="min-h-full">
        <?php require base_path('views/partials/nav.view.php'); ?>


        <main>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                <p>
                    <a href="/" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-blue-700">
                        <span class="text-sm font-medium">Go to home</span>
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </p>
                <div class="bg-red-50 dark:bg-red-800 border border-red-200 dark:border-red-700 rounded-lg p-8 md:p-12 mb-8">
                    <div class="text-xs font-medium inline-flex items-center py-0.5 rounded-md mb-2">
                        <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">
                            You are not authorized to view this page.
                        </h1>
                    </div>
                </div>
        </main>
    </div>
</body>

</html>