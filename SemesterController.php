<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SemesterResource;
use App\Http\Resources\SubjectResource;
use App\Models\Department;
use App\Models\Semester;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class SemesterController extends Controller
{
    use ApiResponse;

    /**
     * Get semesters for a specific department
     */
    public function index($departmentId): JsonResponse
    {
        $department = Department::find($departmentId);

        if (!$department) {
            return $this->errorResponse('Department not found', null, 404);
        }

        $semesters = $department->semesters()
            ->orderBy('number')
            ->get();

        return $this->successResponse(
            SemesterResource::collection($semesters),
            'Semesters retrieved successfully'
        );
    }

    /**
     * Get subjects for a specific semester
     */
    public function getSubjects($departmentId, $semesterNumber): JsonResponse
    {
        $semester = Semester::where('department_id', $departmentId)
            ->where('number', $semesterNumber)
            ->with('subjects')
            ->first();

        if (!$semester) {
            return $this->errorResponse('Semester not found', null, 404);
        }

        $subjects = $semester->subjects()
            ->withCount('pdfs')
            ->get();

        return $this->successResponse(
            SubjectResource::collection($subjects),
            'Subjects retrieved successfully'
        );
    }
}
