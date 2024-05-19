<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture',
        'name',
        'area_id',
        'years_of_experience',
        'email',
        'contact',
        'profile_message',
        'user_id',
    ];


    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

