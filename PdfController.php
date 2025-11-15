<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PdfResource;
use App\Models\PdfFile;
use App\Models\Subject;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class PdfController extends Controller
{
    use ApiResponse;

    /**
     * Get all PDFs for a specific subject
     */
    public function getBySubject($subjectCode): JsonResponse
    {
        $subject = Subject::where('code', $subjectCode)->first();

        if (!$subject) {
            return $this->errorResponse('Subject not found', null, 404);
        }

        $pdfs = $subject->pdfs()
            ->orderBy('date', 'desc')
            ->get();

        return $this->successResponse(
            PdfResource::collection($pdfs),
            'PDFs retrieved successfully'
        );
    }

    /**
     * Get a specific PDF
     */
    public function show($id): JsonResponse
    {
        $pdf = PdfFile::find($id);

        if (!$pdf) {
            return $this->errorResponse('PDF not found', null, 404);
        }

        return $this->successResponse(
            new PdfResource($pdf),
            'PDF retrieved successfully'
        );
    }

    /**
     * Get preview URL for a PDF
     */
    public function getPreview($id): JsonResponse
    {
        $pdf = PdfFile::find($id);

        if (!$pdf) {
            return $this->errorResponse('PDF not found', null, 404);
        }

        return $this->successResponse([
            'preview_url' => $pdf->getPreviewUrl(),
            'title' => $pdf->title,
        ], 'Preview URL retrieved successfully');
    }
}
