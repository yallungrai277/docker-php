<?php require base_path('views/partials/head.view.php'); ?>

<body class="h-full">
    <div class="min-h-full">
        <?php require base_path('views/partials/nav.view.php'); ?>

        <?php require base_path('views/partials/banner.view.php'); ?>

        <main>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                <p>
                    <a href="/notes" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-blue-700">
                        <span class="text-sm font-medium">Go back</span>
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </p>
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                    <div class="text-xs font-medium inline-flex items-center py-0.5 rounded-md mb-2">
                        <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">Created on:
                            <?= formatDateString($note['created_at']) ?></span>
                        <span class="text-xs bg-green-600 rounded-full text-white px-4 py-1.5 mr-3">Last updated on:
                            <?= formatDateString($note['updated_at']) ?></span>
                    </div>
                    <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">
                        <?= $note['title'] ?></h1>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6"><?= $note['body'] ?></p>
                    <form class="mt-6" method="POST" action="/note/delete">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" value="<?= $note['id'] ?>" name="id">
                        <button class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">Delete
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>