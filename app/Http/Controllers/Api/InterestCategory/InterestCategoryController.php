<?php

namespace App\Http\Controllers\Api\InterestCategory;

use App\Http\Controllers\Controller;
use App\Models\InterestCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InterestCategoryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = InterestCategory::query()
            ->orderBy('id', 'DESC')
            ->paginate($request->query('per_page'));

        return response()->json($query);
    }

    public function store(Request $request): JsonResponse
    {
        $category = new InterestCategory();
        $category->category_name = $request->input('category_name');
        $category->save();

        return response()->json($category);
    }
}
