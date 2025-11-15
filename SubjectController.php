<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class SubjectController extends Controller
{
    use ApiResponse;

    /**
     * Get a specific subject by code
     */
    public function show($code): JsonResponse
    {
        $subject = Subject::where('code', $code)
            ->with('pdfs', 'semester.department')
            ->withCount('pdfs')
            ->first();

        if (!$subject) {
            return $this->errorResponse('Subject not found', null, 404);
        }

        return $this->successResponse(
            new SubjectResource($subject),
            'Subject retrieved successfully'
        );
    }

    /**
     * Get subjects by semester
     */
    public function bySemester($departmentId, $semesterNumber): JsonResponse
    {
        $subjects = Subject::whereHas('semester', function ($query) use ($departmentId, $semesterNumber) {
            $query->where('department_id', $departmentId)
                ->where('number', $semesterNumber);
        })
        ->withCount('pdfs')
        ->get();

        if ($subjects->isEmpty()) {
            return $this->errorResponse('No subjects found', null, 404);
        }

        return $this->successResponse(
            SubjectResource::collection($subjects),
            'Subjects retrieved successfully'
        );
    }
}
