<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TelegramNewApplicant;

class VacancyController extends Controller
{
    public function sendVacancy(Request $request)
    {
      // code...
      $phone = '+38' . $request->phone;
      $name = $request->name;
      $comment = $request->comment;
      //telegram notification
      if (setting('services.telegram_notify') == true) {
        Notification::send('', new TelegramNewApplicant($phone, $name, $comment));
      }
      return response()->json(['success' => true]);
    }
}
