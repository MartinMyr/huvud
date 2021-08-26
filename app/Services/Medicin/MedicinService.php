<?php

namespace App\Services\Medicin;

use App\Repositories\MedicinRepository;

class MedicinService
{
    private $medicinRepository;

    public function __construct()
    {
        $this->medicinRepository = app()->make(MedicinRepository::class);
    }

    public function getAll($validated)
    {
        return $this->medicinRepository->queryBuilder()
            ->where('user_id', data_get($validated, 'user_id'))->get();
    }
}
