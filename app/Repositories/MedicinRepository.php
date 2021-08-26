<?php

namespace App\Repositories;

use App\Models\Medicin;
use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MedicinRepository implements RepositoryInterface
{
    /**
     * Initiate query builder
     *
     * @return Builder
     */
    public function queryBuilder(): Builder
    {
        return Medicin::query();
    }

    /**
     * Initialize a new instance
     *
     * @return Model
     */
    public function initialize(): Model
    {
        return new Medicin();
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
