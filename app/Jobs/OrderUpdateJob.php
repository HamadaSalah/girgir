<?php

namespace App\Jobs;

use App\Mail\OrderResponsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderUpdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    /**
     * Create a new job instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $statuses = [
            'requested',
            'approved',
            'set_the_installation',
            'the_visit_has_been_scheduled',
            'worker_on_the_road',
            'get_started',
            'work_completed'
        ];

        $currentStatusIndex = array_search($this->order->status, $statuses);

        if ($currentStatusIndex !== false && $currentStatusIndex < count($statuses) - 1) {
            $this->order->status = $statuses[$currentStatusIndex + 1];
            $this->order->save();
        }

        Mail::to($this->order->user->email)->send(new OrderResponsMail($this->order));

    }
}
