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

    public function getAll($data)
    {
        return $this->medicinRepository->queryBuilder()
            ->where('user_id', data_get($data, 'user_id'))->get();
    }

    public function store($data)
    {
        $medicin          = $this->medicinRepository->initialize();
        $medicin->user_id = data_get($data, 'user_id');
        $medicin->medicin = data_get($data, 'medicin');

        return $this->medicinRepository->store($medicin);
    }
}
