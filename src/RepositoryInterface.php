<?php

namespace tyasa81\DbRepositories;

interface RepositoryInterface
{
    public function __construct(?string $connection = null);

    public function get(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $selects = [], array $withs = [], array $orderBys = []);

    public function first(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $selects = [], array $withs = [], array $orderBys = []);

    public function paginate(array $wheres, array $whereIns, array $whereHaves, array $selects, array $withs, array $orderBys, int $perPage);

    public function cursor_paginate(array $wheres, array $whereIns, array $whereHaves, array $selects, array $withs, array $orderBys, int $perPage);

    public function count(array $wheres = [], array $whereIns = [], array $whereHaves = []);

    public function sum(array $wheres = [], array $whereIns = [], array $whereHaves = []);

    public function updateMany(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $updates = []);

    public function deleteMany(array $wheres = [], array $whereIns = [], array $whereHaves = []);

    public static function delete($model);

    public static function save($model);
}
