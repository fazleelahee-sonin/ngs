<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Responses\TimeTableResponse;
use App\Models\Channel;
use App\Services\TimeTableService;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;

class TimeTableController extends Controller
{
    public function __invoke(Channel $channel, Carbon $date, CarbonTimeZone $tz, TimeTableService $timeTableService)
    {
        $timeTable = $timeTableService->get($channel, $date, $tz);
        return new TimeTableResponse($timeTable);
    }
}