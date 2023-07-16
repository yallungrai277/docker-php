<?php require base_path('views/partials/head.view.php'); ?>

<body class="h-full">
    <div class="min-h-full">
        <?php require base_path('views/partials/nav.view.php'); ?>

        <?php require base_path('views/partials/banner.view.php'); ?>

        <main>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                <?php require base_path('views/partials/flash.view.php'); ?>
                <p>
                    <a href="/note/create" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Create
                        note</a>
                </p>
                <?php if (empty($notes)) { ?>
                    <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700 mt-10" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <span class="font-medium">Could not find any notes on your list.</span>
                        </div>
                    </div>
                <?php } ?>
                <div class="grid md:grid-cols-2 gap-8 mt-4">
                    <?php foreach ($notes as $note) { ?>
                        <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                            <a href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                                <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                    <path d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                                </svg>
                                Created: <?= formatDateString($note['created_at']) ?>, Updated:
                                <?= formatDateString($note['updated_at']) ?>
                            </a>
                            <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">
                                <?= $note['title'] ?></h2>
                            <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4"><?= $note['body'] ?>
                            </p>
                            <a href="/note?id=<?= $note['id'] ?>" class="text-yellow-600 dark:text-yellpw-500 hover:underline font-medium text-lg inline-flex items-center">View

                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                            <a href="/note/edit?id=<?= $note['id'] ?>" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Edit

                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </main>
    </div>
</body>

</html>