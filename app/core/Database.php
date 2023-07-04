<?php

namespace core;

use PDO;

class Database
{
    protected PDO $connection;

    protected $statement;

    public function __construct(array $config)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        // Can also include user and password as a constructor parameter in PDO.
        $this->connection = new PDO($dsn, null, null, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = []): self
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find(): array|bool
    {
        return $this->statement->fetch();
    }

    public function findOrFail(): array
    {
        $record = $this->find();
        if (!$record) {
            abort();
        }
        return $record;
    }

    public function get(): array
    {
        return $this->statement->fetchAll();
    }
}
