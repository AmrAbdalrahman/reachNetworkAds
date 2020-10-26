<?php

namespace Modules\Ads\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendAdvertiserReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $receiver;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($receiver, $data)
    {
        $this->receiver = $receiver;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sendMail($this->receiver, $this->data);
    }
}
