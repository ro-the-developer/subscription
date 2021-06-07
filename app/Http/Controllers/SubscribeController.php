<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Subscription;
use App\Http\Requests\SubscribeRequest;
use App\Http\Requests\UnsubscribeRequest;
use App\Http\Requests\UnsubscribeAllRequest;

class SubscribeController extends Controller
{

    /**
     * Add a subscription.
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
    /**
     * Delete a subscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unsubscribe(UnsubscribeRequest $request)
    {
        $sub = Subscription::where('topic_id', $request->topic)->where('email', $request->email)->first();
        $sub->delete();
        return response()->json(['success' => true]);
    }
    /**
     * Delete all subscriptions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unsubscribeAll(UnsubscribeAllRequest $request)
    {
        $all = Subscription::where('email', $request->email)->get();
        Subscription::whereIn('id', $all->pluck('id'))->delete();
        return response()->json(['success' => true]);
    }
}

