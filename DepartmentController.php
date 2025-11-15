<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    use ApiResponse;

    /**
     * Get all departments
     */
    public function index(): JsonResponse
    {
        $departments = Department::with('semesters:id,department_id,number')
            ->withCount('semesters')
            ->get();

        return $this->successResponse(
            DepartmentResource::collection($departments),
            'Departments retrieved successfully'
        );
    }

    /**
     * Get a specific department with its semesters
     */
    public function show($id): JsonResponse
    {
        $department = Department::with('semesters:id,department_id,number')
            ->find($id);

        if (!$department) {
            return $this->errorResponse('Department not found', null, 404);
        }

        return $this->successResponse(
            new DepartmentResource($department),
            'Department retrieved successfully'
        );
    }
}
