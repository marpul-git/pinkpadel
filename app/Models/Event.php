<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function sections()
    {
        
        return $this->belongsToMany(Section::class);
                   
    }

    public function player()
    {
        return $this->hasOne(Player::class);
    }
     
}
