<?php

namespace App\Services\Payment;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Payment\PaymentRepository;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\JsonResponse;

class PaymentServiceImplement extends ServiceApi implements PaymentService{

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
     protected PaymentRepository $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
       $this->paymentRepository = $paymentRepository;
    }

     public function getAll(): JsonResponse
    {
        try {
            $payments = $this->paymentRepository->all();
            return response()->json(PaymentResource::collection($payments), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch payments', 'error' => $e->getMessage()], 500);
        }
    }

     public function findPayment(int $id): JsonResponse
    {
        try {
            $payment = $this->paymentRepository->findPayment($id);
            if (!$payment) {
                return response()->json(['message' => 'Payment not found'], 404);
            }

            return response()->json(new PaymentResource($payment), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch payment', 'error' => $e->getMessage()], 500);
        }
    }

    public function createPayment(array $data): JsonResponse
    {
        try {
            $payment = $this->paymentRepository->createPayment($data);
            return response()->json(new PaymentResource($payment), 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Payment creation failed', 'error' => $e->getMessage()], 400);
        }
    }

     public function updatePayment(int $id, array $data): JsonResponse
    {
        try {
            $success = $this->paymentRepository->updatePayment($id, $data);
            return response()->json([
                'message' => $success ? 'Payment updated successfully' : 'Payment not found',
                'updated' => $success
            ], $success ? 200 : 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Payment update failed', 'error' => $e->getMessage()], 400);
        }
    }

     public function deletePayment(int $id): JsonResponse
    {
        try {
            $success = $this->paymentRepository->deletePayment($id);
            return response()->json([
                'message' => $success ? 'Payment deleted successfully' : 'Payment not found',
                'deleted' => $success
            ], $success ? 200 : 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Payment deletion failed', 'error' => $e->getMessage()], 400);
        }
    }


}
