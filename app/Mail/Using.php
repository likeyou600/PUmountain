<?php

namespace App\Mail;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Using extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$order_details)
    {
        $this->order=$order;
        $this->order_details=$order_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("器材借用成功通知")->view('mail.using')->with(['order_details' => $this->order_details,'order' => $this->order]);
    }
            // $msg = "嗨~"."$username"."\r\n"."你向登山社領取了器材"."\r\n"."借用開始日為"."$getDate"."\r\n"."最慢歸還日為"."$order_last_return_date"."\r\n"."祝旅途愉快 !~~";//信件內容

}
