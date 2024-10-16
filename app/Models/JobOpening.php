<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobOpening extends Model
{
    /** @use HasFactory<\Database\Factories\JobOpeningFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'clientID'
    ];

    /**
     * @return BelongsTo<Client>
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'clientID');
    }
}
