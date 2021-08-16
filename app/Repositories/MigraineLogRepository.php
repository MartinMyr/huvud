<?php

namespace App\Repositories;

use App\Models\MigraineLog;
use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MigraineLogRepository implements RepositoryInterface
{
    /**
     * Initiate query builder
     *
     * @return Builder
     */
    public function queryBuilder(): Builder
    {
        return MigraineLog::query();
    }

    /**
     * Initialize a new instance
     *
     * @return Model
     */
    public function initialize(): Model
    {
        return new MigraineLog();
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
