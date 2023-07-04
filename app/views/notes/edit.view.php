<?php require base_path('views/partials/head.view.php'); ?>

<body class="h-full">
    <div class="min-h-full">
        <?php require base_path('views/partials/nav.view.php'); ?>

        <?php require base_path('views/partials/banner.view.php'); ?>

        <main>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                <form method="POST" action="/note/update">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" value="<?= $note['id'] ?>" name="id">
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <p class="mt-1 text-sm leading-6 text-gray-600">Keep your notes so that you can come back to
                                it later.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                    <div class="mt-2">
                                        <input id="title" name="title" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= isset($_POST['title']) ? $_POST['title'] : $note['title'] ?>">
                                        <?php if (isset($errors)) { ?>
                                            <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?? '' ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-full">
                                    <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                                    <div class="mt-2">
                                        <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= isset($_POST['body']) ? $_POST['body'] : $note['body'] ?></textarea>
                                    </div>
                                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about your
                                        description.</p>

                                    <?php if (isset($errors)) { ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?? '' ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="/notes" class="rounded-md bg-grey-600 px-3 py-2 text-sm font-semibold shadow-sm hover:bg-grey-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-grey-600">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>