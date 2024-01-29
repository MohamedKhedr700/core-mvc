<?php

namespace App\Http\Controllers\Wishlist;

use App\Actions\Wishlist as Actions;
use App\Http\Requests\Wishlist as Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class WishlistController extends Controller
{
    /**
     * Store a user wishlist.
     */
    public function store(
        Requests\StoreRequest $request,
        Actions\CreateAction $action
    ): JsonResponse {

        $action->execute($request->passed());

        return $this->message(__('created_successfully'));
    }

    /**
     * List a user wishlist.
     */
    public function index(
        Actions\ListAction $action
    ): JsonResponse {

        return $this->resources($action->execute());
    }
}
