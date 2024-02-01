<?php

namespace App\Http\Controllers\Wishlist;

use App\Actions\Wishlist as Actions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Wishlist as Requests;
use Illuminate\Http\JsonResponse;

class WishlistController extends Controller
{
    /**
     * Attach a user product.
     */
    public function attach(
        Requests\AttachRequest $request,
        Actions\AttachAction $action
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('attached_successfully'));
    }

    /**
     * List a user products.
     */
    public function index(
        Actions\ListAction $action
    ): JsonResponse {

        return $this->resources($action->execute());
    }

    /**
     * Detach a user product.
     */
    public function detach(
        Requests\DetachRequest $request,
        Actions\DetachAction $action
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('detached_successfully'));
    }
}
