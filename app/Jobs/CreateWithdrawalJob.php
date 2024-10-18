<?php

namespace App\Jobs;

use App\Mail\CreateWithdrawalMail;
use App\Models\Provider;
use App\Models\WebsiteInfo;
use App\Models\Withdrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CreateWithdrawalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $request;

    /**
     * Create a new job instance.
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $withdraw_rate = WebsiteInfo::first()->withdraw_rate;

        $provider = Provider::find($this->request['user_id']);
        
        $provider->decrement('balance', $this->request['amount']);


        $data = $this->request;
        $data['amount'] = $this->request['amount'] - ($this->request['amount'] * $withdraw_rate / 100);

        Withdrawal::create($this->request);


        Mail::to($provider->email)->send(new CreateWithdrawalMail($data));
    }
}
