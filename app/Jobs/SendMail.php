<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $to;
    protected $mailable;
    protected $bcc;
    protected $cc;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to, \Illuminate\Mail\Mailable $mailable, $bcc = [], $cc = [])
    {
        $this->to = $to;
        $this->mailable = $mailable;
        $this->bcc = $bcc;
        $this->cc = $cc;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = \Mail::to($this->to);
        if (count($this->bcc) > 0) {
            $mail->bcc($this->bcc);
        }
        if (count($this->cc) > 0) {
            $mail->cc($this->cc);
        }
        $mail->send($this->mailable);
    }
}
