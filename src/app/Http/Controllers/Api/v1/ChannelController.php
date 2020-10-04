<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChannelCollection;
use App\Models\Channel;

class ChannelController extends Controller
{
    public function __invoke(): ChannelCollection
    {
        return new ChannelCollection(Channel::select('*')->get());
    }
}