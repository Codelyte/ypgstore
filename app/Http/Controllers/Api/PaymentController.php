<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Payment\PaymentService;
use App\Http\Requests\Payment\PaymentRequest;
use App\Http\Requests\Payment\UpdatePaymentRequest;


/**
 * @group Payment Management
 * @groupDescription Handles creating, listing, viewing, updating, and deleting payments.
 */
class PaymentController extends Controller
{

    protected PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * List Payments
     */
    public function index(): JsonResponse
    {
        return $this->paymentService->getAll()->toJson();
    }

    /**
     * Show Payment
     *
     * @param int $id
     */
    public function show(int $id): JsonResponse
    {
        return $this->paymentService->findPayment($id)->toJson();
    }

    /**
     * Create Payment
     *
     * @param PaymentRequest $request
     */
    public function store(PaymentRequest $request): JsonResponse
    {
        return $this->paymentService->createPayment($request->validated())->toJson();
    }

    /**
     * Update Payment
     *
     * @param UpdatePaymentRequest $request
     * @param int $id
     */
    public function update(UpdatePaymentRequest $request, int $id): JsonResponse
    {
        return $this->paymentService->updatePayment($id, $request->validated())->toJson();
    }

    /**
     * Delete Payment
     *
     * @param int $id
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->paymentService->deletePayment($id)->toJson();
    }

}
