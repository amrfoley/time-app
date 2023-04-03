<?php

namespace App\Repositories;

use App\Models\TimeStamp;

class TimeStampRepository extends EloquentRepository
{
    public function __construct(TimeStamp $timestamp)
    {
        parent::__construct($timestamp);
    }

    public function insertMany(array $data): bool
    {
        try {
            $inserted = $this->model->insert($data);
        } catch (\Exception $e) {
            $inserted = false;
            // we may also log the error to any desired logger driver
        }

        return $inserted;
    }

    public function fetchRow(array $where = [])
    {
        return $this->model->where([$where])->first();
    }
}
