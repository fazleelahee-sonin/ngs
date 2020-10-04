<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    use HasFactory;

    protected $table = 'channels';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];


    public function programmes(): HasMany
    {
        return $this->hasMany(Programme::class, 'channel_id');
    }
}
