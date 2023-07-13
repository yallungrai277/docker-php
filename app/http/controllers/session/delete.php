<?php

use core\Authenticator;

(new Authenticator)->logout();
redirect('/login');
