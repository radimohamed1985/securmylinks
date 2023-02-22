<?php

namespace App\Telegram\Commands\Forms;

use App\Models\Form;
use App\Telegram\Commands\Core\BaseCommand;
use AshAllenDesign\ShortURL\Classes\Builder;
use AshAllenDesign\ShortURL\Exceptions\ShortURLException;
use Log;
use Telegram\Bot\Keyboard\Keyboard;
use Illuminate\Support\Carbon;
use AshAllenDesign\ShortURL\Models\ShortURL;
use App\Models\Subscription;


class GenerateCommand extends BaseCommand
{

    protected static int $id;

    protected $name = 'generate';

    protected $description = 'Generate Form Link';

    public static function setVariables(mixed $arguments): string
    {
        self::$id = $arguments[0];

        return self::class;
    }

    public function handle()
    {

        $this->authenticate();
        $form = Form::where('owner', $this->getClient()->id)->where('form_number', self::$id)->first();

        if ($form->destination) {
            try {
             
                $builder = new Builder();

                 $destination_url = $form->destination;

                  
                    $shortURLObject = $builder->destinationUrl($destination_url)->make();
                    $shortURLObject->compain_id =self::$id;
                    $shortURLObject->user_id =$this->getClient()->id;
                    $shortURLObject->save();

                    $destination_url = $shortURLObject->default_short_url;

                
              

                $keyboard = Keyboard::make()
                    ->inline()
                    ->row(Keyboard::inlineButton(['text' => '⬅️   Back', 'callback_data' => "form " . self::$id]));

                $this->replyWithMessage(['text' => $destination_url, 'reply_markup' => $keyboard]);

            } catch (ShortURLException $e) {
                Log::info($e->getMessage());

                $this->reply("Failed, Please Try again.");
            }

        } else {
            $this->sendInlineKeyboard('Please provide a destination link first :', 'Configure Destination', "destination " . self::$id);
        }

    }
}
