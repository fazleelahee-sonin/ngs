<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProgrammeResource;
use App\Models\Channel;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    public function __invoke(Channel $channel, Programme $programme)
    {
        return new ProgrammeResource($programme);
    }
}