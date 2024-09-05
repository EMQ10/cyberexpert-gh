<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;

class Area extends Model
{
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
        'name',
    ];

    public function expert()
    {
        return $this->belongsToMany(Expert::class,'expert_areas');
    }
}
