<?php

namespace App\Http\Controllers\Product;

use App\Actions\Product as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product as Requests;
use App\Models\Product as ProductModel;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * List product resources.
     */
    public function index(
        Requests\ListRequest $request,
        Actions\ListAction $action,
    ): JsonResponse {

        return $this->resources($action->execute($request->passed()));
    }

    /**
     * Show a product.
     */
    public function show(
        ProductModel $product,
        Actions\FindAction $action,
    ): JsonResponse {

        return $this->resource($action->execute($product));
    }
}
