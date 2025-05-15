<?php

namespace App\Services\Order;

use Illuminate\Http\JsonResponse;
use App\Http\Resources\OrderResource;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\Order\OrderRepository;

class OrderServiceImplement extends ServiceApi implements OrderService{

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
    protected OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Get all orders
     */
    public function getAll(): JsonResponse
    {
        try {
            $orders = $this->orderRepository->all();
            return response()->json(OrderResource::collection($orders), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch orders',
                'error' => $e->getMessage()
            ], 500);
        }
    }

     /**
     * Get a specific order by ID
     */
    public function getById(int $id): JsonResponse
    {
        try {
            $order = $this->orderRepository->findById($id);
            if (!$order) {
                return response()->json(['message' => 'Order not found'], 404);
            }

            return response()->json(new OrderResource($order), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create a new order
     */
    public function createOrder(array $data): JsonResponse
    {
        try {
            $order = $this->orderRepository->createOrder($data);
            return response()->json(new OrderResource($order), 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Order creation failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

     /**
     * Update an existing order
     */
    public function  updateOrder(int $id, array $data): JsonResponse
    {
        try {
            $success = $this->orderRepository->updateOrder($id, $data);

            return response()->json([
                'message' => $success ? 'Order updated successfully' : 'Order not found',
                'updated' => $success
            ], $success ? 200 : 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Order update failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }


    /**
     * Delete an order
     */
    public function deleteOrder(int $id): JsonResponse
    {
        try {
            $success = $this->orderRepository->deleteOrder($id);

            return response()->json([
                'message' => $success ? 'Order deleted successfully' : 'Order not found',
                'deleted' => $success
            ], $success ? 200 : 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Order deletion failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }

}
