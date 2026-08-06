<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Models\Metric;
use Illuminate\View\View;

class MetricController extends Controller
{
    public function index(): View
    {
        $metrics = Metric::latest()->paginate(20);

        return view('marketing.metrics.index', compact('metrics'));
    }

    public function show(Metric $metric): View
    {
        return view('marketing.metrics.show', compact('metric'));
    }
}