<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstantReward extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'month', 'day', 'hour', 'minute', 'second', 'type', 'status'];

    protected function getTimeAttribute()
    {
        return "{$this->year}-{$this->month}-{$this->day} {$this->hour}:{$this->minute}:{$this->second}";
    }
}
