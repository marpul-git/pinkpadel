<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable =['start_time','end_time'];

    public function events(){
        return $this->belongsToMany(Event::class);
    }
}
