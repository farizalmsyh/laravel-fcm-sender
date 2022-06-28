<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FcmController extends Controller
{
    public function test()
    {
        return response()->json(['message' => 'success']);
    }
    
    public function send(Request $request)
    {
        $recipients = $request->token;

        fcm()
            ->to($recipients) // $recipients must an array
            ->priority('normal')
            ->timeToLive(0)
            ->data([
                'title' => 'Test Notification',
                'body' => 'Testing Notification For Top Up',
            ])
            ->notification([
                'title' => 'Test Notification',
                'body' => 'Testing Notification For Top Up',
            ])
            ->send();
        return response()->json(['message' => 'Success send Notification']);
    }
}
