<?php

namespace tyasa81\DbRepositories;

interface RepositoryInterface
{
    public function __construct(?string $connection = null);

    public function get(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $groupBys = [], array $selects = [], array $withs = [], array $orderBys = []);

    public function first(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $groupBys = [], array $selects = [], array $withs = [], array $orderBys = []);

    public function paginate(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $groupBys = [], array $selects = [], array $withs = [], array $orderBys = [], int $perPage = 10);

    public function cursorPaginate(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $groupBys = [], array $selects = [], array $withs = [], array $orderBys = [], int $perPage = 10);

    public function count(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $groupBys = []);

    public function sum(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $groupBys = [], $columnName = '');

    public function max(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $groupBys = [], $columnName = '');

    public function min(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $groupBys = [], $columnName = '');

    public function avg(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $groupBys = [], $columnName = '');

    public function updateMany(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $updates = []);

    public function deleteMany(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = []);

    public function chunkById(callable $handler, array $wheres = [], array $whereIns = [], array $whereHaves = [], array $whereNulls = [], array $whereNotNulls = [], array $groupBys = [], array $selects = [], array $withs = [], int $perChunk = 100);

    public static function delete($model);

    public static function save($model);

    public static function update($model, array $updates);
}
