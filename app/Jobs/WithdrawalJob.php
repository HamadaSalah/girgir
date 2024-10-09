<?php

namespace App\Jobs;

use App\Mail\WithdrawalMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WithdrawalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $record;

    /**
     * Create a new job instance.
     */
    public function __construct($record)
    {
        $this->record = $record;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->record->user->email)->send(new WithdrawalMail($this->record));
    }
}
