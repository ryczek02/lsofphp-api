<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Mercure\Publisher;
use Symfony\Component\Mercure\Update;

class MercureController extends Controller
{
    public function pushEvent(Publisher $publisher)
    {
        $topics = [
            'public-topic-1',
        ];

        for ($i = 0; $i <= 10; $i++) {
            $publisher(new Update($topics, 'index: ' . strval($i)));
            sleep(2);
        }
    }

    public function pushEventSpecified(Publisher $publisher, Request $request)
    {
        $topics = [
            'public-topic-1',
        ];

        $publisher(new Update($topics, $request->message));
        sleep(2);
    }
}
