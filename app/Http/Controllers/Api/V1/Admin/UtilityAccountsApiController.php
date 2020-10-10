<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUtilityAccountRequest;
use App\Http\Requests\UpdateUtilityAccountRequest;
use App\Http\Resources\Admin\UtilityAccountResource;
use App\Models\UtilityAccount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UtilityAccountsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('utility_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UtilityAccountResource(UtilityAccount::with(['utility_type', 'utility_name', 'created_by'])->get());
    }

    public function store(StoreUtilityAccountRequest $request)
    {
        $utilityAccount = UtilityAccount::create($request->all());

        return (new UtilityAccountResource($utilityAccount))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UtilityAccount $utilityAccount)
    {
        abort_if(Gate::denies('utility_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UtilityAccountResource($utilityAccount->load(['utility_type', 'utility_name', 'created_by']));
    }

    public function update(UpdateUtilityAccountRequest $request, UtilityAccount $utilityAccount)
    {
        $utilityAccount->update($request->all());

        return (new UtilityAccountResource($utilityAccount))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UtilityAccount $utilityAccount)
    {
        abort_if(Gate::denies('utility_account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utilityAccount->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}