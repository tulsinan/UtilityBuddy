<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WaterUsageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('water_usage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.waterUsages.index');
    }
}