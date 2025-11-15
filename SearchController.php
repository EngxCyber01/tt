<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    use ApiResponse;

    /**
     * Search across departments, subjects, instructors, and PDFs
     */
    public function search(Request $request): JsonResponse
    {
        $query = $request->get('query', '');

        if (strlen($query) < 2) {
            return $this->errorResponse('Search query must be at least 2 characters', null, 400);
        }

        $subjects = Subject::where('name', 'LIKE', "%{$query}%")
            ->orWhere('code', 'LIKE', "%{$query}%")
            ->orWhere('instructor', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhereHas('pdfs', function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%");
            })
            ->with('semester.department', 'pdfs')
            ->withCount('pdfs')
            ->limit(50)
            ->get();

        return $this->successResponse(
            SubjectResource::collection($subjects),
            'Search results retrieved successfully'
        );
    }
}
