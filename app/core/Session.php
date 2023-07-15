<?php

namespace core;

class Session
{
    public static function has(string $key)
    {
        return (bool) static::get($key);
    }

    public static function put(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function flash(string $key, mixed $value): void
    {
        $_SESSION[SuperGlobal::FLASH_SESSION_KEY][$key] = $value;
    }

    public static function unflash(): void
    {
        unset($_SESSION[SuperGlobal::FLASH_SESSION_KEY]);
    }

    public static function getFlash($key): mixed
    {
        return $_SESSION[SuperGlobal::FLASH_SESSION_KEY][$key] ?? null;
    }

    public static function flush(): void
    {
        $_SESSION = [];
    }

    public static function destroy(): void
    {
        static::flush();
        session_destroy();

        $params = session_get_cookie_params();
        setcookie(SuperGlobal::PHPSESSION_COOKIE_NAME, '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
