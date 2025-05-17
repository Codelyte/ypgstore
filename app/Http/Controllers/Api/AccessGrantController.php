<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Access\AccessGrantRequest;
use App\Http\Requests\Access\UpdateAccessGrantRequest;
use App\Services\AccessGrant\AccessGrantService;


/**
 * @group Access Grant Management
 * @groupDescription Handles creation, listing, viewing, updating, and deletion of access grants.
 */
class AccessGrantController extends Controller
{

    protected AccessGrantService $accessGrantService;

    public function __construct(AccessGrantService $accessGrantService)
    {
        $this->accessGrantService = $accessGrantService;
    }

    /**
     * List Access Grants
     */
    public function index(): JsonResponse
    {
        return $this->accessGrantService->getAll()->toJson();
    }

    /**
     * Show Access Grant
     *
     * @param int $id
     */
    public function show(int $id): JsonResponse
    {
        return $this->accessGrantService->findAccessGrant($id)->toJson();
    }

    /**
     * Create Access Grant
     *
     * @param AccessGrantRequest $request
     */
    public function store(AccessGrantRequest $request): JsonResponse
    {
        return $this->accessGrantService->createAccessGrant($request->validated())->toJson();
    }

    /**
     * Update Access Grant
     *
     * @param UpdateAccessGrantRequest $request
     * @param int $id
     */
    public function update(UpdateAccessGrantRequest $request, int $id): JsonResponse
    {
        return $this->accessGrantService->updateAccessGrant($id, $request->validated())->toJson();
    }

    /**
     * Delete Access Grant
     *
     * @param int $id
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->accessGrantService->deleteAccessGrant($id)->toJson();
    }

}
