<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUtilityAccountRequest;
use App\Http\Requests\StoreUtilityAccountRequest;
use App\Http\Requests\UpdateUtilityAccountRequest;
use App\Models\UtilityAccount;
use App\Models\UtilityCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UtilityAccountsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('utility_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utilityAccounts = UtilityAccount::all();

        return view('admin.utilityAccounts.index', compact('utilityAccounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('utility_account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utility_types = UtilityCategory::all()->pluck('utility_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $utility_names = UtilityCategory::all()->pluck('utility_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.utilityAccounts.create', compact('utility_types', 'utility_names'));
    }

    public function store(StoreUtilityAccountRequest $request)
    {
        $utilityAccount = UtilityAccount::create($request->all());

        return redirect()->route('admin.utility-accounts.index');
    }

    public function edit(UtilityAccount $utilityAccount)
    {
        abort_if(Gate::denies('utility_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utility_types = UtilityCategory::all()->pluck('utility_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $utility_names = UtilityCategory::all()->pluck('utility_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $utilityAccount->load('utility_type', 'utility_name', 'created_by');

        return view('admin.utilityAccounts.edit', compact('utility_types', 'utility_names', 'utilityAccount'));
    }

    public function update(UpdateUtilityAccountRequest $request, UtilityAccount $utilityAccount)
    {
        $utilityAccount->update($request->all());

        return redirect()->route('admin.utility-accounts.index');
    }

    public function show(UtilityAccount $utilityAccount)
    {
        abort_if(Gate::denies('utility_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utilityAccount->load('utility_type', 'utility_name', 'created_by');

        return view('admin.utilityAccounts.show', compact('utilityAccount'));
    }

    public function destroy(UtilityAccount $utilityAccount)
    {
        abort_if(Gate::denies('utility_account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utilityAccount->delete();

        return back();
    }

    public function massDestroy(MassDestroyUtilityAccountRequest $request)
    {
        UtilityAccount::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}