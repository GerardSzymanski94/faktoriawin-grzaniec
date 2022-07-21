<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstantReward;
use App\Models\Register;
use App\Models\SiteConfig;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class StatsController extends Controller
{
    public function index()
    {
        $allRegisters = Register::all()->count();
        $instantWinsAll = InstantReward::all()->count();
        $instantWins = InstantReward::whereStatus(2)->count();
        $instantWinsLeft = InstantReward::whereStatus(1)->count();

        $arrayForChart = $this->createArrayForChart();
        $days = $arrayForChart['days'];
        $registersInDays = $arrayForChart['registersInDays'];


        $registersPerDay = number_format($allRegisters / count($days), 2);
        return Inertia::render('Admin/Stats/Index', [
            'allRegisters' => $allRegisters,
            'registersPerDay' => $registersPerDay,
            'registersInDays' => $registersInDays,
            'instantWinsAll' => $instantWinsAll,
            'instantWins' => $instantWins,
            'instantWinsLeft' => $instantWinsLeft,
            'days' => $days,
        ]);
    }

    private function createArrayForChart()
    {
        $return = [];
        $registersInDays = [];
        $days = [];
        $r = Register::select([DB::raw('DATE(created_at) as "day"'), DB::raw('count(*) as "count"')])
            ->groupBy(DB::raw('day'))
            ->get();

        foreach ($r as $item) {
            $registersInDays[] = $item->count;
            $days[] = $item->day;
        }
        $first = $days[0];
        $day = Carbon::parse($first);

        while ($day <= Carbon::now()) {
            if (array_search($day->format('Y-m-d'), $days) !== false) {
                $return['days'][] = $day->format('Y-m-d');
                $i = array_search($day->format('Y-m-d'), $days);
                $return['registersInDays'][] = $registersInDays[$i];
            } else {
                $return['days'][] = $day->format('Y-m-d');
                $return['registersInDays'][] = 0;
            }
            $day->addDay();
        }
        return $return;

    }
}
