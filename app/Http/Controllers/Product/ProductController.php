<?php

namespace App\Http\Controllers\Product;

use App\Actions\Product as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product as Requests;
use App\Http\Transformers\Product\ProductTransformer;
use App\Models\Product as ProductModel;
use Illuminate\Http\JsonResponse;
use League\Fractal\Manager;
use League\Fractal\Scope;

class ProductController extends Controller
{
    /**
     * List product resources.
     */
    public function index(
        Requests\ListRequest $request,
        Actions\ListAction $action,
    ): JsonResponse {

        $resources = $action->execute($request->passed(), ['id', 'name', 'price', 'image']);

        return $this->resources(fractal_data($resources, new ProductTransformer, ['user']));
    }

    /**
     * Show a product.
     */
    public function show(
        ProductModel $product,
        Actions\FindAction $action,
    ): JsonResponse {

        $resource = $action->execute($product);

        return $this->resource(fractal_data($resource, new ProductTransformer));
    }
}
