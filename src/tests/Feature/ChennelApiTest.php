<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\CreatesApplication;
use Tests\TestCase;

class ChennelApiTest extends TestCase
{
    use CreatesApplication, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    public function testChannelsSuccessResponse()
    {
        $response = $this->json('GET', 'api/v1/channels', ['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJson([
            "data" => [
                [
                    "uuid" => '77706673-de40-340c-abcf-387b6b26540f',
                    "name" => "newflix",
                ],
                [
                    "uuid" => 'f9874ade-1022-32d1-980e-42faa1997594',
                    "name" => "dplus",
                ],
            ],
        ]);

    }

    public function testTimetableWithWrongChannelUuid()
    {
        $response = $this->json('GET', 'api/v1/channels/f9874ade-1022-32d1-980e-42faa1997584/2020-10-20/timezone/europe/london', ['Accept' => 'application/json']);
        $response->assertStatus(404);
    }

    public function testTimetableWithUnaccetableDateFormat()
    {
        $response = $this->json('GET', 'api/v1/channels/f9874ade-1022-32d1-980e-42faa1997594/10-10-2020/timezone/europe/london', ['Accept' => 'application/json']);
        $response->assertStatus(422);
    }

    public function testTimetableWithInvalidDateFormat()
    {
        $response = $this->json('GET', 'api/v1/channels/f9874ade-1022-32d1-980e-42faa1997594/10-20-2020/timezone/europe/london', ['Accept' => 'application/json']);
        $response->assertStatus(422);
    }

    public function testTimetableWithUnaccetableTimezone()
    {
        $response = $this->json('GET', 'api/v1/channels/f9874ade-1022-32d1-980e-42faa1997594/10-20-2020/timezone/europe/portsmouth', ['Accept' => 'application/json']);
        $response->assertStatus(422);
    }

    public function testTimetableWithCorrectChannelUuid()
    {
        $response = $this->json('GET', 'api/v1/channels/f9874ade-1022-32d1-980e-42faa1997594/2020-10-20/timezone/europe/london', ['Accept' => 'application/json']);
        $response->assertStatus(200);
    }

    public function testProgrameWithWrongChannelUuid()
    {
        $response = $this->json('GET', 'api/v1/channels/77706673-de40-340c-abcf-387b6b26540f/programmes/d5d7e782-278f-367c-b7c3-151538ffdb0c', ['Accept' => 'application/json']);
        $response->assertStatus(404);
    }

    public function testProgrameWithCorrectChannelUuid()
    {
        $response = $this->json('GET', 'api/v1/channels/77706673-de40-340c-abcf-387b6b26540f/programmes/fe9d1679-c391-355a-acc0-6873c3dc4fd5', ['Accept' => 'application/json']);
        $response->assertStatus(200);
    }
}