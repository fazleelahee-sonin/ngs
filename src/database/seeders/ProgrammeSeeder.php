<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\Programme;
use Illuminate\Database\Seeder;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weekdays = [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday',
        ];

        //seeding for channel 1

        $programmes[] = [
            'Monday' => [
                [
                    'id' => '539b9fb2-00a3-320f-abcb-48be7ae6c633',
                    'name' => 'Lost in Space',
                    'start_time' => '12:10',
                    'end_time' => '14:10',

                ],

                [
                    'id' => 'ff32b3d3-c74e-3b91-b037-89af0095bd20',
                    'name' => 'Money Heist',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Tuesday' => [
                [
                    'id' => 'fe9d1679-c391-355a-acc0-6873c3dc4fd5',
                    'name' => 'Lost in Time',
                    'start_time' => '12:10',
                    'end_time' => '14:10',

                ],

                [
                    'id' => '8e9290e0-7069-3e90-a0fb-dbf68c596a40',
                    'name' => 'Bank Heist',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Wednesday' => [
                [
                    'id' => 'b94e9d00-4b7d-338f-8025-34144dcb31a3',
                    'name' => 'Launch Time Talkshow',
                    'start_time' => '12:10',
                    'end_time' => '14:10',

                ],

                [
                    'id' => '1a896cf7-9471-38e3-b07d-5f312e5fbc3a',
                    'name' => 'Evening Time TalkShow',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Thursday' => [
                [
                    'id' => '83bec398-1ddb-3ea6-973b-e0fec9c5c45e',
                    'name' => 'Lost in warmhole',
                    'start_time' => '12:10',
                    'end_time' => '14:10',

                ],

                [
                    'id' => '6eaae8ce-ea3d-3870-ac46-8c263e440d18',
                    'name' => 'New Generation',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Friday' => [
                [
                    'id' => 'cca48f07-5973-32af-ae2e-1c96dc979a14',
                    'name' => 'Its Friday',
                    'start_time' => '12:10',
                    'end_time' => '14:10',

                ],

                [
                    'id' => '4edfbb49-f061-36e1-9845-9af350290059',
                    'name' => 'preparing Weekend show',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Saturday' => [
                [
                    'id' => '705d1169-2cc5-3b96-92f8-3d9a339b29b7',
                    'name' => 'weekend show',
                    'start_time' => '12:10',
                    'end_time' => '14:10',

                ],

                [
                    'id' => 'b0414f97-6a0d-39ae-af1b-608bf928439e',
                    'name' => 'saturday show',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Sunday' => [
                [
                    'id' => '35659515-c0a5-3729-abd4-94e0955a7dcb',
                    'name' => 'Sunday show',
                    'start_time' => '12:10',
                    'end_time' => '14:10',

                ],

                [
                    'id' => '634ef745-c87d-3538-9ace-d6b940b8f4ae',
                    'name' => 'Sunday afternoon show',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

        ];

        $programmes[] = [
            'Monday' => [
                [
                    'id' => '24765d20-0374-3b08-bb02-5bd8ea020336',
                    'name' => 'Mandalorian',
                    'start_time' => '10:00',
                    'end_time' => '12:00',

                ],

                [
                    'id' => '85cf96bc-5e8b-3af3-a26b-bde1f0d1f232',
                    'name' => 'Start wars - Clone wars',
                    'start_time' => '13:15',
                    'end_time' => '14:15',

                ],
            ],

            'Tuesday' => [
                [
                    'id' => 'd5d7e782-278f-367c-b7c3-151538ffdb0c',
                    'name' => 'Legendary skywalker',
                    'start_time' => '11:00',
                    'end_time' => '12:00',

                ],

                [
                    'id' => 'b350e69d-febe-311a-8d12-337ed8597adc',
                    'name' => 'Ashoka Story',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Wednesday' => [
                [
                    'id' => '579b36a9-7a67-3023-b9c7-ab29173d1e17',
                    'name' => 'Yoda Show',
                    'start_time' => '12:10',
                    'end_time' => '14:10',

                ],

                [
                    'id' => 'd65ba306-7c19-370d-9caf-213fb0a02204',
                    'name' => 'Baby Yoda show',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Thursday' => [
                [
                    'id' => '04ba67bc-49e4-3d97-abcb-28d4be1ff86f',
                    'name' => 'Obi-Wan Kenobi',
                    'start_time' => '12:10',
                    'end_time' => '14:10',

                ],

                [
                    'id' => 'b573ae3a-e733-3f17-95d5-43db076e3cf6',
                    'name' => 'Jurassic Park',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Friday' => [
                [
                    'id' => 'd812b000-25a0-35a8-8216-3e7941684a11',
                    'name' => 'Starwars - Friday Show',
                    'start_time' => '12:10',
                    'end_time' => '14:10',

                ],

                [
                    'id' => '287ee550-233c-3eb0-9946-88ff90db08be',
                    'name' => 'Starwars - Friday evening show',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Saturday' => [
                [
                    'id' => 'eded4fc9-9b8b-3136-a1a2-621f607711b9',
                    'name' => 'Iron Man',
                    'start_time' => '12:10',
                    'end_time' => '14:10',
                ],

                [
                    'id' => 'ba3bb644-8750-3908-a502-c6f75ed0a999',
                    'name' => 'Spiderman',
                    'start_time' => '14:15',
                    'end_time' => '17:15',

                ],
            ],

            'Sunday' => [
                [
                    'id' => '5d31467d-6953-3e7f-986f-eb34f4ad5968',
                    'name' => 'Thanos show',
                    'start_time' => '12:10',
                    'end_time' => '14:10',
                    'duration' => '7200',
                ],

                [
                    'id' => 'a9dbf1ac-bdd8-3bcb-8f69-bd15b9203e4c',
                    'name' => 'DR. Strange show',
                    'start_time' => '14:15',
                    'end_time' => '17:15',
                ],
            ],

        ];

        $index = 0;
        $channels = Channel::select('*')->get();
        foreach ($channels as $key => $channel) {
            foreach ($weekdays as $weekday) {
                foreach ($programmes[$key][$weekday] as $programme) {
                    Programme::factory()->create([
                        'id' => $programme['id'],
                        'channel_id' => $channel->id,
                        'name' => $programme['name'],
                        'day_on_streaming' => $weekday,
                        'start_time' => $programme['start_time'],
                        'end_time' => $programme['end_time'],
                        'sequence' => $index,
                    ]);

                    $index++;
                }
            }
        }

    }
}