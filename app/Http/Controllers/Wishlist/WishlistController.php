<?php

namespace App\Http\Controllers\Wishlist;

use App\Actions\Wishlist as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Wishlist as Requests;
use App\Http\Transformers\Product\ProductTransformer as Transformer;
use Illuminate\Http\JsonResponse;

class WishlistController extends Controller
{
    /**
     * Attach a user wishlist product.
     */
    public function attach(
        Requests\AttachRequest $request,
        Actions\AttachAction $action
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('attached_successfully'));
    }

    /**
     * List a user wishlist products.
     */
    public function index(
        Actions\ListAction $action
    ): JsonResponse {

        $resources = $action->execute();

        return $this->resources(fractal_data($resources, new Transformer));
    }

    /**
     * Detach a user wishlist product.
     */
    public function detach(
        Requests\DetachRequest $request,
        Actions\DetachAction $action
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('detached_successfully'));
    }

    /**
     * Clear a user wishlist products.
     */
    public function clear(
        Actions\ClearAction $action,
    ): JsonResponse {
        $action->execute();

        return $this->message(__('cleared_successfully'));
    }
}
