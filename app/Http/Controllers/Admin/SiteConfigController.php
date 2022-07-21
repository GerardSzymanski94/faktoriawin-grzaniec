<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteConfig;
use App\Repositories\SiteConfigRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SiteConfigController extends Controller
{
    public function index()
    {
        $success = false;
        if (session('success')) {
            $success = true;
        }

        return Inertia::render('Admin/Config/Index', [
            'start' => SiteConfig::start(),
            'stop' => SiteConfig::stop(),
            'showSite' => SiteConfig::siteStart(),
            'hideSite' => SiteConfig::siteStop(),
            'success' => $success
        ]);
    }

    public function store(Request $request)
    {
        SiteConfig::updateOrCreate(['name' => 'start'], ['value' => $request->start]);
        SiteConfig::updateOrCreate(['name' => 'stop'], ['value' => $request->stop]);
        SiteConfig::updateOrCreate(['name' => 'start_site'], ['value' => $request->show_site]);
        SiteConfig::updateOrCreate(['name' => 'stop_site'], ['value' => $request->hide_site]);

        return redirect()->back()->with(['success' => true]);
    }
}
