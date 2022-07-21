<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'value'];

    public static function start()
    {
        return SiteConfig::whereName('start')->first();
    }

    public static function stop()
    {
        return SiteConfig::whereName('stop')->first();
    }

    public static function siteStart()
    {
        return SiteConfig::whereName('start_site')->first();
    }

    public static function siteStop()
    {
        return SiteConfig::whereName('stop_site')->first();
    }
}
