<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestDocumentRequest;
use App\Services\DocumentTestService;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;

class DocumentController extends Controller
{
    public function generate(TestDocumentRequest $request, DocumentTestService $documentTestService)
    {
        $title = $request->input('title');
        $date = Carbon::parse($request->input('date'))->format('F j, Y');
        
        $fileName = $documentTestService->createTestDocument($title, $date);
        
        return response()->json([
            'file' => 'storage/' . $fileName
        ]);
    }
}
