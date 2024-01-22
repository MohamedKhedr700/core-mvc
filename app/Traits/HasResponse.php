<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HasResponse
{
    /**
     * Return success response.
     */
    public function success(string $message = 'success', array $data = []): JsonResponse
    {
        $response = array_merge(['message' => $message], $data);

        return response()->json($response);
    }

    /**
     * Return success resource response.
     */
    public function successResource($resource, array $data = []): JsonResponse
    {
        $response = array_merge(['resource' => $resource], $data);

        return $this->success('', $response);
    }

    /**
     * Return success resources response.
     */
    public function successResources($resources, array $data = []): JsonResponse
    {
        $response = array_merge(['resources' => $resources], $data);

        return $this->success('', $response);
    }
}
