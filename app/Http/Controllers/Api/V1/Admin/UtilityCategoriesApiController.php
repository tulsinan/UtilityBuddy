<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUtilityCategoryRequest;
use App\Http\Requests\UpdateUtilityCategoryRequest;
use App\Http\Resources\Admin\UtilityCategoryResource;
use App\Models\UtilityCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UtilityCategoriesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('utility_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UtilityCategoryResource(UtilityCategory::all());
    }

    public function store(StoreUtilityCategoryRequest $request)
    {
        $utilityCategory = UtilityCategory::create($request->all());

        return (new UtilityCategoryResource($utilityCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UtilityCategory $utilityCategory)
    {
        abort_if(Gate::denies('utility_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UtilityCategoryResource($utilityCategory);
    }

    public function update(UpdateUtilityCategoryRequest $request, UtilityCategory $utilityCategory)
    {
        $utilityCategory->update($request->all());

        return (new UtilityCategoryResource($utilityCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UtilityCategory $utilityCategory)
    {
        abort_if(Gate::denies('utility_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utilityCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}