<?php

namespace App\Telegram\Commands\Forms;

use App\Models\Form;
use App\Telegram\Commands\Core\BaseCommand;
use Str;
use Telegram\Bot\Keyboard\Keyboard;
use AshAllenDesign\ShortURL\Models\ShortURL;

class ReportCommand extends BaseCommand
{
    /**
     * The Command's name.
     *
     * @var string
     */
    protected $name = 'report';
    /**
     * The Command's short description.
     *
     * @var string
     */
    protected $description = 'reporting';

   

    public function handle()
    {

        $this->authenticate();
        $user =$this->getClient()->id;
  
             $this->reply('https://m.fkmrk.xyz/report/'.$user );
     
           
        }
     
    
} 