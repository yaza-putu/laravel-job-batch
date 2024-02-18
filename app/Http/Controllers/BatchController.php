<?php

namespace App\Http\Controllers;

use App\Http\Requests\BatchRequest;
use App\Jobs\ImportCsv;
use App\services\LargeCSV;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

class BatchController extends Controller
{
    public function import(BatchRequest $request)
    {
        $file = $request->file("csv");
        $csv = new LargeCSV($file, ",");

        $jobId = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 13);

        \App\Models\Batch::create([
            'job_id' => $jobId,
            'total_job' => (count(file($file, FILE_SKIP_EMPTY_LINES)) - 1) / 1000,
        ]);

        foreach ($csv->toArray() as $data) {
            dispatch(new ImportCsv($jobId, $data));
        }

        return response()->json([
            "message" => "success",
            "job_id" => $jobId
        ],200);
    }
}
