<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\TimestampService;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    protected $timestampService;

    public function __construct(TimestampService $timestampService)
    {
        $this->timestampService = $timestampService;
    }

    public function index()
    {
        $timezones = $this->timestampService->all();

        return response()->json(['data' => $timezones]);
    }

    public function show(Request $request)
    {
        $timezone = $request->has('timezone') ? $request->timezone : 'Africa/Cairo';

        $date = $this->timestampService->fetchFor($timezone);

        return response()->json(['data' => $date]);
    }
}
