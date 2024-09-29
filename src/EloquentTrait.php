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
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $this->model = $this->model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $this->model = $this->model->where($where[0], $where[1]);
            } else {
                $this->model = $this->model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $this->model = $this->model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $this->model = $this->model->whereHas($whereHas[0], $whereHas[1]);
        }
        if (count($selects)) {
            $this->model = $this->model->select($selects);
        }
        if (count($withs)) {
            $this->model = $this->model->with($withs);
        }
        if (count($orderBys)) {
            foreach ($orderBys as $orderBy) {
                $this->model = $this->model->orderBy($orderBy[0], $orderBy[1]);
            }
        }

        return $this->model->get();
    }

    public function first(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $selects = [], array $withs = [], array $orderBys = [])
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return null;
        }
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $this->model = $this->model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $this->model = $this->model->where($where[0], $where[1]);
            } else {
                $this->model = $this->model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $this->model = $this->model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $this->model = $this->model->whereHas($whereHas[0], $whereHas[1]);
        }
        if (count($selects)) {
            $this->model = $this->model->select($selects);
        }
        if (count($withs)) {
            $this->model = $this->model->with($withs);
        }
        if (count($orderBys)) {
            foreach ($orderBys as $orderBy) {
                $this->model = $this->model->orderBy($orderBy[0], $orderBy[1]);
            }
        }

        return $this->model->first();
    }

    public function paginate(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $selects = [], array $withs = [], array $orderBys = [], int $perPage = 10)
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return null;
        }
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $this->model = $this->model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $this->model = $this->model->where($where[0], $where[1]);
            } else {
                $this->model = $this->model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $this->model = $this->model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $this->model = $this->model->whereHas($whereHas[0], $whereHas[1]);
        }
        if (count($selects)) {
            $this->model = $this->model->select($selects);
        }
        if (count($withs)) {
            $this->model = $this->model->with($withs);
        }
        if (count($orderBys)) {
            foreach ($orderBys as $orderBy) {
                $this->model = $this->model->orderBy($orderBy[0], $orderBy[1]);
            }
        }

        return $this->model->paginate($perPage);
    }

    public function cursor_paginate(array $wheres = [], array $whereIns = [], array $whereHaves = [], array $selects = [], array $withs = [], array $orderBys = [], int $perPage = 10)
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return null;
        }
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $this->model = $this->model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $this->model = $this->model->where($where[0], $where[1]);
            } else {
                $this->model = $this->model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $this->model = $this->model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $this->model = $this->model->whereHas($whereHas[0], $whereHas[1]);
        }
        if (count($selects)) {
            $this->model = $this->model->select($selects);
        }
        if (count($withs)) {
            $this->model = $this->model->with($withs);
        }
        if (count($orderBys)) {
            foreach ($orderBys as $orderBy) {
                $this->model = $this->model->orderBy($orderBy[0], $orderBy[1]);
            }
        }

        return $this->model->cursor_paginate($perPage);
    }

    public function count(array $wheres = [], array $whereIns = [], array $whereHaves = [])
    {
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $this->model = $this->model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $this->model = $this->model->where($where[0], $where[1]);
            } else {
                $this->model = $this->model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $this->model = $this->model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $this->model = $this->model->whereHas($whereHas[0], $whereHas[1]);
        }

        return $this->model->count();
    }

    public function sum(array $wheres = [], array $whereIns = [], array $whereHaves = [])
    {
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $this->model = $this->model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $this->model = $this->model->where($where[0], $where[1]);
            } else {
                $this->model = $this->model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $this->model = $this->model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $this->model = $this->model->whereHas($whereHas[0], $whereHas[1]);
        }

        return $this->model->sum();
    }

    public function updateMany(array $wheres, array $whereIns, array $whereHaves, array $updates)
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return null;
        } elseif (! count($updates)) {
            return null;
        }
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $this->model = $this->model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $this->model = $this->model->where($where[0], $where[1]);
            } else {
                $this->model = $this->model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $this->model = $this->model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $this->model = $this->model->whereHas($whereHas[0], $whereHas[1]);
        }

        return $this->model->update($updates);
    }

    public function deleteMany(array $wheres = [], array $whereIns = [], array $whereHaves = [])
    {
        if (! count($wheres) && ! count($whereIns) && ! count($whereHaves)) {
            return null;
        }
        foreach ($wheres as $where) {
            if (is_array($where) && count($where) === 3) {
                $this->model = $this->model->where($where[0], $where[1], $where[2]);
            } elseif (is_array($where) && count($where) === 2) {
                $this->model = $this->model->where($where[0], $where[1]);
            } else {
                $this->model = $this->model->where($where);
            }
        }
        foreach ($whereIns as $whereIn) {
            $this->model = $this->model->whereIn($whereIn[0], $whereIn[1]);
        }
        foreach ($whereHaves as $whereHas) {
            $this->model = $this->model->whereHas($whereHas[0], $whereHas[1]);
        }

        return $this->model->delete();
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
