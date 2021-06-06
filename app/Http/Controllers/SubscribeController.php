<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Subscription;
use App\Http\Requests\SubscribeRequest;

class SubscribeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe(SubscribeRequest $request)
    {
        $sub = new Subscription();
        $sub->email = $request->email;
        $sub->topic_id = $request->topic;
        $sub->save();
        return response()->json(['success' => true]);
    }
}

