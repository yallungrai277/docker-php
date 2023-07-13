<?php

use core\Session;

view('views/login/create.view.php', [
    'heading' => 'Login',
    'errors' => Session::getFlash('errors')
]);
