<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvDownloadController extends Controller
{
    public function downloadCsv()
    {
        $contacts = ContactForm::all();
        $csvHeader = array('id', 'name', 'title', 'email', 'url', 'gender', 'age', 'contact', 'created_at', 'updated_at');
        // $csvHeader = array('id', 'name', 'email', 'created_at', 'updated_at');
        $csvData = $contacts->toArray();

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row); 
            }
            fclose($handle);
        }, 200 , [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="test.csv"' 
        ]);

        return $response;
    }
}
