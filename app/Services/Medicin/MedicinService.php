<?php

namespace App\Services\Medicin;

use App\Repositories\MedicinRepository;

class MedicinService
{
    /**
     * @var mixed
     */
    private $medicinRepository;

    public function __construct()
    {
        $this->medicinRepository = app()->make(MedicinRepository::class);
    }

    /**
     * get all medicins for current user
     *
     * @param array $data
     *
     * @return array
     */
    public function getAll($id)
    {
        return $this->medicinRepository->queryBuilder()
            ->where('user_id', $id)->get();
    }

    /**
     * store medicin
     *
     * @param array $data
     *
     * @return array
     */
    public function store($data)
    {
        $medicin          = $this->medicinRepository->initialize();
        $medicin->user_id = data_get($data, 'user_id');
        $medicin->medicin = data_get($data, 'medicin');

        return $this->medicinRepository->store($medicin);
    }

    /**
     * delete medicin
     *
     * @param array $data
     *
     * @return array
     */
    public function delete($id)
    {
        $builder = $this->medicinRepository->queryBuilder();

        return $builder->findOrFail($id)->delete();
    }
}
