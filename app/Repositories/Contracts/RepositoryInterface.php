<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function queryBuilder(): Builder;
    public function initialize(): Model;
    public function store(Model $model): bool;
}
