<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\OrderItem\OrderItemService;
use App\Http\Requests\OrderItem\OrderItemRequest;
use App\Http\Requests\OrderItem\UpdateOrderItemRequest;


/**
 * @group Order Item Management
 * @groupDescription Handles operations related to order items: creating, listing, viewing, updating, and deleting order items.
 */
class OrderItemController extends Controller
{
   protected OrderItemService $orderItemService;

    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }

    /**
     * List Order Items
     *
     * Returns a list of all order items.
     */
    public function index(): JsonResponse
    {
        return $this->orderItemService->getAll();
    }

    /**
     * Show Order Item
     *
     * Returns details of an order item by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->orderItemService->getById($id);
    }

    /**
     * Create Order Item
     *
     * Creates a new order item.
     * */
    //  * @param OrderItemRequest $request
    //  * @return JsonResponse

    public function store(OrderItemRequest $request): JsonResponse
    {
        $data = $request->validated();
        return $this->orderItemService->createItem($data);
    }


    /**
     * Update Order Item
     *
     * Updates an existing order item by ID.
     *
     * @param UpdateOrderItemRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateOrderItemRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        return $this->orderItemService->updateItem($id, $data)->toJson();
    }

    /**
     * Delete Order Item
     *
     * Deletes an order item by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->orderItemService->deleteItem($id)->toJson();
    }

}
