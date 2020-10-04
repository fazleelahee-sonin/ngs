<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::factory()->create([
            'id' => '77706673-de40-340c-abcf-387b6b26540f',
            'name' => 'newflix',
        ]);

        Channel::factory()->create([
            'id' => 'f9874ade-1022-32d1-980e-42faa1997594',
            'name' => 'dplus',
        ]);

    }
}