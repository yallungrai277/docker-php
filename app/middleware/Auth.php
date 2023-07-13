<?php

namespace middleware;

class Auth extends Middleware
{
    public function handle(): void
    {
        if (!authUser()) {
            header('location: /register');
            exit;
        }
    }
}
