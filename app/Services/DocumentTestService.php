<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;

class DocumentTestService
{
    public function createTestDocument($title, $date)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText($title, 1);
        $section->addText('Дата создания: ' . $date);
     
        $fileName = $title .'_'. uniqid(). '.docx';
        $filePath = storage_path('app/public/' . $fileName);
        
        $phpWord->save($filePath, 'Word2007');
        return $fileName;
    }
}