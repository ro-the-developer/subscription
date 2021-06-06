<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'email',
        'topic_id',
    ];
    public function topic()
    {
        return $this->hasOne(Topic::class);
    }
}
