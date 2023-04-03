<?php

namespace App\Services;

use App\Repositories\TimeStampRepository;
use Carbon\Carbon;

class TimestampService
{
    protected $repo;

    public function __construct(TimeStampRepository $timestampRepo)
    {
        $this->repo = $timestampRepo;
    }

    public function insertMany(array $data)
    {
        return $this->repo->insertMany($data);
    }

    public function all()
    {
        return $this->repo->all(['name', 'timezone']);
    }

    public function count()
    {
        return $this->repo->count();
    }

    public function fetchFor(string $timezone)
    {
        $timestamp = $this->repo->fetchRow(['timezone', $timezone]);

        if (empty($timestamp)) {
            return null;
        }

        $date = Carbon::now($timezone)->format('Y-m-d H:m:i');

        try {
            $timeRequestService = app()->make(TimeRequestService::class);

            $timeRequestService->create([
                'time_stamp_id' => $timestamp->id,
                'response'      => $date
            ]);
        } catch (\Exception $e) {
            $date = null;
        }

        return $date;
    }
}
