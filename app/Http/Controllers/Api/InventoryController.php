<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Inventory\InventoryService;
use App\Http\Requests\Inventory\InventoryRequest;
use App\Http\Requests\Inventory\UpdateInventoryRequest;

/**
 * @group Inventory Management
 * @groupDescription Handles operations related to inventory: creating, listing, viewing, updating, and deleting inventory items.
 */
class InventoryController extends Controller
{

    protected InventoryService $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    /**
     * List Inventory
     *
     * Returns a list of all inventory items.
     */
    public function index(): JsonResponse
    {
        return $this->inventoryService->getAll()->toJson();
    }

    /**
     * Show Inventory
     *
     * Returns details of an inventory item by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->inventoryService->findInventory($id)->toJson();
    }

    /**
     * Create Inventory
     *
     * Creates a new inventory item.
     *
     * @param InventoryRequest $request
     * @return JsonResponse
     */
    public function store(InventoryRequest $request): JsonResponse
    {
        $data = $request->validated();
        return $this->inventoryService->createInventory($data)->toJson();
    }

    /**
     * Update Inventory
     *
     * Updates an existing inventory item by ID.
     *
     * @param UpdateInventoryRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateInventoryRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        return $this->inventoryService->updateInventory($id, $data)->toJson();
    }

    /**
     * Delete Inventory
     *
     * Deletes an inventory item by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->inventoryService->deleteInventory($id)->toJson();
    }

}
