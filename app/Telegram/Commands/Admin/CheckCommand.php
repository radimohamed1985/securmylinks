<?php

namespace App\Telegram\Commands\Admin;

use App\Telegram\Commands\Core\BaseCommand;
use App\Traits\SubscriptionTrait;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Support\Carbon;


class CheckCommand extends BaseCommand
{

    protected $name = "check";

    protected $description = "Generate Subscription trail Key.";

    public function handle()
    {
                 $expire =Subscription::find($this->getClient()->subscription_id);
                //  $expire =Subscription::find(1);
                //  $expire->expire_at = \Carbon\Carbon::now()->addDays(360);
                //  $expire->save();
                $date = Carbon::parse($expire->expire_at);
                $now = Carbon::now();
                
                $diff = $date->diffInDays($now);

            $this->replyWithMessage(["text" => $diff]);

    }

}
