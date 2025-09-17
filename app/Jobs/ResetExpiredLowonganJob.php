<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\LowonganPerusahaan;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ResetExpiredLowonganJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        LowonganPerusahaan::whereNotNull('expired_date')
            ->where('expired_date', '<=', now())
            ->update([
                'paket_id' => null,
                'expired_date' => null,
            ]);
    }
}
