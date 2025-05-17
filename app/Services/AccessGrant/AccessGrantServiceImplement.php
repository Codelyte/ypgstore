<?php

namespace App\Services\AccessGrant;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\AccessGrant\AccessGrantRepository;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\AccessGrantResource;

class AccessGrantServiceImplement extends ServiceApi implements AccessGrantService{

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
     protected AccessGrantRepository $accessGrantRepository;

    public function __construct(AccessGrantRepository $accessGrantRepository)
    {
        $this->accessGrantRepository = $accessGrantRepository;
    }

     public function getAll(): JsonResponse
    {
        try {
            $grants = $this->accessGrantRepository->getAll();
            return response()->json(AccessGrantResource::collection($grants), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch access grants', 'error' => $e->getMessage()], 500);
        }
    }

    public function findAccessGrant(int $id): JsonResponse
    {
        try {
            $grant = $this->accessGrantRepository->findAccessGrant($id);
            if (!$grant) {
                return response()->json(['message' => 'Access grant not found'], 404);
            }

            return response()->json(new AccessGrantResource($grant), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch access grant', 'error' => $e->getMessage()], 500);
        }
    }

     public function createAccessGrant(array $data): JsonResponse
    {
        try {
            $grant = $this->accessGrantRepository->createAccessGrant($data);
            return response()->json(new AccessGrantResource($grant), 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create access grant', 'error' => $e->getMessage()], 400);
        }
    }

    public function updateAccessGrant(int $id, array $data): JsonResponse
    {
        try {
            $updated = $this->accessGrantRepository->updateAccessGrant($id, $data);
            return response()->json([
                'message' => $updated ? 'Access grant updated successfully' : 'Access grant not found',
                'updated' => $updated
            ], $updated ? 200 : 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update access grant', 'error' => $e->getMessage()], 400);
        }
    }

    public function deleteAccessGrant(int $id): JsonResponse
    {
        try {
            $deleted = $this->accessGrantRepository->deleteAccessGrant($id);
            return response()->json([
                'message' => $deleted ? 'Access grant deleted successfully' : 'Access grant not found',
                'deleted' => $deleted
            ], $deleted ? 200 : 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete access grant', 'error' => $e->getMessage()], 400);
        }
    }






}
