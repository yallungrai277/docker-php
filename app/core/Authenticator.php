<?php

namespace core;

class Authenticator
{
    protected readonly Database $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function attempt(string $email, string $password): bool
    {
        $user = $this->db->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);

                return true;
            }
        }
        return false;
    }

    public function login(array $user): void
    {
        unset($user['password']);
        $_SESSION['user'] = $user;
        session_regenerate_id(true);
    }

    public function register(array $attributes): array
    {
        $this->db->query('insert into users(email, password, created_at, updated_at) values (:email, :password, :created_at, :updated_at)', [
            'email' => $attributes['email'],
            'password' => password_hash($attributes['password'], PASSWORD_BCRYPT),
            'created_at' => getDateTime(),
            'updated_at' => getDateTime()
        ]);

        return $this->db->query('select * from users where email = ?', [$attributes['email']])->find();
    }

    public function logout(): void
    {
        Session::destroy();
    }
}
