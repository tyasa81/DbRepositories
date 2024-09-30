<?php

namespace tyasa81\DbRepositories;

trait EloquentTrait
{
    // you need a model variable in the repository
    public function get(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $selects = [], array $withs = [], array $orderBys = [])
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return [];
        }
        $model = clone $this->model;
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $model = $model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $model = $model->where($where[0], $where[1]);
            } else {
                $model = $model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $model = $model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $model = $model->whereHas($whereHas[0], $whereHas[1]);
        }
        if (count($selects)) {
            $model = $model->select($selects);
        }
        if (count($withs)) {
            $model = $model->with($withs);
        }
        if (count($orderBys)) {
            foreach ($orderBys as $orderBy) {
                $model = $model->orderBy($orderBy[0], $orderBy[1]);
            }
        }

        return $model->get();
    }

    public function first(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $selects = [], array $withs = [], array $orderBys = [])
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return null;
        }
        $model = clone $this->model;
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $model = $model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $model = $model->where($where[0], $where[1]);
            } else {
                $model = $model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $model = $model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $model = $model->whereHas($whereHas[0], $whereHas[1]);
        }
        if (count($selects)) {
            $model = $model->select($selects);
        }
        if (count($withs)) {
            $model = $model->with($withs);
        }
        if (count($orderBys)) {
            foreach ($orderBys as $orderBy) {
                $model = $model->orderBy($orderBy[0], $orderBy[1]);
            }
        }

        return $model->first();
    }

    public function paginate(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $selects = [], array $withs = [], array $orderBys = [], int $perPage = 10)
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return null;
        }
        $model = clone $this->model;
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $model = $model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $model = $model->where($where[0], $where[1]);
            } else {
                $model = $model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $model = $model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $model = $model->whereHas($whereHas[0], $whereHas[1]);
        }
        if (count($selects)) {
            $model = $model->select($selects);
        }
        if (count($withs)) {
            $model = $model->with($withs);
        }
        if (count($orderBys)) {
            foreach ($orderBys as $orderBy) {
                $model = $model->orderBy($orderBy[0], $orderBy[1]);
            }
        }

        return $model->paginate($perPage);
    }

    public function cursor_paginate(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $selects = [], array $withs = [], array $orderBys = [], int $perPage = 10)
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return null;
        }
        $model = clone $this->model;
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $model = $model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $model = $model->where($where[0], $where[1]);
            } else {
                $model = $model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $model = $model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $model = $model->whereHas($whereHas[0], $whereHas[1]);
        }
        if (count($selects)) {
            $model = $model->select($selects);
        }
        if (count($withs)) {
            $model = $model->with($withs);
        }
        if (count($orderBys)) {
            foreach ($orderBys as $orderBy) {
                $model = $model->orderBy($orderBy[0], $orderBy[1]);
            }
        }

        return $model->cursor_paginate($perPage);
    }

    public function count(array $wheres = [], array $whereIns = [], array $whereHaves = [])
    {
        $model = clone $this->model;
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $model = $model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $model = $model->where($where[0], $where[1]);
            } else {
                $model = $model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $model = $model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $model = $model->whereHas($whereHas[0], $whereHas[1]);
        }

        return $model->count();
    }

    public function sum(array $wheres = [], array $whereIns = [], array $whereHaves = [])
    {
        $model = clone $this->model;
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $model = $model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $model = $model->where($where[0], $where[1]);
            } else {
                $model = $model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $model = $model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $model = $model->whereHas($whereHas[0], $whereHas[1]);
        }

        return $model->sum();
    }

    public function updateMany(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $updates)
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return null;
        } elseif (! count($updates)) {
            return null;
        }
        $model = clone $this->model;
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $model = $model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $model = $model->where($where[0], $where[1]);
            } else {
                $model = $model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $model = $model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $model = $model->whereHas($whereHas[0], $whereHas[1]);
        }

        return $model->update($updates);
    }

    public function deleteMany(array $wheres = [], array $whereIns = [], array $whereHaves = [])
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return null;
        }
        $model = clone $this->model;
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $model = $model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $model = $model->where($where[0], $where[1]);
            } else {
                $model = $model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $model = $model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $model = $model->whereHas($whereHas[0], $whereHas[1]);
        }

        return $model->delete();
    }

    public static function delete($model)
    {
        return $model->delete();
    }

    public static function save($model)
    {
        return $model->save();
    }
}
