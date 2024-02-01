<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    /**
     * Apply a search query to a query builder instance.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search
     * @param  string  $column
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function applySearch(Builder $query, string $search, string $column): Builder
    {
        return $query->where($column, 'LIKE', "%{$search}%");
    }
}
