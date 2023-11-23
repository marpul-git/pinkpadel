<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user1()
    {
        return $this->belongsTo(User::class, 'user1_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user2_id');
    }

    public function user3()
    {
        return $this->belongsTo(User::class, 'user3_id');
    }

    public function user4()
    {
        return $this->belongsTo(User::class, 'user4_id');
    }
}
