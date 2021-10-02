<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements RepositoryInterface
{
    /**
     * Initiate query builder
     *
     * @return Builder
     */
    public function queryBuilder(): Builder
    {
        return User::query();
    }

    /**
     * Initialize a new instance
     *
     * @return Model
     */
    public function initialize(): Model
    {
        return new User();
    }

    /**
     * @param Model $model
     * @return boolean
     */
    public function store(Model $model): bool
    {
        return $model->save();
    }

}
