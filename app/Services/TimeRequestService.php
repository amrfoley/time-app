<?php

namespace App\Services;

use App\Repositories\TimeRequestRepository;

class TimeRequestService
{
    protected $timeRequestRepository;

    public function __construct(TimeRequestRepository $timeRequestRepository)
    {
        $this->timeRequestRepository = $timeRequestRepository;
    }
    
    public function create(array $data)
    {
        return $this->timeRequestRepository->create($data);
    }
}
