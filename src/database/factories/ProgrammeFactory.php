<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Programme;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Programme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'channel_id' => Channel::factory(),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'thumbnail' => $this->faker->imageUrl(640, 480),
            'day_on_streaming' => $this->faker->randomElement([
                'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday',
            ]),
            'sequence' => 0,
            'start_time' => Carbon::now()->format('H:i'),
            'end_time' => Carbon::now()->addHour()->format('H:i'),
        ];
    }
}
