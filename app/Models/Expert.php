<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Notifications\Notifiable;


class Expert extends Model
{
    use Notifiable;


protected $keyType = 'string';
public $incrementing = false;
/*
* Generate a new UUID for the model.
 */
public function newUniqueId(): string
{
    return (string) Uuid::uuid4();
}

/**
 * Get the columns that should receive a unique identifier.
 *
 * @return array<int, string>
 */
public function uniqueIds(): array
{
    return ['id'];
}
    use HasUuids;

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

