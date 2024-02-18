<?php

namespace App\Http\Controllers;

use App\Events\JobProgress;
use App\Http\Requests\BatchRequest;
use App\Jobs\BatchJob;
use App\Jobs\ImportJob;
use App\Models\Rank;
use App\services\LargeCSV;
use Exception;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class BatchController extends Controller
{
    public function import(BatchRequest $request)
    {
        $file = $request->file("csv");
        $csv = new LargeCSV($file, ",");

        $batchId = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 13);


        foreach ($csv->toArray() as $data) {

        }

        return response()->json([
            "message" => "success",
            "job_id" => $batchId
        ],200);
    }
}
