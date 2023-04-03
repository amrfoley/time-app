<?php
namespace App\Repositories;

use App\Models\TimeRequest;

class TimeRequestRepository extends EloquentRepository
{
    public function __construct(TimeRequest $timeRequest)
    {
        parent::__construct($timeRequest);
    }
}