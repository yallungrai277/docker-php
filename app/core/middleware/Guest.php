<?php

namespace core\middleware;

class Guest extends Middleware
{
    public function handle(): void
    {
        if (authUser()) {
            header('location: /');
            exit;
        }
    }
}
