<?php

namespace App\Http\Controllers\Product;

use App\Actions\Product as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product as Requests;
use App\Http\Transformers\Product\ProductTransformer as Transformer;
use App\Models\Product as Model;
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

        $resources = $action->execute(
            $request->passed(),
            ['id', 'name', 'price', 'image'],
            [],
        );

        return $this->resources(fractal_data($resources, new Transformer, ['user']));
    }

    /**
     * Show a product.
     */
    public function show(
        Model $id,
        Actions\FindAction $action,
    ): JsonResponse {

        $resource = $action->execute($id);

        return $this->resource(fractal_data($resource, new Transformer));
    }
}
