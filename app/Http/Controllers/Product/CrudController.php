<?php

namespace App\Http\Controllers\Product;

use App\Actions\Product as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product as Requests;
use App\Models\Product as ProductModel;
use Illuminate\Http\JsonResponse;

class CrudController extends Controller
{
    /**
     * Create a new product.
     */
    public function store(
        Requests\StoreRequest $request,
        Actions\CreateAction $action,
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('created_successfully'));
    }

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

    /**
     * Update a product.
     */
    public function update(
        Requests\UpdateRequest $request,
        ProductModel $product,
        Actions\UpdateAction $action,
    ): JsonResponse {

        $action->execute($product, $request->passed());

        return $this->message(__('updated_successfully'));
    }

    /**
     * Delete a product.
     */
    public function delete(
        ProductModel $product,
        Actions\DeleteAction $action,
    ): JsonResponse {

        $action->execute($product);

        return $this->message(__('deleted_successfully'));
    }
}
