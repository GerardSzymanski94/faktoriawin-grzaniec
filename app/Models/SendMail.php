<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    use HasFactory;


    protected $fillable = ['register_id', 'subject', 'message', 'email', 'status', 'type', 'ip_address'];


    public function register()
    {
        return $this->belongsTo(Register::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->addHour()->format('Y-m-d H:i');
    }
}
