<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Models\Favorite;
use App\Models\Subject;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    use ApiResponse;

    /**
     * Get user's favorite subjects
     */
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();

        if (!$user) {
            return $this->errorResponse('Unauthorized', null, 401);
        }

        $favorites = $user->favorites()
            ->with('subject.semester.department', 'subject.pdfs')
            ->get()
            ->pluck('subject')
            ->values();

        return $this->successResponse(
            SubjectResource::collection($favorites),
            'Favorites retrieved successfully'
        );
    }

    /**
     * Toggle favorite for a subject
     */
    public function toggle(Request $request): JsonResponse
    {
        $request->validate([
            'subject_id' => 'required|integer|exists:subjects,id',
        ]);

        $user = $request->user();

        if (!$user) {
            return $this->errorResponse('Unauthorized', null, 401);
        }

        $favorite = Favorite::where('user_id', $user->id)
            ->where('subject_id', $request->subject_id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'Subject removed from favorites';
            $isFavorited = false;
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'subject_id' => $request->subject_id,
            ]);
            $message = 'Subject added to favorites';
            $isFavorited = true;
        }

        return $this->successResponse(
            ['is_favorited' => $isFavorited],
            $message
        );
    }

    /**
     * Check if a subject is favorited
     */
    public function isFavorited(Request $request, $subjectId): JsonResponse
    {
        $user = $request->user();

        if (!$user) {
            return $this->errorResponse('Unauthorized', null, 401);
        }

        $isFavorited = Favorite::where('user_id', $user->id)
            ->where('subject_id', $subjectId)
            ->exists();

        return $this->successResponse(
            ['is_favorited' => $isFavorited],
            'Favorite status retrieved successfully'
        );
    }
}
