<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;
use Illuminate\Notifications\Notifiable;


class Expert_message extends Model
{
    use Notifiable;

    protected $keyType = 'string';
    public $incrementing = false;

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
        'expert_name' ,
        'expert_email' ,
        'name' ,
        'phone' ,
        'email' ,
        'gender' ,
        'subject' ,
        'message' ,
        'status' ,
        'expert_id',
    ];
}
