<?php require base_path('views/partials/head.view.php') ?>

<?php $_SESSION['name'] = 'Json' ?>

<body class="h-full">
    <div class="min-h-full">
        <?php require base_path('views/partials/nav.view.php'); ?>

        <?php require base_path('views/partials/banner.view.php'); ?>
        <main>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                Welcome to notes app.
            </div>
        </main>
    </div>
</body>

</html>