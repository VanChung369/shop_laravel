<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    
    public function handle()
    {

         $botman = app('botman');
         $botman->hears('{message}', function($botman, $message) {
         if ($message == 'hi')
          {
            $this->askName($botman);
          }
          elseif($message == 'chào buổi sáng')
          {
            $this->moning($botman);
          }
          // else
          // {
          //   $botman->reply("tôi có thể giúp gì cho bạn");
          // }
         
       });

       $botman->listen();

    }

      public function askName($botman)
      {
          $botman->ask('xin chào! tên bạn là j ?', function(Answer $answer) {
          $name = $answer->getText();

          $this->say('rất vui được gặp bạn '.$name);
        });

      }
      public function moning($botman)
      {
        $botman->ask('buổi sáng tốt lành', function(Answer $answer) {
          $name = $answer->getText();

          $this->say('tôi có thể giúp gì cho bạn');
      });
    }
}
