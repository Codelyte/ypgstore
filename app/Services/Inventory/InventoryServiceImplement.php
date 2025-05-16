<?php

namespace App\Services\Inventory;

use LaravelEasyRepository\ServiceApi;
use App\Http\Resources\InventoryResource;
use Illuminate\Http\JsonResponse;
use App\Repositories\Inventory\InventoryRepository;


class InventoryServiceImplement extends ServiceApi implements InventoryService{

    /**
     * set title message api for CRUD
     * @param string $title
     */
     protected string $title = "";
     /**
     * uncomment this to override the default message
     * protected string $create_message = "";
     * protected string $update_message = "";
     * protected string $delete_message = "";
     */

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected InventoryRepository $inventoryRepository;

    public function __construct(InventoryRepository $inventoryRepository)
    {
      $this->inventoryRepository = $inventoryRepository;
    }

    /**
     * Get all inventory records
     */
    public function getAll(): JsonResponse
    {
        try {
            $inventory = $this->inventoryRepository->all();
            return response()->json(InventoryResource::collection($inventory), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch inventory records',
                'error' => $e->getMessage()
            ], 500);
        }
    }

     /**
     * Create a new inventory record
     */
    public function createInventory(array $data): JsonResponse
    {
        try {
            $item = $this->inventoryRepository->createInventory($data);
            return response()->json(new InventoryResource($item), 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Inventory creation failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
 * Get a specific inventory item by ID
 */
public function findInventory(int $id): JsonResponse
{
    try {
        $item = $this->inventoryRepository->findInventory($id);
        if (!$item) {
            return response()->json(['message' => 'Inventory item not found'], 404);
        }

        return response()->json(new InventoryResource($item), 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to fetch inventory item',
            'error' => $e->getMessage()
        ], 500);
    }
}

   /**
     * Update an existing inventory record
     */
    public function updateInventory(int $id, array $data): JsonResponse
    {
        try {
            $success = $this->inventoryRepository->updateInventory($id, $data);

            return response()->json([
                'message' => $success ? 'Inventory updated successfully' : 'Inventory item not found',
                'updated' => $success
            ], $success ? 200 : 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Inventory update failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

     /**
     * Delete an inventory record
     */
    public function deleteInventory(int $id): JsonResponse
    {
        try {
            $success = $this->inventoryRepository->deleteInventory($id);

            return response()->json([
                'message' => $success ? 'Inventory deleted successfully' : 'Inventory item not found',
                'deleted' => $success
            ], $success ? 200 : 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Inventory deletion failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
