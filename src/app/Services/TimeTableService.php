<?php

namespace App\Services;

use App\Models\Channel;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Illuminate\Support\Collection;

class TimeTableService
{
    private $timeTableCollection;

    public function __construct()
    {
        $this->timeTableCollection = new Collection();
    }

    /**
     * Generating timetable on the fly
     * and get the timetable for give date.
     *
     * @param Channel $channel
     * @param Carbon $date
     * @param CarbonTimeZone $tz
     * @return Collection
     */
    public function get(Channel $channel, Carbon $date, CarbonTimeZone $tz): Collection
    {
        $dates = $this->getDates($date);
        $this->generateTimeTable($channel, $dates, $tz);
        $programs = $this->timeTableCollection->where('day', $date->format('l'))->all();
        return collect($programs);
    }

    /**
     * Generate dates for table from given date.
     * which we will query to database and retrieve shows/series
     * from database.
     *
     * @param Carbon $date
     * @return void
     */
    public function getDates(Carbon $date): Collection
    {
        $output = [];

        $date->setTimezone('UTC');

        $dateBefore = new Carbon(strtotime('-1 Day', $date->unix()), 'UTC');
        $follwingDay = new Carbon(strtotime('+1 day', $date->unix()), 'UTC');

        $output[$dateBefore->format('l')] = $dateBefore->format('Y-m-d');
        $output[$date->format('l')] = $date->format('Y-m-d');
        $output[$follwingDay->format('l')] = $follwingDay->format('Y-m-d');

        return collect($output);
    }

    /**
     * Generate time table
     *
     * @param Channel $channel
     * @param Collection $dates
     * @param CarbonTimeZone $tz
     * @return void
     */
    public function generateTimeTable(Channel $channel, Collection $dates, CarbonTimeZone $tz): void
    {
        $days = $dates->keys();

        $programmes = $channel->programmes()->whereIn('day_on_streaming', $days)->orderBy('sequence')->get();

        foreach ($dates as $key => $date) {
            $programmesOntheDay = $programmes->where('day_on_streaming', $key)
                ->all();

            foreach ($programmesOntheDay as $programme) {
                $startTime = new Carbon("$date {$programme->start_time}:00", 'UTC');
                $startTime->setTimezone($tz);

                $endTime = new Carbon("$date {$programme->end_time}:00", 'UTC');
                $endTime->setTimezone($tz);

                $tmp = [
                    'id' => $programme->id,
                    'name' => $programme->name,
                    'day' => $startTime->format('l'),
                    'startTime' => $startTime,
                    'endTime' => $endTime,
                    'duration' => $programme->duration,
                ];

                $this->timeTableCollection->add($tmp);
            }

        }
    }

}