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
        'years_of_experience',
        'email',
        'contact',
        'profile_message',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function area(){
        return $this->belongsToMany(Area::class,'expert_areas');
    }

}

