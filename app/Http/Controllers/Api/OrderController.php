<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Order\OrderRequest;
use App\Services\Order\OrderService;
use App\Http\Requests\Order\UpdateOrderRequest;

/**
 * @group Order Management
 * @groupDescription Handles operations related to orders: creating, listing, viewing, updating, and deleting orders.
 */
class OrderController extends Controller
{

     protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * List Orders
     *
     * Returns a list of all orders.
     */
    public function index(): JsonResponse
    {
        return $this->orderService->getAll();
    }

     /**
     * Show Order
     *
     * Returns details of an order by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->orderService->getById($id);
    }

    /**
     * Create Order
     *
     * Creates a new order.
     *
     * @param OrderRequest $request
     * @return JsonResponse
     */
    public function store(OrderRequest $request): JsonResponse
    {
        $data = $request->validated();
        return $this->orderService->createOrder($data);
    }

     /**
     * Update Order
     *
     * Updates an existing order by ID.
     *
     * @param UpdateOrderRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateOrderRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        return $this->orderService->updateOrder($id, $data)->toJson();
    }

     /**
     * Delete Order
     *
     * Deletes an order by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->orderService->deleteOrder($id)->toJson();
    }


}
