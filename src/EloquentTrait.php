<?php

namespace tyasa81\DbRepositories;

use Illuminate\Database\Connectors\Connector;

trait EloquentTrait
{
    // you need a model variable in the repository
    public function get(array $wheres=[],array $whereIns=[],array $whereHaves=[],array $selects=[],array $withs=[], array $orderBys=[])
    {
        if(!count($wheres) && !count($whereIns) && !count($whereHaves)) {
            return [];
        }
        foreach($wheres as $where) {
            if(is_array($where) && count($where)===3) {
                $this->model=$this->model->where($where[0],$where[1],$where[2]);
            } elseif(is_array($where) && count($where)===2) {
                $this->model=$this->model->where($where[0],$where[1]);
            } else {
                $this->model=$this->model->where($where);
            }
        }
        foreach($whereIns as $whereIn) {
            $this->model=$this->model->whereIn($whereIn[0],$whereIn[1]);
        }
        foreach($whereHaves as $whereHas) {
            $this->model=$this->model->whereHas($whereHas[0],$whereHas[1]);
        }
        if(count($selects)) {
            $this->model=$this->model->select($selects);
        }
        if(count($withs)) {
            $this->model=$this->model->with($withs);
        }
        if(count($orderBys)) {
            foreach($orderBys as $orderBy) {
                $this->model=$this->model->orderBy($orderBy[0],$orderBy[1]);
            }
        }
        return $this->model->get();
    }
    
    public function first(array $wheres=[],array $whereIns=[],array $whereHaves=[],array $selects=[],array $withs=[], array $orderBys=[])
    {
        if(!count($wheres) && !count($whereIns) && !count($whereHaves)) {
            return null;
        }
        foreach($wheres as $where) {
            if(is_array($where) && count($where)===3) {
                $this->model=$this->model->where($where[0],$where[1],$where[2]);
            } elseif(is_array($where) && count($where)===2) {
                $this->model=$this->model->where($where[0],$where[1]);
            } else {
                $this->model=$this->model->where($where);
            }
        }
        foreach($whereIns as $whereIn) {
            $this->model=$this->model->whereIn($whereIn[0],$whereIn[1]);
        }
        foreach($whereHaves as $whereHas) {
            $this->model=$this->model->whereHas($whereHas[0],$whereHas[1]);
        }
        if(count($selects)) {
            $this->model=$this->model->select($selects);
        }
        if(count($withs)) {
            $this->model=$this->model->with($withs);
        }
        if(count($orderBys)) {
            foreach($orderBys as $orderBy) {
                $this->model=$this->model->orderBy($orderBy[0],$orderBy[1]);
            }
        }
        return $this->model->first();
    }

    public function paginate(array $wheres=[],array $whereIns=[],array $whereHaves=[],array $selects=[],array $withs=[], array $orderBys=[], int $perPage=10)
    {
        if(!count($wheres) && !count($whereIns) && !count($whereHaves)) {
            return null;
        }
        foreach($wheres as $where) {
            if(is_array($where) && count($where)===3) {
                $this->model=$this->model->where($where[0],$where[1],$where[2]);
            } elseif(is_array($where) && count($where)===2) {
                $this->model=$this->model->where($where[0],$where[1]);
            } else {
                $this->model=$this->model->where($where);
            }
        }
        foreach($whereIns as $whereIn) {
            $this->model=$this->model->whereIn($whereIn[0],$whereIn[1]);
        }
        foreach($whereHaves as $whereHas) {
            $this->model=$this->model->whereHas($whereHas[0],$whereHas[1]);
        }
        if(count($selects)) {
            $this->model=$this->model->select($selects);
        }
        if(count($withs)) {
            $this->model=$this->model->with($withs);
        }
        if(count($orderBys)) {
            foreach($orderBys as $orderBy) {
                $this->model=$this->model->orderBy($orderBy[0],$orderBy[1]);
            }
        }
        return $this->model->paginate($perPage);
    }
    
    public function cursor_paginate(array $wheres=[],array $whereIns=[],array $whereHaves=[],array $selects=[],array $withs=[], array $orderBys=[], int $perPage=10)
    {
        if(!count($wheres) && !count($whereIns) && !count($whereHaves)) {
            return null;
        }
        foreach($wheres as $where) {
            if(is_array($where) && count($where)===3) {
                $this->model=$this->model->where($where[0],$where[1],$where[2]);
            } elseif(is_array($where) && count($where)===2) {
                $this->model=$this->model->where($where[0],$where[1]);
            } else {
                $this->model=$this->model->where($where);
            }
        }
        foreach($whereIns as $whereIn) {
            $this->model=$this->model->whereIn($whereIn[0],$whereIn[1]);
        }
        foreach($whereHaves as $whereHas) {
            $this->model=$this->model->whereHas($whereHas[0],$whereHas[1]);
        }
        if(count($selects)) {
            $this->model=$this->model->select($selects);
        }
        if(count($withs)) {
            $this->model=$this->model->with($withs);
        }
        if(count($orderBys)) {
            foreach($orderBys as $orderBy) {
                $this->model=$this->model->orderBy($orderBy[0],$orderBy[1]);
            }
        }
        return $this->model->cursor_paginate($perPage);
    }

    public function count($wheres=[],$whereIns=[],$whereHaves=[])
    {
        if(!count($wheres) && !count($whereIns) && !count($whereHaves)) {
            return null;
        }
        foreach($wheres as $where) {
            if(is_array($where) && count($where)===3) {
                $this->model=$this->model->where($where[0],$where[1],$where[2]);
            } elseif(is_array($where) && count($where)===2) {
                $this->model=$this->model->where($where[0],$where[1]);
            } else {
                $this->model=$this->model->where($where);
            }
        }
        foreach($whereIns as $whereIn) {
            $this->model=$this->model->whereIn($whereIn[0],$whereIn[1]);
        }
        foreach($whereHaves as $whereHas) {
            $this->model=$this->model->whereHas($whereHas[0],$whereHas[1]);
        }
        return $this->model->count();
    }

    public function sum($wheres=[],$whereIns=[],$whereHaves=[])
    {
        if(!count($wheres) && !count($whereIns) && !count($whereHaves)) {
            return null;
        }
        foreach($wheres as $where) {
            if(is_array($where) && count($where)===3) {
                $this->model=$this->model->where($where[0],$where[1],$where[2]);
            } elseif(is_array($where) && count($where)===2) {
                $this->model=$this->model->where($where[0],$where[1]);
            } else {
                $this->model=$this->model->where($where);
            }
        }
        foreach($whereIns as $whereIn) {
            $this->model=$this->model->whereIn($whereIn[0],$whereIn[1]);
        }
        foreach($whereHaves as $whereHas) {
            $this->model=$this->model->whereHas($whereHas[0],$whereHas[1]);
        }
        return $this->model->sum();
    }

}
