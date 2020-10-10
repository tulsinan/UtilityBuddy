<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use App\Models\Invoice;
use App\Models\UtilityAccount;
use App\Models\UtilityCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountStatisticsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_statistic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoices = Invoice::all();

        return view('admin.accountStatistics.index', compact('invoices'));
    }
}