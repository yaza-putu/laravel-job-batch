<?php

namespace App\Jobs;

use App\Events\EvenProgress;
use App\Models\Batch;
use App\Models\Rank;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportCsv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data, $jobId;
    /**
     * Create a new job instance.
     */
    public function __construct(string $jobId, array $data)
    {
        $this->data = $data;
        $this->jobId = $jobId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->data as $item) {
            Rank::create([
                "global_rank" => $item["GlobalRank"],
                "tld" => $item["TLD"],
                "tld_rank" => $item["TldRank"],
                "domain" => $item["IDN_Domain"]
            ]);
        }

        $batch = Batch::where('job_id', $this->jobId)->firstOrFail();
        $batch->update([
            'done' => $batch->done + 1
        ]);

        broadcast(new EvenProgress($batch));
    }
}
