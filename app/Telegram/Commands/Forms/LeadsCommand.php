<?php

namespace App\Telegram\Commands\Forms;

use App\Models\Form;
use App\Telegram\Commands\Core\BaseCommand;
use Str;
use Telegram\Bot\Keyboard\Keyboard;
use AshAllenDesign\ShortURL\Models\ShortURL;

class LeadsCommand extends BaseCommand
{
    /**
     * The Command's name.
     *
     * @var string
     */
    protected $name = 'lead';
    /**
     * The Command's short description.
     *
     * @var string
     */
    protected $description = 'leads';

   

    public function handle()
    {

        $this->authenticate();
        $user =$this->getClient()->id;
  
             $this->reply('https://m.fkmrk.xyz/myleads/'.$user );
     
           
        }
     
    
} 