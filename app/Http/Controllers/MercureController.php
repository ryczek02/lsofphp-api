<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Mercure\Publisher;
use Symfony\Component\Mercure\Update;

class MercureController extends Controller
{
    public function pushEvent(Publisher $publisher)
    {
        $msg = 'test message from laravel controller';
        $topics = [
            'public-topic-1',
        ];
        $publisher(new Update($topics, $msg));

        return response()->json([
            'error' => false,
            'message' => $msg,
        ]);
    }
}
