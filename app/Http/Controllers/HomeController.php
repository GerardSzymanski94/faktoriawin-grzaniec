<?php

namespace App\Http\Controllers;

use App\Models\SiteConfig;
use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        if ($now < SiteConfig::siteStart()->value || $now > SiteConfig::siteStop()->value) {
            return abort(404);
        }
        $showForm = true;
        if ($now < SiteConfig::start()->value || $now > SiteConfig::stop()->value) {
            $showForm = false;
        }
        return view('index', compact('showForm'));
    }
}
