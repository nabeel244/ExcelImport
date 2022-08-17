<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use App\Models\File;
use App\Models\FileColumn;
use App\Models\FileData;

class FilesImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $fileName = \Session::get('fileName');
        $fileId = File::insertGetId([
            'name' => $fileName
        ]);


        foreach ($rows as $row) {

            foreach ($row as $key => $col_data) {
                $columnId = FileColumn::insertGetId([
                    'file_id' => $fileId,
                    'name' => $key
                ]);

                FileData::create([
                    'column_id' => $columnId,
                    'data' => $col_data
                ]);
            }
        }
        \Session::flush();
    }
}
