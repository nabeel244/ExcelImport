<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExcelRequest;
use Illuminate\Http\Request;
use App\Imports\FilesImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function store(ExcelRequest $request)
    {
        try {
            $file = request()->file('file');
            $fileWithExtension = $file->getClientOriginalName();
            $fileName = pathinfo($fileWithExtension, PATHINFO_FILENAME);
            \Session::put('fileName', $fileName);
            Excel::import(new FilesImport, $file);
            return back()->with('success', 'File Imported Successfully.');

        } catch (\Exception $e) {

           return back()->with('error', $e->getMessage());
        }
    }
}
