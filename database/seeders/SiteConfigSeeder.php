<?php

namespace Database\Seeders;

use App\Models\SiteConfig;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SiteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteConfig::firstOrCreate(['name' => 'start'], ['value' => Carbon::now()->format('Y-m-d H:i')]);
        SiteConfig::firstOrCreate(['name' => 'stop'], ['value' => Carbon::now()->addYear()->format('Y-m-d H:i')]);
        SiteConfig::firstOrCreate(['name' => 'start_site'], ['value' => Carbon::now()->format('Y-m-d H:i')]);
        SiteConfig::firstOrCreate(['name' => 'stop_site'], ['value' => Carbon::now()->addYear()->format('Y-m-d H:i')]);
    }
}
