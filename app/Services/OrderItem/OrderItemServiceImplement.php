<?php

namespace App\Services\OrderItem;
use App\Http\Resources\OrderItemResource;
use Illuminate\Http\JsonResponse;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\OrderItem\OrderItemRepository;

class OrderItemServiceImplement extends ServiceApi implements OrderItemService{

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
     protected OrderItemRepository $orderItemRepository;

    public function __construct(OrderItemRepository $orderItemRepository)
    {
         $this->orderItemRepository = $orderItemRepository;
    }

       /**
     * Get all order items
     */
    public function getAll(): JsonResponse
    {
        try {
            $items = $this->orderItemRepository->all();
            return response()->json(OrderItemResource::collection($items), 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch order items',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get a specific order item by ID
     */
    public function getById(int $id): JsonResponse
    {
        try {
            $item = $this->orderItemRepository->getById($id);
            if (!$item) {
                return response()->json(['message' => 'Order item not found'], 404);
            }

            return response()->json(new OrderItemResource($item), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch order item',
                'error' => $e->getMessage()
            ], 500);
        }
    }


     /**
     * Create a new order item
     */
    public function createItem(array $data): JsonResponse
    {
        try {
        $item = $this->orderItemRepository->createOrderItem($data);

        return response()->json([
            'message' => 'Order item created successfully',
            'item' => new OrderItemResource($item)
        ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Order item creation failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Update an existing order item
     */
    public function updateItem(int $id, array $data): JsonResponse
    {
        try {
            $success = $this->orderItemRepository->updateOrderItem($id, $data);

            return response()->json([
                'message' => $success ? 'Order item updated successfully' : 'Order item not found',
                'updated' => $success
            ], $success ? 200 : 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Order item update failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

     /**
     * Delete an order item
     */
    public function deleteItem(int $id): JsonResponse
    {
        try {
            $success = $this->orderItemRepository->deleteOrderItem($id);

            return response()->json([
                'message' => $success ? 'Order item deleted successfully' : 'Order item not found',
                'deleted' => $success
            ], $success ? 200 : 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Order item deletion failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }


}
