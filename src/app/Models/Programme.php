<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Programme extends Model
{
    use HasFactory;

    protected $table = 'programmes';

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    public function getDurationAttribute()
    {
        $startDate = new Carbon('2001-01-01 ' . $this->start_time);
        $endDate = new Carbon('2001-01-01 ' . $this->end_time);
        return $endDate->diffInSeconds($startDate);
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }
}