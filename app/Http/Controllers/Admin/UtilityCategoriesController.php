<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUtilityCategoryRequest;
use App\Http\Requests\StoreUtilityCategoryRequest;
use App\Http\Requests\UpdateUtilityCategoryRequest;
use App\Models\UtilityCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UtilityCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('utility_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utilityCategories = UtilityCategory::all();

        return view('admin.utilityCategories.index', compact('utilityCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('utility_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.utilityCategories.create');
    }

    public function store(StoreUtilityCategoryRequest $request)
    {
        $utilityCategory = UtilityCategory::create($request->all());

        return redirect()->route('admin.utility-categories.index');
    }

    public function edit(UtilityCategory $utilityCategory)
    {
        abort_if(Gate::denies('utility_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.utilityCategories.edit', compact('utilityCategory'));
    }

    public function update(UpdateUtilityCategoryRequest $request, UtilityCategory $utilityCategory)
    {
        $utilityCategory->update($request->all());

        return redirect()->route('admin.utility-categories.index');
    }

    public function show(UtilityCategory $utilityCategory)
    {
        abort_if(Gate::denies('utility_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.utilityCategories.show', compact('utilityCategory'));
    }

    public function destroy(UtilityCategory $utilityCategory)
    {
        abort_if(Gate::denies('utility_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utilityCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyUtilityCategoryRequest $request)
    {
        UtilityCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}