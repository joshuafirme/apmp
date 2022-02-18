<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscription';

    protected $fillable = [
        'email',
        'key',
        'status',
    ];

    public function validateSubscription($key) {
        $res = $this::where('key', $key)->count('id');
        return $res > 0 ? true : false;
    }

    public function isSubscribed($key) {
        $res = $this::where('key', $key)->value('status');
        return $res == 1 ? true : false;
    }
}
