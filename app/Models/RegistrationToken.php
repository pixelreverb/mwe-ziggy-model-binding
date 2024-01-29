<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token', 'organization_id'
    ];

    public function organization(): BelongsTo {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function getRouteKeyName(): string 
    {
        return 'token';
    }
}
