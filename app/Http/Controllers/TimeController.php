<?php

namespace App\Http\Controllers;

use App\Services\TimestampService;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    protected $timestampService;

    public function __construct(TimestampService $timestampService)
    {
        $this->timestampService = $timestampService;
    }

    public function index(Request $request)
    {
        $date = null;
        $timezone = $request->has('timezone') ? $request->timezone : null;
        $timezones = $this->timestampService->all();

        if (!empty($timezone)) {
            $date = $this->timestampService->fetchFor($timezone);
        }

        return view('datetime', compact('timezones', 'date'));
    }
}
