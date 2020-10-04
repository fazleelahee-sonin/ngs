<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class TimeTableResponse implements Responsable
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function toResponse($request)
    {
        return response()->json($this->transform(), 200);
    }

    public function transform()
    {
        return [
            'data' => $this->data->map(function ($timetable) {
                return [
                    'uuid' => $timetable['id'],
                    'name' => $timetable['name'],
                    'start_time' => $timetable['startTime']->format('H:i'),
                    'end_time' => $timetable['endTime']->format('H:i'),
                    'duration' => $timetable['duration'],
                ];
            }),
        ];
    }
}